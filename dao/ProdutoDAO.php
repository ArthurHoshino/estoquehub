<?php
require_once("./models/Produto.php");
require_once("./models/Message.php");

class ProdutoDAO implements ProdutoDAOInterface {

    private $conn;
    private $message;

    function __construct(PDO $conn, $url)
    {
        $this->conn = $conn;
        $this->message = new Message($url);
    }

    public function buildProduto ($data) {
        $prod = new Produto();

        $prod->CDPRODNOME = $data["nome"];
        $prod->CDPRODDESC = $data["desc"];
        $prod->CDPRODPRECO = $data["preco"];

        return $prod;
    }

    public function inserir(Produto $produto) {
        try {
            $stmt = $this->conn->prepare("
                INSERT INTO CDPRODUTO (CDPRODNOME, CDPRODDESC, CDPRODPRECO)
                VALUES (:CDPRODNOME, :CDPRODDESC, :CDPRODPRECO)
            ");

            $stmt->bindParam(":CDPRODNOME", $produto->CDPRODNOME);
            $stmt->bindParam(":CDPRODDESC", $produto->CDPRODDESC);
            $stmt->bindParam(":CDPRODPRECO", $produto->CDPRODPRECO);

            $stmt->execute();

            $this->message->setMessage("Produto inserido com sucesso", "success", "dashboard.php");
        } catch (Exception $ex) {
            $ex->getMessage();
            $this->message->setMessage("Aconteceu um erro: " . $ex->getMessage(), "error", "back");
        }
    }

    public function atualizar(Produto $produto) {
        try {
            $stmt = $this->conn->prepare("
                UPDATE CDPRODUTO SET
                CDPRODNOME = :CDPRODNOME,
                CDPRODDESC = :CDPRODDESC,
                CDPRODPRECO = :CDPRODPRECO
                WHERE CDPRODID = :CDPRODID
            ");

            $stmt->bindParam(":CDPRODNOME", $produto->CDPRODNOME);
            $stmt->bindParam(":CDPRODDESC", $produto->CDPRODDESC);
            $stmt->bindParam(":CDPRODPRECO", $produto->CDPRODPRECO);
            $stmt->bindParam(":CDPRODID", $produto->CDPRODID);

            $stmt->execute();

            $this->message->setMessage("Produto atualizado com sucesso", "success", "dashboard.php");
        } catch (Exception $ex) {
            $ex->getMessage();
            $this->message->setMessage("Aconteceu um erro: " . $ex->getMessage(), "error", "back");
        }
    }

    public function deletar($CDPRODID) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM CDPRODUTO WHERE CDPRODID = :CDPRODID");

            $stmt->bindParam(":CDPRODID", $CDPRODID);

            $stmt->execute();

            $this->message->setMessage("Produto deletado com sucesso", "success", "dashboard.php");
        } catch (Exception $ex) {
            $this->message->setMessage("Aconteceu um erro: " . $ex->getMessage(), "error", "back");
        }
    }

    public function filtrar($CDUSID, $CDPRODID, $nome = null, $descricao = null, $preco = null, $qtd = null) {
        try {
            $produtosRetorno = [];
            $whereQuery = "";
            $whereQuery .= $nome      != null ? ($whereQuery == "" ? "WHERE CDPRODNOME = :CDPRODNOME " : "AND CDPRODNOME = :CDPRODNOME ") : "";
            $whereQuery .= $descricao != null ? ($whereQuery == "" ? "WHERE CDPRODDESC = :CDPRODDESC " : "AND CDPRODDESC = :CDPRODDESC ") : "";
            $whereQuery .= $preco     != null ? ($whereQuery == "" ? "WHERE CDPRODPRECO = :CDPRODPRECO " : "AND CDPRODPRECO = :CDPRODPRECO ") : "";

            $query = "SELECT * FROM CDPRODUTO
                    INNER JOIN CDESTOQUE ON CDESTPRODID = :CDPRODID
                    AND CDESTUSUARIOID = :CDUSID
                    $whereQuery";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":CDPRODID", $CDPRODID);
            $stmt->bindParam(":CDUSID", $CDUSID);
            if ($nome != null)      $stmt->bindParam(":CDPRODNOME", $nome);
            if ($descricao != null) $stmt->bindParam(":CDPRODDESC", $descricao);
            if ($preco != null)     $stmt->bindParam(":CDPRODPRECO", $preco);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $prodArray = $stmt->fetchAll();

                foreach ($prodArray as $p) {
                    $produtosRetorno[] = $this->buildProduto($p);
                }
            }

            return $produtosRetorno;
        } catch (Exception $ex) {
            $this->message->setMessage("Aconteceu um erro: " . $ex->getMessage(), "error", "back");
        }
    }
}
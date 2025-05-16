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

    /** Criar o objeto do Produto
     *
     * @param array $data Id do usuário que será usado para buscar o produto
     */
    public function buildProduto ($data) {
        $prod = new Produto();

        $prod->CDPRODNOME = $data["nome"];
        $prod->CDPRODDESC = $data["desc"];
        $prod->CDPRODPRECO = $data["preco"];

        return $prod;
    }

    /** Query para inserir um produto
     *
     * @param int $CDPRODID Id do usuário que será usado para buscar o produto
     */
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
            $this->message->setMessage("Aconteceu um erro", "error", "back");
        }
    }

    /** Query para atualizar um produto
     *
     * @param int $CDPRODID Id do usuário que será usado para buscar o produto
     */
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
            $this->message->setMessage("Aconteceu um erro", "error", "back");
        }
    }

    /** Query para deletar um produto
     *
     * @param int $CDPRODID Id do usuário que será usado para buscar o produto
     */
    public function deletar($CDPRODID) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM CDPRODUTO WHERE CDPRODID = :CDPRODID");

            $stmt->bindParam(":CDPRODID", $CDPRODID);

            $stmt->execute();

            $this->message->setMessage("Produto deletado com sucesso", "success", "dashboard.php");
        } catch (Exception $ex) {
            $this->message->setMessage("Aconteceu um erro", "error", "back");
        }
    }

    /** Query de busca dos produtos para listagem na dashboard
     *
     * @param int $CDUSID O id do usuário para buscar o estoque dele
     * @param string $filtroOpt A coluna a qual o filtro será aplicado
     * @param string $filtroValor O valor que será usado no filtro
     * @param int $offset A página da tabela
     *
     * @return array Os resultados da busca
     */
    public function filtrar($CDUSID, $filtroOpt=null, $filtroValor=null, $offset=0) {
        try {
            $produtosRetorno = [];
            $porPagina = 7;
            $totalItens = 0;
            $whereQry  = $filtroOpt != null ? " AND $filtroOpt = :$filtroOpt" : "";
            $qryTotalItens = "SELECT COUNT(*) FROM CDESTOQUE WHERE CDESTUSUARIOID = :CDUSID";
            $qryItensPagina = "SELECT * FROM CDPRODUTO
                    INNER JOIN CDESTOQUE ON CDESTPRODID = CDPRODID
                    WHERE CDESTUSUARIOID = :CDUSID
                    $whereQry
                    ORDER BY CDPRODDESC
                    LIMIT :PORPAGINA OFFSET :OFFSET";

            $stmt = $this->conn->prepare($qryItensPagina);

            $stmt->bindParam(":CDUSID", $CDUSID);
            $stmt->bindColumn(":PORPAGINA", $porPagina);
            if ($filtroOpt != null) {
                $stmt->bindParam(":$filtroOpt", $filtroValor);
            }
            if ($offset != null) {
                $stmt->bindParam(":OFFSET", $offset * $porPagina);
            }

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $stmtTotalItens = $this->conn->prepare($qryTotalItens);
                $stmtTotalItens->bindParam(":CDUSID", $CDUSID);
                $stmtTotalItens->execute();
                $prodArray = $stmt->fetchAll();
                $totalItens = $stmtTotalItens->fetchColumn();

                foreach ($prodArray as $p) {
                    $produtosRetorno[] = $this->buildProduto($p);
                }
            }

            $objRetorno = [
                "produtos" => $produtosRetorno,
                "totalItens" => $totalItens,
                "porPagina" => $porPagina,
                "paginaAtual" => ($offset + 1)
            ];

            return $objRetorno;
        } catch (Exception $ex) {
            $this->message->setMessage("Aconteceu um erro", "error", "back");
        }
    }
}
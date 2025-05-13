<?php
require_once("./models/Estoque.php");
require_once("./models/Message.php");

class EstoqueDAO implements EstoqueDAOInterface {
    private $conn;
    private $message;

    function __construct(PDO $conn, $url)
    {
        $this->conn = $conn;
        $this->message = new Message($url);
    }

    public function inserir(Estoque $estoque){
        try {
            $stmt = $this->conn->prepare("
                INSERT INTO CDESTOQUE (CDESTUSUARIOID, CDESTPRODID, CDESTQTD)
                VALUES (:CDESTUSUARIOID, :CDESTPRODID, :CDESTQTD)
            ");

            $stmt->bindParam(":CDESTUSUARIOID", $estoque->CDESTUSUARIOID);
            $stmt->bindParam(":CDESTPRODID", $estoque->CDESTPRODID);
            $stmt->bindParam(":CDESTQTD", $estoque->CDESTQTD);

            $stmt->execute();

            $this->message->setMessage("Estoque inserido com sucesso", "success", "dashboard.php");
        } catch (Exception $ex) {
            $ex->getMessage();
            $this->message->setMessage("Aconteceu um erro: " . $ex->getMessage(), "error", "back");
        }
    }

    public function atualizar(Estoque $estoque){
        try {
            $stmt = $this->conn->prepare("
                UPDATE CDESTOQUE SET
                CDESTQTD = :CDESTQTD
                WHERE CDESTUSUARIOID = :CDESTUSUARIOID
                AND CDESTPRODID = :CDESTPRODID
            ");

            $stmt->bindParam(":CDESTQTD", $estoque->CDESTQTD);
            $stmt->bindParam(":CDESTUSUARIOID", $estoque->CDESTUSUARIOID);
            $stmt->bindParam(":CDESTPRODID", $estoque->CDESTPRODID);

            $stmt->execute();

            $this->message->setMessage("Estoque atualizado com sucesso", "success", "dashboard.php");
        } catch (Exception $ex) {
            $ex->getMessage();
            $this->message->setMessage("Aconteceu um erro: " . $ex->getMessage(), "error", "back");
        }
    }

    public function deletar($CDESTUSUARIOID, $CDESTPRODID){
        try {
            $stmt = $this->conn->prepare("DELETE FROM CDESTOQUE 
                                            WHERE CDESTUSUARIOID = :CDESTUSUARIOID
                                            AND CDESTPRODID = :CDESTPRODID");

            $stmt->bindParam(":CDESTUSUARIOID", $CDESTUSUARIOID);
            $stmt->bindParam(":CDESTPRODID", $CDESTPRODID);

            $stmt->execute();

            $this->message->setMessage("Estoque deletado com sucesso", "success", "dashboard.php");
        } catch (Exception $ex) {
            $this->message->setMessage("Aconteceu um erro: " . $ex->getMessage(), "error", "back");
        }
    }
}
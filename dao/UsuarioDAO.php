<?php

require_once("./models/Message.php");
require_once("./models/Usuario.php");

class UsuarioDAO implements UsuarioDAOInterface
{
	private $conn; // conexão do banco
	private $url;  // caminho para a raíz do sistema
    private $message; //mensagem
	
	function __construct(PDO $conn, $url) {
		$this->conn = $conn;
		$this->url = $url;
        $this->message = new Message($url);
	}
	
	public function buildUsuario($data) {
		$user = new Usuario();
        $userToken = $user->generateToken();
        $finalPassword = $user->generatePassword($data['password']);
		$user->nome = $data['name'];
        $user->email = $data['email'];
		$user->cel = $data['cel'];
        $user->senha = $finalPassword;
		$user->token = $userToken;
		
		return $user;
	}
	
	public function inserir(Usuario $usuario) {
        try {
            $stmt = $this->conn->prepare('INSERT INTO CDUSUARIO(CDUSNOME, CDUSEMAIL, CDUSCEL, CDUSSENHA, CDUSTOKEN)
                                        VALUES (:nome, :email, :cel, :senha, :token)');
            $stmt->bindParam(":nome", $usuario->nome);
            $stmt->bindParam(":email", $usuario->email);
            $stmt->bindParam(":cel", $usuario->cel);
            $stmt->bindParam(":senha", $usuario->senha);
            $stmt->bindParam(":token", $usuario->token);
            $stmt->execute();
            $this->message->setMessage("Usuario inserido com sucesso", "success", "index.php");
            $this->setTokenToSession($usuario->token);
            setcookie("usuarioToken", $usuario->token, time() + 3600);
        } catch (Exception $ex) {
            $this->message->setMessage("Aconteceu um erro: " . $ex->getMessage(), "error", "back");
        }
	}
	
    public function atualizar($id, $nome, $cel) {
        try {
            $stmt = $this->conn->prepare('UPDATE CDUSUARIO 
                                        SET CDUSNOME = :nome, CDUSCEL = :cel
                                        WHERE CDUSID = :id');
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":cel", $cel);
            $stmt->execute();
            $this->message->setMessage("Dados atualizados com sucesso", "success", "index.php");
        } catch (Exception $ex) {
            $this->message->setMessage("Aconteceu um erro: " . $ex->getMessage(), "error", "back");
        }
    }

    public function deletar($id) {
        try {
            $stmt = $this->conn->prepare('DELETE FROM CDUSUARIO WHERE CDUSEID = :id');
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $this->message->setMessage("Usuario deletado com sucesso", "success", "index.php");
        } catch (Exception $ex) {
            $this->message->setMessage("Aconteceu um erro: " . $ex->getMessage(), "error", "back");
        }
    }

    public function procurarPorId($id) {
        try{
            $stmt = $this->conn->prepare('SELECT * FROM CDUSUARIO WHERE CDUSID = :id');
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            $this->message->setMessage("Aconteceu um erro: " . $ex->getMessage(), "error", "back");
            return false;
        }
    }

    public function procurarPorEmail($email) {
        try{
            $stmt = $this->conn->prepare('SELECT * FROM CDUSUARIO WHERE CDUSEMAIL = :email');
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            $this->message->setMessage("Aconteceu um erro: " . $ex->getMessage(), "error", "back");
            return false;
        }
    }

    public function procurarPorToken($token) {
        try{
            $stmt = $this->conn->prepare('SELECT * FROM CDUSUARIO WHERE CDUSTOKEN = :token');
            $stmt->bindParam(":token", $token);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            $this->message->setMessage("Aconteceu um erro: " . $ex->getMessage(), "error", "back");
            return false;
        }

    }

    public function destruirToken($id) {
        try{
            $stmt = $this->conn->prepare('UPDATE CDUSUARIO 
                                        SET CDUSTOKEN = NULL
                                        WHERE CDUSID = :id');
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            unset($_COOKIE["usuarioToken"]);
            $this->message->setMessage("Token deletado com sucesso", "success", "index.php");
        } catch (Exception $ex) {
            $this->message->setMessage("Aconteceu um erro: " . $ex->getMessage(), "error", "back");
        }
    }

    public function trocarSenha($id, $novaSenha) {
        try{
            $stmt = $this->conn->prepare('UPDATE CDUSUARIO 
                                        SET CDUSSENHA = :senha
                                        WHERE CDUSID = :id');
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":senha", ($novaSenha));
            $stmt->execute();
            $this->message->setMessage("Senha alterada com sucesso", "success", "index.php");
        } catch (Exception $ex) {
            $this->message->setMessage("Aconteceu um erro: " . $ex->getMessage(), "error", "back");
        }
    }

    public function autenticarUsuario($email, $senha) {
        try{
            $stmt = $this->conn->prepare('SELECT CDUSSENHA, CDUSTOKEN FROM CDUSUARIO WHERE CDUSEMAIL = :email');
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $usuarioData = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($senha, $usuarioData['CDUSSENHA'])) {
                $token = new Usuario()->generateToken();
                $stmt = $this->conn->prepare("
                UPDATE CDUSUARIO
                SET CDUSTOKEN = :token
                WHERE CDUSEMAIL = :email
                ");
                $stmt->bindParam(":token", $token);
                $stmt->bindParam(":email", $email);
                $stmt->execute();
                setcookie("usuarioToken", $token, time() + 3600);
                return true;
            }
        } catch (Exception $ex) {
            $this->message->setMessage("Aconteceu um erro: " . $ex->getMessage(), "error", "back");
            return false;
        }
    }
}

public function verificarToken(){
    if(!empty($_COOKIE["usuarioToken"])){
        return ($this->procurarPorToken($_COOKIE["usuarioToken"]));
    }
    $this->message->setMessage("Aconteceu um erro na verificação", "error", "index.php");
}


?>
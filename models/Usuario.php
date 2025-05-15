<?php

class Usuario {
    public $CDUSID;
    public $CDUSNOME;
    public $CDUSEMAIL;
    public $CDUSCEL;
    public $CDUSSENHA;
    public $CDUSTOKEN;

    public function generateToken() {
        return bin2hex(random_bytes(50));
    }

    public function generateSenha($senha) {
        return password_hash($senha, PASSWORD_DEFAULT);
    }
}

interface UsuarioDAOInterface {
    public function buildUsuario($data);
    public function inserir(Usuario $usuario);
    public function atualizar($id, $nome, $cel);
    public function deletar($id);
    public function procurarPorId($id);
    public function procurarPorEmail($email);
    public function procurarPorToken($token);
    public function destruirToken($id);
    public function trocarSenha($id, $novaSenha);
    public function autenticarUsuario($email, $senha)
    public function verificarToken();
}
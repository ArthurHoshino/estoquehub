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
    public function inserir(Usuario $usuario, $userAuth = false);
    public function atualizar(Usuario $usuario, $redirect = true);
    public function deletar(Usuario $usuario);
    public function procurarPorId($id);
    public function procurarPorEmail($email);
    public function procurarPorToken($token);
    public function destruirToken();
    public function troarSenha(Usuario $usuario);
}
<?php

class Usuario {
    public $CDUSID;
    public $CDUSNOME;
    public $CDUSEMAIL;
    public $CDUSCEL;
    public $CDUSSENHA;
}

interface UsuarioDAOInterface {
    public function buildUsuario($data);
    public function inserir(Usuario $usuario, $userAuth = false);
    public function atualizar(Usuario $usuario, $redirect = true);
    public function deletar(Usuario $usuario);
    public function procurarPorId($id);
    public function procurarPorEmail($email);
}

?>
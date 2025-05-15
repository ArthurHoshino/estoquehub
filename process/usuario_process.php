<?php

require_once("./globals.php");
require_once("./db.php");
require_once("./models/Usuario.php");
require_once("./models/Message.php");
require_once("./dao/UsuarioDAO.php");

$message = new Message($BASE_URL);
$usuarioDAO = new UsuarioDAO($conn, $BASE_URL);

// resgata o tipo de formulario
$type = filter_input(INPUT_POST, "type");

// verificacao do tipo de formulario
if ($type === "atualizar") {
    $id = filter_input(INPUT_POST, "id");
    $nome = filter_input(INPUT_POST, "nome");
    $cel = filter_input(INPUT_POST, "cel");

    $nome = preg_replace('/\s+/', ' ', $nome);
    $nome = trim($nome);
    $nome = strtolower($nome);
    if (empty($nome) || strlen($nome) <3) {
        $message->setMessage("O nome não pode conter apenas espaços", "error", "back");
    }

    $cel = preg_replace('/\D/', '', $cel);
    $cel = trim($cel);
    if (!empty($cel)) {
        if (!preg_match('/^(\d{2})9\d{8}$/', $cel)) {
            $message->setMessage("Número de celular inválido", "error", "back");
        }
    } else {
        $cel = NULL;
    }

    $usuarioDAO->atualizar($id, $nome, $cel);
} else if ($type === "trocarSenha") {
    $id = filter_input(INPUT_POST, "id");
    $novaSenha = filter_input(INPUT_POST, "senha");
    $confirmarNovaSenha = filter_input(INPUT_POST, "confirmar-senha");

    if (empty($novaSenha)) {
        $message->setMessage("Senha não pode ser vazia", "error", "back");
    } else if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,40}$/', $novaSenha)) {
        $message->setMessage("Senha não pode conter espaços", "error", "back");
        if ($novaSenha === $confirmarNovaSenha){
            $usuarioDAO->trocarSenha($id, $usuarioDAO->generatePassword($novaSenha))
            $message->setMessage("Trocou a senha", "success", "index.php");
        } else {
            $message->setMessage("Erro campo nome ", "error", "back");
        }
    } else {
        $message->setMessage("Erro campo nome ", "error", "back");
    }
}
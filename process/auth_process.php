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
if ($type === "register") {
    $nome = filter_input(INPUT_POST, "nome");
    $nome = preg_replace('/\s+/', ' ', $nome);
    $nome = trim($nome);
    $nome = strtolower($nome);
    if (empty($nome) || strlen($nome) <3) {
        $message->setMessage("O nome não pode conter apenas espaços", "error", "back");
    }

    $email = filter_input(INPUT_POST, "email");

    $cel = filter_input(INPUT_POST, "cel");
    $cel = preg_replace('/\D/', '', $cel);
    $cel = trim($cel);
    if (!empty($cel)) {
        if (!preg_match('/^(\d{2})9\d{8}$/', $cel)) {
            $message->setMessage("Número de celular inválido", "error", "back");
        }
    } else {
        $cel = NULL;
    }


    $senha = filter_input(INPUT_POST, "senha");
    if (empty($senha)) {
        $message->setMessage("Senha não pode ser vazia", "error", "back");
    } else if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,40}$/', $senha)) {
        $message->setMessage("Senha não pode conter espaços", "error", "back");
    }

    $confirmarSenha = filter_input(INPUT_POST, "confirmarSenha");

    // verificacao de dados minimos
    if ($nome && $email && $senha && $confirmarSenha) {
        // verificar se as senhas sao iguais
        if ($usuarioDAO->procurarPorEmail($email) === false) {
            // verificar se o email ja esta cadastrado no sistema
            if ($senha === $confirmarSenha) {
                $data = [
                    "nome" => $nome,
                    "email" => $email,
                    "cel" => $cel,
                    "senha" => $senha
                ];
                $user = buildUsuario($data);
                $auth = true;

                $usuarioDAO->inserir($user, $auth);
            } else {
                $message->setMessage("As senhas não são iguais", "error", "back");
    
            }
        } else {
            $message->setMessage("Usuario ja cadastrado, tente outro email", "error", "back");

        }
    } else {
        // enviar mensagem de erro de dados faltantes
        $message->setMessage("Por favor, preencha todos os campos", "error", "back");
    }
} else if ($type === "login") {

    $email = filter_input(INPUT_POST, "email");
    $senha = filter_input(INPUT_POST, "senha");

    // tentar autenticar user
    if ($usuarioDAO->autenticarUsuario($email, $senha) !== false) {

        $message->setMessage("Seja bem-vindo", "success", "index.php");

        // redireciona usuario, caso nao conseguir autenticar
    } else {
        $message->setMessage("Usuário e/ou senha incorretos", "error", "back");
    }
} else {
    $message->setMessage("Informações inválidas", "error", "index.php");
}
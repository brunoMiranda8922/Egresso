<?php
require_once("../model/conexao.php");
require_once("../model/buscar-usuario.php");
require_once("../model/verifica-usuario.php");
require_once("../model/mostrar-alerta.php");

$usuario = buscarUsuario($conexao, $_POST['email'], $_POST['senha']);
if ($usuario == null){
    $_SESSION['danger'] = "Email ou Senha invalido";
    header("Location: ../index.php");
} else {
    $_SESSION['success'] = "Login efetuado com sucesso";
    logaUsuario($usuario["nome"]);
    header("Location: ../view/home.php");
}
die();
?>

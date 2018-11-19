<?php require_once("../model/conexao.php");
require_once("../model/buscar-egresso.php");
require_once("../model/verificar-usuario.php");
require_once("../model/mostrar-alerta.php");


$usuario = buscarEgresso($conexao, $_POST['email'], $_POST['cpf']);


if ($usuario == null){
    $_SESSION['danger'] = "Email ou Senha invalido";

    header("Location: ../index.php");
    exit();
}

$_SESSION['success'] = "Login efetuado com sucesso";
logarUsuario($usuario);
header("Location: ../view/home.php");
die();



?>

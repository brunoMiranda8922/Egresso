<?php require_once("banco/conexao.php");
require_once("banco/buscar-egresso.php");
require_once("banco/verificar-usuario.php");
require_once("banco/mostrar-alerta.php");


$usuario = buscarEgresso($conexao, $_POST['email'], $_POST['cpf']);


if ($usuario == null){
    $_SESSION['danger'] = "Email ou Senha invalido";

    header("Location: index.php");
    exit();
}

$_SESSION['success'] = "Login efetuado com sucesso";
logarUsuario($usuario);
header("Location: home.php");
die();



?>

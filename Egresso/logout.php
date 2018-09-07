<?php require_once("banco/verifica-usuario.php"); //Função para deslogar
logout();
$_SESSION["success"] = "Deslogado com sucesso";
header("Location: index.php");
die();
?>
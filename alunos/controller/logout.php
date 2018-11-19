<?php require_once("banco/verificar-usuario.php");
logout();
$_SESSION["success"] = "Deslogado com sucesso";
header("Location: ../index.php");
die();
?>
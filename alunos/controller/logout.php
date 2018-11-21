<?php require_once("../model/verificar-usuario.php");
logout();
$_SESSION["success"] = "Deslogado com sucesso";
header("Location: ../index.php");
die();
?>
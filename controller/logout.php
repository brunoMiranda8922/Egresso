<?php
require_once("../model/verifica-usuario.php");
logout();
$_SESSION["success"] = "Deslogado com sucesso";
header("Location: ../index.php");
die();
?>
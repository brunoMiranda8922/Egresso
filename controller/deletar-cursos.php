<?php
require_once("../model/conexao.php");
require_once("../model/mostrar-alerta.php");
require_once("../model/verifica-usuario.php");
require_once("../model/banco-curso.php");
error_reporting("E_NOTICE");

$id = $_POST['id'];
removerCursos($conexao, $id);
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
$_SESSION["success"] = "Curso removido id: ".$id;
header("Location: ../view/curso.php");
die();
?>

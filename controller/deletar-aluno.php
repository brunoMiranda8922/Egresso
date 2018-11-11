<?php
require_once("../model/conexao.php");
require_once("../model/remover-dados-aluno.php");
require_once("../model/mostrar-alerta.php");
require_once("../model/verifica-usuario.php");
error_reporting("E_NOTICE");

$id = $_POST['id'];
removerAlunos($conexao, $id);
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
$_SESSION["success"] = "Aluno removido id: ".$id;
header("Location: ../view/listagem-alunos.php?pagina=$pagina");
die();
?>

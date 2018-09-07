<?php  
require_once("banco/conexao.php"); //Função que deleta um curso da base.
//require_once("banco/banco-aluno.php");
require_once("banco/mostrar-alerta.php");
require_once("banco/verifica-usuario.php");
require_once("banco/banco-curso.php");
error_reporting("E_NOTICE");

$id = $_POST['id'];

removerCursos($conexao, $id);
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

$_SESSION["success"] = "Curso removido id: ".$id;

header("Location: curso.php");
die();



?>

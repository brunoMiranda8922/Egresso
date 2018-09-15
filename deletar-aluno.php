<?php  
require_once("banco/conexao.php"); //Função que deleta um Registro da base.
require_once("banco/banco-aluno.php");
require_once("banco/mostrar-alerta.php");
require_once("banco/verifica-usuario.php");
require_once("banco/funcoes.1.php");
error_reporting("E_NOTICE");
$id = $_POST['id'];

removerAlunos($conexao, $id);
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

$_SESSION["success"] = "Aluno removido id: ".$id;

header("Location: comercioExterior.php?pagina=$pagina");
die();



?>

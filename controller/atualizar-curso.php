
<?php
require_once("../model/conexao.php");
require_once("../model/verifica-usuario.php");
require_once("../model/mostrar-alerta.php");
require_once("../model/banco-curso.php");
error_reporting("E_NOTICE");

$id = $_POST["id"];
$nome = $_POST["curso"];

if (atualizarCurso($conexao, $id, $nome)) {
    $_SESSION["success"] = "Curso alterado com sucesso";
header("Location: ../view/curso.php");
} else {
    $_SESSION["danger"] = "Erro ao atualizar Curso";
header("Location: ../view/alterar-curso.php ");
}







?>

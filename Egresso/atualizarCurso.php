
<?php require_once("banco/conexao.php"); //Arquivo que Atualiza um curso existente. 
require_once("banco/verifica-usuario.php");
require_once("banco/mostrar-alerta.php");
require_once("banco/banco-curso.php");
error_reporting("E_NOTICE");
$id = $_POST["id"];
$nome = $_POST["curso"];
if (atualizarCurso($conexao, $id, $nome)) {
    
$_SESSION["success"] = "Curso alterado com sucesso";
header("Location: curso.php");
} else {
$_SESSION["danger"] = "Erro ao atualizar Curso";
header("Location: alterarCurso.php");
}    
    
    
        
    
    


?>
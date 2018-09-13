<?php require_once("cabecalho.php"); //Arquivo com função de receber e cadastrar as informações do Aluno na base de dados
require_once("banco/conexao.php");
require_once("banco/banco-aluno.php");
require_once("banco/mostrar-alerta.php");
error_reporting('E_NOTICE');

$RA = $_POST["RA"];
$nome = $_POST["nome"];
$CPF = $_POST["CPF"];
$email = $_POST["email"];
$PR = $_POST["PR"];
$curso_id = $_POST["cursos_id"];
$ano_id = $_POST["ano_id"];
$semestre_id = $_POST["semestre_id"];
$cidade_id = $_POST["cidade_id"];


?>


            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Egressos</h2>
                                    
                                </div>
                                
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-20">
                            <div class="col-sm-4 col-lg-12">
                                <div class="overview-item overview-item--c4">
<?php
    if (inserirAlunoDeNovo($conexao, $RA, $nome, $CPF, $email, $PR, $curso_id, $ano_id, $semestre_id, $cidade_id)) {
        
?>
        <div class="alert text-dark text-center"> Aluno(a) <strong><?= $nome ?></strong> cadastrado com sucesso. </div>
<?php
    } else {
        $msg =  mysqli_error($conexao);    
        
?>
    <div class="text text-danger text-center text-lg"> Erro ao cadastrar Aluno(a): </strong><?= $nome ?></strong>, </strong> RA:<?= $RA ?></strong>, <?= $msg  ?> </div>
<?php    
    }
    mysqli_close($conexao);
?>   
 </div>
    <div class="alert alert-dark alert-center" role="alert">
		Erro ao cadastrar? Verifique se o mesmo já não está cadastrado no sistema. 
	<a href="comercioExterior.php" class="alert-link">Click para conferir</a><br/>
    </div>

       
    </div>
</div>
            
                <?php require_once("rodape.php"); ?>
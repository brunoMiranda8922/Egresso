<?php require_once("cabecalho.php"); //Arquivo com função de receber e cadastrar as informações do Aluno na base de dados
require_once("banco/conexao.php");
require_once("banco/inserirDados.php");
require_once("banco/mostrar-alerta.php");
error_reporting('E_NOTICE');

$RA = $_POST['RA'];
$nome = $_POST['nome'];
$CPF = $_POST['CPF'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
if (!isset($_POST['foto']))
{
    $foto = 'NULL';
} else {
    $foto = $_POST['foto'];
}
$curso_id = $_POST['cursos_id'];
$ano_id = $_POST['anos_id'];
$semestre_id = $_POST['semestres_id'];
$cidade_id = $_POST['cidades_id'];
$matricula_id = $_POST['matricula_id'];


?>


            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Aluno</h2>
                                    
                                </div>
                                
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-20">
                            <div class="col-sm-4 col-lg-12">
                                <div class="overview-item overview-item--c4">
<?php
    if (inserirAluno($conexao, $RA, $nome, $CPF, $email, $telefone, $foto, $curso_id, $ano_id, $semestre_id, $cidade_id, $matricula_id)) {
        
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
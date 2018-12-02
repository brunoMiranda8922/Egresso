<?php
require_once("../model/conexao.php");
require_once("../model/questinario.php");
require_once("../model/verificar-usuario.php");
require_once("../model/buscar-egresso.php");
error_reporting('E_NOTICE');

$trabalha = $_POST['trabalha'];
if (!isset($_POST['empresa']))
{
    $empresa = 'NULL';
} else {
    $empresa = $_POST['empresa'];
}
if (!isset($_POST['area']))
{
    $area = 'NULL';
} else {
    $area = $_POST['area'];
}

if (!isset($_POST['cargo']))
{
    $cargo = 'NULL';
} else {
    $cargo = $_POST['cargo'];
}

$formacao = $_POST['formacao'];
$cronograma = $_POST['cronograma'];
$professores = $_POST['professores'];
$infra = $_POST['infra'];
$recomendaria = $_POST['recomendaria'];
$sexo = $_POST['sexo'];
$estagio = $_POST['estagio'];
$ausencia = $_POST['ausencia'];
$id = $_SESSION['id'];

?>
<?php require_once('cabecalho.php'); ?>
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

if (cadastrarQuestionario($conexao, $trabalha, $empresa, $cargo, $area, $formacao, $cronograma, $professores, $infra, $recomendaria, $sexo, $estagio, $ausencia, $id))
{ ?>
    <div class="alert text-dark text-center"> Questionario Enviado com sucesso. Muito obrigado.</div>
<?php } else {
        $msg = mysqli_error($conexao);

?>
    <div class="alert text-danger text-center"> Erro ao enviar Questionario: <?= $msg ?> </div>
<?php
    }
    mysqli_close($conexao);
?>
 </div>

<?php require_once("rodape.php") ?>

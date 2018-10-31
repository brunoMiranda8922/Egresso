<?php 
require_once("banco/conexao.php");
require_once("banco/inserirDados.php");
require_once("banco/mostrar-alerta.php");
require_once("banco/verifica-usuario.php");
?>

<?php

$nomes = $_FILES['file']['name'];
$extensao = explode(".", $nomes);
$verificaExtensao = end($extensao);
if ($verificaExtensao != 'csv') { 
    $_SESSION["danger"] = "Extensão Inválida";
    header("Location: form.php");
    die();
}
require_once("cabecalho.php");

?>
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

$nomes = $_FILES['file']['name'];
$extensao = explode(".", $nomes);
$verificaExtensao = end($extensao);
if ($verificaExtensao == 'csv') {
    $linha = 0;
    $arquivo = fopen($_FILES["file"]['tmp_name'], 'r+');
    while (($row = fgetcsv($arquivo, 1000, ",")) !== FALSE ) {
        $linha ++;
        $RA = $row[0];
        $nome = $row[1];
        $CPF = $row[2];
        $email = $row[3];
        $PR = $row[4];
        $curso_id = $row[5];
        $semestre_id = $row[7];
        $ano_id = $row[6];
        $cidade_id = $row[8];
            
        if (inserirAlunoDeNovo($conexao, $RA, $nome, $CPF, $email, $PR, $curso_id, $ano_id, $semestre_id, $cidade_id)) { ?>
            <div class="alert text-dark text-center"> Aluno(a) cadastrado com sucesso <strong> <?= $nome ?> </strong> </div>
        <?php
        } else {
        ?>
            <div class="alert text-dark text-center"> <i class="fa fa-exclamation-circle"></i> ERRO ao importar aluno(a) <strong> <?= $nome ?> </strong> RA: <strong><?= $RA ?> </strong> ou Email já cadastrados.<strong> LINHA: <?= $linha?> </strong> </div>
    <?php
        }
    }
    ?>
    <small> <?= $linha ?> Registros no arquivo <?= $nomes ?> </small>
<?php
}
?>
</div>

<?php require_once("rodape.php") ?>
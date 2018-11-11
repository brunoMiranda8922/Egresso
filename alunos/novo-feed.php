<?php require_once('cabecalho.php');
require_once('banco/questinario.php');


$id = $_POST['id'];
if (array_key_exists('trabalha', $_POST)) {
    $trabalha = 1;
} else {
    $trabalha = 0;
}
$empresa = $_POST["empresa"];
$area = $_POST["area_curso_id"];
$cargo = $_POST["cargo"];


if (atualizarFeed($conexao, $id, $trabalha, $empresa, $area, $cargo)) {
    ?>
        <p class="alert-success"> Questionario alterado com sucesso! </p>
    <?php
    } else {
        $msg = mysqli_error($conexao);
    ?>
        <p class="alert-danger"> Questionario não foi alterado, erro <?= $msg ?></p>

    <?php }
    mysqli_close($conexao);
    ?>

    <?php require_once("rodape.php");?>

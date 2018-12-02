<?php
require_once("cabecalho.php");
require_once("../model/conexao.php");
require_once("../model/questinario.php");
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-5 m-b-35">Histórico de Respostas</h3>
            </div>
        </div>
    </div>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                    <th class="text-center">RA</th>
                        <th class="text-center">NOME</th>
                        <th class="text-center">TRABALHA</th>
                        <th class="text-center">EMPRESA</th>
                        <th class="text-center">CARGO</th>
                        <th class="text-center">DATA</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $respostas = listarRespostas($conexao);
                        $contar = count($respostas); ?>
                    <p class="text text-left"> <?php echo $contar ?> Registros </p> <?php
                        $simOuNao = [
                            1 => "SIM",
                            0 => "NÃO"
                        ];
                        foreach ($respostas as $resposta) {
                        ?>
                    <tr>
                        <td class="process text-center"><?= $resposta['RA'] ?></td>
                        <td class="process text-center"><?= $resposta['nome'] ?></td>
                        <td class="process text-center"><?= $simOuNao[$resposta['trabalha']] ?></td>
                        <td class="process text-center"><?= $resposta['empresa'] == 'NULL' ? "-" : $resposta['empresa'] ?></td>
                        <td class="process text-center"><?= $resposta['cargo'] == 'NULL' ? "-" : $resposta['cargo'] ?></td>
                        <td class="process text-center"><?= $resposta['date'] ?></td>
                        <td><a class="btn btn-success" href="atualizar-enquete.php?id=<?= $resposta['id']?>">Alterar</a></td>
                    <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once("rodape.php"); ?>

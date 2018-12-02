<?php
require_once('cabecalho-frequencia.php');
require_once('../model/conexao.php');
require_once('../model/selecionar-dados-aluno.php');
require_once('../model/banco-curso.php');
require_once('../model/funcoes.2.php');
require_once('../model/mostrar-alerta.php');
error_reporting("E_NOTICE");


$id = $_GET['id'];
$RA = $_GET['RA'];
$email = $_GET['email'];
?>

<script>
    $.ajax({
        type: "GET",
        data: { RA: <?= $RA ?> },
        url: '../assets/js/main.php',
        success: function(data) {
            console.log("OK");
        },
        error: function(error){
            console.log('ERRO');
        }
    });
</script>
<?php
$alunos = alunosVerFrequencia($conexao, $id);
$frequencia = perfilDiario($conexao, $id);
$totais = perfilDiasNoMes($conexao, $RA);
$dados = perfilDadosDoAluno($conexao, $id);
$mesFiltrar = listarMes($conexao, $RA);

$frequencia00 = $frequencia[0]['frequencia'];
$frequencia01 = $frequencia[1]['frequencia'];
$frequencia02 = $frequencia[2]['frequencia'];
$frequencia03 = $frequencia[3]['frequencia'];
$frequencia04 = $frequencia[4]['frequencia'];

$dia00 = $frequencia[0]['dia'];
$dia01 = $frequencia[1]['dia'];
$dia02 = $frequencia[2]['dia'];
$dia03 = $frequencia[3]['dia'];
$dia04 = $frequencia[4]['dia'];

$mes = $frequencia[0]['mes'];

?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-user"></i>
                            <strong class="card-title pl-2">Perfil Aluno</strong>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <img class="rounded-circle mx-auto d-block" src="../../projetoQrCode/assets/imagens/<?= $alunos['foto'];?>" alt="Aluno">
                                <h5 class="text-sm-center mt-2 mb-1"><?= $alunos['nome']?></h5>
                                <div class="location text-sm-center">
                                    <i class="fa fa-map-marker"></i> <?= $alunos['curso']?></div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-user"></i>
                            <strong class="card-title pl-2">Frequência do <?= $alunos['nome']?></strong>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block">
                            <canvas id="percent-chart"></canvas>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            <div class="col-md-4">
            <div class="table-responsive table-data">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th class="text-center">MES</th>
                        <th class="text-center">DIA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($totais as $total){ ?>
                        <tr>
                        <td class="text-center"><?= $total['MES']?></td>
                        <td class="text-center"><?= $total['DIA']?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php $contar = count($totais); ?>
                <p class="text text-right"> <?= $contar ?> Registros </p>
                </div>
            </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                        <i class="fa fa-user"></i>
                            <strong class="card-title pl-2">Perfil Diário do mês <?= $mes ?></strong>
                        </div>
                        <div class="card-body">
                            <code><strong>Dia:</strong><?= $dia00 ?></code>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $frequencia00 == 0 ? 0 : $frequencia00 + 5 ?>%" aria-valuenow="<?= $frequencia00 ?>%" aria-valuemin="1" aria-valuemax="100"><?= $frequencia00 ?>%</div>
                            </div>
                            <code><strong>Dia:</strong><?= $dia01 ?></code>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $frequencia01 == 0 ? 0 : $frequencia01 + 5?>%" aria-valuenow="<?= $frequencia01 ?>%" aria-valuemin="1" aria-valuemax="100"><?= $frequencia01 ?>%</div>
                            </div>
                            <code><strong>Dia:</strong><?= $dia02 ?></code>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $frequencia02 == 0 ? 0 : $frequencia02 + 5 ?>%" aria-valuenow="<?= $frequencia02 ?>%" aria-valuemin="1" aria-valuemax="100"><?= $frequencia02 ?>%</div>
                            </div>
                            <code><strong>Dia:</strong><?= $dia03 ?></code>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $frequencia03 == 0 ? 0 : $frequencia03 + 5; ?>%" aria-valuenow="<?= $frequencia03 ?>%" aria-valuemin="1" aria-valuemax="100"><?= $frequencia03 ?>%</div>
                            </div>
                            <code><strong>Dia:</strong><?= $dia04 ?></code>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $frequencia04 == 0 ? 0 : $frequencia04 + 5 ?>%" aria-valuenow="<?= $frequencia04 ?>%" aria-valuemin="1" aria-valuemax="100"><?= $frequencia04 ?>%</div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-user"></i>
                            <strong class="card-title pl-2">Frequência do <?= $alunos['nome']?></strong>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block">
                            <canvas id="team-chart"></canvas>
                        </div>
                        <hr>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-md-2">
                    <form class="form-header" method="GET">
                        <select name="mes" id="select" class="form-control">
                            <option disabled selected>Filtro por MÊS</option>
                        <?php
                            foreach ($mesFiltrar as $meses) { ?>
                            <option  value="<?= $meses['MES'] ?>"> <?= $meses['MES'] ?></option>
                        <?php } ?>
                        </select>
                        <button class="au-btn--submit" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="hidden" name="RA" value="<?= $RA ?>">
                            <input type="hidden" name="email" value="<?= $email ?>">
                    </form>
                    </div>
                    <form action="../controller/enviar-contato-frequencia.php?id=<?= $id?>&RA=<?= $RA?>&email=<?= $email?>" method="GET" autocomplete="off" class="">
                        <div class="form-actions form-group">
                        <a href="../controller/enviar-contato-frequencia.php?id=<?= $id?>&RA=<?= $RA?>&email=<?= $email?>" class="btn btn-danger" role="button" aria-label="Ver frequência do aluno"><strong aria-hidden="true">Enviar email de alerta</strong></a>
                        </div>
                    </form>
                </div>
                    <?php mostrarAlerta('success') ?>
                    <div class="table-responsive table-data">
                    <div class="table-responsive table--no-card m-b-30">
                    <table class="table table-borderless table-striped table-earning">
                        <thead>
                            <tr>
                                <th>RA</th>
                                <th>NOME</th>
                                <th>status</th>
                                <th class="text-center">MES</th>
                                <th class="text-center">DIA</th>
                                <th class="text-center">HORARIO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $contar = count($dados); ?>
                                <p class="text text-right"> <?= $contar ?> Registros </p>
                            <?php foreach($dados as $dado){ ?>
                                <tr>
                                <td><?= $dado['RA']?></td>
                                <td><?= $dado['nome']?></td>
                                <td><?= $dado['status']?></td>
                                <td class="text-center"><?= $dado['MES']?></td>
                                <td class="text-center"><?= $dado['DIA']?></td>
                                <td class="text-center"><?= $dado['HORARIO']?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('rodape.php'); ?>

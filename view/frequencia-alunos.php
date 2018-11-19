<?php
require_once('cabecalho-frequencia.php');
require_once('../model/conexao.php');
require_once('../model/selecionar-dados-aluno.php');
require_once('../model/banco-curso.php');
require_once('../model/funcoes.2.php');
error_reporting("E_NOTICE");


$id = $_GET['id'];
$alunos = alunosVerFrequencia($conexao, $id);
$frequencia = listarFrequenciaDia($conexao, $id);
$dados = listarDadosFrequencia($conexao, $id);

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
                                <canvas id="barChart"></canvas>
                            </div>
                            <hr>
                        </div>
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
                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $frequencia00 ?>%" aria-valuenow="<?= $frequencia00 ?>%" aria-valuemin="1" aria-valuemax="100"><?= $frequencia00 ?>%</div>
                            </div>
                            <code><strong>Dia:</strong><?= $dia01 ?></code>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $frequencia01 ?>%" aria-valuenow="<?= $frequencia01 ?>%" aria-valuemin="1" aria-valuemax="100"><?= $frequencia01 ?>%</div>
                            </div>
                            <code><strong>Dia:</strong><?= $dia02 ?></code>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $frequencia02 ?>%" aria-valuenow="<?= $frequencia02 ?>%" aria-valuemin="1" aria-valuemax="100"><?= $frequencia02 ?>%</div>
                            </div>
                            <code><strong>Dia:</strong><?= $dia03 ?></code>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $frequencia03 ?>%" aria-valuenow="<?= $frequencia03 ?>%" aria-valuemin="1" aria-valuemax="100"><?= $frequencia03 ?>%</div>
                            </div>
                            <code><strong>Dia:</strong><?= $dia04 ?></code>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $frequencia04 ?>%" aria-valuenow="<?= $frequencia04 ?>%" aria-valuemin="1" aria-valuemax="100"><?= $frequencia04 ?>%</div>
                            </div>
                            <hr>
                        </div>

                    </div>
                    </div>
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

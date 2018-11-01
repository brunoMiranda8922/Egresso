<?php
require_once("cabecalho.php");
require_once("banco/funcoes.2.php");
error_reporting("E_NOTICE");
?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Egressos</h2>                                    
                            <?php 
                                require_once("banco/verifica-usuario.php");
                                require_once("banco/mostrar-alerta.php");
                            ?>
                            <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                                <span class="badge badge-pill badge-primary">Logado com</span>
                                    <i>adm@fatec.com</i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
        <?php mostrarAlerta('success') ?>
        <div class="row m-t-25">
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c1">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-account-o"></i>
                            </div>
                            <div class="text">
                                <h2>Eventos</h2>
                                    <span>Quantidade de alunos</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c2">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-account-o"></i>
                            </div>
                            <div class="text">
                                <h2>Comex</h2>
                                    <span>Quantidade de alunos</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c3">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-account-o"></i>
                            </div>
                            <div class="text">
                                <h2>GTI</h2>
                                    <span>Quantidade de alunos</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart3"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c4">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-account-o"></i>
                            </div>
                            <div class="text">
                                <h2>Transporte</h2>
                                <span>Quantidade de alunos</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart4"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="au-card recent-report">
                    <div class="au-card-inner">
                        <h3 class="title-2">Recomendariam</h3>
                        <div class="chart-info">
                            <div class="chart-info__left">
                                <div class="chart-note">
                            </div>
                            <div class="chart-note mr-0">
                            </div>
                        </div>
                        <div class="chart-info__right">
                            <div class="chart-statis">
                                <span class="index incre">
                        </div>
                        <div class="chart-statis mr-0">
                        </div>
                    </div>
                </div>
                <div class="recent-report__chart">
                    <canvas id="percent-chart33"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="au-card chart-percent-card">
            <div class="au-card-inner">
                <h3 class="title-2 tm-b-5">Alunos</h3>
                <div class="row no-gutters">
                    <div class="col-xl-6">
                        <div class="chart-note-wrap">
                            <div class="chart-note mr-0 d-block">
                                <span class="dot dot--blue"></span>
                                <span>Que Trabalham</span>
                            </div>
                            <div class="chart-note mr-0 d-block">
                                <span class="dot dot--red"></span>
                                <span>Que Não Trabalham</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="percent-chart">
                            <canvas id="percent-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="title-1 m-b-25">Feedback dos Egressos
                                </h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th class="text-center">RA</th>
                            <th class="text-center">NOME</th>
                            <th class="text-center">SEXO</th>
                            <th class="text-center">FORMAÇÃO</th>
                            <th class="text-center">CRONOGRAMA</th>
                            <th class="text-center">PROFESSORES</th>
                            <th class="text-center">INFRA</th>
                            <th class="text-center">RECOMENDARIA</th>
                            <th class="text-center">ESTAGIO</th>
                            <th class="text-center">SEMESTRE</th>
                            <th class="text-center">DATA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $respostas = listarRespostas($conexao);
                            $contar = count($respostas); ?>
                            <p class="text text-left">
                        <?php echo $contar ?> Registros </p>
                        <?php
                            $avaliacao = [
                                1 => "RUIM",
                                2 => "REGULAR",
                                3 => "BOM",
                                4 => "IDEAL",
                                5 => "ÓTIMO"
                            ];

                            $simOuNao = [
                                0 => "NÃO",
                                1 => "SIM"
                            ];

                            $recomendariaa = [
                                1 => "NUNCA",
                                2 => "TALVEZ",
                                3 => "SIM",
                                4 => "??"
                            ];

                            foreach ($respostas as $resposta) {

                            ?>
                            <tr>
                                <td class="process text-center">
                                    <?= $resposta['RA'] ?>
                                </td>
                                <td class="process text-center">
                                    <?= $resposta['nome'] ?>
                                </td>
                                <td class="process text-center">
                                    <?= $resposta['sexo'] ?>
                                </td>
                                <td class="process text-center">
                                    <?= $avaliacao[$resposta['formacao']] ?>
                                </td>
                                <td class="process text-center">
                                    <?= $avaliacao[$resposta['cronograma']] ?>
                                </td>
                                <td class="process text-center">
                                    <?= $avaliacao[$resposta['professores']] ?>
                                </td>
                                <td class="process text-center">
                                    <?= $avaliacao[$resposta['infraestrutura']] ?>
                                </td>
                                <td class="process text-center">
                                    <?= $recomendariaa[$resposta['recomendaria']] ?>
                                </td>
                                <td class="process text-center">
                                    <?= $simOuNao[$resposta['estagio']] ?>
                                </td>
                                <td class="process text-center">
                                    <?= $resposta['semestre'] ?>
                                </td>
                                <td class="process text-center">
                                    <?= $resposta['date'] ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once("rodape.php");?>
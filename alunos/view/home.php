<?php
require_once("cabecalho.php");
require_once("../model/verificar-usuario.php");
require_once("../model/mostrar-alerta.php");
?>

        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">
                                <h2 class="title-1"><code><?= usuarioLogado()?></code></h2>

                                <?php usuarioEstaLogado()?>

                                    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                                        <span class="badge badge-pill badge-primary">Logado com</span>
                                        <?= usuarioLogado()?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                    </div>

                            </div>
                        </div>
                    </div>
                    <?= mostrarAlerta('success') ?>
                    <div class="row m-t-25">
            <div class="col-sm-6 col-lg-2">
                <div class="overview-item overview-item--c3">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-account-o"></i>
                            </div>
                            <div class="text">
                                <h3>Eventos</h3>
                                    <span></span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="overview-item overview-item--c4">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-account-o"></i>
                            </div>
                            <div class="text">
                                <h3>Comex</h3>
                                    <span></span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="overview-item overview-item--c1">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-account-o"></i>
                            </div>
                            <div class="text">
                                <h3>GTI</h3>
                                    <span></span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart3"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-lg-2">
                <div class="overview-item overview-item--c3">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-account-o"></i>
                            </div>
                            <div class="text">
                                <h3>Transporte</h3>
                                <span></span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart4"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-lg-2">
                <div class="overview-item overview-item--c2">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-account-o"></i>
                            </div>
                            <div class="text">
                                <h3>Desing</h3>
                                <span></span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart5"></canvas>
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
                    <canvas id="percent-chart"></canvas> 
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="au-card chart-percent-card">
            <div class="au-card-inner">
                <h3 class="title-2 tm-b-5">Alunos</h3>
                <div class="row no-gutters">
                    <div class="col-xl-6">
                        <div class="chart-note-wrap">
                            <div class="chart-note mr-0 d-block">
                                <span class="dot dot--blue"></span>
                                <span>Dados</span>
                            </div>
                            <div class="chart-note mr-0 d-block">
                                <span class="dot dot--red"></span>
                                <span>Dados</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10">
                        <div class="percent-chart">
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


                        <?php require_once("rodape.php");?>
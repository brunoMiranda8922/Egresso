<?php 
require_once("cabecalho.php"); //Arquivo que exibe os gráficos dinâmicos da base de dados. 
?> 
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Quantidade de Formados</h3>
                                        <canvas id="sales-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Média dos alunos por ano</h3>
                                        <canvas id="team-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Alunos</h3>
                                        <canvas id="barChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Alunos</h3>
                                        <canvas id="lineChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Cidade alvo da FATEC</h3>
                                        <canvas id="doughutChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Alunos</h3>
                                        <canvas id="pieChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            
                           
                        </div>
                        
        <!-- END PAGE CONTAINER-->

    

    <?php require_once("rodape.php"); ?>
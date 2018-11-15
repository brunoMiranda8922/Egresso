<?php
require_once('../model/conexao.php');
require_once('../model/selecionar-dados-aluno.php');
require_once('../model/banco-curso.php');

$id = $_GET['id'];
$alunos = alunosVerFrequencia($conexao, $id);


?> 

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title> Template perfil aluno</title>
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/purple.min.css" rel="stylesheet">
    <link href="../assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="toolbar">
        <span class="hamburger-menu">
            <i class="fa fa-bars"></i>
        </span>
           
        </div>
        <div class="main">
            <div class="row">
                <div class="photo">
                    <img src="../../projetoQrCode/assets/imagens/<?= $alunos['foto'];?>" alt="staff photo">
                    <h3><?= $alunos['nome'];?></h3>
                </div>
                <div class="highlights">
                    <h2></h2>
                    <div class="row">
                        <div id="gauge1" class="gauge"></div>
                        <div id="gauge2" class="gauge"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="data1">
                    <div>
                        <h3></h3>
                    </div>
                    <div class="data2">
                        <div class="card mdl-card">
                            <div class="mdl-card__title">
                                <h2 class="mdl-card__title-text">Informações pessoais</h2>
                            </div>
                            <div class="mdl-card__supporting-text">
                                <form action="#">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="sample1" value="<?= $alunos['curso']?>" >
                                        <label class="mdl-textfield__label" for="sample1">Curso</label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="sample1" value="<?= $alunos['RA'];?>">
                                        <label class="mdl-textfield__label" for="sample1">RA</label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="sample1" value="<?= $alunos['telefone'];?>">
                                        <label class="mdl-textfield__label" for="sample1">Telefone</label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="sample1" value="<?= $alunos['email'];?>">
                                        <label class="mdl-textfield__label" for="sample1">Email</label>
                                    </div>
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
                                        Enviar email
                                    </button>
                                </form>
                            </div>
                            <div class="mdl-card__title">
                                <h2 class="mdl-card__title-text">Profissional</h2>
                            </div>
                            <div class="mdl-card__supporting-text">
                                <form action="#">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="sample1" value="Analista de Suporte">
                                        <label class="mdl-textfield__label" for="sample1">Cargo</label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="sample1" value="TI">
                                        <label class="mdl-textfield__label" for="sample1">Departmento</label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="sample1" value="Mercado livre">
                                        <label class="mdl-textfield__label" for="sample1">Empresa</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- data 2-->
                </div>
            </div>
        </div>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js'></script>
        <script src='https://rawgit.com/toorshia/justgage/master/justgage.js'></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.1/material.min.js'></script>

        <script src="../assets/js/index.js"></script>

</body>

</html>
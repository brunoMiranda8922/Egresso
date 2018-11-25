<?php
require_once("cabecalho.php");
require_once("../model/conexao.php");
require_once("../model/banco-curso.php");
require_once("../model/mostrar-alerta.php");
require_once("../model/filtrar-listar-alunos.php");
require_once("../model/funcoes.2.php");
error_reporting("E_NOTICE");
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
                    <h3 class="title-5 m-b-35"><i class="fas fa-users"></i> Consultar Egressos</h3>
                </div>
            </div>
        </div>
        <?php mostrarAlerta("success"); ?>
        <div class="col-12 col-md-9">
        </div>
            <div class="row m-t-30">
                <div class="col-md-12">
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
                                    $respostas = listarResposta($conexao);
                                    $contar = count($respostas);
                                ?>
                                    <p class="text text-left">
                                    <?= $contar ?> Registros </p>
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

                    <?php
                        $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
                        $pagina_anterior = $pagina - 1;
                        $pagina_posterior = $pagina + 1;
                    ?>
                    <nav aria-label="pagination-lg" class="text-center">
                        <?php
                            if ($pagina_anterior != 0) {
                        ?>
                                <a class="btn btn-primary" href="avaliacao-aluno.php?pagina=<?= $pagina_anterior; ?>" aria-label="Previous">
                                <span aria-hidden="true">Voltar</span></a>
                        <?php
                            } else {
                        ?>
                                <span aria-hidden="true"></span>
                        <?php
                            }
                        ?>

                        <?php
                            $quantidade_paginas = paginarTrabalha($conexao);
                            for ($i = 1; $i < $quantidade_paginas + 1; $i++) {
                                if ($pagina == $i) {
                        ?>
                                <a class="btn btn-warning" href="avaliacao-aluno.php?pagina=<?= $i ?>"><?= $i ?></a>
                            <?php
                                } else {
                            ?>
                                <a class="btn btn-secondary" href="avaliacao-aluno.php?pagina=<?= $i ?>"><?= $i ?></a>
                            <?php
                                }
                            }
                            ?>

                        <?php
                            if($pagina_posterior <= $quantidade_paginas){
                        ?>
                            <a class="btn btn-primary" href="avaliacao-aluno.php?pagina=<?=  $pagina_posterior; ?>" aria-label="Previous"><span aria-hidden="true">Proxima</span></a>
                        <?php
                            } else {
                        ?>
                            <span aria-hidden="true"></span>
                        <?php
                            }
                        ?>
                    </nav>
                </div>
            </div>
<?php require_once("rodape.php"); ?>

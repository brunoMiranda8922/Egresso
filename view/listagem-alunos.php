<?php
require_once("cabecalho.php");
require_once("../model/conexao.php");
require_once("../model/banco-curso.php");
require_once("../model/mostrar-alerta.php");
require_once("../model/filtrar-listar-alunos.php");
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
                        <h3 class="title-5 m-b-35"><i class="fas fa-users"></i> Consultar Alunos</h3>
                    </div>
                </div>
            </div>
            <?php mostrarAlerta("success"); ?>
                <div class="col-12 col-md-9">
                    <form class="form-header" action="listagem-alunos.php" method="GET">
                        <input class="form-header" type="text" name="pesquisar" placeholder="pesquisar por nome &amp; RA..." autocomplete="off" />
                            <select name="anos_id" id="select" class="form-control">
                                <option disabled selected>Filtro por ano</option>
                                <?php
                                    $anos = listarAno($conexao);
                                    foreach ($anos as $ano) { ?>
                                <option value="<?= $ano['id'] ?>"> <?= $ano['ano'] ?></option>
                                <?php } ?>
                            </select>
                            <select name="cursos_id" id="select" class="form-control">
                                <option disabled selected>Filtro por Curso</option>
                                <?php
                                    $cursos = listarCurso($conexao);
                                    foreach ($cursos as $curso) { ?>
                                <option value="<?= $curso['id'] ?>"> <?= $curso['curso'] ?></option>
                                <?php } ?>
                            </select>
                            <button class="au-btn--submit" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                    </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3 ">
                                        <thead>
                                            <tr>
                                                <th>FOTO</th>
                                                <th>RA</th>
                                                <th>NOME</th>
                                                <th>CPF</th>
                                                <th>CURSO</th>
                                                <th>EMAIL</th>
                                                <th>TELEFONE</th>
                                                <th>ANO</th>
                                                <th>SEMESTRE</th>
                                                <th>CIDADE</th>
                                                <th>STATUS</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $alunos = carregarAlunos($conexao);
                                            $contar = count($alunos); ?>
                                            <p class="text text-right"> <?php echo $contar ?> Registros </p> <?php
                                            foreach ($alunos as $aluno) {
                                        ?>
                                            <tr>
                                                <td><img src="../../projetoQrCode/assets/imagens/<?= $aluno['foto'] ?>" style="height: 50px;" title="sua foto"></td>
                                                <td class="text-center process"><?= $aluno['RA'] ?></td>
                                                <td><?= $aluno['nome'] ?></td>
                                                <td><?= $aluno['cpf'] ?></td>
                                                <td><?= $aluno['curso'] ?></td>
                                                <td><?= $aluno['email'] ?></td>
                                                <td><?= $aluno['telefone'] ?></td>
                                                <td><?= $aluno['ano'] ?></td>
                                                <td class="text-center"><?= $aluno['semestre'] ?></td>
                                                <td><?= $aluno['cidade'] ?></td>
                                                <td class="text-center process"><?= $aluno['status'] ?></td>
                                                <td><a href="frequencia-alunos.php?id=<?= $aluno['id']?>&RA=<?= $aluno['RA']?>&email=<?= $aluno['email']?>" class="btn btn-success" role="button" aria-label="Ver frequência do aluno"><i aria-hidden="true">Frequencia</i> </td>
                                                <td>
                                                    <form action="../controller/deletar-aluno.php" method="POST">
                                                    <input type="hidden" name="id" value="<?= $aluno['id']  ?>">
                                                        <button class="btn btn-danger"><i class="fa fa-close"></i> </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
                                $valor_pesquisar = (isset($_GET['pesquisar']) && !empty($_GET['pesquisar'])) ? "&pesquisar={$_GET['pesquisar']}" : "";
                                $ano_id = (isset($_GET['anos_id'])) ? "&anos_id={$_GET['anos_id']}" : "";
                                $curso = (isset($_GET['cursos_id'])) ? "&cursos_id={$_GET['cursos_id']}" : "";

                                $pagina_anterior = $pagina - 1;
                                $pagina_posterior = $pagina + 1;
                                ?>

                                <nav aria-label="pagination-lg" class="text-center">

                                <?php
                                if ($pagina_anterior != 0) {
                                ?>

                                <a class="btn btn-primary" href="listagem-alunos.php?pagina=<?= $pagina_anterior; ?><?= $valor_pesquisar ?><?= $ano_id ?><?= $curso ?>" aria-label="Previous"><span aria-hidden="true">Voltar</span></a>

                                <?php
                                } else {
                                ?>

                                <span aria-hidden="true"></span>

                                <?php
                                }
                                ?>

                                <?php
                                $quantidade_paginas = paginar($conexao);
                                    for ($i = 1; $i < $quantidade_paginas + 1; $i++) {
                                        if ($pagina == $i) {
                                ?>

                                        <a class="btn btn-warning" href="listagem-alunos.php?pagina=<?= $i ?><?= $valor_pesquisar ?><?= $ano_id ?><?= $curso ?>"><?= $i ?></a>
                                    <?php
                                        } else {
                                    ?>
                                        <a class="btn btn-secondary" href="listagem-alunos.php?pagina=<?= $i ?><?= $valor_pesquisar ?><?= $ano_id ?><?= $curso ?>"><?= $i ?></a>
                                    <?php
                                        }
                                    }
                                    ?>

                                    <?php
                                        if($pagina_posterior <= $quantidade_paginas){
                                    ?>
                                        <a class="btn btn-primary" href="listagem-alunos.php?pagina=<?=  $pagina_posterior; ?><?= $valor_pesquisar ?><?= $ano_id ?><?= $curso ?>" aria-label="Previous"><span aria-hidden="true">Proxima</span></a>
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

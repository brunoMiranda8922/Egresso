<?php require_once("cabecalho.php"); //Página que lista os registros da base de dados e faz páginação. 
require_once("banco/conexao.php");  //obs: Temos que trocar o nome do arquivo depois.
require_once("banco/banco-aluno.php");
require_once("banco/banco-curso.php");
require_once("banco/mostrar-alerta.php");
require_once("banco/funcoes.1.php");
error_reporting("E_NOTICE");



?>

            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- USER DATA-->
                                
                            </div>
                                <!-- END USER DATA-->
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35"><i class="fas fa-users"></i> Consultar Egressos</h3>
                               
                            </div>
                                                            <!-- END DATA TABLE -->
                        </div>
                </div>        
                <?php mostrarAlerta("success"); ?>
                <div class="col-12 col-md-9">
                    <form class="form-header" action="comercioExterior.php" method="GET">
                        <input class="form-header" type="text" name="pesquisar" placeholder="pesquisar por nome &amp; RA..." autocomplete="off" />
                            <select name="ano_id" id="select" class="form-control">
                                <option disabled selected>Filtro por ano</option>
                                <?php 
                                    $anos = listarAno($conexao);
                                    foreach ($anos as $ano) { ?>
                                <option value="<?= $ano['id'] ?>"> <?= $ano['ano_formacao'] ?></option>        
                                <?php } ?> 
                                
                                
                            </select>
                            <select name="cursos_id" id="select" class="form-control">
                                <option disabled selected>Filtro por Curso</option>
                                <?php 
                                    $cursos = listarCurso($conexao);
                                    foreach ($cursos as $curso) { ?>
                                <option value="<?= $curso['id'] ?>"> <?= $curso['nome'] ?></option>        
                                <?php } ?> 
                                
                                
                            </select>
                            
                        
                        <button class="au-btn--submit" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                </div>
                
                        
                   

                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3 ">
                                        <thead>
                                            <tr>
                                                <th>RA</th>
                                                <th>NOME</th>
                                                <th>CPF</th>
                                                <th>CURSO</th>
                                                <th>EMAIL</th>
                                                <th>ANO</th>
                                                <th>SEMESTRE</th>
                                                <th>CIDADE</th>
                                                <th>PERCENTUAL</th>
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
                                            
                                                <td class="text-center process"><?= $aluno['RA'] ?></td>
                                                <td><?= $aluno['nome'] ?></td>
                                                <td><?= $aluno['cpf'] ?></td>
                                                <td><?= $aluno['curso'] ?></td>
                                                <td><?= $aluno['email'] ?></td>
                                                <td><?= $aluno['ano'] ?></td>
                                                <td class="text-center "><?= $aluno['semestre'] ?></td>
                                                <td><?= $aluno['cidade'] ?></td>
                                                <td class="text-center process"><?= $aluno['PR'] ?></td>
                                                
                                                
                                                <td>
                                                    <form action="deletar-aluno.php" method="POST">
                                                    <input type="hidden" name="id" value="<?= $aluno['id']  ?>"> 
                                                        <button class="btn btn-danger"><i class="fa fa-close"></i> </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            
                                            <?php  } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <?php 
                                    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
                                    $valor_pesquisar = (isset($_GET['pesquisar']) && !empty($_GET['pesquisar'])) ? "&pesquisar={$_GET['pesquisar']}" : "";
                                    $ano_id = (isset($_GET['ano_id'])) ? "&ano_id={$_GET['ano_id']}" : "";
                                    $curso = (isset($_GET['cursos_id'])) ? "&cursos_id={$_GET['cursos_id']}" : "";

                                    
                                    $pagina_anterior = $pagina - 1;
                                    $pagina_posterior = $pagina + 1;
                                ?>
                                <nav aria-label="pagination-lg" class="text-center">
                                    <?php
                                        if ($pagina_anterior != 0) { ?>
                                    <a class="btn btn-primary" href="comercioExterior.php?pagina=<?= $pagina_anterior; ?><?= $valor_pesquisar ?><?= $ano_id ?><?= $curso ?>" aria-label="Previous">
                                    <span aria-hidden="true">Voltar</span>
                                    </a>
                                    <?php } else { ?>
                                    <span aria-hidden="true"></span>
                                    <?php }  ?>

                                    <?php 
                                        $quantidade_paginas = paginar($conexao);
                                        for ($i = 1; $i < $quantidade_paginas + 1; $i++) { 
                                            if ($pagina == $i) { ?>
                                    <a class="btn btn-warning" href="comercioExterior.php?pagina=<?= $i ?><?= $valor_pesquisar ?><?= $ano_id ?><?= $curso ?>"><?= $i ?></a></li>
                                    <?php } else { ?>  
                                    <a class="btn btn-secondary" href="comercioExterior.php?pagina=<?= $i ?><?= $valor_pesquisar ?><?= $ano_id ?><?= $curso ?>"><?= $i ?></a></li>
                                    <?php  } 
                                    } 
                                    ?>
                                    
                                    <?php
                                        if($pagina_posterior <= $quantidade_paginas){ ?>
                                    <a class="btn btn-primary" href="comercioExterior.php?pagina=<?=  $pagina_posterior; ?><?= $valor_pesquisar ?><?= $ano_id ?><?= $curso ?>" aria-label="Previous">
                                    <span aria-hidden="true">Proxima</span>
                                    </a>
                                    <?php } else { ?>
                                    <span aria-hidden="true"></span>
                                    <?php }  ?>
                                </nav>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
<?php require_once("rodape.php"); ?>

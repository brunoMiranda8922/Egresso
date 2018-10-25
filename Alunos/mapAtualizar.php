<?php require_once("cabecalho.php");
require_once("banco/conexao.php");
require_once("banco/banco-curso.php");
require_once("banco/banco-alunos.php");
require_once("banco/funcoes.2.php");
$id = $_GET['id'];
$areas = listarArea($conexao);

$resposta = mudarRespostas($conexao);
$usado = $resposta['trabalha'] ? "checked='checked'" : "";
?>

        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Atualizar Feedback </strong> Egresso
                            </div>
                            <div class="card-body card-block">
                            
                            
                                    <form action="" method="POST" class="form-horizontal">
                                    <input type="hidden" name="id" value="<?= $resposta['id'] ?>">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label"></label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static-"></p>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                    
                                        <div class="col col-md-3">
                                        
                                            <label for="text-input" class=" form-control-label">Está trabalhando atualmente?</label>
                                        </div>
                                        
                                        <div class="form-check">
                                            <div class="radio">
                                                <label for="radio1" class="form-check-label ">
                                                    <input type="radio" onclick="undisable()"  name="trabalha"  value="1"  checked = <?=$usado?> class="form-check-input" required/>Sim
                                                </label>
                                                
                                                
                                            </div>
                                            <div class="radio">
                                                <label for="radio2" class="form-check-label ">
                                                    <input type="radio" onclick="disable()"  name="trabalha" value="0" <?=$usado?> checked = <?=$usado?> class="form-check-input"/>Não
                                                </label>
                                                
                                            </div>
                                           
                                          
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label" >Qual o nome empresa</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text1" name="empresa" value="<?=$resposta['empresa'] ?>" placeholder="Nome da Empresa" class="form-control" required >
                                            <small class="help-block form-text">preencha somente se já estiver trabalhando</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Em qual área?</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                        <select name="area" id="text2" class="form-control" required>
                                            <option selected disabled>Selecione uma opção</option>

                                            <?php  foreach($areas as $area){ 
                                            $areaSelecionada = $resposta['area_trabalho'] == $area['area_curso_id'];
                                            $selecao = $areaSelecionada ? "selected='selected'" : "";


                                            ?>
                                            <option value="<?= $area['area_curso_id'] ?>" <?= $selecao ?>> <?= $area['nome'] ?>
                                            </option>
                                            <?php } ?>
                                            </select>
                                            <small class="help-block form-text">selecione somente se já estiver trabalhando</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password-input" class=" form-control-label">Qual o cargo que ocupa?</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id ="text3" name="cargo"  value="<?=$resposta['cargo'] ?>" placeholder="Titulo do Cargo" class="form-control" required>
                                            <small class="help-block form-text">preencha somente se já estiver trabalhando</small>
                                        </div>
                                                    
                                        </div>
                                        <script>
                                function disable() {
                                    document.getElementById("text1").disabled = true;
                                    document.getElementById("text2").disabled = true;
                                    document.getElementById("text3").disabled = true; 
                                    
                                }

                                function undisable() {
                                    document.getElementById("text1").disabled = false;
                                    document.getElementById("text2").disabled = false;
                                    document.getElementById("text3").disabled = false;
                                    
                                }
                                </script>
                            
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                <i class="fa fa-dot-circle-o"></i> Atualizar
                                </button>
                                
                                </form>
                            </div>

                            </div>
                            </div>
                                                    


<?php require_once("rodape.php"); ?>
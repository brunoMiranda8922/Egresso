<?php require_once("cabecalho.php");
require_once("banco/conexao.php");
require_once("banco/banco-curso.php");
require_once("banco/banco-alunos.php");
$areas = listarArea($conexao);
?>

        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Feedback do </strong> Egresso
                            </div>
                            <div class="card-body card-block">
                            
                            
                                    <form action="cadastroQuestionario.php" method="POST" class="form-horizontal">
                                 
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
                                                    <input type="radio" onclick="undisable()"  name="trabalha"  value="1"  class="form-check-input" required/>Sim
                                                </label>
                                                
                                                
                                            </div>
                                            <div class="radio">
                                                <label for="radio2" class="form-check-label ">
                                                    <input type="radio" onclick="disable()"  name="trabalha" value="0" class="form-check-input"/>Não
                                                </label>
                                                
                                            </div>
                                           
                                          
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label" >Qual o nome empresa</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text1" name="empresa"  placeholder="Nome da Empresa" class="form-control" required >
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
                                                            ?>
                                                            <option value="<?= $area['area_curso_id'] ?> ">
                                                                <?= $area['nome'] ?>
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
                                            <input type="text" id ="text3" name="cargo"  placeholder="Titulo do Cargo" class="form-control" required>
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
                            
                            
                            </div>
                            
                                <div class="container-fluid">       
                                    <div class="card-header">
                                        <strong>Feedback sobre a</strong> Universidade
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <strong><label class=" form-control-label">De 1 a 5</label></strong>
                                            
                                        </div>
                                        <div class="col-12 col-md-9">
                                        <p class="form-control-static-"> no qual 5 você concorda plenamente e 1 você discorda plenamente das afirmações abaixo</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <strong><label class=" form-control-label">A formação na Fatec:</label></strong>
                                            
                                        </div>
                                        <div class="col-12 col-md-9">
                                        <p class="form-control-static-"> foi fundamental para ingressar no mercado de trabalho</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label"> </label>
                                        </div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check" >
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 1 </small><input type="radio"  name="formacao" value="1"  class="form-check-input" required> 
                                                </label>

                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 2 </small><input type="radio" name="formacao" value="2" class="form-check-input"> 
                                                </label>
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 3 </small> <input type="radio" name="formacao" value="3"  class="form-check-input"> 
                                                </label>
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 4 </small> <input type="radio" name="formacao"  value="4" class="form-check-input"> 
                                                </label>
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 5 </small>   <input type="radio" name="formacao" value="5"  class="form-check-input"> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <strong><label class=" form-control-label">O cronograma da :</label></strong>
                                            
                                        </div>
                                        <div class="col-12 col-md-9">
                                        <p class="form-control-static-">Fatec foi adequado para atender as demandas do curso</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label"> </label>
                                        </div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 1 </small><input type="radio"  name="cronograma" value="1" class="form-check-input" required> 
                                                </label>

                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 2 </small><input type="radio"  name="cronograma" value="2" class="form-check-input"> 
                                                </label>
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 3 </small> <input type="radio"  name="cronograma" value="3"  class="form-check-input"> 
                                                </label>
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 4 </small> <input type="radio"  name="cronograma" value="4" class="form-check-input"> 
                                                </label>
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 5 </small>   <input type="radio"  name="cronograma" value="5" class="form-check-input"> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <strong><label class=" form-control-label">Avalie:</label></strong>
                                            
                                        </div>
                                        <div class="col-12 col-md-9">
                                        <p class="form-control-static-"> os professores da Fatec</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label"> </label>
                                        </div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 1 </small><input type="radio"  name="professores" value="1" class="form-check-input" required> 
                                                </label>

                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 2 </small><input type="radio"  name="professores" value="2" class="form-check-input"> 
                                                </label>
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 3 </small> <input type="radio"  name="professores" value="3" class="form-check-input"> 
                                                </label>
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 4 </small> <input type="radio"  name="professores" value="4" class="form-check-input"> 
                                                </label>
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 5 </small>   <input type="radio"  name="professores" value="5" class="form-check-input"> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <strong><label class=" form-control-label">A infraestrutura:</label></strong>
                                            
                                        </div>
                                        <div class="col-12 col-md-9">
                                        <p class="form-control-static-"> da Fatec apresenta uma qualidade</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label"> </label>
                                        </div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 1 </small><input type="radio"  name="infra" value="1" class="form-check-input" required> 
                                                </label>

                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 2 </small><input type="radio"  name="infra" value="2" class="form-check-input"> 
                                                </label>
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 3 </small> <input type="radio"  name="infra" value="3" class="form-check-input"> 
                                                </label>
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 4 </small> <input type="radio"  name="infra" value="4" class="form-check-input"> 
                                                </label>
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 5 </small>   <input type="radio"  name="infra" value="5" class="form-check-input"> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <strong><label class=" form-control-label">Eu:</label></strong>
                                            
                                        </div>
                                        <div class="col-12 col-md-9">
                                        <p class="form-control-static-">recomendaria a Fatec para um amigo</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label"> </label>
                                        </div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> Não <br /></small><input type="radio"  name="recomendaria" value="1" class="form-check-input" required> 
                                                </label>

                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> Talvez <br /></small><input type="radio"  name="recomendaria" value="2" class="form-check-input"> 
                                                </label>
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> Sim </small> <input type="radio"  name="recomendaria" value="3" class="form-check-input"> 
                                                </label>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <strong><label class=" form-control-label">Confirme:</label></strong>
                                            
                                        </div>
                                        <div class="col-12 col-md-9">
                                        <p class="form-control-static-">seu sexo</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label"> </label>
                                        </div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> Masculino <br /></small><input type="radio"  name="sexo" value="1" class="form-check-input" required> 
                                                </label>

                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> Feminino  </small><input type="radio"  name="sexo" value="2" class="form-check-input"> 
                                                </label>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <strong><label class=" form-control-label">Durante o:</label></strong>
                                            
                                        </div>
                                        <div class="col-12 col-md-9">
                                        <p class="form-control-static-">periodo na faculdade, conseguiu algum estágio</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label"> </label>
                                        </div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> Sim <br /></small><input type="radio"  name="estagio" value="1" class="form-check-input" required> 
                                                </label>

                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> Não </small><input type="radio"  name="estagio" value="0" class="form-check-input"> 
                                                </label>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <strong><label class=" form-control-label">Durante a:</label></strong>
                                            
                                        </div>
                                        <div class="col-12 col-md-9">
                                        <p class="form-control-static-">faculdade, se formou em quantos semestres</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label"> </label>
                                        </div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 6 </small><input type="radio"  name="semestre" value="6" class="form-check-input" required> 
                                                </label>

                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 7 </small><input type="radio"  name="semestre" value="7" class="form-check-input"> 
                                                </label>
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 8 </small> <input type="radio"  name="semestre" value="8" class="form-check-input"> 
                                                </label>
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 9 </small> <input type="radio"  name="semestre" value="9" class="form-check-input"> 
                                                </label>
                                                <label  class="form-check-label ">
                                                <small class="help-block form-text"> 10 </small>   <input type="radio"  name="semestre" value="10" class="form-check-input"> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
 
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fa fa-dot-circle-o"></i> Enviar
                                </button>
                                </form>
                            </div>
                        </div>


<?php require_once("rodape.php"); ?>
<?php
require_once("cabecalho.php");
require_once("../model/conexao.php");
require_once("../model/banco-curso.php");
require_once("../model/banco-aluno.php");
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Feedback do </strong> Aluno
                    </div>
                    <div class="card-body card-block">
                        <form action="cadastro-questionario.php" method="POST" class="form-horizontal">
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
                                    <label for="password-input" class=" form-control-label">Qual o cargo que ocupa?</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id ="text2" name="cargo"  placeholder="Titulo do Cargo" class="form-control" required>
                                    <small class="help-block form-text">preencha somente se já estiver trabalhando</small>
                                </div>
                                </div>
                                <script>
                                    function disable() {
                                        document.getElementById("text1").disabled = true;
                                        document.getElementById("text2").disabled = true;

                                    }

                                    function undisable() {
                                        document.getElementById("text1").disabled = false;
                                        document.getElementById("text2").disabled = false;

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
                                    <strong><label class=" form-control-label">Sua formação na Fatec:</label></strong>
                                </div>
                                <div class="col-12 col-md-9">
                                <p class="form-control-static-"> está impactando de forma positiva</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label"> </label>
                                </div>
                                <div class="col col-md-9">
                                    <div class="form-check-inline form-check" >
                                        <label  class="form-check-label ">
                                        <small class="help-block form-text"> Sim <br /></small><input type="radio"  name="formacao" value="1"  class="form-check-input" required>
                                        </label>
                                        <label  class="form-check-label ">
                                        <small class="help-block form-text"> Não </small><input type="radio" name="formacao" value="2" class="form-check-input">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <strong><label class=" form-control-label">O cronograma do :</label></strong>
                                </div>
                                <div class="col-12 col-md-9">
                                <p class="form-control-static-">curso é adequado para atender suas expectativas</p>
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
                                    <strong><label class=" form-control-label">Sua avalição:</label></strong>
                                </div>
                                <div class="col-12 col-md-9">
                                <p class="form-control-static-"> sobre os professores da Fatec</p>
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
                                    <strong><label class=" form-control-label">A Fatec:</label></strong>
                                </div>
                                <div class="col-12 col-md-9">
                                <p class="form-control-static-">oferece alguma oportunidade de estágio</p>
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
                                    <strong><label class=" form-control-label">Sua ausência:</label></strong>
                                </div>
                                <div class="col-12 col-md-9">
                                <p class="form-control-static-">na faculdade é devido algum motivo pessoal</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label"> </label>
                                </div>
                                <div class="col col-md-9">
                                    <div class="form-check-inline form-check">
                                        <label  class="form-check-label ">
                                        <small class="help-block form-text"> Sim <br /></small><input type="radio"  name="ausencia" value="1" class="form-check-input" required>
                                        </label>
                                        <label  class="form-check-label ">
                                        <small class="help-block form-text"> Não </small><input type="radio"  name="ausencia" value="0" class="form-check-input">
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

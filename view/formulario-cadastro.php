<?php
require_once("cabecalho.php");
require_once("../model/conexao.php");
require_once("../model/banco-curso.php");
require_once("../model/mostrar-alerta.php");
error_reporting("E_NOTICE");

$cursos = listarCurso($conexao);
$anos = listarAno($conexao);
$semestres = listarSemestre($conexao);
$cidades = listarCidade($conexao);
$matriculas = listarMatricula($conexao);
?>
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Formulario de Cadastro</strong> Alunos
                            </div>
                            <div class="card-body card-block">
                                <form  action="cadastrar-aluno.php" id="contact_form" method="POST" enctype="multipart/form-data"  class="form-horizontal" autocomplete="off">
                                <fieldset>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Formulario</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">RA do Aluno</label>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <input type="text" id="text-input" name="RA" placeholder="Digite o RA do aluno" class="form-control" required maxlength="9" autofocus>
                                            <small class="form-text text-muted">Preencha este campo</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">Nome & Sobrenome</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="nome" placeholder="Digite o nome e sobrenome" class="form-control " required>
                                            <small class="form-text text-muted">Preencha este campo</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">CPF do Aluno</label>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <input type="text" id="text-input" name="CPF" placeholder="Digite o CPF do aluno" class="form-control" required maxlength="11" autofocus>
                                            <small class="form-text text-muted">Preencha este campo</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class="form-control-label">Email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="email" id="email-input" name="email" placeholder="Digite o email" class="form-control" required>
                                            <small class="help-block form-text">Preencha o campo email</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="telefone" class=" form-control-label">Telefone</label>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <input type="text" id="telefone" name="telefone" placeholder="Telefone do aluno" class="form-control" required maxlength="11">
                                            <small class="help-block form-text">Preencha este campo </small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="valor" class="form-control-label">Foto</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="valor" name="foto" placeholder="Telefone do aluno" class="form-control" accept="image/*" required>
                                            <small class="help-block form-text">Inserir foto do aluno </small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class="form-control-label">Curso</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select  name="cursos_id" id="select" class="form-control" >
                                                <option disabled selected required>Selecione o Curso</option>
                                                <?php foreach($cursos as $curso){
                                                    ?>
                                                    <option value="<?= $curso['id'] ?> " required >
                                                        <?= $curso['curso'] ?>
                                                    </option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class="form-control-label">Ano</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="anos_id" id="select" class="form-control">
                                                <option disabled selected>Selecione o Ano</option>
                                                <?php foreach($anos as $ano){
                                                    ?>
                                                    <option value="<?= $ano['id'] ?> ">
                                                        <?= $ano['ano'] ?>
                                                    </option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class="form-control-label">Semestre</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="semestres_id" id="select" class="form-control">
                                                <option disabled selected>Selecione o Semestre</option>
                                                <?php foreach($semestres as $semestre){
                                                    ?>
                                                    <option value="<?= $semestre['id'] ?> ">
                                                        <?= $semestre['semestre'] ?>
                                                    </option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class="form-control-label">Cidade</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="cidades_id" id="select" class="form-control" required>
                                                <option disabled selected>Selecione a Cidade</option>
                                                <?php foreach($cidades as $cidade){
                                                    ?>
                                                    <option value="<?= $cidade['id'] ?> " required>
                                                        <?= $cidade['cidade'] ?>
                                                    </option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class="form-control-label">Situação da matricula</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="matricula_id" id="select" class="form-control" required>
                                                <option disabled selected>Selecione situação da matricula</option>
                                                <?php foreach($matriculas as $matricula){
                                                    ?>
                                                    <option value="<?= $matricula['id'] ?> " required>
                                                        <?= $matricula['status'] ?>
                                                    </option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> CADASTRAR
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Limpar
                                    </button>
                                </fieldset>
                                </form>
                            </div>
                                <div class="col-lg-14">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Importar arquivo</strong> Egressos
                                    </div>
                                    <?php mostrarAlerta("danger"); ?>
                                </div>
                                    <form action="../controller/processar.php" method="POST" enctype="multipart/form-data" accep-charset="utf-8" class="form-horizontal">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="file-input" class=" form-control-label"> Importar</label>
                                            </div>
                                            <div class="col-14 col-md-6">
                                                <input type="file" id="file-input" name="file" class="form-control-file">
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" name="btn_submit" class="btn btn-warning  btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Importar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php require_once("rodape.php"); ?>

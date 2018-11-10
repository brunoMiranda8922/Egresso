<?php
require_once("cabecalho.php");
require_once("banco/conexao.php");
require_once("banco/verifica-usuario.php");
require_once("banco/mostrar-alerta.php");
require_once("banco/banco-curso.php");
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
            <form action="cadastrar-curso.php" id="contact_form" method="POST" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-light">
                                <strong class="card-title text-dark">Inserir novo curso</strong>
                            </div>
                            <div class="card-body text-dark bg-light">
                                <div class="col-lg-18">
                                    <div class="card-body card-block">
                                        <div class="has-success form-group">
                                            <label for="inputIsValid" class="form-control-label">Nome do novo Curso</label>
                                            <input type="text" name="curso" id="inputIsValid" class="is-valid form-control-success form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="btn_submit" class="btn btn-dark  btn-sm">
                                        <i class="fa fa-align-justify"></i> Cadastrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row m-t-30">
                <div class="col-md-12">
                    <div class="table-responsive m-b-40">
                    <?php
                        mostrarAlerta("success");
                        mostrarAlerta("danger");
                    ?>
                    <table class="table table-borderless table-striped table-earning">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $curso = listarCurso($conexao);
                            foreach($curso as $cursos) { ?>
                                <tr>
                                    <td class="text-center process">
                                        <?= $cursos['curso'] ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="alterar-curso.php?id=<?= $cursos['id']?>">Alterar</a>
                                    </td>
                                    <td>
                                        <form action="deletar-cursos.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $cursos['id']?>">
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Remover </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php }  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once("rodape.php") ?>

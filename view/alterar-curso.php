<?php
require_once("cabecalho.php"); //Página que exibe o curso que vai ser alterado.
require_once("../model/conexao.php");
require_once("../model/verifica-usuario.php");
require_once("../model/mostrar-alerta.php");
require_once("../model/banco-curso.php");
error_reporting("E_NOTICE");
$id = $_GET["id"];
$cursos = alterarCurso($conexao, $id);
?>

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
      <?php
       mostrarAlerta("success");
       mostrarAlerta("danger");
       ?>

      <form  action="../controller/atualizar-curso.php" id="contact_form" method="POST" enctype="multipart/form-data"  class="form-horizontal" autocomplete="off" >
      <input type="hidden" name="id" value="<?= $cursos["id"] ?>">
         <div class="row">
            <div class="col-md-6">
               <div class="card">
                  <div class="card-header bg-light">
                     <strong class="card-title text-dark"><i class="fa fa-scissors"></i>Editar Curso</strong>
                  </div>
                  <div class="card-body text-dark bg-light">
                     <div class="col-lg-18">
                        <div class="card-body card-block">
                           <div class="has-success form-group">
                              <label for="inputIsValid" class="form-control-label">Nome do novo Curso</label>

                              <input type="text" name="curso" value="<?=$cursos['curso'] ?>" id="inputIsValid" class="is-valid form-control-success form-control">

                           </div>

                        </div>
                     </div>
                     <div class="card-footer">
                        <button type="submit" name="btn_submit" class="btn btn-dark  btn-sm">
                        <i class="fa fa-align-justify"></i> Atualizar
                        </button>
      </form>

      </div>

      </div>
      </div>
      </div>

   </div>
</div>
</div>
<?php require_once("rodape.php") ?>

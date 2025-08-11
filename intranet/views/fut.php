
<?php 
ob_start();
session_start();

if (!isset($_SESSION["nombre"])){
    header("Location: login.html");
}else{

    if ($_SESSION['configuraciones']==1){
      include 'headerIn.php';
?>


  <div class="content-wrapper text-sm">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <!--  <h1>Entidad</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Configuraciones</a></li>
              <li class="breadcrumb-item active">Entidad</li>
            </ol>
          </div>
        </div>
      </div>
    </section>


    <section class="content">
 <div class="container-fluid" >     
      <div class="card">
        <div class="card-header">
<!--           <h3 class="card-title">Title</h3> -->

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">

          <table id="example2" class="table table-bordered table-hover table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>FUT</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>

            </tbody>

          </table>
        </div>
      </div>
      </div>
    </section>
  </div>


  <div class="modal fade text-sm" id="modal_1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #17a2b8;color: #FFFFFF;">
          <h4 class="modal-title">Actualizar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form name="formulario" id="formulario" method="POST">
        <div class="modal-body text-sm">

          <div class="form-group my-1">
            <label style="margin-bottom: .0rem;">Formato</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="filedocument" name="filedocument" accept=".pdf, .doc, .docx">
              <label class="custom-file-label" for="customFile">Examinar..</label>
              <input  type="hidden"  id="idfut" name="idfut">
            <input  type="hidden"  id="fileactual" name="fileactual">
            </div>
          </div>


        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="btnsave" class="btn btn-info">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php 
    require 'footerIn.php'; 
    }else{
        require 'error.php';
    } 
}
ob_end_flush();
?>

<script type="text/javascript" src="scripts/fut.js"></script>

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>






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
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Imagen</th>
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

          <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input  class="form-control form-control-sm" type="text"  id="nombre_en" name="nombre_en">
            <input  type="hidden"  id="identity" name="identity">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Direccion</label>
            <textarea class="form-control form-control-sm"  placeholder="Jr. Av | Ciudad | Provincia  | Departamento" id="direccion_en" name="direccion_en"></textarea>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Telefono | Celular</label>
            <input  class="form-control form-control-sm" type="text"  id="telefono_en" name="telefono_en">
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


<div class="modal fade text-sm" id="modal_2">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #17a2b8;color: #FFFFFF;">
        <h4 class="modal-title">Actualizar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <form name="formularioimg" id="formularioimg" method="POST">
        <div class="modal-body text-sm">

          <div class="row">
            <div class="col-3">
            </div>
            <div class="col-6 align-self-md-center">
              <div class="kt-avatar kt-avatar--outline kt-avatar--danger" id="kt_user_avatar_4" name="kt_user_avatar_4">
                <div class="kt-avatar__holder" id="logovisor" name="logovisor" style="background-image: url(https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png)"></div>
                <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Cambiar Image">
                  <i class="fa fa-pen"></i>
                  <input  type="hidden"  id="identityimg" name="identityimg">
                  <input type="file" id="logo" name="logo" accept=".png, .jpg, .jpeg" >
                  <input type="hidden" name="logoactual" id="logoactual">
                </label>
                <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel Image">
                  <i class="fa fa-times"></i>
                </span>
              </div><span class="form-text text-muted">Archivo permitidos:  png, jpg, jpeg.</span>
            </div>
            <div class="col-3">
            </div>
          </div>
        </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="btnsaveimg" class="btn btn-info">Guardar</button>
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

<script type="text/javascript" src="scripts/entity.js"></script>

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>





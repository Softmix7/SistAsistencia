<?php 

ob_start();
session_start();

if (!isset($_SESSION["nombre"])){
    header("Location: login.html");
}else{
    if ($_SESSION['acceso']==1){
      include 'headerIn.php';
?>


  <link rel="stylesheet" href="../resource/assest/style.bundle.css">

  <style >
.card {
  box-shadow: 0 0 0px rgba(0,0,0,.125),0 0px 0px rgba(0,0,0,.2);
  margin-bottom: 0rem;
}

.modal-body {
  padding: 0rem;
}

  </style> 

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <!--  <h1>Entidad</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accesos</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content text-sm">
      <div class="container-fluid" >
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">LISTADO</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool btn-info" data-toggle="modal" data-target="#modal_1"  style="color:#FFFFFF ;background-color: #17a2b8;">Nuevo</button>
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
                  <th>Nombre</th>
                  <th>Cargo</th>
                  <th>Login</th>
                  <th>imagen</th>
                  <th>Status</th>
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
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #17a2b8;color: #FFFFFF;">
          <h4 class="modal-title" id="htitle" name="htitle"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
       <form name="formulario" id="formulario" method="POST">

        <div class="modal-body">

          <div class="row">
            <div class="col-12">

              <div class="card">
                <div class="card-header d-flex p-0">
                  <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Usuario</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Imagen</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Permisos</a></li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                          <div class="form-row align-items-center">
                             <div class="col-sm-12 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Nombre</label>
                                <div class="input-group input-group-sm">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                  </div>
                                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres">
                                  <input type="hidden" class="form-control form-control-sm" id="idusuario" name="idusuario">
                                </div>
                              </div>

                             <div class="col-sm-12 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Cargo</label>
                                <div class="input-group input-group-sm">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                  </div>
                                  <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo">
                                </div>
                              </div>

                             <div class="col-sm-6 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Login</label>
                                <div class="input-group input-group-sm">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-lock"></i></span>
                                  </div>
                                  <input type="text" class="form-control" id="login" name="login" placeholder="Login">
                                </div>
                              </div>


                             <div class="col-sm-6 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Password</label>
                                <div class="input-group input-group-sm">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                  </div>
                                  <input type="text" class="form-control" id="clave" name="clave" placeholder="Password">
                                </div>
                              </div>

                          </div>
                    </div>

                    <div class="tab-pane" id="tab_2">

                                        <div class="form-group row" style="margin-bottom: 0rem;">
                                            <div class="col-md-5 offset-sm-4">
                                                <div class="kt-avatar kt-avatar--outline kt-avatar--danger" id="kt_user_avatar_4" name="kt_user_avatar_4">
                                                    <div class="kt-avatar__holder" id="logovisor" name="logovisor" style="background-image: url(./../resource/files/usuarios/Circle-icons-profile.svg.png)"></div>
                                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Cambiar Image">
                                                        <i class="fa fa-pen"></i>
                                                        <input type="file" id="logo" name="logo" accept=".png, .jpg, .jpeg" >
                                                         <input type="hidden" name="logoactual" id="logoactual">
                                                    </label>
                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel Image">
                                                        <i class="fa fa-times"></i>
                                                    </span>
                                                </div>
                                                <span class="form-text text-muted">Permitido:  png, jpg, jpeg</span>
                                            </div>
                                        </div>
                    </div>

                    <div class="tab-pane" id="tab_3">
                      <div style="list-style: none;" id="permisos"></div>
                    </div>

                  </div>

                </div>
              </div>

            </div>

          </div>

        </div>
        <div class="modal-footer text-sm">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" onclick="hidemoldal();">Cerrar</button>
          <button type="submit" id="btnsave" class="btn btn-info btn-sm">Guardar</button>
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

<script type="text/javascript" src="../resource/assest/ktavatar.js"></script>
<script type="text/javascript" src="scripts/usuario.js"></script>



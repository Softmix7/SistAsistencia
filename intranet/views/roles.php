<?php 

ob_start();
session_start();

if (!isset($_SESSION["nombre"])){
    header("Location: login.html");
}else{
    if ($_SESSION['acceso']==1){
      include 'headerIn.php';
?>


  <div class="content-wrapper">
    <section class="content-header text-sm">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
<!--             <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accesos</a></li>
              <li class="breadcrumb-item active">Roles</li>
            </ol> -->
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
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">

            <table id="example2" class="table table-bordered table-hover table-sm ">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Menu</th>
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


<?php 
    require 'footerIn.php'; 
    }else{
        require 'error.php';
    } 
}
ob_end_flush();
?>

<script type="text/javascript" src="../resource/assest/ktavatar.js"></script>
<script type="text/javascript" src="scripts/permiso.js"></script>


<?php 
ob_start();
session_start();

if (!isset($_SESSION["nombre"])){
    header("Location: login.html");
}else{
    if ($_SESSION['card-qr']==1){
      include 'headerIn.php';
?>
<style>

.qrdiv {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  border: 1px solid #7b97a6;
  border-radius: 10px;
}
.loading {
  background-image: url('./../resource/files/load/loader.gif');
  background-repeat: no-repeat;
  background-position: center;
  width: 100%;
  height: 100%;
}
</style>


<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
<!--         <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Configuraciones</a></li>
              <li class="breadcrumb-item active">Entidad</li>
            </ol>
          </div>
        </div> -->
      </div>
    </section>

    <section class="content">

      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-5">
            <div class="row mb-2">

              <div class="col-sm-12">

                <div class="card" style="position: relative; left: 0px; top: 0px;">
                  <div class="card-header ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                      <i class="fas fa-qrcode"></i>
                      CODIGO QR 
                    </h3>
                  </div>
              <form class="" name="formulario" id="formulario" method="POST" >
                  <div class="card-body p-3 text-sm">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label>Textarea</label>
                                  <textarea class="form-control" rows="2" name="dataContent" id="dataContent" placeholder="Enter ..." ></textarea>
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label>Resolucion</label>
                                  <select name="calidad" id="calidad" class="form-control">
                                    <option value="H">H</option>
                                    <option value="M">M</option>
                                    <option value="Q">Q</option>
                                    <option value="L">L</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label>Tamaño</label>
                                  <input type="number" name="size" id="size"  value="14" class="form-control" min="1" max="15" step="1">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer text-right">
                  <button type="submit" id="btnSave" class="btn btn-info btn-sm" ><i class="fas fa-qrcode"></i> GENERAR </button>
                  </div>
              </form>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-7">
            <div class="card">
                <div class="card-body">
                                <div class="table-responsive" >
                                    <div class="qrdiv loading thumbnail well" style="height: 390px;"></div>
                                </div>
                </div>
            </div>
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
<script type="text/javascript" src="scripts/maincode.js"></script>
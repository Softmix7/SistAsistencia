<?php 
ob_start();
session_start();

if (!isset($_SESSION["nombre"])){
    header("Location: login.html");
}else{
    if ($_SESSION['asistencias']==1){
      include 'headerIn.php';
?>


  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-4 col-sm-7 col-md-9">
           <button type="button" id="btnreturn" onclick="cancelform()" class="btn btn-outline-info btn-sm"><i class="fas fa-long-arrow-alt-left"></i> Atras</button>
          </div>



          <div class="col-8 col-sm-5 col-md-3">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <button type="button" class="btn btn-dark btn-sm">Periodo</button>
                </div>
                <select class="custom-select" id="cbanio" name="cbanio" >
                </select>
            </div>
          </div>
        </div>
    </section>

    <section class="content text-sm">
<div class="container-fluid">
      <div class="card" style="background-color: #f8f9fa;" id="card_group" name="card_group">      
          <div class="card-body">
            <div class="row" id="group_list" name="group_list" > </div>
          </div>
     </div>



      <div class="card" id="card_list" name="card_list">
        <div class="card-header">
          <h3 class="card-title">Listado</h3>

          <div class="card-tools">
<!--             <button type="button" class="btn btn-tool btn-info" data-toggle="modal" data-target="#modal_1"  style="color:#FFFFFF ;background-color: #17a2b8;">Nuevo</button> -->
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
                <th>Apellidos /Nombres</th>
                <th>Documento</th>
                <th>Grado</th>
                <th>Sección</th>
                <th>Fecha</th>
                <th>Entrada</th>
                <th>Salida</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>

            </tbody>

          </table>
          </div>
     </div>

  <div class="modal fade text-sm" id="modal-sm">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #17a2b8;color: #FFFFFF;">
          <h6 class="modal-title" id="htitle" name="htitle"></h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form name="formulario" id="formulario" method="POST">
        <div class="modal-body text-sm">
                <table class="table table-striped" style="text-align: center;">
                    <tbody>
                        <tr>
                            <td><h4 id="namelast" name="namelast" style="font-size: 1rem;"></h4></td>
                        </tr>
                    </tbody>
                </table>

          <div class="form-group">
                         <input type="hidden" class="form-control" id="idpeople" name="idpeople">
                         <input type="hidden" class="form-control" id="idassistance" name="idassistance">
                <input type="hidden" class="form-control" id="tipo_peo" name="tipo_peo">
                <input type="hidden" class="form-control" id="anio_peo" name="anio_peo">

            <label>INGRESO</label><input type="hidden" id="idtimeactive" name="idtimeactive" />
            <div class="input-group date" id="calin" data-target-input="nearest">
              <input type="time" id="timestar" name="timestar" class="form-control"  />
              <input type="date" class="form-control" id="datestar" name="datestar" style="display: none;">
              <div class="input-group-append"  data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fas fa-clock"></i></div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>SALIDA</label><input type="hidden" id="idperiod" name="idperiod" />
            <div class="input-group date" id="calfin" data-target-input="nearest">
              <input type="time" id="timeend" name="timeend" class="form-control" />
              <input type="date" class="form-control" id="dateend" name="dateend" style="display: none;">
              <div class="input-group-append" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fas fa-clock"></i></div>
              </div>
            </div>
          </div>

        </div>

        <div class="modal-footer" style="">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="hidemoldal();">Cerrar</button>
          <button type="submit" id="btnsave" class="btn btn-info">Guardar</button>
        </div>
      </form>
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
  <script type="text/javascript" src="scripts/assistance.js"></script>

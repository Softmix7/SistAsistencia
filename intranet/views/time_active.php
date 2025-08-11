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
              <li class="breadcrumb-item active">Sistema activo</li>
            </ol>
          </div>
        </div>
      </div>
    </section>


    <section class="content">

     <div class="container-fluid"> 
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Listado</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" onclick="clear();" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">

          <table id="example2" class="table table-bordered table-hover table-sm">
            <thead>
              <tr>
                <th>item</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
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
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #17a2b8;color: #FFFFFF;">
          <h4 class="modal-title" id="htitle" name="htitle"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form name="formulario" id="formulario" method="POST">
        <div class="modal-body text-sm">
          <div class="form-group">
            <label>Hora Inicio</label><input type="hidden" id="idtimeactive" name="idtimeactive" />
            <div class="input-group date" id="calin" data-target-input="nearest">
              <input type="text" id="horain" name="horain" class="form-control datetimepicker-input" data-target="#calin" />
              <div class="input-group-append" data-target="#calin" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>Hora Fin:</label><input type="hidden" id="idperiod" name="idperiod" />
            <div class="input-group date" id="calfin" data-target-input="nearest">
              <input type="text" id="horafin" name="horafin" class="form-control datetimepicker-input" data-target="#calfin" />
              <div class="input-group-append" data-target="#calfin" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
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

<?php 
    require 'footerIn.php'; 
    }else{
        require 'error.php';
    } 
}
ob_end_flush();
?>

<script type="text/javascript" src="scripts/time_active.js"></script>

   <script type="text/javascript">
      $(function () {
          $('#calin').datetimepicker({
            viewMode: 'years',
              format: 'h:mm A'
          });

          $('#calfin').datetimepicker({
            viewMode: 'years',
              format: 'h:mm A'
          });

      });
   </script>





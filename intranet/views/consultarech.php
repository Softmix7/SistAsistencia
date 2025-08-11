<?php 
ob_start();
session_start();

if (!isset($_SESSION["nombre"])){
    header("Location: login.html");
}else{
    if ($_SESSION['asistencias']==1){
      include 'headerIn.php';
?>

<style type="text/css">

</style>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-4 col-sm-7 col-md-9">
          </div>



          <div class="col-8 col-sm-5 col-md-3">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <button type="button" class="btn btn-dark btn-sm">Periodo</button>
                </div>
                <select class="custom-select" id="cbanio" name="cbanio" >
                </select>
                <input type="hidden" class="form-control" value="<?php echo date("Y"); ?>" id="anio_peo" name="anio_peo">
            </div>
          </div>
        </div>
    </section>

    <section class="content text-sm">
<div class="container-fluid" id="dinform">

      <div class="card" id="card_list" name="card_list">
        <div class="card-header">
          <h3 class="card-title">Listado</h3>

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
                <th># Exp.</th>
                <th>Datos Rem.</th>
                <th>Mas Infor.</th>
                <th>Motivo</th>
                <th>Fech. Rechac </th>
                
              </tr>
            </thead>
            <tbody>

            </tbody>

          </table>
          </div>
     </div>

  <div class="modal fade text-sm" id="modal-sm">
    <div class="modal-dialog ">
      <div class="modal-content">

              <div class="cards">
                <div class="card-header d-flex p-0">
                  <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Informacion</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Remitente</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Adjunto</a></li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                          <div class="row">
                            <table class="table table-striped- table-hover table-checkable responsive" id="kt_table_1" style="font-size: 12px;">
                                    <tbody>
                                        <tr>
                                            <th>N° EXPEDIENTE</th>
                                            <td name="d1" id="d1"></td>
                                        </tr>
                                        <tr>
                                            <th>ASUNTO.</th>
                                            <td name="d2" id="d2"></td>
                                        </tr>
                                        <tr>
                                            <th>DETALLE</th>
                                            <td name="d3" id="d3"></td>
                                        </tr>

                                         <tr>
                                            <th>INGRESO</th>
                                            <td name="d4" id="d4"></td>
                                        </tr>
                                    </tbody>
                            </table>
                          </div> 
                    </div>

                    <div class="tab-pane" id="tab_2">
                          <div class="row">
                            <table class="table table-striped- table-hover table-checkable responsive" id="kt_table_2" style="font-size: 12px;">
                                    <tbody>

                                        <tr>
                                            <th>REMITENTE</th>
                                            <td colspan="3" name="p1" id="p1" style="background-color: #FEFFD6"></td>
                                        </tr>

                                         <tr>
                                            <th>TELEFONO</th>
                                            <td name="p2" id="p2"></td>
                                            <th>CELULAR</th>
                                            <td name="p3" id="p3"></td>
                                        </tr>

                                         <tr>
                                            <th>CORREO</th>
                                            <td colspan="3" name="p4" id="p4" style="background-color: #FEFFD6"></td>
                                        </tr>
                                         <tr>
                                            <th>DIRECCION</th>
                                            <td colspan="3" name="p5" id="p5" style="background-color: #FEFFD6"></td>
                                        </tr>
                                    </tbody>
                            </table>
                          </div>                        
                    </div>

                    <div class="tab-pane" id="tab_3">
                      <div class="row" style="border: 1px solid #484848; height: 410px;" id="view_pdf"></div>
                    </div>

                  </div>

                </div>
              </div>

        <div class="modal-footer" style="">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="hidemoldal();">Cerrar</button>
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
  <script type="text/javascript" src="scripts/consultarech.js"></script>

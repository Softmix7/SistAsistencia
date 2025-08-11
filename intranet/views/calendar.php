<?php 
ob_start();
session_start();

if (!isset($_SESSION["nombre"])){
    header("Location: login.html");
}else{
    if ($_SESSION['calendar']==1){
      include 'headerIn.php';
?>

<style>
#calendar{
  max-height: 485px;  

}

.fc .fc-toolbar.fc-header-toolbar {
  margin-bottom: 0em;
}
</style>

  <div class="content-wrapper">

    <section class="content">

<section class="content-header">

</section>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-body p-3">
                    <div id='calendar' name='calendar' ></div>
                </div>
              </div>
            </div>
          </div>
        </div>


  <div class="modal fade text-sm" id="kt_modal_add">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #17a2b8;color: #FFFFFF;">
          <h6 class="modal-title" id="ModalLabel"></h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
       <form name="formulario" id="formulario" method="POST">
        <div class="modal-body">
          <div class="form-row align-items-center">


           <div class="col-sm-12 my-1">
              <label class="sr-only" for="inlineFormInputGroupUsername">label</label>
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <div class="input-group-text">TIPO</div>
                </div>
                <select class="custom-select" id="tipo" name="tipo" onkeypress="cbcondition();">
                    <option value="1">Feriado / Celebracion</option>
                    <option value="0">Nota</option>
                </select>
              </div>
            </div>

           <div class="col-sm-12 my-1">
              <label class="sr-only" for="inlineFormInputGroupUsername">label</label>
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <span class="input-group-text">TITULO</span>
                </div>
                <input type="text" class="form-control" id="title" name="title">
                <input type="hidden"  id="idcalendar" name="idcalendar">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-id-card"></i></span>
                </div>
              </div>
            </div>

            <div class="col-sm-12 my-1">
              <label class="sr-only" for="inlineFormInputGroupUsername">label</label>
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <div class="input-group-text">FECHA STAR</div>
                </div>
                <input type="text" class="form-control" id="start" name="start" onkeypress="DataHora(event, this)" >
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="far fa-calendar-alt"> </i></div>
                </div>
              </div>
            </div>

           <div class="col-sm-12 my-1">
              <label class="sr-only" for="inlineFormInputGroupUsername">label</label>
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <div class="input-group-text">FECHA END</div>
                </div>
                <input type="text" class="form-control" id="end" name="end" onkeypress="DataHora(event, this)" >
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="far fa-calendar-alt"> </i></div>
                </div>
              </div>
            </div>

           <div class="col-sm-12 my-1">
              <label class="sr-only" for="inlineFormInputGroupUsername">label</label>
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <span class="input-group-text">COLOR</span>
                </div>
                <input type="Color" class="form-control" id="color" name="color" >
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-id-card"></i></span>
                </div>
              </div>
            </div>

           <div class="col-sm-12 my-1"  id="cbstatus">
              <label class="sr-only" for="inlineFormInputGroupUsername">label</label>
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <div class="input-group-text">CONDICION</div>
                </div>
                <select class="custom-select" id="status" name="status">
                       <option selected>seleccionar...</option>
                       <option value="1">Activado</option>
                       <option value="0">Desactivado</option>

                </select>
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="far fa-calendar-alt"> </i></div>
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

         <form name="formulario_delete" id="formulario_delete" method="POST">

            <div class="modal-body">
                <table class="table table-sm">
                  <tbody>
                    <tr>
                      <th scope="row" width="30%">Tipo</th>
                      <td id="td_tipo"></td>
                    </tr>
                    <tr>
                      <th scope="row">Titulo</th>
                      <td id="td_title"></td>
                    </tr>
                    <tr>
                      <th scope="row">Fecha Inicio</th>
                      <td id="td_start"></td>
                    </tr>
                    <tr>
                      <th scope="row">Fecha Fin</th>
                      <td id="td_end"></td>
                    </tr>
                    <tr>
                      <th scope="row">Condicion</th>
                      <td id="td_condition"></td>
                    </tr>
                    <tr>
                        <td></td><td></td>
                    </tr>
                  </tbody>
                </table>
                <input type="hidden"  id="idcalendar_delete" name="idcalendar_delete">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="showform(true)">Editar</button>
                <button  type="button" class="btn btn-danger" id="delet" >Eliminar</button>
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
<script type="text/javascript" src="scripts/calendar.js"></script>
<script>

function DataHora(evento,objeto){

  var keypress=(window.event) ? event.keyCode:evento.which;
  campo=eval(objeto);
  if(campo.value=='00/00/000 00:00:00'){
    campo.value="";
  }

    caracteres='0123456789';
    separador1='/';
    separador2=' ';
    separador3=':';
    conjunto1='2';
    conjunto2='5';
    conjunto3='10';
    conjunto4='13';
    conjunto5='16';

    if((caracteres.search(String.fromCharCode(keypress))!= -1)&& campo.value.length<(19)){
        if (campo.value.length==conjunto1) {
            campo.value=campo.value+separador1;
        }else if(campo.value.length==conjunto2) {
            campo.value=campo.value+separador1;
        }else if(campo.value.length==conjunto3) {
            campo.value=campo.value+separador2;
        }else if(campo.value.length==conjunto4) {
            campo.value=campo.value+separador3;
        }else if(campo.value.length==conjunto5){ 
            campo.value=campo.value+separador3;}
    }else{
        event.returnValue=false;
    }
}

</script>
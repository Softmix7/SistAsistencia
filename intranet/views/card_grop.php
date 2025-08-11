<?php 
ob_start();
session_start();

if (!isset($_SESSION["nombre"])){
    header("Location: login.html");
}else{
    if ($_SESSION['card-qr']==1){
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

    <div class="container-fluid" >

      <div class="card" style="background-color: #f8f9fa;" id="card_group" name="card_group">      
        <div class="card-body">
          <div class="row" id="group_list" name="group_list" > </div>
        </div>
      </div>
    </div>

  </section>

  <section class="content" id="card_list" name="card_list">
    <div class="container-fluid" >

      <div class="row mb-2">
        <div class="col-sm-1"> </div>

        <div class="col-sm-6">
          <div class="row mb-2">

            <div class="col-sm-12">

              <div class="card" style="position: relative; left: 0px; top: 0px;">
                <div class="card-header ui-sortable-handle" style="cursor: move;">
                  <h3 class="card-title">
                    <i class="fas fa-table"></i>
                    CONFIGURACION CARD
                  </h3>
                </div>

                <div class="card-body p-3">

                  <div class="input-group input-group-sm">
                    <div class="input-group my-colorpicker2 input-group-sm p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text">FONDO</span>
                      </div> 
                      <input type="text" class="form-control" id="txfondo" name="txfondo" value="#3C1021">
                      <div class="input-group-append" >
                        <span class="input-group-text"><i class="fas fa-square"></i></span>
                      </div>
                    </div>
                  </div>


                  <div class="input-group input-group-sm">
                    <div class="input-group my-colorpicker3 input-group-sm p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text">TEXTO</span>
                      </div> 
                      <input type="text" class="form-control" id="txletra" name="txletra" value="#FFFFFF">
                      <div class="input-group-append input-group-sm">
                        <span class="input-group-text"><i class="fas fa-square"></i></span>
                      </div>
                    </div>
                  </div>
                  <hr>



                  <div class="input-group input-group-sm p-1">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Generar por</div>
                    </div>

                    <input type="hidden" class="form-control" id="tipo_peo" name="tipo_peo">
                    <input type="hidden" class="form-control" id="anio_peo" name="anio_peo">
                    <select class="custom-select" id="tipodoc_search" name="tipodoc_search">

                    </select>
                  </div>



                  <div class="input-group input-group-sm  p-1 div-id">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Identifiacion</span>
                    </div>
                    <input type="text" class="form-control" id="txtid" name="txtid"  placeholder="Example: 48583594">
                  </div>

                  <div class="input-group input-group-sm  p-1 div-dat">
                    <div class="input-group-prepend">
                      <span class="input-group-text">DATOS II</span>
                    </div>
                    <input type="text" class="form-control" id="txtdat1" name="txtdat1" placeholder="Example: 2">
                  </div>



                  <div class="input-group input-group-sm  p-1 div-dat">
                    <div class="input-group-prepend">
                      <span class="input-group-text">DATOS II</span>
                    </div>
                    <input type="text" class="form-control" id="txtdat2" name="txtdat2" placeholder="Example: A">
                  </div>


                </div>

                <div class="card-footer text-right">

                  <button type="button" class="btn btn-info btn-sm"  onclick="cardpdf()" ><i class="fas fa-qrcode"></i>  GENERAR CARD</button>


                </div>


              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-3 ">
          <div class="row">
            <div class="col-md-12 col-8 offset-2">
              <div class="card color_f" style="background-color: #3C1021; " >
                <div style="margin: 0.5rem; color: #FFFFFF;font-size: 17pt;" class="text-center colortxt">I.E MOGROVEJO</div>
                <div class="" style="display: table;background-color: #FFFFFF; margin-right: 0.5rem; margin-left: 0.5rem; margin-bottom: 0.5rem; border-radius: 0.5rem;">

                  <div class="text-center">
                    <img src='../resource/files/photo/user.png' class="rounded img-fluid text-center" style='display: block;margin:auto;width: 45%;padding-top: 1.3mm;' ></div>

                    <div class="color_f colortxt" style="background-color: #3C1021;color: #FFFFFF; font-size: 10pt; height: 2rem;margin-top: 0.2rem;margin-right: 0.4rem; margin-left: 0.4rem; border-radius: 0.4rem; display: flex;justify-content: center;" ><p style="margin-top: 0.4rem;">@NAME EXAMPLE</p></div>

                    <div>
                      <table class="text-center" width="100%" style="border-collapse:collapse;">
                        <tr><td class="text-center"  colspan="4" style="padding: 0px;line-height:1;">Datos I: Example <br>Datos II: Example </td></tr>
                        <tr><td  colspan="4" ></td></tr>

                        <tr>
                          <td width="3%">&nbsp; </td>
                          <td width="5%" style="writing-mode: sideways-lr;text-orientation: mixed;  ">12345678</td>
                          <td width="50%"><img src="../resource/files/qr.png" class="img-fluid" style="width: 100%;"></td>
                          <td width="10%">&nbsp; </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">

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
  <script type="text/javascript" src="scripts/groupcard.js"></script>


<script type="text/javascript">

    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })
    $('.my-colorpicker3').colorpicker()

    $('.my-colorpicker3').on('colorpickerChange', function(event) {
      $('.my-colorpicker3 .fa-square').css('color', event.color.toString());
    })

  var color = document.getElementById("txfondo");
      color.onchange = function() {

        var a=document.getElementsByClassName("color_f");
    for (var i=0; i<a.length; i++) a[i].style.backgroundColor=color.value;
  }


  var colortxt = document.getElementById("txletra");
      colortxt.onchange = function() {

        var atxt=document.getElementsByClassName("colortxt");
    for (var i=0; i<atxt.length; i++) atxt[i].style.color=colortxt.value;
  }



 


</script>
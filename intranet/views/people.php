<?php 
ob_start();
session_start();

if (!isset($_SESSION["nombre"])){
    header("Location: login.html");
}else{
    if ($_SESSION['personal']==1){
      include 'headerIn.php';
?>


 <style>

    .image_area {
      position: relative;
    }

    img {
        display: block;
        max-width: 100%;
    }

    .preview {
        overflow: hidden;
        width: 160px; 
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }

    .overlay{
/*      all: none;*/

      position: absolute;
      bottom: 10px;
      left: 0;
      right: 0;
      background-color: rgba(255, 255, 255, 0.5);
      overflow: hidden;
      height: 0;
      transition: .5s ease;
      width: 100%;
    }



    .image_area:hover .overlay {
      height: 50%;
      cursor: pointer;
    }

    .text {
      color: #333;

      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      text-align: center;
    }
    
    .container {
      margin: 20px auto;
      max-width: 640px;
    }

  
    .cropper-view-box,
    .cropper-face {
      border-radius: 50%;
    }


    </style>


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
              <th>Apellidos</th>
              <th>Nombres</th>
              <th>Documento</th>
              <th>Grado</th>
              <th>Sección</th>
              <th>Cellphone</th>
              <th>E-mail</th>
              <th>Status</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>

          </tbody>

        </table>
      </div>
    </div>


    <div class="modal fade" id="modal_1">
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
              <div class="form-row align-items-center">

                <div class="col-sm-6 my-1">
                  <label class="sr-only" for="inlineFormInputGroupUsername">label</label>
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                    </div>
                    <input type="hidden" class="form-control" id="idpeople" name="idpeople">
                    <input type="hidden" class="form-control" id="tipo_peo" name="tipo_peo">
                    <input type="hidden" class="form-control" id="anio_peo" name="anio_peo">
                    <input type="text" class="form-control" id="lastname_peo" name="lastname_peo" placeholder="Apellidos">
                  </div>
                </div>

                <div class="col-sm-6 my-1">
                  <label class="sr-only" for="inlineFormInputGroupUsername">label</label>
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                    </div>
                    <input type="text" class="form-control" id="name_peo" name="name_peo" placeholder="Nombres">
                  </div>
                </div>

                <div class="col-sm-6 my-1">
                  <label class="sr-only" for="inlineFormInputGroupUsername">label</label>
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Tipo Doc.</div>
                    </div>
                    <select class="custom-select" id="tipodoc_peo" name="tipodoc_peo" >
                     <option selected>seleccionar...</option>
                     <option value="DNI">DNI</option>
                     <option value="Cedula">Cedula</option>
                   </select>
                 </div>
               </div>

               <div class="col-sm-6 my-1">
                <label class="sr-only" for="inlineFormInputGroupUsername">label</label>
                <div class="input-group input-group-sm">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-id-card"></i></span>
                  </div>
                  <input type="text" class="form-control" id="numberdoc_peo" name="numberdoc_peo" placeholder="# Documento">
                  <input type="hidden" name="numberdocimg_peo" id="numberdocimg_peo" maxlength="100">
                </div>
              </div>


              <div class="col-sm-6 my-1">
                <label class="sr-only" for="inlineFormInputGroupUsername">label</label>
                <div class="input-group input-group-sm">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Grado</div>
                  </div>
                  <input type="text" class="form-control" id="datos1_peo" name="datos1_peo" placeholder="">
                </div>
              </div>

              <div class="col-sm-6 my-1">
                <label class="sr-only" for="inlineFormInputGroupUsername">label</label>
                <div class="input-group input-group-sm">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Sección</div>
                  </div>
                  <input type="text" class="form-control" id="datos2_peo" name="datos2_peo" placeholder="">
                </div>
              </div>


              <div class="col-sm-6 my-1">
                <label class="sr-only" for="inlineFormInputGroupUsername">label</label>
                <div class="input-group input-group-sm">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" class="form-control" id="codpostal_peo" name="codpostal_peo"placeholder="+51" style="max-width: 20%;">
                  <input type="text" class="form-control" id="phone_peo" name="phone_peo" placeholder="978083556">
                </div>
              </div>

              <div class="col-sm-6 my-1">
                <label class="sr-only" for="inlineFormInputGroupUsername">label</label>
                <div class="input-group input-group-sm">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                  </div>
                  <input type="text" class="form-control" id="mail_peo" name="mail_peo" placeholder="example@gmail.com">
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



  <div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <!--                 <h4 class="modal-title">Actualizar Imagen</h4> -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="image_area">
            <form method="post">
              <label for="upload_image">
                <img src="./../resource/plugins/photo/user.png" id="uploaded_image" class="img-responsive img-circle" />
                <div class="overlay" style="top: auto;background-color: rgba(255, 255, 255, 0.5);">
                  <div class="text">CLICK PARA CAMBIAR IMAGEN</div>
                </div>
                <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                <input type="hidden" class="form-control" id="idpeoplecrop" name="idpeoplecrop">
                <input type="hidden" class="form-control" id="imgcrop" name="imgcrop">
              </label>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>


  <div class="modal fade" id="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="img-container">
            <div class="row">
              <div class="col-md-7">
                <img src="" id="sample_image" />
              </div>
              <div class="col-md-5">
                <div class="preview"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> 
          <button type="button" id="crop" class="btn btn-primary">Guardar</button>
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

  <script type="text/javascript" src="scripts/people.js"></script>

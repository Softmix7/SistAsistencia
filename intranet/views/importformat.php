<?php 
ob_start();
session_start();

if (!isset($_SESSION["nombre"])){
    header("Location: login.html");
}else{
    if ($_SESSION['personal']==1){
      include 'headerIn.php';
?>


<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">

      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <div class="row mb-2">

              <div class="col-sm-6">
                <div class="info-box">
                  <span class="info-box-icon bg-success"><i class="fas fa-file-csv" style="font-size: 3rem;"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Delimitado por comas</span>
                    <span class="info-box-number">(*.CSV)</span>
                  </div>
                </div>
              </div>

              <div class="col-sm-6"> 
                <a target="_blank" download="FORMATO CSV.csv"  href="../resource/files/formato/FORMATO_CSV.csv" >
                  <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fas fa-download"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Formato</span>
                      <span class="info-box-number">DESCARGAR</span>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-sm-12">
                <div class="card" style="position: relative; left: 0px; top: 0px;">
                  <div class="card-header ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                      <i class="fas fa-table"></i>
                      ORDEN COLUMNAS 
                    </h3>
                  </div> 

                  <div class="card-body p-0">
                    <table>
                      <tr><td><a href="../resource/files/formato/EXAMPLE.png" data-lighter><img src="../resource/files/formato/EXAMPLE.png" class="img-responsive img-fluid"></a> </td></tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                  <div class="file-loading">
                    <input id="file-es" name="file-es" type="file" accept=".csv">
                  </div>
                  <div id="kv-error-2" style="margin-top:10px;display:none"></div>
                  <div id="kv-success-2" class="alert alert-success" style="margin-top:10px;display:none"></div>
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


  <script>

    $(document).ready(function() {
      $("#file-es").fileinput({
        language: 'es',
        uploadUrl: "./../controllers/importCSV.php?op=saveupdate",
        uploadAsync: false,
        showPreview: true,
        allowedFileExtensions: ['csv','CSV'],
        maxFileCount: 5,
        browseOnZoneClick: true,
 /*       showBrowse: false,*/
        elErrorContainer: '#kv-error-2'
      }).on('filebatchpreupload', function(event, data, id, index) {
        $('#kv-success-2').html('<h5>Mensaje</h5><ul></ul>').hide();
      }).on('filebatchuploadsuccess', function(event, data) {
        var out = '';
        $.each(data.files, function(key, file) {
          var fname = file.name;
          out = out + '<li>' + 'Archivo importado con éxito.' + '</li>';
          /*    out = out + '<li>' + 'Archivo importado # ' + (key + 1) + ' - '  +  fname + ' con éxito.' + '</li>';*/
        });
        $('#kv-success-2 ul').append(out);
        $('#kv-success-2').fadeIn('slow');
      });
    });


  </script>
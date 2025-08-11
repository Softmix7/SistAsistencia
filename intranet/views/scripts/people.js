var t;
  var $modal = $('#modal');
  var image = document.getElementById('sample_image');//*VISTA PREVIA DE IMAGEN
  var cropper;


function init() {
    viewform(false);
    lblupdates();

    $("#htitle").html("AGREGAR");

    $.post("./../controllers/period.php?op=listperiod",function(r){
            $("#cbanio").html(r);
    });
 
    $.post("./../controllers/group.php?op=listgroup",function(r){
            $("#group_list").html(r);
    });


    $("#formulario").on("submit", function(e) {
        saveupdate(e);
    });
}


function clear() {
    $("#idpeople").val("");
    $("#lastname_peo").val("");
    $("#name_peo").val("");
    $("#tipodoc_peo").val("");
    $("#numberdoc_peo").val("");
    $("#datos1_peo").val("");
    $("#datos2_peo").val("");
    $("#codpostal_peo").val("");
    $("#phone_peo").val("");
    $("#mail_peo").val("");

    $("#idpeoplecrop").val("");
    $("#imgcrop").val("");



    $("#htitle").html("AGREGAR");
}

function cancelform(){
    viewform(false);
}
 

function hidemoldal() {
    $("#modal_1").modal('hide');
    $("#btnsave").prop("disabled", false);
    clear();
}

function showmoldal() {
    $("#modal_1").modal('show');
    $("#btnsave").prop("disabled", false);   
}

function viewform(flag){

    if (flag){
        lblupdates();
        sendvar();
        $("#card_group").hide();
        $("#card_list").show();
        $("#btnreturn").show();

    }else{

        $("#card_group").show();
        $("#card_list").hide();
        $("#btnreturn").hide();
    }
}


 

function listar(tipo_peoget ){

    var tipo_peoget = tipo_peoget;
    var anio_peoget = $("#anio_peo").val();

    t=$('#example2').dataTable({
      "language": {
              "url": "./../resource/assest/datatables/es-ES.json"
      },
        "lengthMenu": [5, 10, 25, 75, 100],
        "ajax":
                {
                    url: './../controllers/people.php?op=listar',
                    data: { tipo_peoget: tipo_peoget, anio_peoget: anio_peoget},
                    type : "get",
                    dataType : "json",                      
                    error: function(e){
                        console.log(e.responseText);    
                    }
                },
    "bDestroy": true,
    "iDisplayLength": 5,//Paginación

      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,


        "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
    }).DataTable();
}


function saveupdate(e) {
    e.preventDefault();
    $("#btnsave").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "./../controllers/people.php?op=saveupdate",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos) {
            Swal.fire("Exito!", datos, "success");
            t.ajax.reload();
            hidemoldal();
        }
    });
    clear();
}


function view(idpeople) {
     $.post("./../controllers/people.php?op=view", { idpeople: idpeople }, function(data, status) {
        showmoldal();
        data = JSON.parse(data);
    $("#idpeople").val(data.idpeople);
    $("#lastname_peo").val(data.lastname_peo);
    $("#name_peo").val(data.name_peo);
    $("#tipodoc_peo").val(data.tipodoc_peo);
    $("#numberdoc_peo").val(data.numberdoc_peo);
    $("#datos1_peo").val(data.datos1_peo);
    $("#datos2_peo").val(data.datos2_peo);
    $("#codpostal_peo").val(data.codpostal_peo);
    $("#phone_peo").val(data.phone_peo);
    $("#mail_peo").val(data.mail_peo);
    $("#numberdocimg_peo").val(data.numberdoc_peo);

        $("#htitle").html("ACTUALIZAR");
    })
}

function active(idpeople) {
            $.post("./../controllers/people.php?op=active", { idpeople: idpeople }, function(e) {
                Swal.fire("Exito!", e, "success");
                t.ajax.reload();
            }); 
}

function inactive(idpeople) {
             $.post("./../controllers/people.php?op=inactive", { idpeople: idpeople}, function(e) {
                Swal.fire("Exito!", e, "success");
                t.ajax.reload();
            });
}



function delet(idpeople) {
    Swal.fire({
        icon: 'warning',
        title: 'Advertencia?',
        text: "Está Seguro de eliminar este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Aceptar'
    }).then((result) => {
        if (result.value) {
            $.post("./../controllers/people.php?op=delete&idpeople=" + idpeople, function(e) {
                Swal.fire("Exito!", e, "success");
                t.ajax.reload();
            });
        }
        t.ajax.reload();
    })
}


    $("#cbanio").change(function() {
        $("#cbanio option:selected").each(function() {
            seleccion = $(this).val();
            $("#anio_peo").val(seleccion);
            var tipo_peoget = $("#tipo_peo").val();
            listar(tipo_peoget);
        });
        
    })

function lblupdates() {
    $("#cbanio option:selected").each(function() {
        seleccion = $(this).val();

        $("#anio_peo").val(seleccion);

    });
}

function sendvar(tipo_peo){
    $("#tipo_peo").val(tipo_peo);
}


function imagencrop(idpeople,imagencrop){
    $("#idpeoplecrop").val(idpeople);
    $("#imgcrop").val(imagencrop);

    if (imagencrop!=0) {
    $('#uploaded_image').attr('src',"./../resource/files/photo/"+$("#imgcrop").val());
    } else{
    $('#uploaded_image').attr('src',"./../resource/plugins/photo/user.png");
    }

    $("#modal-sm").modal('show');
}


//FILE PARA CARGAR**
  $('#upload_image').change(function(event){
    var files = event.target.files;//*INPUT FILES NAME*/

    var done = function(url){
      image.src = url;/*AGREGO IMAGEN LA URL DEL FILE PARA VISTA PREVIA*/
      $modal.modal('show');
    };

    if(files && files.length > 0){
      reader = new FileReader();
      reader.onload = function(event){
        done(reader.result);
      };
      reader.readAsDataURL(files[0]);
    }
  });

/*MODAL*/
  $modal.on('shown.bs.modal', function() {
    cropper = new Cropper(image, {
      aspectRatio: 1,
      viewMode: 3,
      preview:'.preview'
    });
  }).on('hidden.bs.modal', function(){
    cropper.destroy();
      cropper = null;
  });

  $('#crop').click(function(){
    canvas = cropper.getCroppedCanvas({
      width:400,/*tamaño de vista previa en en inicio cuando guarda el iamgen*/
      height:400
    });


    croppedCanvas = cropper.getCroppedCanvas();
    roundedCanvas = getRoundedCanvas(croppedCanvas);

      canvas.toBlob(function(blob){
      url = URL.createObjectURL(blob);
      var reader = new FileReader();
      reader.readAsDataURL(blob);
      reader.onloadend = function(){
        var base64data = reader.result;
        var idpeoplecrop=  $("#idpeoplecrop").val();
        var imgcrop=   $("#imgcrop").val();
        $.ajax({
          url:'./../controllers/people.php?op=imagencrop',
          method:'POST',
          data:{image:base64data,idpeoplecrop:idpeoplecrop,imgcrop:imgcrop },
          success:function(data){
            $modal.modal('hide');
            $('#uploaded_image').attr('src', data);
            t.ajax.reload();
          }
        });
      };
    });


  });
  

    function getRoundedCanvas(sourceCanvas) {
      var canvas = document.createElement('canvas');
      var context = canvas.getContext('2d');
      var width = sourceCanvas.width;
      var height = sourceCanvas.height;

      canvas.width = width;
      canvas.height = height;
      context.imageSmoothingEnabled = true;
      context.drawImage(sourceCanvas, 0, 0, width, height);
      context.globalCompositeOperation = 'destination-in';
      context.beginPath();
      context.arc(width / 2, height / 2, Math.min(width, height) / 2, 0, 2 * Math.PI, true);
      context.fill();
      return canvas;
    }



init();


var t;
var current_effect = 'win8'; // 
/*  var $modal = $('#modal');
  var image = document.getElementById('sample_image');//*VISTA PREVIA DE IMAGEN
  var cropper;*/


function init() {
/*    viewform(false);*/

    
lblupdates();
/*    $("#htitle").html("ACTUALIZAR HORA");*/

    $.post("./../controllers/period.php?op=listperiod",function(r){
            $("#cbanio").html(r);
    });


    $("#formulario").on("submit", function(e) {
        saveupdate(e);
    })

/*    $.post("./../controllers/group.php?op=listgroup",function(r){
            $("#group_list").html(r);
    });
*/

/*    $("#formulario").on("submit", function(e) {
        saveupdate(e);
    });*/
}

function run_waitMe(effect){
        $('#dinform').waitMe({
        effect: 'win8',
        text: 'Procesando, espere un momento...',
        bg: 'rgba(255,255,255,0.7)',
        color: '#000',
        maxSize: '',
        waitTime: -1,
        source: '',
        textPos: 'vertical',
        fontSize: '',
        onClose: function() {}
        });
}

/*function clear() {
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



    $("#htitle").html("ACTUALIZAR HORA");
}*/

/*function cancelform(){
    viewform(false);
}*/


function hidemoldal() {
    $("#modal-sm").modal('hide');
    $("#btnsave").prop("disabled", false);

}

function showmoldal() {
    $("#modal-sm").modal('show');
    $("#btnsave").prop("disabled", false);   
}

function viewdetalle(iduserform,num_exp,asunto,descripcion,fecha,ape_paterno,ape_materno,nombre,telefono,celular,correo,direccion,documents){
    showmoldal();
    $("#d1").html(num_exp);
    $("#d2").html(asunto);
    $("#d3").html(descripcion);
    $("#d4").html(fecha);

    $("#p1").html(ape_paterno +" "+ ape_materno +" "+ nombre);
    if (telefono=="") {$("#p2").html("--------");} else {$("#p2").html(telefono);}
    if (celular=="") {$("#p3").html("--------");} else {$("#p3").html(celular);}
    $("#p4").html(correo);
    $("#p5").html(direccion);

    if (documents==0) {
    $("#view_pdf").html('No hay documento que mostrar');
    }else {
           $("#view_pdf").html('<embed src="../resource/files/documents/'+documents+'" type="application/pdf" width="100%" height="100%"></embed>'); 
    }


/*
    if (tipopersona=="PN") {
        $("#p1").html("Persona Natural");
        $("#dr").html("DNI");
    } else {
        $("#p1").html("Persona Juridica");
        $("#dr").html("RUC");
    }

    $("#p2").html(dni);
    $("#p3").html(nombre +" "+ ape_paterno +" "+ ape_materno);
    if (telefono=="") {$("#p4").html("--------");} else {$("#p4").html(telefono);}
    if (celular=="") {$("#p5").html("--------");} else {$("#p5").html(celular);}
    $("#p6").html(correo);
    $("#p7").html(direccion);

$("#view_pdf").html('<embed src="../resource/files/documents/'+documento+'" type="application/pdf" width="100%" height="100%"></embed>');

    $.post("../controllers/tramite.php?op=listanexo&iduserform="+iduserform,function(r){
    $("#filesanexo").html(r);
    })*/

}
/*
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
*/



function listar() {
    var anio_peoget = $("#anio_peo").val();

    t = $('#example2').DataTable({
        "language": {
            "url": "./../resource/assest/datatables/es-ES.json"
        },
        responsive: !0,
        "aProcessing": true,
        "aServerSide": true,
        "lengthMenu": [5, 10, 25, 75, 100],

        "ajax": {
            url: './../controllers/consultarec.php?op=listar',
            data: {anio_peoget: anio_peoget},
            type: "get",
            dataType: "json",
            error: function(e) {
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
      "order": [[0, "asc"]],
    })
}



function accionacep(iduserform,ape_paterno,ape_materno,nombre,num_exp,correo) {
    $("#modal_1").modal('show');

    $("#rc1").html(ape_paterno+ " " +ape_materno+ " " + nombre);
    $("#rc2").html(correo);
    $("#rc3").html(num_exp);    

    $("#iduserform").val(iduserform);
    $("#correo").val(correo);
}



function accionrech(iduserform,num_exp,fecha,correo) {
var idarea = $("#idarea").val();
var area_n = $("#area_n").val();

    Swal.fire({
          title: 'Advertencia',
          icon: 'warning',

         html: `<label>¿Esta <b style="color:#9B0000;">Seguro de rechazar </b> el expediente?</label>
             <div class="form-group">
              <textarea id="msjrejected" name="msjrejected" class="form-control" placeholder="Digite motivo: Ejemplo: rechazado por..." id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>`,
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Aceptar',
          cancelButtonText: 'Cancelar',
            focusConfirm: false,
            preConfirm: () => {
              const msjrejected = Swal.getPopup().querySelector('#msjrejected').value

                if (!msjrejected) {
                  Swal.showValidationMessage(`Por favor ingrese el motivo de rechazo del expediente`)
                }
                return { msjrejected: msjrejected}
            }
          }).then((result) => {
            msjrejected=result.value.msjrejected;

                          $.ajax({
                              url : './../controllers/consultarec.php?op=msjrejected',
                              type : 'POST',
                              data : {iduserform:iduserform,num_exp:num_exp,fecha:fecha,correo:correo,msjrejected:msjrejected},
                              beforeSend: function(){
                                     run_waitMe(current_effect);
                                  },
                                success: function(datos){ 
                                $('#dinform').waitMe('hide');
                                Swal.fire('Exito!', datos, 'success');
                                t.ajax.reload();
                                }
                          });
    })

}




function saveupdate(e) {
    e.preventDefault();
    $("#btnsave").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "./../controllers/consultarec.php?op=saveupdate",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos) {
            Swal.fire("Exito!", datos, "success");
            t.ajax.reload();
            $("#modal_1-").modal('hide');
        }
    });
    clear();
}

/*
function view(idassistance) {
    $.post("./../controllers/assistance.php?op=view", { idassistance: idassistance }, function(data, status) {
        data = JSON.parse(data);
        showmoldal();

        $("#idassistance").val(data.idassistance);
        $("#idpeople").val(data.idpeople);

        $("#namelast").html(data.lastname_peo + ",  " + data.name_peo);
        $("#timestar").val(data.timestar);
        $("#timeend").val(data.timeend);
        $("#datestar").val(data.datestar);
        $("#dateend").val(data.dateend);


    })
}*/



/*
function delet(idassistance) {
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
            $.post("./../controllers/assistance.php?op=delete&idassistance=" + idassistance, function(e) {
                Swal.fire("Exito!", e, "success");
                t.ajax.reload();
            });
        }
        t.ajax.reload();
    })
}
*/

    $("#cbanio").change(function() {
        $("#cbanio option:selected").each(function() {
            seleccion = $(this).val();
            $("#anio_peo").val(seleccion);
            listar();
        });
        
    })

function lblupdates() {
    $("#cbanio option:selected").each(function() {
        seleccion = $(this).val();
        $("#anio_peo").val(seleccion);


    });
         listar();   
}

/*function sendvar(tipo_peo){
    $("#tipo_peo").val(tipo_peo);
}
*/

init();


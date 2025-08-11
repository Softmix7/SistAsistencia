var t;
var current_effect = 'win8'; // 

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
        beforeSend: function(){
           run_waitMe(current_effect);
        },
        success: function(datos){ 
                $('#dinform').waitMe('hide');
                Swal.fire("Exito!", datos, "success");
                t.ajax.reload();
                $("#modal_1").modal('hide');
        }
    });
/*    clear();*/
}


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


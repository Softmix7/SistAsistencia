var t;

function init() {
    
lblupdates();
/*    $("#htitle").html("ACTUALIZAR HORA");*/

    $.post("./../controllers/period.php?op=listperiod",function(r){
            $("#cbanio").html(r);
    });
}


function hidemoldal() {
    $("#modal-sm").modal('hide');

}

function showmoldal() {
    $("#modal-sm").modal('show');
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
            url: './../controllers/consultarech.php?op=listar',
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


init();


var t;

function init() {
    listar();
    $("#htitle").html("AGREGAR");
    $("#formulario").on("submit", function(e) {
        saveupdate(e);
    });
}

function clear() {
    $("#idtimeactive").val("");
    $("#horain").val("");
    $("#horafin").val("");
    $("#htitle").html("AGREGAR");
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



function listar(){
    t=$('#example2').dataTable({
      "language": {
              "url": "./../resource/assest/datatables/es-ES.json"
      },

        "ajax":
                {
                    url: './../controllers/time_active.php?op=listar',
                    type : "get",
                    dataType : "json",                      
                    error: function(e){
                        console.log(e.responseText);    
                    }
                },
    "bDestroy": true,
    "iDisplayLength": 5,//Paginación

      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,


        "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    }).DataTable();
}


function saveupdate(e) {
    e.preventDefault();
    $("#btnsave").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "./../controllers/time_active.php?op=saveupdate",
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


function view(idtimeactive) {
     $.post("./../controllers/time_active.php?op=view", { idtimeactive: idtimeactive }, function(data, status) {
        showmoldal();
        data = JSON.parse(data);
        $("#horain").val(data.inicio);
        $("#horafin").val(data.fin);
        $("#idtimeactive").val(data.idtimeactive);
        $("#htitle").html("ACTUALIZAR");
    })
}



init();


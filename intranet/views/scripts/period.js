var t;

function init() {
    listar();
    $("#htitle").html("AGREGAR");
    $("#formulario").on("submit", function(e) {
        saveupdate(e);
    });
}

function clear() {
    $("#idperiod").val("");
    $("#name_per").val("");
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
                    url: './../controllers/period.php?op=listar',
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
        "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
    }).DataTable();
}


function saveupdate(e) {
    e.preventDefault();
    $("#btnsave").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "./../controllers/period.php?op=saveupdate",
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


function view(idperiod) {
     $.post("./../controllers/period.php?op=view", { idperiod: idperiod }, function(data, status) {
        showmoldal();
        data = JSON.parse(data);
        $("#name_per").val(data.name_per);
        $("#idperiod").val(data.idperiod);
        $("#htitle").html("ACTUALIZAR");
    })
}



init();


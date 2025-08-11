var t;

function init() {
    listar();
    $("#htitle").html("AGREGAR");
    $("#formulario").on("submit", function(e) {
        saveupdate(e);
    });
}

function clear() {
    $("#idgroup").val("");
    $("#detalle_group").val("");
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
                    url: './../controllers/group.php?op=listar',
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
        url: "./../controllers/group.php?op=saveupdate",
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


function view(idgroup) {
     $.post("./../controllers/group.php?op=view", { idgroup: idgroup }, function(data, status) {
        showmoldal();
        data = JSON.parse(data);
        $("#detalle_group").val(data.detalle_group);
        $("#idgroup").val(data.idgroup);
        $("#htitle").html("ACTUALIZAR");
    })
}



function active(idgroup) {
            $.post("./../controllers/group.php?op=active", { idgroup: idgroup }, function(e) {
                Swal.fire("Exito!", e, "success");
                t.ajax.reload();
            }); 
}

function inactive(idgroup) {
             $.post("./../controllers/group.php?op=inactive", { idgroup: idgroup}, function(e) {
                Swal.fire("Exito!", e, "success");
                t.ajax.reload();
            });
}



function delet(idgroup) {
    Swal.fire({
        width: '300px',
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
            $.post("./../controllers/group.php?op=delete&idgroup=" + idgroup, function(e) {
                Swal.fire("Exito!", e, "success");
                t.ajax.reload();
            });
        }
        t.ajax.reload();
    })
}


init();


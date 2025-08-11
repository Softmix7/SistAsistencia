var t;

function init() {
    listar();

    $("#formulario").on("submit", function(e) {
        saveupdate(e);
    });

    $("#formularioimg").on("submit", function(e) {
        updateimg(e);
    });

    $("#logo").change(function() {
        var fileName = this.files[0].name;
        var fileSize = this.files[0].size;

        if (fileSize > 1000000) {
            toastr.error("Error, Tamaño maximo permitido 1 MB");
            $("#logovisor").css("background-image", "url(https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png)");
            this.value = '';
            this.files[0].name = '';

        }
    });
}

function clear() {
    $("#identity").val("");
    $("#nombre_en").val("");
    $("#direccion_en").val("");
    $("#telefono_en").val("");
    $("#logo").val("");
    $("#logoactual").val("");
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


function hidemoldalimg() {
    $("#modal_2").modal('hide');
    $("#btnsaveimg").prop("disabled", false);
    clear();
}

function showmoldalimg() {
    $("#modal_2").modal('show');
    $("#btnsaveimg").prop("disabled", false);    
}




function listar(){
    t=$('#example2').dataTable({
      "language": {
              "url": "./../resource/assest/datatables/es-ES.json"
      },

        "ajax":
                {
                    url: '../controllers/entity.php?op=listar',
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
        url: "./../controllers/entity.php?op=saveupdate",
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

function updateimg(e) {
    e.preventDefault();
    $("#btnsaveimg").prop("disabled", true);
    var formData = new FormData($("#formularioimg")[0]);

    $.ajax({
        url: "./../controllers/entity.php?op=updateimg",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos) {
            Swal.fire("Exito!", datos, "success");
            t.ajax.reload();
            hidemoldalimg();
        }
    });
    clear();
}


function view(identity) {
     $.post("./../controllers/entity.php?op=view", { identity: identity }, function(data, status) {
        showmoldal();
        data = JSON.parse(data);
        $("#nombre_en").val(data.nombre_en);
        $("#direccion_en").val(data.direccion_en);
        $("#telefono_en").val(data.telefono_en);
        $("#identity").val(data.identity);
    })
}

function viewimg(identity) {
     $.post("./../controllers/entity.php?op=view", { identity: identity }, function(data, status) {
        showmoldalimg();
        data = JSON.parse(data);
        $("#identityimg").val(data.identity);
        $("#logoactual").val(data.imagen_en);
        $("#logovisor").css("background-image", "url(./../resource/files/logo/"+data.imagen_en+")");
    })  
}


init();


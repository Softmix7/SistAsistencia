var t;

function init() {
    listar();
    $("#htitle").html("AGREGAR");

    $("#formulario").on("submit", function(e) {
        saveupdate(e);
    });

    $.post("./../controllers/usuario.php?op=permisos&id=", function(r) {
        $("#permisos").html(r);
    });
 
    $("#logo").change(function() {
        var fileName = this.files[0].name;
        var fileSize = this.files[0].size;

        if (fileSize > 1000000) {
            toastr.error("Error, Tamaño maximo permitido 1 MB");
            $("#logovisor").css("background-image", "url(./../resource/files/usuarios/Circle-icons-profile.svg.png)");
            this.value = '';
            this.files[0].name = '';

        }
    });
 }   
/*    $('#macceso').addClass("kt-menu__item--open kt-menu__item--here");
    $('#lusuario').addClass("kt-menu__item--active");
    $("#htitle").html("AGREGAR");
}*/



function clear() {
    $("#idusuario").val("");
    $("#nombre").val("");
    $("#cargo").val("");
    $("#login").val("");
    $("#clave").val("");
    $("#logo").val("");
    $("#logoactual").val("");
    $(".permisocheck").removeAttr("checked");
    $("#htitle").html("AGREGAR");
    $("#logovisor").css("background-image", "url(./../resource/files/usuarios/Circle-icons-profile.svg.png)");
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
                    url: './../controllers/usuario.php?op=listar',
                    type : "get",
                    dataType : "json",                      
                    error: function(e){
                        console.log(e.responseText);    
                    }
                },
    "bDestroy": true,
    "iDisplayLength": 6,

      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "order": [[0, "asc"]],
   }).DataTable();
}


function saveupdate(e) {
    e.preventDefault();
    $("#btnSave").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "./../controllers/usuario.php?op=saveupdate",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos) {
            swal.fire("Exito!", datos, "success");
            hidemoldal();
            t.ajax.reload();
        }

    });
    clear();
}



function view(idusuario) {
    $.post("./../controllers/usuario.php?op=view", { idusuario: idusuario }, function(data, status) {
        showmoldal();
        data = JSON.parse(data);
        $("#nombre").val(data.nombre);
        $("#cargo").val(data.cargo);
        $("#login").val(data.login);
        $("#clave").val(data.clave);
        $("#logoactual").val(data.imagen);
        $("#idusuario").val(data.idusuario);
        $("#logovisor").css("background-image", "url(./../resource/files/usuarios/" + data.imagen + ")");
        $("#htitle").html("ACTUALIZAR");

    });

    $.post("../controllers/usuario.php?op=permisos&id=" + idusuario, function(r) {
        $("#permisos").html(r);
    });
}


function active(idusuario) {
            $.post("./../controllers/usuario.php?op=active", {idusuario: idusuario}, function(e) {
                Swal.fire("Exito!", e, "success");
                t.ajax.reload();
            }); 
}

function inactive(idusuario) {
             $.post("./../controllers/usuario.php?op=inactive", {idusuario: idusuario}, function(e) {
                Swal.fire("Exito!", e, "success");
                t.ajax.reload();
            });
}



function delet(idusuario) {
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
            $.post("./../controllers/usuario.php?op=delete&idusuario=" + idusuario, function(e) {
                Swal.fire("Exito!", e, "success");
                t.ajax.reload();
            });
        }
        t.ajax.reload();
    })
}


init();
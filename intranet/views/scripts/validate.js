
function init() {
    listar();
valors();

}


function listar(){
        $.ajax({
            url:'./../controllers/validate.php?op=listar',
            success:function(data){
                $("#idvalidate").val(data);
            }
        })           
}


function valors(){
var valor=$("#idvalidate").val();

    if (valor==1) {

    } else {

window.location.href = "https://professor-falken.com";
    }

}
/*
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
}*/



init();


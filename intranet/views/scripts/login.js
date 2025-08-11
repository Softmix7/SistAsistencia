$("#frmAcceso").on('submit', function(e) {
    e.preventDefault();
    logina = $("#txtuser").val();
    clavea = $("#txtpassword").val();

    if (logina == 0) {
        swal("Error!", "ingrese usuario", "error");
    } else if (clavea == 0) {
        swal("Error!", "ingrese contraseña", "error");
    } else {

       $.post("./../controllers/usuario.php?op=verificar", { "logina": logina, "clavea": clavea }, function(data) {
        if (data != "null") {
            $(location).attr("href", "./");
        } else {

            swal("Error!", "Usuario y/o contraseña incorrecto", "error");
            $("#txtuser").val("");
            $("#txtpassword").val("");
        }
    });

   }
})
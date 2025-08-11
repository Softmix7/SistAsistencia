
function init() {

    $("#formulario").on("submit", function(e) {
        QR_code(e);
    });

}

function clear() {
          $(".qrdiv").addClass('loading'); 
          $("#dataContent").val(""); 
          $("#imj").attr("src","");
          $("#btnSave").prop("disabled", false);
}



function QR_code(e) {
    e.preventDefault();
    $("#btnSave").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);
            $.ajax({
            url:'./../controllers/maincode.php?op=generateqr',
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $(".qrdiv").addClass('loading');  
            },
            success: function(resp) {
              $(".qrdiv").html(resp);  
            },
            complete: function() {
                $(".qrdiv").removeClass('loading');  
            },
           });
    clear();
}


init();
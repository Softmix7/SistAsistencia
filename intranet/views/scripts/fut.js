var t;

function init() {
    listar();

    $("#formulario").on("submit", function(e) {
        saveupdate(e);
    });

}

function clear() {
    $("#idfut").val("");
    $("#fileactual").val("");
    $("#filedocument").val("");
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
                    url: '../controllers/fut.php?op=listar',
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
        url: "./../controllers/fut.php?op=saveupdate",
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


function view(idfut) {
     $.post("./../controllers/fut.php?op=view", { idfut: idfut }, function(data, status) {
        showmoldal();
        data = JSON.parse(data);
        $("#fileactual").val(data.fut_document);
        $("#idfut").val(data.idfut);
    })
}

init();


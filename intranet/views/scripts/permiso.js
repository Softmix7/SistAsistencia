var t;

function init() {
    listar();

}

function listar(){
    t=$('#example2').dataTable({
      "language": {
              "url": "./../resource/assest/datatables/es-ES.json"
      },
        responsive: !0,
        "aProcessing": true,
        "aServerSide": true,
        "lengthMenu": [5, 10, 25, 75, 100],
        "ajax":
                {
                    url: '../controllers/permiso.php?op=listar',
                    type : "get",
                    dataType : "json",                      
                    error: function(e){
                        console.log(e.responseText);    
                    }
                },
    "bDestroy": true,
    "iDisplayLength": 6,

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

init();
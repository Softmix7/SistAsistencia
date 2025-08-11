
function init() {
    $.post("./../controllers/period.php?op=listperiod",function(r){
        $("#cbanio").html(r);
        lblupdates();
    });
}


    $("#cbanio").change(function() {
        $("#cbanio option:selected").each(function() {
            seleccion = $(this).val();
            $("#anio_peo").val(seleccion);
            var anio_peo = $("#anio_peo").val();
            listgroup(anio_peo);
        });
        
    })

    function lblupdates() {
        $("#cbanio option:selected").each(function() {
            seleccion = $(this).val();
            $("#anio_peo").val(seleccion);
            var anio_peo = $("#anio_peo").val();

            $.post("./../controllers/welcome.php?op=listgroup&anio_peo=" + anio_peo,function(r){
                $("#lisgroup").html(r);
            });

            $.post("./../controllers/welcome.php?op=totalpeople&anio_peo=" + anio_peo,function(r){
                $("#totalpeople").html(r);
            });


            $.post("./../controllers/welcome.php?op=graphicsbar&anio_peo=" + anio_peo,function(r){
                $("#graphicsbar").html(r);
            });


        });
    }

    function listgroup(anio_peo) {

        $.post("./../controllers/welcome.php?op=listgroup&anio_peo=" + anio_peo,function(r){
            $("#lisgroup").html(r);
        });

        
        $.post("./../controllers/welcome.php?op=totalpeople&anio_peo=" + anio_peo,function(r){
            $("#totalpeople").html(r);
        });

            $.post("./../controllers/welcome.php?op=graphicsbar&anio_peo=" + anio_peo,function(r){
                $("#graphicsbar").html(r);
            });
            
        
    }


init();
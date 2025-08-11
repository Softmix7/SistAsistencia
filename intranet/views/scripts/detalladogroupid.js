var t;

function init() {
    viewform(false);
    lblupdates();
    tipocbsearch();
autocomplet();
    $.post("./../controllers/period.php?op=listperiod",function(r){
        $("#cbanio").html(r);
    });

    $.post("./../controllers/detalladogroupid.php?op=listgroupcard",function(r){
        $("#group_list").html(r);
    });

}


 
    $("#tipodoc_search").change(function() {
        $("#tipodoc_search option:selected").each(function() {
            seleccion = $(this).val();

            if (seleccion == "1") {
             $(".div-id").hide();
             $("#txtid").val("");
             $("#identificacion").val("");
             $("#view_pdf").html("");

            } else if (seleccion == "2") {
             $(".div-id").show();
              $("#txtid").val("");
              $("#identificacion").val("");
              $("#view_pdf").html("");

            }  else {
             $(".div-id").hide();
              $("#txtid").val("");
              $("#identificacion").val("");
              $("#view_pdf").html("");
            }

        });
    })

function tipocbsearch() {
        $("#tipodoc_search option:selected").each(function() {
            seleccion = $(this).val();

            if (seleccion == "1") {
             $(".div-id").hide();
             $("#txtid").val("");
             $("#identificacion").val("");
             $("#view_pdf").html("");

            } else if (seleccion == "2") {
             $(".div-id").show();
              $("#txtid").val("");
              $("#identificacion").val("");
              $("#view_pdf").html("");

            }  else {
             $(".div-id").hide();
              $("#txtid").val("");
              $("#identificacion").val("");
              $("#view_pdf").html("");
            }

        });
}


function cancelform(){
    viewform(false);
    clear();
}


function clear(){
    $("#datos1_peo").val("");
    $("#datos2_peo").val("");
    $("#date_end").val(new Date());
    $("#date_star").val(new Date());
    $("#timein").val("");
    $("#txtid").val("");
    $("#tipodoc_search").val("1");
    $("#identificacion").val("");
    $("#view_pdf").html("");
    $(".div-id").hide();
}

function viewdivlist(){
    $("#div-listgroup").hide();
    $("#div-liststudent").hide();
    $("#listhoys").show();
    $("#btnreturn").show();
    $("#divcbo").show();
}


function viewdivliststudent(){
    $("#div-listgroup").hide();
    $("#div-liststudent").show();
    $("#listhoys").hide();
    $("#btnreturn").show();
    $("#divcbo").show();
}

function viewdivliststudentget(){
    $("#div-listgroup").hide();
    $("#div-liststudent").hide();
    $("#listhoys").show();
    $("#btnreturn").show();
    $("#divcbo").hide();
}



function listgroupstudent(detalle_group){
    lblupdates();

    $("#tipo_peo").val(detalle_group);
    var anio_peoget = $("#anio_peo").val();

    var date_star = $("#date_star").val();
    var date_end = $("#date_end").val();
    var timein = $("#timein").val();
    var datos1_peo=    $("#datos1_peo").val();
    var datos2_peo=    $("#datos2_peo").val();


    if (detalle_group=="Estudiante") {

        $.post("./../controllers/detalladogroupid.php?op=listgroupstudent&anio_peoget="+anio_peoget,function(r){
            $("#table_groupstudent").html(r);
        });
        viewdivliststudent();

    }else{
    $("#lbltitle").html("Asistencia "+detalle_group+"s");
     viewdivlist();

    }
}

function getinput(tipo_peo,datos1_peo,datos2_peo,anio_peoget){

    var anio_peoget = $("#anio_peo").val();
    $("#tipo_peo").val(tipo_peo);
    $("#datos1_peo").val(datos1_peo);
    $("#datos2_peo").val(datos2_peo);

   $("#txtdatos1_peo").val(datos1_peo);
   $("#txtdatos2_peo").val(datos2_peo);
   $("#txttipo_peo").val(tipo_peo);

    var date_star = $("#date_star").val();
    var date_end = $("#date_end").val();
    var timein = $("#timein").val();

    $("#lbltitle").html("Asistencia Estudiantes"+" | "+ datos1_peo + " - " +datos2_peo); 

    viewdivliststudentget();
}




function viewform(flag){

    if (flag){
        lblupdates();
        sendvar();
        getinput();
        $("#listhoys").show();
        

    }else{
        $("#div-listgroup").show();
        $("#div-liststudent").hide();
        $("#listhoys").hide();
        $("#btnreturn").hide();
        $("#divcbo").hide();
    }
}

$("#cbanio").change(function() {
    $("#cbanio option:selected").each(function() {
        seleccion = $(this).val();
        $("#anio_peo").val(seleccion);
        var tipo_peoget = $("#tipo_peo").val();

        $("#date_end").val(new Date());
        $("#date_star").val(new Date());
        $("#view_pdf").html("");

        listgroupstudent(tipo_peoget);
    });

})

function lblupdates() {
    $("#cbanio option:selected").each(function() {
        seleccion = $(this).val();
        $("#anio_peo").val(seleccion);
        $("#view_pdf").html("");
    });
}



function sendvar(tipo_peo){
    $("#tipo_peo").val(tipo_peo);
    var tipoper=$("#tipo_peo").val();
}



function viewpdf(){
    var anio_peoget = $("#anio_peo").val();
    var date_star = $("#date_star").val();
    var date_end = $("#date_end").val();
    var tipo_peo = $("#tipo_peo").val();
    var datos1_peo = $("#datos1_peo").val();
    var datos2_peo = $("#datos2_peo").val();
    var timein = $("#timein").val();
    var identificacion = $("#identificacion").val();
      
      if (date_star==0) {
        alert("SELECCIONE FECHA STAR");
        $("#view_pdf").html("");
      }

      if(date_end==0){
        alert("SELECCIONE FECHA END");
        $("#view_pdf").html("");
      }



    if (identificacion==0) {
     $("#view_pdf").html('<embed src="../reports/detallegroup/rpt_detallegroup.php?&date_star='+date_star+'&date_end='+date_end+'&tipo_peo='+tipo_peo+'&datos1_peo='+datos1_peo+'&datos2_peo='+datos2_peo+'&timein='+timein+'&anio_peoget='+anio_peoget+'" type="application/pdf" width="100%" height="100%"></embed>');
    } else {
     $("#view_pdf").html('<embed src="../reports/detallegroup/rpt_detallegroupid.php?&date_star='+date_star+'&date_end='+date_end+'&timein='+timein+'&idpeople='+identificacion+'&anio_peoget='+anio_peoget+'" type="application/pdf" width="100%" height="100%"></embed>');
    }


}


function autocomplet(){

    $("#txtid").autocomplete({
        source: function (request, response) {
            var datos1_peo = $("#datos1_peo").val(); 
            var datos2_peo = $("#datos2_peo").val(); 
            var tipo_peo= $("#tipo_peo").val();

            $.ajax({
                url: "./../controllers/detalladogroupid.php?op=autocomplete",
                data: {datos1_peo:datos1_peo,datos2_peo:datos2_peo,tipo_peo:tipo_peo,q:request.term},
                type: "get",
                dataType: "json",
                success: function (data) {
                    response(data);
                },
            });
        },
        minLength: 1,
        select: function (event, ui) {
            event.preventDefault();
            $('#identificacion').val(ui.item.idpersonal);
            $('#txtid').val(ui.item.dni+' | '+ui.item.apellidos+'  '+ui.item.nombre);
        },
    });


    $("#txtid" ).on( "keydown", function( event ) {
        if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE ){
            $("#identificacion" ).val("");
        }
        if (event.keyCode==$.ui.keyCode.DELETE){
            $("#txtid" ).val("");
            $("#identificacion" ).val("");
        }
    });
}




init();


var t;
   var identificacion;

function init() {
    viewform(false);
    lblupdates();
     tipocbsearch();
autocomplet();
    $.post("./../controllers/period.php?op=listperiod",function(r){
        $("#cbanio").html(r);
    });

    $.post("./../controllers/listadogroup.php?op=listgroupcard",function(r){
        $("#group_list").html(r);
    });
    
    $("#date_star").change(listar);
    $("#date_end").change(listar);
    $("#txtid").keypress(listar);
    $("#identificacion").keypress(listar);
/*    $("#timein").change(listar);*/
}

$( "#txtid" ).change(function() {
  $( "#identificacion" ).keypress();
});


    $("#tipodoc_search").change(function() {
        $("#tipodoc_search option:selected").each(function() {
            seleccion = $(this).val();

            if (seleccion == "1") {
             $(".div-id").hide();
             $("#txtid").val("");
             $("#identificacion").val("");


            listar();
/*             $("#view_pdf").html("");*/

            } else if (seleccion == "2") {

             $(".div-id").show();
              $("#txtid").val("");
              $("#identificacion").val("");


 /*             $("#view_pdf").html("");*/
                listar();

            }  else {
             $(".div-id").hide();
              $("#txtid").val("");
              $("#identificacion").val("");
 /*             $("#view_pdf").html("");*/
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
/*             $("#view_pdf").html("");*/

            } else if (seleccion == "2") {
             $(".div-id").show();
              $("#txtid").val("");
              $("#identificacion").val("");
 /*             $("#view_pdf").html("");*/

            }  else {
             $(".div-id").hide();
              $("#txtid").val("");
              $("#identificacion").val("");
 /*             $("#view_pdf").html("");*/
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
    $("#tipodoc_search").val("1");
    $("#txtid").val("");
    $("#identificacion").val("");  
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
    /*var timein = $("#timein").val();*/
    var datos1_peo=    $("#datos1_peo").val();
    var datos2_peo=    $("#datos2_peo").val();
    var identificacion = $("#identificacion").val();


    $("#txttipo_peo").val(detalle_group);
    if (detalle_group=="Estudiante") {

                $.post("./../controllers/listadogroup.php?op=listgroupstudent&anio_peoget="+anio_peoget,function(r){
            $("#table_groupstudent").html(r);
        });
        viewdivliststudent();

    }else{

        $("#lbltitle").html("Asistencia "+detalle_group+"s");


        t = $('#kt_table_1').DataTable({
            "language": {
                "url": "./../resource/assest/datatables/es-ES.json"
            },
            responsive: !0,
            "aProcessing": true,
            "aServerSide": true,
            "lengthMenu": [5, 10, 25, 75, 100],

            "ajax": {
                url: './../controllers/listadogroup.php?op=listar',
                data: { date_star:date_star,date_end:date_end,tipo_peo:detalle_group,datos1_peo:datos1_peo,datos2_peo:datos2_peo,anio_peoget:anio_peoget,identificacion:identificacion},
                type: "get",
                dataType: "json",
                error: function(e) {
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
    "order": [[0, "asc"]],
})
     viewdivlist();

 }
}

function getinput(tipo_peo,datos1_peo,datos2_peo,anio_peoget){

    $("#tipo_peo").val(tipo_peo);
    $("#datos1_peo").val(datos1_peo);
    $("#datos2_peo").val(datos2_peo);

    var anio_peoget = $("#anio_peo").val();
    var tipo_peo = $("#tipo_peo").val();
    var date_star = $("#date_star").val();
    var date_end = $("#date_end").val();
    /*var timein = $("#timein").val();*/
    var datos1_peo = $("#datos1_peo").val();
    var datos2_peo = $("#datos2_peo").val();
    var identificacion = $("#identificacion").val();
   $("#txtdatos1_peo").val(datos1_peo);
   $("#txtdatos2_peo").val(datos2_peo);
   $("#txttipo_peo").val(tipo_peo);

    $("#lbltitle").html("Asistencia Estudiantes"+" | "+ datos1_peo + " - " +datos2_peo); 


        t = $('#kt_table_1').DataTable({
            "language": {
                "url": "./../resource/assest/datatables/es-ES.json"
            },
            responsive: !0,
            "aProcessing": true,
            "aServerSide": true,
            "lengthMenu": [5, 10, 25, 75, 100],

            "ajax": {
                url: './../controllers/listadogroup.php?op=listar',
                data: { date_star:date_star,date_end:date_end,tipo_peo:tipo_peo,datos1_peo:datos1_peo,datos2_peo:datos2_peo,anio_peoget:anio_peoget,identificacion:identificacion},
                type: "get",
                dataType: "json",
                error: function(e) {
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
    "order": [[0, "asc"]],
})

    viewdivliststudentget();
}



function listar(){
    var anio_peoget = $("#anio_peo").val();
    var tipo_peo = $("#tipo_peo").val();
    var date_star = $("#date_star").val();
    var date_end = $("#date_end").val();
    /*var timein = $("#timein").val();*/
                var datos1_peo = $("#datos1_peo").val();
                var datos2_peo = $("#datos2_peo").val();
                var identificacion = $("#identificacion").val();

        t = $('#kt_table_1').DataTable({
            "language": {
                "url": "./../resource/assest/datatables/es-ES.json"
            },
            responsive: !0,
            "aProcessing": true,
            "aServerSide": true,
            "lengthMenu": [5, 10, 25, 75, 100],

            "ajax": {
                url: './../controllers/listadogroup.php?op=listar',
                data: { date_star:date_star,date_end:date_end,tipo_peo:tipo_peo,datos1_peo:datos1_peo,datos2_peo:datos2_peo,anio_peoget:anio_peoget,identificacion:identificacion},
                type: "get",
                dataType: "json",
                error: function(e) {
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
    "order": [[0, "asc"]],
})
}


function autocomplet(){

    $("#txtid").autocomplete({
        source: function (request, response) {
            var datos1_peo = $("#txtdatos1_peo").val(); 
            var datos2_peo = $("#txtdatos2_peo").val(); 
            var tipo_peo= $("#txttipo_peo").val();

            $.ajax({
                url: "./../controllers/listadogroup.php?op=autocomplete",
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

        listgroupstudent(tipo_peoget);


    });

})

function lblupdates() {
    $("#cbanio option:selected").each(function() {
        seleccion = $(this).val();
        $("#anio_peo").val(seleccion);
    });
}



function sendvar(tipo_peo){
    $("#tipo_peo").val(tipo_peo);
    var tipoper=$("#tipo_peo").val();
}


function reportExceltime() {
    var anio_peoget = $("#anio_peo").val();
    var date_star = $("#date_star").val();
    var date_end = $("#date_end").val();
    var tipo_peo = $("#tipo_peo").val();
    var datos1_peo = $("#datos1_peo").val();
    var datos2_peo = $("#datos2_peo").val();
    var identificacion = $("#identificacion").val();
    /*var timein = $("#timein").val();*/
    VentanaCentrada('./../reports/listadogroup/rpt_listexcel_time.php?date_star='+date_star+'&date_end='+date_end+'&tipo_peo='+tipo_peo+'&datos1_peo='+datos1_peo+'&datos2_peo='+datos2_peo+'&anio_peoget='+anio_peoget+'&identificacion='+identificacion,'Reporte','','1024','768','true');  
}

function reportPdftime() {
    var anio_peoget = $("#anio_peo").val();
    var date_star = $("#date_star").val();
    var date_end = $("#date_end").val();
    var tipo_peo = $("#tipo_peo").val();
    var datos1_peo = $("#datos1_peo").val();
    var datos2_peo = $("#datos2_peo").val();
    var identificacion = $("#identificacion").val();
    /*var timein = $("#timein").val();*/
    VentanaCentrada('./../reports/listadogroup/rpt_listpdf_time.php?date_star='+date_star+'&date_end='+date_end+'&tipo_peo='+tipo_peo+'&datos1_peo='+datos1_peo+'&datos2_peo='+datos2_peo+'&anio_peoget='+anio_peoget+'&identificacion='+identificacion,'Reporte','','1024','768','true');  
}


function reportWordtime() {
    var anio_peoget = $("#anio_peo").val();
    var date_star = $("#date_star").val();
    var date_end = $("#date_end").val();
    var tipo_peo = $("#tipo_peo").val();
    var datos1_peo = $("#datos1_peo").val();
    var datos2_peo = $("#datos2_peo").val();
    var identificacion = $("#identificacion").val();
    /*var timein = $("#timein").val();*/
    VentanaCentrada('./../reports/listadogroup/rpt_listword_time.php?date_star='+date_star+'&date_end='+date_end+'&tipo_peo='+tipo_peo+'&datos1_peo='+datos1_peo+'&datos2_peo='+datos2_peo+'&anio_peoget='+anio_peoget+'&identificacion='+identificacion,'Reporte','','1024','768','true');  
}

function reportPrinttime() {
    var anio_peoget = $("#anio_peo").val();
    var date_star = $("#date_star").val();
    var date_end = $("#date_end").val();
    var tipo_peo = $("#tipo_peo").val();
    var datos1_peo = $("#datos1_peo").val();
    var datos2_peo = $("#datos2_peo").val();
    var identificacion = $("#identificacion").val();
    /*var timein = $("#timein").val();*/


    if (date_star==0 || date_end==0) {
        alert('seleccione fecha');

    }else{

        
        $('#divprint').load('./../reports/listadogroup/rpt_listprint_time.php?date_star='+date_star+'&date_end='+date_end+'&tipo_peo='+tipo_peo+'&datos1_peo='+datos1_peo+'&datos2_peo='+datos2_peo+'&anio_peoget='+anio_peoget+'&identificacion='+identificacion,function(){
            var printContent = document.getElementById('divprint');
            var WinPrint = window.open('', '', 'width=1024,height=768');
            WinPrint.document.write(printContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        });

    }
}


init();


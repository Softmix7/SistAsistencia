var t;

function init() {
    viewform(false);
    lblupdates();

    $.post("./../controllers/period.php?op=listperiod",function(r){
        $("#cbanio").html(r);
    });

    $.post("./../controllers/detalladogroup.php?op=listgroupcard",function(r){
        $("#group_list").html(r);
    });
    $("#date_star").change(listar);
    $("#date_end").change(listar);
    $("#timein").change(listar);
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

                $.post("./../controllers/detalladogroup.php?op=listgroupstudent&anio_peoget="+anio_peoget,function(r){
            $("#table_groupstudent").html(r);
        });
        viewdivliststudent();

    }else{

        $("#lbltitle").html("Asistencia "+detalle_group+"s");
     $.post('./../controllers/detalladogroup.php?op=listar&date_star='+date_star+'&date_end='+date_end+'&tipo_peo='+detalle_group+'&datos1_peo='+datos1_peo+'&datos2_peo='+datos2_peo+'&timein='+timein+'&anio_peoget='+anio_peoget,function(r){
        $("#kt_table_1").html(r);
    });
     viewdivlist();

 }
}

function getinput(tipo_peo,datos1_peo,datos2_peo,anio_peoget){

    var anio_peoget = $("#anio_peo").val();
    $("#tipo_peo").val(tipo_peo);
    $("#datos1_peo").val(datos1_peo);
    $("#datos2_peo").val(datos2_peo);

    var date_star = $("#date_star").val();
    var date_end = $("#date_end").val();
    var timein = $("#timein").val();

    $("#lbltitle").html("Asistencia Estudiantes"+" | "+ datos1_peo + " - " +datos2_peo); 

    $.post('./../controllers/detalladogroup.php?op=listar&date_star='+date_star+'&date_end='+date_end+'&tipo_peo='+tipo_peo+'&datos1_peo='+datos1_peo+'&datos2_peo='+datos2_peo+'&timein='+timein+'&anio_peoget='+anio_peoget,function(r){
        $("#kt_table_1").html(r);
    });

    viewdivliststudentget();
}



function listar(){
    var anio_peoget = $("#anio_peo").val();
    var tipo_peo = $("#tipo_peo").val();
    var date_star = $("#date_star").val();
    var date_end = $("#date_end").val();
    var timein = $("#timein").val();
    var datos1_peo = $("#datos1_peo").val();
    var datos2_peo = $("#datos2_peo").val();

    $.post('./../controllers/detalladogroup.php?op=listar&date_star='+date_star+'&date_end='+date_end+'&tipo_peo='+tipo_peo+'&datos1_peo='+datos1_peo+'&datos2_peo='+datos2_peo+'&timein='+timein+'&anio_peoget='+anio_peoget,function(r){
        $("#kt_table_1").html(r);
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
    var timein = $("#timein").val();
    VentanaCentrada('./../reports/detallegroup/rpt_detalleexcel.php?date_star='+date_star+'&date_end='+date_end+'&tipo_peo='+tipo_peo+'&datos1_peo='+datos1_peo+'&datos2_peo='+datos2_peo+'&timein='+timein+'&anio_peoget='+anio_peoget,'Reporte','','1024','768','true');  
}

function reportPdftime() {
    var anio_peoget = $("#anio_peo").val();
    var date_star = $("#date_star").val();
    var date_end = $("#date_end").val();
    var tipo_peo = $("#tipo_peo").val();
    var datos1_peo = $("#datos1_peo").val();
    var datos2_peo = $("#datos2_peo").val();
    var timein = $("#timein").val();
    VentanaCentrada('./../reports/detallegroup/rpt_detallepdf.php?date_star='+date_star+'&date_end='+date_end+'&tipo_peo='+tipo_peo+'&datos1_peo='+datos1_peo+'&datos2_peo='+datos2_peo+'&timein='+timein+'&anio_peoget='+anio_peoget,'Reporte','','1024','768','true');  
}


function reportWordtime() {
    var anio_peoget = $("#anio_peo").val();
    var date_star = $("#date_star").val();
    var date_end = $("#date_end").val();
    var tipo_peo = $("#tipo_peo").val();
    var datos1_peo = $("#datos1_peo").val();
    var datos2_peo = $("#datos2_peo").val();
    var timein = $("#timein").val();
    VentanaCentrada('./../reports/detallegroup/rpt_detalleword.php?date_star='+date_star+'&date_end='+date_end+'&tipo_peo='+tipo_peo+'&datos1_peo='+datos1_peo+'&datos2_peo='+datos2_peo+'&timein='+timein+'&anio_peoget='+anio_peoget,'Reporte','','1024','768','true');  
}

function reportPrinttime() {
    var anio_peoget = $("#anio_peo").val();
    var date_star = $("#date_star").val();
    var date_end = $("#date_end").val();
    var tipo_peo = $("#tipo_peo").val();
    var datos1_peo = $("#datos1_peo").val();
    var datos2_peo = $("#datos2_peo").val();
    var timein = $("#timein").val();


    if (date_star==0 || date_end==0) {
        alert('seleccione fecha');

    }else{

        
        $('#divprint').load('./../reports/detallegroup/rpt_detalleprint.php?date_star='+date_star+'&date_end='+date_end+'&tipo_peo='+tipo_peo+'&datos1_peo='+datos1_peo+'&datos2_peo='+datos2_peo+'&timein='+timein+'&anio_peoget='+anio_peoget,function(){
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


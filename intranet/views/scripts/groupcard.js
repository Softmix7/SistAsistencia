var t;

function init() { 
    viewform(false);
    lblupdates();
    $("#htitle").html("AGREGAR");

    $.post("./../controllers/period.php?op=listperiod",function(r){
            $("#cbanio").html(r);
    });

    $.post("./../controllers/group.php?op=listgroupcard",function(r){
            $("#group_list").html(r);
    });
}



function cancelform(){
    viewform(false);
    clear();
}


function clear(){
    $("#txtdat1").val("");
    $("#txtdat2").val("");
    $("#txtid").val("");
}


function viewform(flag){

    if (flag){
        lblupdates();
        sendvar();
        $("#card_group").hide();
        $("#card_list").show();
        $("#btnreturn").show();

    }else{

        $("#card_group").show();
        $("#card_list").hide();
        $("#btnreturn").hide();
    }
}

    $("#cbanio").change(function() {
        $("#cbanio option:selected").each(function() {
            seleccion = $(this).val();
            $("#anio_peo").val(seleccion);
            var tipo_peoget = $("#tipo_peo").val();
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
   optioncb(tipoper);

}


function optioncb(tipoper){

    var studiante="Estudiante";

    if (tipoper == studiante) {
      $('#tipodoc_search').children().remove(); 
      $('#tipodoc_search').append($('<option>').val('2').text('Identificacion'));
      $('#tipodoc_search').append($('<option>').val('3').text('Datos I | Datos II'));

     $(".div-id").show();
     $(".div-dat").hide();
     clear();
    }

    if (tipoper != studiante){
      $('#tipodoc_search').children().remove(); 
      $('#tipodoc_search').append($('<option>').val('1').text('All'));
      $('#tipodoc_search').append($('<option>').val('2').text('Identificacion'));

     $(".div-dat").hide();
     $(".div-id").hide();
     clear();

    }
}

    $("#tipodoc_search").change(function() {
        $("#tipodoc_search option:selected").each(function() {
            seleccion = $(this).val();

            if (seleccion == "1") {
             $(".div-dat").hide();
             $(".div-id").hide();
            clear();

            } else if (seleccion == "2") {
             $(".div-dat").hide();
             $(".div-id").show();
              clear();

            }  else {
             $(".div-dat").show();
             $(".div-id").hide();
              clear();
            }

        });
    })

function cardpdf() {

    var tipo_peo = $("#tipo_peo").val();
    var anio_peo = $("#anio_peo").val();


    var fondoget = $("#txfondo").val();
    var cardfondo = fondoget.substring(1);
    var txletraget = $("#txletra").val();
    var cardtexto = txletraget.substring(1);


    var cboSelects = $("#tipodoc_search").val();
    var card1 = $("#txtdat1").val();
    var card2 = $("#txtdat2").val();
    var identificacion = $("#txtid").val();


        if (cboSelects=="1") {
            VentanaCentrada('../reports/card_other.php?&cardfondo=' + cardfondo + '&cardtexto=' + cardtexto +  '&card1=' + card1 + '&card2=' + card2+ '&tipo_peo=' + tipo_peo+ '&anio_peo=' + anio_peo, '', '1024', '768', 'true');
            clear();
        } 

        if (cboSelects=="3") {
            if (card1 == 0 && card2 == 0) {
                alert("Digite Datos"); 
            }else if (card1 != 0 && card2 == 0) {
                 alert("seleccione seccion");
            } else if(card1 == 0 && card2 != 0) {
                alert("seleccione grado");
            }else{
                VentanaCentrada('../reports/card_other.php?&cardfondo=' + cardfondo + '&cardtexto=' + cardtexto +  '&card1=' + card1 + '&card2=' + card2+ '&tipo_peo=' + tipo_peo+ '&anio_peo=' + anio_peo, '', '1024', '768', 'true');
                clear();
            }
        } 
 
        if (cboSelects == "2") {

            if (identificacion == 0) {
                alert("Digite N° de identificacion");
            } else {
                VentanaCentrada('./../reports/card_id.php?&cardfondo=' + cardfondo + '&cardtexto=' + cardtexto + '&identificacion=' + identificacion+ '&tipo_peo=' + tipo_peo+ '&anio_peo=' + anio_peo, '', '1024', '768', 'true');
                
            }
        }

}

init();


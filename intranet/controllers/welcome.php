<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();
}

require_once "../models/Graphics.php";
$BDobj = new graphics();


switch ($_GET["op"]){


	case 'totalpeople':

	$anio_peo=$_REQUEST['anio_peo'];

	$rspta=$BDobj->total_people($anio_peo);
    while ($reg = $rspta->fetch_object()){
	  echo '<h5 class="mb-2 mt-1">'.$reg->total.' Personal registrado</h5>';
	}
	break;



	case 'listgroup':

	$anio_peo=$_REQUEST['anio_peo'];

	$rspta=$BDobj->total_group($anio_peo);
	while ($reg = $rspta->fetch_object()){

	  echo' <div class="col-12 col-sm-6 col-md-3">
	          <div class="info-box">
	            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-plus"></i></span>
	            <div class="info-box-content">
	              <span class="info-box-text">'.$reg->tipo_peo.'</span>
	              <span class="info-box-number">
	                '.$reg->totalgroup.'
	                <small></small>
	              </span>
	            </div>

	          </div>
	        </div>';
	}

	break;

	case 'graphicsbar':

	$anio_peo=$_REQUEST['anio_peo'];

	$rsptachart= $BDobj->barchartabsence($anio_peo);

	$rspta=$BDobj->total_group($anio_peo);
	while ($reg = $rspta->fetch_object()){

	  echo'<div class="col-md-6">
          <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">12 '.$reg->tipo_peo. ' con mas faltas del año</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
            </div>
            <div class="card-body">
				<div id="'.$reg->tipo_peo.'" style="width: 100%; height: 500px;">
					<script language="javascript">
					am4core.ready(function() {

					am4core.useTheme(am4themes_animated);
					var chart = am4core.create("'.$reg->tipo_peo.'", am4charts.XYChart);
					chart.scrollbarX = new am4core.Scrollbar();

					chart.data = [';
					foreach ($rsptachart as $key ) {
					if ($reg->tipo_peo==$key['tipo_peo']) {

					       $nombre= $key['nombre'];
					       $total= $key['total_student'];
					echo '{
					  "country":"'.$nombre.'",
					  "visits":'.$total.',
							},';
					}

					};
					echo '];
					var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
					categoryAxis.dataFields.category = "country";
					categoryAxis.renderer.grid.template.location = 0;
					categoryAxis.renderer.minGridDistance = 30;
					categoryAxis.renderer.labels.template.horizontalCenter = "right";
					categoryAxis.renderer.labels.template.verticalCenter = "middle";
					categoryAxis.renderer.labels.template.rotation = 300;
					categoryAxis.tooltip.disabled = true;
					categoryAxis.renderer.minHeight = 110;

					var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
					valueAxis.renderer.minWidth = 5;

					var series = chart.series.push(new am4charts.ColumnSeries());
					series.sequencedInterpolation = true;
					series.dataFields.valueY = "visits";
					series.dataFields.categoryX = "country";
					series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
					series.columns.template.strokeWidth = 0;

					series.tooltip.pointerOrientation = "vertical";

					series.columns.template.column.cornerRadiusTopLeft = 10;
					series.columns.template.column.cornerRadiusTopRight = 10;
					series.columns.template.column.fillOpacity = 0.8;

					var hoverState = series.columns.template.column.states.create("hover");
					hoverState.properties.cornerRadiusTopLeft = 0;
					hoverState.properties.cornerRadiusTopRight = 0;
					hoverState.properties.fillOpacity = 1;

					series.columns.template.adapter.add("fill", function(fill, target) {
					  return chart.colors.getIndex(target.dataItem.index);
					});

					chart.cursor = new am4charts.XYCursor();

					});
					</script>
				</div>
            </div>
          </div>
        </div>';
	}

	break;

}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>QR | Softmix S.A.C</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

<?php 
date_default_timezone_set('America/Lima');

require_once "intranet/models/time_load.php";

$DBobj=new Timeactive();

  $rspta = $DBobj->listar_active();
  $reg=$rspta->fetch_object();
  $horain=$reg->horain_tim;
  $horafn=$reg->horafin_tim;

  $hoy_hora=date('H:i');

if ($hoy_hora>=$horain and $hoy_hora<$horafn) {

 ?>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="intranet/resource/index/css/vendor.min.css" rel="stylesheet" />
	<link href="intranet/resource/index/css/app.min.css" rel="stylesheet" />
	<link href='intranet/resource/plugins/sweetAlert/sweetalert2.min.css' rel='stylesheet' />

        <style type="text/css" media="screen">
            input[type="range"] {
                display: block;
                width: 100%;
            }

            input[type="text"] {
                display: block;
                width: 100%;
            }

			@media (max-width:767px){
				.margin-t{
					margin-top: 8px !important;
				}


				.margin-clock{
					font-size:50% !important;
					display: none;
				}

				 .reloj-rec{
						display:block !important;
					}
					
				.date-rec{
						display: none;
					}	
			}


.header.navbar-transparent .navbar-toggle {
    border-color: #ffffff00;
    background: rgb(0 0 0 / 250%);
}

.header.navbar-transparent .navbar-toggle .icon-bar {
    background: #ffffff;
}

.header.navbar-transparent.navbar-sm .brand-text, .header.navbar-transparent.navbar-sm .nav.navbar-nav > li > a {
  color: #FFFFFF;
}
.content {
  margin: 32px 0 40px;
  padding-top: 44px;
}
        </style>


	<link rel="stylesheet" type="text/css" href="intranet/resource/index/main/style.css" />
	<link href="intranet/resource/index/css/config.css" rel="stylesheet" />
	<link href="intranet/resource/index/css/date.css" rel="stylesheet" />
</head>

<body class="pace-done">
  
	<div id="header" class="header navbar navbar-transparent navbar-fixed-top navbar-expand-lg" style="background-color: var(--bs-body-color);color: #FFFFFF;">
		<div class="container">
			<a href="https://walink.co/15de4e" class="navbar-brand">
				<img src="intranet/resource/index/main/logo.png" alt="Softmix S.A.C" />
				<span class="brand-text">
					
				</span>
			</a>

			<button type="button" class="navbar-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#header-navbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<div class="collapse navbar-collapse" id="header-navbar">
				<div style="width: 100%;"><h2 class="text-center"><strong id="maquina-escribir5"></strong> </h2></div style="width: 100%;">
				<ul class="nav navbar-nav navbar-end">

					<li><a href="intranet/" target="_black"><i class="fas fa-user-tie" style="font-size: 14pt;"></i></a></li>
				</ul>
			</div>

		</div>
	</div>


<script>
<!--
document.write(unescape("%09%3Cdiv%20class%3D%22content%22%3E%0A%09%09%3Cdiv%20class%3D%22container%22%3E%0A%09%09%09%3Cdiv%20class%3D%22row%22%3E%0A%0A%09%09%09%09%3Cdiv%20class%3D%22col-xs-6%20col-xl-5%20%20%20col-xl-6%20col-sm-12%22%3E%0A%09%09%09%09%09%3Cdiv%20class%3D%22card%20text-center%20border-0%22%3E%0A%09%09%09%09%09%09%3Cdiv%20class%3D%22card-header%20fw-bold%20reloj-rec%22%3E%0A%09%09%09%09%09%09%09%3Cdiv%20id%3D%22countdown_rj%22%3E%0A%09%09%09%09%09%09%09%20%20%3Cdiv%20id%3D%27tiles_rj%27%3E%3C/div%3E%0A%09%09%09%09%09%09%09%20%20%3Cdiv%20class%3D%22labels%22%3E%0A%09%09%09%09%09%09%09%20%20%20%20%3Cli%20id%3D%22rhora%22%3EHora%3C/li%3E%0A%09%09%09%09%09%09%09%20%20%20%20%3Cli%20id%3D%22rmin%22%3EMin%3C/li%3E%0A%09%09%09%09%09%09%09%20%20%20%20%3Cli%20id%3D%22rsec%22%3ESeg%3C/li%3E%0A%09%09%09%09%09%09%09%20%20%3C/div%3E%0A%09%09%09%09%09%09%09%3C/div%3E%0A%09%09%09%09%09%09%3C/div%3E%20%0A%09%09%09%09%09%09%3Cdiv%20class%3D%22card-body%20margin-clock%22%20style%3D%22background%3A%20var%28--bs-light%29%3B%20font-size%3A85%25%3B%22%3E%0A%0A%09%09%09%09%09%09%09%3Cdiv%20id%3D%22clock%22%20class%3D%22clock%22%3E%0A%09%09%09%09%09%09%09%09%3Cdiv%20class%3D%22frame-face%22%3E%3C/div%3E%0A%09%09%09%09%09%09%09%09%3Cul%20class%3D%22minute-marks%22%3E%0A%09%09%09%09%09%09%09%09%09%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%0A%09%09%09%09%09%09%09%09%09%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%0A%09%09%09%09%09%09%09%09%09%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%0A%09%09%09%09%09%09%09%09%09%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%0A%09%09%09%09%09%09%09%09%09%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%0A%09%09%09%09%09%09%09%09%09%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%0A%09%09%09%09%09%09%09%09%09%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%0A%09%09%09%09%09%09%09%09%09%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%3Cli%3E%3C/li%3E%0A%09%09%09%09%09%09%09%09%3C/ul%3E%0A%0A%0A%09%09%09%09%09%09%09%09%3Cdiv%20class%3D%22digital-wrap%22%3E%0A%0A%09%09%09%09%09%09%09%09%09%3Cul%20class%3D%22digit-hours%22%3E%0A%09%09%09%09%09%09%09%09%09%09%3Cli%20class%3D%22hor%22%3E%3C/li%3E%0A%09%09%09%09%09%09%09%09%09%3C/ul%3E%0A%09%09%09%09%09%09%09%09%09%3Cul%20class%3D%22digit-minutes%22%3E%0A%09%09%09%09%09%09%09%09%09%09%3Cli%20class%3D%22min%22%3E%3C/li%3E%0A%09%09%09%09%09%09%09%09%09%3C/ul%3E%0A%09%09%09%09%09%09%09%09%09%3Cul%20class%3D%22digit-seconds%22%3E%0A%09%09%09%09%09%09%09%09%09%09%3Cli%20class%3D%22sec%22%3E%3C/li%3E%0A%09%09%09%09%09%09%09%09%09%3C/ul%3E%0A%09%09%09%09%09%09%09%09%3C/div%3E%0A%0A%0A%09%09%09%09%09%09%09%09%3Cul%20class%3D%22digits%22%3E%0A%09%09%09%09%09%09%09%09%09%3Cli%3E1%3C/li%3E%3Cli%3E2%3C/li%3E%3Cli%3E3%3C/li%3E%3Cli%3E4%3C/li%3E%3Cli%3E5%3C/li%3E%3Cli%3E6%3C/li%3E%0A%09%09%09%09%09%09%09%09%09%3Cli%3E7%3C/li%3E%3Cli%3E8%3C/li%3E%3Cli%3E9%3C/li%3E%3Cli%3E10%3C/li%3E%3Cli%3E11%3C/li%3E%3Cli%3E12%3C/li%3E%0A%09%09%09%09%09%09%09%09%3C/ul%3E%0A%09%09%09%09%09%09%09%09%3Cdiv%20class%3D%22hours-hand%20hand%22%20hours-hand%3E%3C/div%3E%0A%09%09%09%09%09%09%09%09%3Cdiv%20class%3D%22minutes-hand%20hand%22%20minutes-hand%3E%3C/div%3E%0A%09%09%09%09%09%09%09%09%3Cdiv%20class%3D%22seconds-hand%20hand%22%20seconds-hand%3E%3C/div%3E%0A%09%09%09%09%09%09%09%3C/div%3E%0A%09%09%09%09%09%09%3C/div%3E%0A%09%09%09%09%09%09%3Cdiv%20class%3D%22card-footer%20fw-bold%20date-rec%22%20%3E%0A%09%09%09%09%09%09%09%3Cdiv%20id%3D%22countdown%22%3E%0A%09%09%09%09%09%09%09%20%20%3Cdiv%20id%3D%27tiles%27%3E%3C/div%3E%0A%09%09%09%09%09%09%09%20%20%3Cdiv%20class%3D%22labels%22%3E%0A%09%09%09%09%09%09%09%20%20%20%20%3Cli%20id%3D%22rdia%22%3EDia%3C/li%3E%0A%09%09%09%09%09%09%09%20%20%20%20%3Cli%20id%3D%22rmes%22%3EMes%3C/li%3E%0A%09%09%09%09%09%09%09%20%20%20%20%3Cli%20id%3D%22ranio%22%3EA%F1o%3C/li%3E%0A%09%09%09%09%09%09%09%20%20%3C/div%3E%0A%09%09%09%09%09%09%09%3C/div%3E%0A%09%09%09%09%09%09%3C/div%3E%0A%09%09%09%09%09%3C/div%3E%0A%09%09%09%09%3C/div%3E%0A%0A%0A%09%09%09%09%3Cdiv%20class%3D%22col-xs-6%20col-xl-6%20col-sm-12%20%20margin-t%22%20%3E%0A%09%09%09%09%09%3Cdiv%20class%3D%22card%20text-center%20border-0%22%3E%0A%09%09%09%09%09%09%3Cdiv%20class%3D%22card-header%20fw-bold%22%20style%3D%22background-image%3A%20linear-gradient%28to%20top%2C%20%23222%2C%20%23333%2C%20%23333%2C%20%23222%29%3B%20%22%3E%0A%09%09%09%09%09%09%09%3Cdiv%20class%3D%22subscription-form%22%3E%0A%09%09%09%09%09%09%09%09%3Cform%20name%3D%22form_identification%22%20id%3D%22form_identification%22%20method%3D%22POST%22%3E%0A%09%09%09%09%09%09%09%09%09%3Cdiv%20class%3D%22input-group%20form-control-sm%22%3E%0A%09%09%09%09%09%09%09%09%09%09%3Cinput%20type%3D%22text%22%20class%3D%22form-control%22%20%20name%3D%22identificacion%22%20id%3D%22identificacion%22%20placeholder%3D%22Digite%20Identificacion%22%20%3E%0A%09%09%09%09%09%09%09%09%09%09%3Cbutton%20type%3D%22submit%22%20class%3D%22btn%20btn-info%22%20id%3D%22btnSave%22%3E%3Ci%20class%3D%22fa%20fa-angle-right%22%3E%3C/i%3E%3C/button%3E%0A%09%09%09%09%09%09%09%09%09%3C/div%3E%0A%09%09%09%09%09%09%09%09%3C/form%3E%0A%09%09%09%09%09%09%09%3C/div%3E%0A%09%09%09%09%09%09%3C/div%3E%0A%09%09%09%09%09%09%3Cdiv%20class%3D%22card-body%22%20style%3D%22background%3A%20var%28--bs-light%29%3B%22%3E%0A%0A%09%09%09%09%09%09%09%3Cdiv%20class%3D%22well%22%20style%3D%22position%3A%20relative%3B%20display%3A%20inline-block%3B%22%3E%0A%09%09%09%09%09%09%09%09%3Ccanvas%20width%3D%22320%22%20height%3D%22240%22%20id%3D%22webcodecam-canvas%22%3E%3C/canvas%3E%0A%09%09%09%09%09%09%09%09%3Cdiv%20class%3D%22scanner-laser%20laser-rightBottom%22%20style%3D%22opacity%3A%200.5%3B%22%3E%3C/div%3E%0A%09%09%09%09%09%09%09%09%3Cdiv%20class%3D%22scanner-laser%20laser-rightTop%22%20style%3D%22opacity%3A%200.5%3B%22%3E%3C/div%3E%0A%09%09%09%09%09%09%09%09%3Cdiv%20class%3D%22scanner-laser%20laser-leftBottom%22%20style%3D%22opacity%3A%200.5%3B%22%3E%3C/div%3E%0A%09%09%09%09%09%09%09%09%3Cdiv%20class%3D%22scanner-laser%20laser-leftTop%22%20style%3D%22opacity%3A%200.5%3B%22%3E%3C/div%3E%0A%09%09%09%09%09%09%09%3C/div%3E%0A%0A%09%09%09%09%09%09%09%3Cdiv%20class%3D%22%22%20style%3D%22width%3A%20100%25%3B%20padding%3A%200px%3B%20margin-top%3A%20-8px%3B%22%3E%0A%09%09%09%09%09%09%09%09%3Cinput%20id%3D%22zoom%22%20onchange%3D%22Page.changeZoom%28%29%3B%22%20type%3D%22range%22%20min%3D%2210%22%20max%3D%2230%22%20value%3D%2220%22%20/%3E%0A%09%09%09%09%09%09%09%3C/div%3E%0A%09%09%09%09%09%09%09%3C%21--%20BUTTOOM%20HIDE%20--%3E%0A%09%09%09%09%09%09%09%3Cdiv%20class%3D%22%22%20style%3D%22width%3A%20100%25%3B%22%3E%0A%09%09%09%09%09%09%09%09%3Cselect%20class%3D%22form-control%22%20id%3D%22camera-select%22%20style%3D%22width%3A%20100%25%3B%22%3E%3C/select%3E%0A%09%09%09%09%09%09%09%09%3Cdiv%20class%3D%22form-group%22%20style%3D%22display%3A%20none%3B%22%3E%0A%09%09%09%09%09%09%09%09%09%3Cinput%20id%3D%22image-url%22%20type%3D%22text%22%20class%3D%22form-control%22%20placeholder%3D%22Image%20url%22%20/%3E%0A%09%09%09%09%09%09%09%09%09%3Cbutton%20title%3D%22Decode%20Image%22%20class%3D%22btn%20btn-default%20btn-sm%22%20id%3D%22decode-img%22%20type%3D%22button%22%20data-toggle%3D%22tooltip%22%3E%3Cspan%20class%3D%22glyphicon%20glyphicon-upload%22%3E%3C/span%3E%3C/button%3E%0A%09%09%09%09%09%09%09%09%09%3Cbutton%20title%3D%22Image%20shoot%22%20class%3D%22btn%20btn-info%20btn-sm%20disabled%22%20id%3D%22grab-img%22%20type%3D%22button%22%20data-toggle%3D%22tooltip%22%3E%3Cspan%20class%3D%22glyphicon%20glyphicon-picture%22%3E%3C/span%3E%3C/button%3E%0A%09%09%09%09%09%09%09%09%09%3Cbutton%20title%3D%22Play%22%20class%3D%22btn%20btn-success%20btn-sm%22%20id%3D%22play%22%20type%3D%22button%22%20data-toggle%3D%22tooltip%22%3E%3Cspan%20class%3D%22glyphicon%20glyphicon-play%22%3E%3C/span%3E%3C/button%3E%0A%09%09%09%09%09%09%09%09%09%3Cbutton%20title%3D%22Pause%22%20class%3D%22btn%20btn-warning%20btn-sm%22%20id%3D%22pause%22%20type%3D%22button%22%20data-toggle%3D%22tooltip%22%3E%3Cspan%20class%3D%22glyphicon%20glyphicon-pause%22%3E%3C/span%3E%3C/button%3E%0A%09%09%09%09%09%09%09%09%09%3Cbutton%20title%3D%22Stop%20streams%22%20class%3D%22btn%20btn-danger%20btn-sm%22%20id%3D%22stop%22%20type%3D%22button%22%20data-toggle%3D%22tooltip%22%3E%3Cspan%20class%3D%22glyphicon%20glyphicon-stop%22%3E%3C/span%3E%3C/button%3E%0A%09%09%09%09%09%09%09%09%3C/div%3E%0A%09%09%09%09%09%09%09%3C/div%3E%0A%0A%09%09%09%09%09%09%09%3C%21--%20ZOOM%20HIDE%20--%3E%0A%09%09%09%09%09%09%09%3Cdiv%20class%3D%22well%22%20style%3D%22width%3A%20100%25%3B%20display%3A%20none%3B%22%3E%0A%09%09%09%09%09%09%09%09%3Clabel%20id%3D%22zoom-value%22%20width%3D%22100%22%3EZoom%3A%202%3C/label%3E%0A%09%09%09%09%09%09%09%09%3Cinput%20id%3D%22zoom%22%20onchange%3D%22Page.changeZoom%28%29%3B%22%20type%3D%22range%22%20min%3D%2210%22%20max%3D%2230%22%20value%3D%2220%22%20/%3E%0A%09%09%09%09%09%09%09%09%3Clabel%20id%3D%22brightness-value%22%20width%3D%22100%22%3EBrightness%3A%200%3C/label%3E%0A%09%09%09%09%09%09%09%09%3Cinput%20id%3D%22brightness%22%20onchange%3D%22Page.changeBrightness%28%29%3B%22%20type%3D%22range%22%20min%3D%220%22%20max%3D%22128%22%20value%3D%220%22%20/%3E%0A%09%09%09%09%09%09%09%09%3Clabel%20id%3D%22contrast-value%22%20width%3D%22100%22%3EContrast%3A%200%3C/label%3E%0A%09%09%09%09%09%09%09%09%3Cinput%20id%3D%22contrast%22%20onchange%3D%22Page.changeContrast%28%29%3B%22%20type%3D%22range%22%20min%3D%220%22%20max%3D%2264%22%20value%3D%220%22%20/%3E%0A%09%09%09%09%09%09%09%09%3Clabel%20id%3D%22threshold-value%22%20width%3D%22100%22%3EThreshold%3A%200%3C/label%3E%0A%09%09%09%09%09%09%09%09%3Cinput%20id%3D%22threshold%22%20onchange%3D%22Page.changeThreshold%28%29%3B%22%20type%3D%22range%22%20min%3D%220%22%20max%3D%22512%22%20value%3D%220%22%20/%3E%0A%09%09%09%09%09%09%09%09%3Clabel%20id%3D%22sharpness-value%22%20width%3D%22100%22%3ESharpness%3A%20off%3C/label%3E%0A%09%09%09%09%09%09%09%09%3Cinput%20id%3D%22sharpness%22%20onchange%3D%22Page.changeSharpness%28%29%3B%22%20type%3D%22checkbox%22%20/%3E%0A%09%09%09%09%09%09%09%09%3Clabel%20id%3D%22grayscale-value%22%20width%3D%22100%22%3Egrayscale%3A%20off%3C/label%3E%0A%09%09%09%09%09%09%09%09%3Cinput%20id%3D%22grayscale%22%20onchange%3D%22Page.changeGrayscale%28%29%3B%22%20type%3D%22checkbox%22%20/%3E%0A%09%09%09%09%09%09%09%09%3Cbr%20/%3E%0A%09%09%09%09%09%09%09%09%3Clabel%20id%3D%22flipVertical-value%22%20width%3D%22100%22%3EFlip%20Vertical%3A%20off%3C/label%3E%0A%09%09%09%09%09%09%09%09%3Cinput%20id%3D%22flipVertical%22%20onchange%3D%22Page.changeVertical%28%29%3B%22%20type%3D%22checkbox%22%20/%3E%0A%09%09%09%09%09%09%09%09%3Clabel%20id%3D%22flipHorizontal-value%22%20width%3D%22100%22%3EFlip%20Horizontal%3A%20off%3C/label%3E%0A%09%09%09%09%09%09%09%09%3Cinput%20id%3D%22flipHorizontal%22%20onchange%3D%22Page.changeHorizontal%28%29%3B%22%20type%3D%22checkbox%22%20/%3E%0A%09%09%09%09%09%09%09%3C/div%3E%0A%09%09%09%09%09%09%3C/div%3E%0A%09%09%09%09%09%09%3Cdiv%20id%3D%22listadomarc%22%20class%3D%22card-footer%20fw-bold%22%20style%3D%22background-image%3A%20linear-gradient%28to%20top%2C%20%23222%2C%20%23333%2C%20%23333%2C%20%23222%29%3B%20color%3A%23FFFFFF%3B%22%3E%0A%3C%21--%20%09%09%09%09%09%09%09%3Ch4%20class%3D%22text-center%22%20style%3D%22float%3A%20none%3B%22%3ECarhuapoma%20Huaman%20Jose%20%7C%20INGRESO%2012%3A45%20%3C/h4%3E%20--%3E%0A%09%09%09%09%09%09%3C/div%3E%0A%09%09%09%09%09%3C/div%3E%0A%09%09%09%09%3C/div%3E%0A%0A%0A%09%09%09%3C/div%3E%0A%09%09%3C/div%3E%0A%09%3C/div%3E"));
//-->
</script>

    <audio id="audio" class="audio" controls style="display: none;"><source src="intranet/resource/index/main/tic-tac.mp3" type="audio/mp3" /></audio>

<script>
<!--
document.write(unescape("%09%3Cdiv%20id%3D%22footer-copyright%22%20class%3D%22footer-copyright%22%3E%0A%09%09%3Cdiv%20class%3D%22container%22%3E%0A%09%09%09%3Cdiv%20class%3D%22row%22%3E%0A%09%09%09%09%3Cdiv%20class%3D%22col-md-6%22%3E%0A%09%09%09%09%09%26copy%3B%202019%20-%202023%20Softmix S.A.C%20All%20Right%20Reserved%0A%09%09%09%09%3C/div%3E%0A%09%09%09%09%3Cdiv%20class%3D%22col-md-6%20text-md-end%22%3E%0A%09%09%09%09%09%3Ca%20href%3D%22https%3A//walink.co/15de4e%22%20target%3D%22_black%22%20class%3D%22me-4%22%3EContacto%3C/a%3E%0A%3C%21--%20%09%09%09%09%09%3Ca%20href%3D%22%23%22%3EKnowledge%20Base%3C/a%3E%20--%3E%0A%09%09%09%09%3C/div%3E%0A%09%09%09%3C/div%3E%0A%09%09%3C/div%3E%0A%09%3C/div%3E"));
//-->
</script>

	<script type="text/javascript" src="intranet/resource/index/main/jquery.min.v3.2.1.js"></script>

	<script src="intranet/resource/index/js/vendor.min.js" type="e93875cb5a3d1c2140792eba-text/javascript"></script>
	<script src="intranet/resource/index/js/app.min.js" type="e93875cb5a3d1c2140792eba-text/javascript"></script>
	<script type="e93875cb5a3d1c2140792eba-text/javascript">
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-53034621-1', 'auto');
		ga('send', 'pageview');

	</script>
	<script src="intranet/resource/index/js/rocket-loader.min.js" data-cf-settings="e93875cb5a3d1c2140792eba-|49" defer=""></script>

  <script src="intranet/resource/plugins/sweetAlert/sweetalert2.min.js" type="text/javascript"></script>
  <script src="intranet/views/scripts/form_id.js" type="text/javascript"></script>


	<script type="text/javascript" src="intranet/resource/index/main/filereader.js"></script>
	<script type="text/javascript" src="intranet/resource/index/main/qrcodelib.js"></script>
	<script type="text/javascript" src="intranet/resource/index/main/webcodecamjquery.js"></script>
	<script type="text/javascript" src="intranet/resource/index/main/mainjquery.min.js"></script>
	<script type="text/javascript" src="intranet/resource/index/main/clock.js"></script>
<!-- 	<script type="text/javascript" src="intranet/resource/index/js/date.js"></script> -->
</body>

<?php 

	
} else {
?>

<head>
<!-- Favicon icon -->
    <link rel="icon" href="/mdv-tramite/img/mdv.ico" type="image/x-icon" />
    <!-- fontawesome icon -->
	<link rel="stylesheet" href="intranet/resource/consulta/fonts/fontawesome/css/fontawesome-all.min.css" />
	<!-- animation css -->
	<link rel="stylesheet" href="intranet/resource/consulta/plugins/animation/css/animate.min.css" />
    <!-- vendor css -->
    <link rel="stylesheet" href="intranet/resource/consulta/css/style.css" />
</head>
<body>
<br>
<br>
<div class="wrapper animsition">
	<div class="container">
		<div class="hero-content app-hero-content text-center">
			<div class="row justify-content-md-center">
				<div class="col-md-10">
					<h1 class="wow fadeInUp" data-wow-delay="0s" style="color: #2863AD;">&nbsp;&nbsp;</h1>
				</div>
				<div class="col-md-12">
					<div class="hero-image">
						&nbsp;&nbsp;
					</div>
				</div>
			</div>
		</div>
	</div>
</div>





		<div class="main" id="main">

            <div class="hero-section app-hero">
                <div class="container">
                    <div class="hero-content app-hero-content text-center">
            			<br>
            			<br>	        
						<i class="feather icon-alert-triangle text-c-yellow f-80"></i>
						
                        <div class="row justify-content-md-center"> 
                            <div class="col-md-12">
				            <h2 class="text-muted mb-4">REGISTRO DE ASISTENCIAS.</h2>
				            <h3>Estimados usuarios, el sistema esta habilitado apartir de <span class=" text-danger"><?php echo Date('g:i A',strtotime($horain)); ?> </span> hasta las <span class=" text-danger"><?php echo Date('g:i A',strtotime($horafn)); ?></span> </p>
				            <p><span class=" text-primary" ></span> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
				           
		</div>


</body>

<?php 
}

 ?>
</html>



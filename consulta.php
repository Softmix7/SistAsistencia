<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Municipalidad Distrital de Ventanilla"/>
	<meta name="keywords" content="" />
	<meta name="author" content="iOni" />
	<title>SIS - TRAMITE</title>
	 
    <!-- Favicon icon -->
    <link rel="icon" href="resource/img/mdv.ico" type="image/x-icon" />
    <!-- fontawesome icon -->
	<link rel="stylesheet" href="intranet/resource/consulta/fonts/fontawesome/css/fontawesome-all.min.css" />
	<!-- animation css -->
	<link rel="stylesheet" href="intranet/resource/consulta/plugins/animation/css/animate.min.css" />
    <!-- Smart Wizard css -->
    <link rel="stylesheet" href="intranet/resource/consulta/plugins/smart-wizard/css/smart_wizard.min.css" />
    <link rel="stylesheet" href="intranet/resource/consulta/plugins/smart-wizard/css/smart_wizard_theme_arrows.min.css" />
    <link rel="stylesheet" href="intranet/resource/consulta/plugins/smart-wizard/css/smart_wizard_theme_circles.min.css" />
    <link rel="stylesheet" href="intranet/resource/consulta/plugins/smart-wizard/css/smart_wizard_theme_dots.min.css" />
	<link rel="stylesheet" href="intranet/resource/consulta/plugins/select21/css/select2.css" />
	<link rel="stylesheet" href="intranet/resource/consulta/plugins/select21/css/select2-bootstrap4.min.css" />
<!-- 	<link rel="stylesheet" href="admin/resource/assets/js/pages/components/extended/sweetalert2.min.css"  type="text/css" /> -->
      <link rel="stylesheet" href="intranet/resource/consulta/plugins/sweetalert/js/sweetalert2.min.css" id="theme-styles">	        	
    <!-- vendor css -->
    <link rel="stylesheet" href="intranet/resource/consulta/css/style.css" />
     <link rel="stylesheet" href="intranet/resource/consulta/plugins/waitMe/waitMe.min.css" />

    
	<script src="intranet/resource/plugins/jquery/js/jquery.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
 <style>
 
.efecto_icononos:hover {
    /*   border: 1px solid #1C6EA4; */
    border-radius: 5px 5px 5px 5px;
    -webkit-box-shadow: 0px 0px 21px -4px rgba(37, 59, 68, 1);
    -moz-box-shadow: 0px 0px 21px -4px rgba(37, 59, 68, 1);
    box-shadow: 0px 0px 21px -4px rgba(37, 59, 68, 1);
}

 .img-thumbnail {
    display: inline-block;
    max-width: 100%;
    height: auto;
    padding: 4px;
    line-height: 1.42857143;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
}	


.table td, .table th {
    padding: 0.30rem;
}

.popover-modal .popover-body {
    overflow: hidden;
    padding: 1em;
}


.captcha {
    width: 100%;
    clear: both;
    display: inherit;
    border: 1px solid #ddd;
    padding: 10px;
    background-color: #f6f6f6;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}

 </style> 

</head>
<body>
	<br>
	<br>

		<div class="main" id="main">			
            <div class="hero-section app-hero">
                <div class="container">
                    <div class="hero-content app-hero-content text-center">
                        <div class="row justify-content-md-center">
                            <div class="col-md-10">
                                <h1 class="wow fadeInUp" data-wow-delay="0s" style="color: #2863AD;">SOLICITUD DE ASISTENCIAS</h1>
                            </div>
                            <div class="col-md-12">
                                <div class="hero-image" id="imglogo" name="imglogo" style="font-size: 18pt;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

			<div class="services-section " id="services">
                <div class="container">
                    <div class="">
						<div class="row">
							<div class="col-sm-12">
								<br>                                                                                
								<p><span style="color: #0054A5" id="lblfecha"></span> </p>
								<hr>
								<br>
								<div class="row">
									<div class="col-sm-9" id="dinform">

										<form  name="formulario" id="formulario" method="POST">
											<input type="hidden" name="idInt" id="idInt">
											<input type="hidden" name="ipStr" id="ipStr">
	
											<div id="smartwizard">
				                                <ul>
				                                                   
				                                    <li><a href="#step-0">
				                                            <h6>Paso 1</h6>
				                                            <p class="m-0">Registro de datos personales</p>
				                                        </a>
				                                    </li>
				                                    <li><a href="#step-1">
				                                           <h6>Paso 2</h6>
				                                            <p class="m-0">Registro de datos de solicitud</p>
				                                        </a>
				                                    </li>
				                                </ul>

												<div>
													
													<div id="step-0">
													    <fieldset>
													        <legend>Datos de Persona</legend>

													        <p class="text-danger"><i class="feather icon-chevrons-right text-c-red f-10"></i> Recuerde colocar un correo electrónico que utilice con frecuencia debido a que nos mantendremos en contacto con usted.</p>
													        <br />


													        <div class="form-row PN">
													            <div class="form-group col-md-2">
													                <label>DNI / Carnet Ext.</label> 
													                <input type="hidden" name="iduserform" id="iduserform" maxlength="100" >
													                <input type="text" class="form-control input-number" placeholder="DNI / Carnet Ext." name="numeroDocDNIStr" id="numeroDocDNIStr" autocomplete="off" maxlength="10" />
													            </div>
													            <div class="form-group col-md-4">
													            	<label>Nombres</label> 
													            	<input type="text" class="form-control" placeholder="Nombres" name="nombresStr" id="nombresStr" autocomplete="off" maxlength="100" />
													            </div>

													            <div class="form-group col-md-3">
													                <label>Apellido Paterno</label>
													                <input type="text" class="form-control" placeholder="Apellido Paterno" name="apellidoPaternoStr" id="apellidoPaternoStr" autocomplete="off" maxlength="100" />
													            </div>
													            <div class="form-group col-md-3">
													                <label>Apellido Materno</label>
													                <input type="text" class="form-control" placeholder="Apellido Materno" name="apellidoMaternoStr" id="apellidoMaternoStr" autocomplete="off" maxlength="100" />
													            </div>
													        </div>


													        <div class="form-row">
													            <div class="form-group col-md-3">
													                <label>Teléfono</label>
													                <input type="text" class="form-control telefono" placeholder="Teléfono" name="telefonoStr" id="telefonoStr" autocomplete="off" maxlength="20" />
													            </div>
													            <div class="form-group col-md-3">
													                <label>Celular</label>
													                <input type="text" class="form-control celular" placeholder="Celular" name="celularStr" id="celularStr" autocomplete="off" maxlength="20" />
													            </div>
													            <div class="form-group col-md-6">
													                <label>Correo</label>
													                <input type="text" class="form-control" placeholder="Correo" name="correoStr" id="correoStr"  autocomplete="off" maxlength="100" />
													            </div>
													        </div>
													        <div class="form-group">
													            <label>Dirección</label>
													            <input type="text" class="form-control upper" placeholder="Dirección" name="direccionStr" id="direccionStr" autocomplete="off" maxlength="200" />
													        </div>
													    </fieldset>
													</div>

													<div id="step-1">
													    <fieldset>
													        <legend>Datos de Trámite</legend>

													        <p class="text-danger"><i class="feather icon-chevrons-right text-c-red f-10"></i> El archivo adjunto debe tener formato PDF y el tamaño máximo debe ser menor o igual a 10MB.<br /></p>

													        <div class="row">
													            <div class="col-sm-9">
													        <div class="form-row">
													            <div class="form-group col-md-12">
													                <label>Asunto</label> 
													                <input type="text" class="form-control upper" placeholder="asunto" name="asuntoStr" id="asuntoStr" autocomplete="off" maxlength="200" />
													            </div>

													        </div>



													        <div class="form-row">
													            <div class="form-group col-md-12">
													                <label>Descripcion</label> 
													                <textarea class="form-control" name="descripcionStr" id="descripcionStr"></textarea>
													            </div>

													        </div>


															<div class="form-row">
													            <div class="form-group col-md-12" id="table_refresh">
													                <label>Adjunto</label> 
																		<table class="table" id="dynamic_field">
																				<tr>
																					<td><input type="file" name="doc1Arr" id="doc1Arr" class="form-control zebra_tooltips_custom_width_more" title="El archivo adjunto debe tener formato PDF, y el tamaño máximo debe ser menor o igual a 10MB " accept=".pdf" > </td>
																				<td></td>
																				</tr>
																		</table>
													            </div>

															</div>

													                <div class="form-row">
													                    <div class="form-group col-md-9">
													                        <div class="text-center">
													                            <div class="form-group">
													                            	<div class="captcha">
																					<div class="g-recaptcha" data-sitekey="6LecwkonAAAAAAIxDC385hqTE0kKr07V5rzuVkw1"></div>
																					</div>
																						
													                            </div>
													                        </div>
													                    </div>
													                    <div class="form-group col-md-3">
													                        <div class="text-center">
													                            <button type="submit" id="btnsave" type="button" class="btn btn-primary mb-4"><i class="fas fa-paper-plane"></i>ENVIAR</button>
													                        </div>
													                    </div>
													                </div>
													            </div>

																<div class="col-sm-3">
																	<ul class="media-list p-0 ">
							                                            <li class="media d-flex m-b-15">
							                                                <div class="m-r-20 file-attach" id="fut" name="fut" >
							                                                                                                                                                                  
							                                                </div>
							                                                <div class="media-body">
							                                                    <a href="javascript:void(0)" class="m-b-5 text-primary" >
							                                                        Fomulario Único de Trámite (FUT)
							                                                        </a>
							                                                </div>
							                                            </li>

							                                        </ul>																
							                                    </div>
													        </div>
													    </fieldset>
													</div>
												</div>
											</div>
										</form>				
									</div>


									<div class="col-sm-3">
	                                    <div class="card Design-sprint" style="background-color: #0054A5">
	                                        <div class="card-block">
	                                        	<fieldset>

	                                        		<a href="javascript:void(0)">
												<img src="intranet/resource/files/IMPORTANTE-1-300x80.jpg" class="img-thumbnail efecto_icononos" style="width:100%;">
												</a>&nbsp;
		 	 											<legend class="text-white" ></legend>
			                                            <p class="text-white">* Recuerde que de existir alguna observación en su solicitud nuestra institución se mantendrá en contacto con usted.</p>
			                                            <p class="text-white" id="cellphone"></p>
			                                            <p class="text-white">* Una vez ingresada su solicitud, será notificado vía correo electrónico.</p> 
			                                            <p class="text-white" id="tel" name="tel"></p> 

		 	 									</fieldset>
	                                        </div>
	                                    </div>
									</div>	
								</div>                                           
							</div>														
						</div>														
					</div>
				</div>
			</div>
		</div>


	    <section>
			<input id="success" type="hidden" value=""/> 
			<input id="danger" type="hidden" value=""/>
			<input id="warning" type="hidden" value=""/>
			<input id="info" type="hidden" value=""/>
			
			<input id="msjSwalBasic" type="hidden" value=""/>
			<input id="msjSwalCancel" type="hidden" value=""/>
			<input id="msjSwalSuccess" type="hidden" value=""/>
			<input id="msjSwalWarning" type="hidden" value=""/>		
			<input id="msjSwalInfo" type="hidden" value=""/>		
			<input id="msjSwalError" type="hidden" value=""/>		
		</section>

	<script src="intranet/resource/consulta/js/vendor-all.js"></script>
	<script src="intranet/resource/consulta/js/pcoded.js"></script>
	
	<!-- message -->
	<script src="intranet/resource/consulta/js/util.js"></script>
	<script src="intranet/resource/consulta/plugins/sweetalert/js/sweetalert2.min.js"></script>
<!-- 	    <script src="admin/intranet/resource/consulta/assets/js/pages/components/extended/sweetalert2.min.js" type="text/javascript"></script> -->
			
    <!-- wizard Js -->
    <script src="intranet/resource/consulta/plugins/wizard/js/jquery.bootstrap.js"></script>
	<!-- Smart Wizard Js -->
	<script src="intranet/resource/consulta/plugins/smart-wizard/js/jquery.smartWizard.min.js"></script>

	<script src="intranet/resource/consulta/plugins/select21/js/select2.full.js"></script>
			
	<!-- Validate Js -->
	<script src="intranet/resource/consulta/plugins/jquery-validation/js/jquery.validate.min.js"></script>
	
   <!-- Input mask Js -->
   <script src="intranet/resource/consulta/plugins/inputmask/js/inputmask.min.js"></script> 
   <script src="intranet/resource/consulta/plugins/inputmask/js/jquery.inputmask.min.js"></script>
   <script src="intranet/resource/consulta/plugins/inputmask/js/autoNumeric.js"></script>

    <!-- Custom Js -->
    <script type="text/javascript" src="intranet/resource/consulta/js/frontend/js.js"></script>    
     <script type="text/javascript" src="intranet/views/scripts/consulta.js"></script>
     <script type="text/javascript" src="intranet/resource/consulta/plugins/waitMe/waitMe.min.js"></script>  



</body>

</html>


<?php 

ob_start();
session_start();

if (!isset($_SESSION["nombre"])){
    header("Location: login.html");
}else{
    if ($_SESSION['seguridad']==1){
      include 'headerIn.php';
?>

            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                   <!--              <h1>Contact us</h1> -->
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Seguridad</a></li>
                                    <li class="breadcrumb-item active">Backup</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content">
					<div class="container-fluid">

                    <div class="card">
                        <div class="card-body row">
                            <div class="col-5 text-center d-flex align-items-center justify-content-center">
                                <div class="">
                                    <h2><img src="../resource/files/maincode/backup.png" class="img-fluid"></h2>
                                    <p class="lead mb-5">
                                        Credenciales de la base de datos <br />
                                        
                                    </p>
                                </div>
                            </div>
                            <div class="col-7">
                            	<form  name="formulario" id="formulario" method="POST" action="../controllers/backup.php">

                                <div class="form-group">
                                    <label for="inputName">Servidor</label>
                                    <input type="text" id="server" name="server" class="form-control" placeholder="Ejemplo: localhost" />
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Usuario</label>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Ejemplo: root" />
                                </div>
                                <div class="form-group">
                                    <label for="inputSubject">Contraseña</label>
                                    <input type="text" id="password" name="password" class="form-control" placeholder="************" />
                                </div>
                                <div class="form-group">
                                    <label for="inputMessage">Base Datos</label>
                                    <textarea id="dbname" name="dbname" class="form-control" rows="2" placeholder="nombre de la base de datos a respaldar"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" id="backup" name="backup">Respaldo</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>
            </div>

<?php 
    require 'footerIn.php'; 
    }else{
        require 'error.php';
    } 
}
ob_end_flush();
?>
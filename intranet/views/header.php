<?php
if (strlen(session_id()) < 1) 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema QR | 2022</title>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../resource/assest/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../resource/assest/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../resource/assest/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../resource/assest/overlayScrollbars/css/OverlayScrollbars.min.css">

<style> 

.navbar-nav > .user-menu .user-image {
    float: left;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    margin-right: 10px;
    margin-top: 0px;

}

@media (max-width:767px){.hidden-xs{display:none!important}}
.pull-right{float:right!important}.pull-left{float:left!important}



</style>


</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm" data-panel-auto-height-mode="height">
<div class="wrapper">


  <nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <?php
          if ($_SESSION['calendar']==1){
              echo'
      <li class="nav-item  d-sm-inline-block">
            <a href="calendar.php" class="nav-link"><i class="nav-icon far fa-calendar-alt"></i> Calendario</a>

      </li>
                ';
           }
      ?>



    </ul>


    <ul class="navbar-nav ml-auto">

<?php 
date_default_timezone_set('America/Lima');

require_once "../models/Consultarec.php";

$Bj=new Consultarec();
$rspta = $Bj->cout_header();
$foundRows = $rspta->num_rows;

$rspta_list = $Bj->listar_header();


 ?>

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge"><?php echo $foundRows; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

<?php 

if ($foundRows==0) {
  echo '<a href="" class="dropdown-item dropdown-footer">No hay mensajes recientes</a>';
} else {
while ($reg=$rspta_list->fetch_object()){

echo ' 
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="../resource/files/load/sms.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  '.substr($reg->nombre. ' ' .$reg->ape_paterno .' '. $reg->ape_materno, 0, 20).'...
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">'.substr($reg->asunto, 0, 20).'...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>'.Date('g:i A d-m-Y',strtotime($reg->fecha)).' </p>
              </div>
            </div>
          </a>

          <div class="dropdown-divider"></div> 
          <a href="consultarec.php" class="dropdown-item dropdown-footer">Ver todos los mensajes</a>';
}
}
 ?>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>


      <li class="nav-item dropdown user user-menu">
        <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false">
                  <?php if (isset($_SESSION["idusuario"])){
                  echo '<img class="user-image" alt="User Image" src="../resource/files/usuarios/'.$_SESSION['imagen'].'" />';
                  }else{
                  echo '<img src="../resource/assest/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">';
                  }?>
          
          <span class="hidden-xs" ><?php echo $_SESSION['nombre']; ?></span>
        </a>

        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="margin-top: 10px;">
          <li class="user-header bg-dark" >

                  <?php if (isset($_SESSION["idusuario"])){
                  echo '<img class="img-circle img-circle elevation-2" alt="User Image" src="../resource/files/usuarios/'.$_SESSION['imagen'].'" />';
                  }else{
                  echo '<img src="../resource/assest/dist/img/user2-160x160.jpg" class="img-circle img-circle elevation-2" alt="User Image">';
                  }?>

            <p>
              <?php echo $_SESSION['nombre']; ?>
              <small><?php echo $_SESSION['cargo']; ?></small>
            </p>
          </li>


          <li class="user-footer">
            <div class="pull-left">
              <a href="#" class="btn btn-default btn-flat">Perfil</a>
            </div>
            <div class="pull-right">
              <a href="../controllers/usuario.php?op=salir" class="btn btn-default btn-flat">Salir</a>
            </div>
          </li>
        </ul>

      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-info elevation-4">

    <a href="#" class="brand-link navbar-info">
      <img src="../resource/assest/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ASISTENCIA QR</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
                  <?php if (isset($_SESSION["idusuario"])){
                  echo '<img class="img-circle elevation-2" alt="User Image" src="../resource/files/usuarios/'.$_SESSION['imagen'].'" />';
                  }else{
                  echo '<img src="../resource/assest/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">';
                  }?>

          
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nombre']; ?></a>
        </div>
      </div>

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav nav-pills nav-sidebar flex-column nav-legacy " data-widget="treeview" role="menu" data-accordion="false">

          <?php 
          if ($_SESSION['escritorio']==1){
              echo '<li class="nav-item">
                      <a href="welcome.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                          ESCRITORIO
                      </a>
                    </li>';
           }

          if ($_SESSION['configuraciones']==1){
              echo'<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs text-green" ></i>
              <p>
                Configuraciones
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="period.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Periodo</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="group.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grupos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="time_active.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sistema activo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="fut.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FUT</p>
                </a>
              </li>
            </ul>
          </li>';
           }

          if ($_SESSION['personal']==1){
              echo'<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie text-danger"></i>
              <p>
                Personal
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="people.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar personal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="importformat.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Importar Personal</p>
                </a>
              </li>

            </ul>
          </li>';
           }

          if ($_SESSION['card-qr']==1){
              echo'<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-qrcode" style="color: #FFFFFF;"></i>
              <p>
                Card QR
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="card_grop.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Generar CARD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="card.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Code-QR</p>
                </a>
              </li>

            </ul>
          </li>

                ';
           }

          if ($_SESSION['asistencias']==1){
              echo'<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list text-warning"></i>
              <p>
                Asistencias
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="assistance.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado Asistencias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="checkout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cerrar Dia</p>
                </a>
              </li>

            </ul>
          </li>

                ';
           }

          if ($_SESSION['reportes']==1){
              echo'          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie text-primary"></i>
              <p>
                Reportes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Detallado
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="detalladogroup.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Groups</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="detalladogroupid.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Groups Id</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Listado
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="listgroup.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Groups</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="listgroupid.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Groups Time</p>
                    </a>
                  </li>

                </ul>
              </li>
            </ul>
          </li> ';
           }

          if ($_SESSION['acceso']==1){
              echo'<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-lock text-info"></i>
              <p>
                Accesos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="usuario.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="roles.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>

            </ul>
          </li>';
           }
          ?>


          <li class="nav-header">MAS INFORMACION</li>

        <?php 
          if ($_SESSION['seguridad']==1){
              echo'<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-coins" style="color: #8AFF00;"></i>
              <p>
                Seguridad
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="backup.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Backup</p>
                </a>
              </li>
            </ul>
          </li>

                ';
           }

          if ($_SESSION['mensajes']==1){
              echo'<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope" style="color: #00AEFF;"></i>
              <p>
                Mensajes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="consultarec.php" class="nav-link">
                  <i class="far fa-circle nav-icon text-orange"></i>
                  <p>Pendientes</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="consultarech.php" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger" ></i>
                  <p>Rechazados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="consultaaten.php" class="nav-link">
                  <i class="far fa-circle nav-icon text-green"></i>
                  <p>Atendidos</p>
                </a>
              </li>
            </ul>
          </li>';
           }

        ?>

<!--           <li class="nav-header">AYUDA</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Manual</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://wa.link/g6yeaq" target="_blank" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Contacto</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.youtube.com/c/JoseCarhuapomaHuaman" target="_blank" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Others</p>
            </a>
          </li> -->

        </ul>
      </nav>
    </div>
  </aside>



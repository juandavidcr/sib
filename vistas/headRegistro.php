<?php 
  echo "sesion: ".session_id();
 ?>
 <!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Sistema Integral Bebeit </title>
		<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootswatch.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="estilo.css">
	</head>
    <body>

      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Bebeit</a>
            <img src="../imagenes/logo-bebeit.png" class="img-responsive" alt="logo">
          </div>
      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="#">Inicio <span class="sr-only">(current)</span></a></li>
              <li><a href="#contact">Contacto </a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Productos </a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Tienda </a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Redes sociales</a></li>
                </ul>
              </li>
            </ul>              
            <ul class="nav navbar-nav navbar-right">                                
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Empleados <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  
                  <li><a href="#">Centro de Servicio</a></li>
                  <li><a href="#">Ventas</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="registro.php">Registrarse</a></li>
                  <li><a href="logout.php">Salir</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form" role="search" action="buscar.php">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Busqueda">
              </div>
              <button type="submit" class="btn btn-default">Buscar</button>
            </form>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
<?php
include("almacen.php");   
?>


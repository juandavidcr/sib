<?php  
//session_start(); //catalogo.php
$_SESSION['idUsuario'];
//$_SESSION['idCliente'];
//$_SESSION['idCompra'];
//$_SESSION['idCepa'];
date_default_timezone_set ('America/Mexico_City');
//echo date(DATE_RSS);
error_reporting(0);
if (!($_SESSION['enLinea'])) {
    header('Location: ../login.php');
 }
 
?>
<html lang="es">
 <head>
 <title>
 		Lab. Micro-Biology
 </title>
 <meta charset="UTF-8"/>
 <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
 <link rel="stylesheet" href="estilo.css">
 <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
 <script type="text/javascript">
    function myFunction(){
    	alert("bienvenido a labcepas");
    }
 </script>
 </head>
 <body>
 <nav>
   <button class="btn btn-warning">
    <a href="index.php">Inicio</a> 
   </button>
   <button class="btn btn-default" rol="presentation"><a href="catalogo.php">Ver Catalogo</a> </button>
   <button class="btn btn-warning"><a href="registroCliente.php">Registrarse como Cliente</a> </button>
   
   <button class="btn btn-warning"><a href="logout.php">Salir</a> </button>
 </nav>
 <header>
 <h1>Colección de Cultivos Microbianos</h1>
 		 <p class="lead">
 	          Bienvenidos al catálogo de la: Colección Nacional Mexicana de Cepas Microbianas
 	           Cinvestav, México.
 	     </p>
 	    <a href="../admin/agregarCepa.php"> <img title="Admin?" onclick="myFunction();" src="../img/micro500.png" alt="logo"></a>
</header> 

 <!--Falta hacer catalogo.php, registroCepa.php,logout.php-->
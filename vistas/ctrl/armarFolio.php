<?php


if (isset($_GET['insertar']))
 {   

  $modPedidos = new Insertar();
  $modPedidos->folio_fabrica = htmlspecialchars($_GET['folio']);
  $modPedidos->fecha_folio = htmlspecialchars($_GET['fecha']);
  $modPedidos->numdeCajas = htmlspecialchars($_GET['numCaja']);
  $modPedidos->equipos = htmlspecialchars($_GET['total']);
  $modPedidos->insertFolio();
  $mensaje = $modPedidos->mensaje;
  echo "<script>Folio ingresado con exito!</script>";
 header('Location: ../almacen/entrada.php');
}
function getfecha(){
setlocale(LC_TIME,"America/Mexico/Mexico_City/es_MX");
date_default_timezone_set('UTC');
//echo $user;
$fecha = date("Y-m-d");
$a = localtime();
$a[4] += 1;
$a[5] += 1900;
//print "$a[5]-$a[4]-$a[3]";
return $fecha = "$a[5]-$a[4]-$a[3]"; echo "<br>";
}
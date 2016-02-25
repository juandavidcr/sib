<?php

 if (isset($_GET['pedidos']))
 {      
  $modPedido = new Insertar();
  $modPedido->folio = htmlspecialchars($_GET['folio']);
  $modPedido->fecha = htmlspecialchars($_GET['fecha']);
  $modPedido->numCaja = htmlspecialchars($_GET['numCaja']);
  $modPedido->proveedor = htmlspecialchars($_GET['proveedor']);
  $modPedido->tipoProd = htmlspecialchars($_GET['tipo']);
  $modPedido->usuario = htmlspecialchars($_GET['usuario']);
  $modPedido->numarticulos = htmlspecialchars($_GET['cantidad']);  
  $modPedido->idModelo = htmlspecialchars($_GET['modelos']);  
  $modPedido->insertPedidos();
  $mensaje = $modPedido->mensaje;
  header('Location: ../almacen/pedidos.php');
}
function fecha(){
  $a = localtime();
$a[4] += 1;
$a[5] += 1900;
return $fecha = "$a[5]-$a[4]-$a[3]"; 
}
?>
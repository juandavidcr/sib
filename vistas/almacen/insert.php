<?php

$folioF = $_POST['folioF']; // folio de fabrica
$modelo = $_POST['modelo']; //id Modelo
$fechaPedida = $_POST['fecha']; // fecha de llenado del pedido
$proveedor = $_POST['proveedor']; // id Proveedor
$color = $_POST['color'];  // color
$quantity = $_POST['cantidad']; // cantidad
$numCaja = $_POST['cajas']; // cantidad de cajas
$user = $_POST['usuario']; // usuario que llena el pedido

//$resto = $_POST['resto'];

echo "Caja " . $numCaja."\n";
echo "folio " . $folioF."\n";
echo "fecha del pedido " . $fechaPedida."\n";
echo "Numero de articulos" . $quantity."\n";
echo "Llenado por el usuario: ". $user ."\n";
echo "Clave de proveedor" . $proveedor."\n";
echo "Producto" . $product."\n";
echo "Modelo" . $modelo."\n";
echo "Color del producto".$color."\n";
echo "Resto del total es igual a: " .$resto."\n";


try{
    $pdo = new PDO('mysql:host=localhost;dbname=sib2', 'bebeit', 'admin');
    // echo "Si hizo la conexion";
 }catch(PDOException $e){
    echo 'Error al conectarse con la base de datos: ' . $e->getMessage();
    exit;
 }

//$queryPedidos = mysql_query('INSERT INTO pedi')

?>
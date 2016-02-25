<?php
include_once '../../ctrl/sql/Insertar.php';
include_once '../../ctrl/sql/Conexion.php';
if (isset($_GET['enviar']))
{      
  $modProveedores = new Insertar();
  $modProveedores->nombreProveedor = htmlspecialchars($_GET['nombreProveedor']);
  $modProveedores->tipoProducto = htmlspecialchars($_GET['tipoProducto']);
  $modProveedores->modelo = htmlspecialchars($_GET['modelo']);
  $modProveedores->color = htmlspecialchars($_GET['color']);         
  $modProveedores->insertProveedores();
  $mensaje = $modProveedores->mensaje;
         // header('Location: proveedores.php');
}
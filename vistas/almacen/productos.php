<?php
session_start();
if (isset($_GET['insertar'])) 
{
  $nombreProveedor = $_GET['proveedor'];
}
require("../PHP/conexion2.php"); 
//$result2 = mysqli_query($enlace_sib3,"SELECT * FROM Productos ORDER BY idProducto DESC");
$result4modelos =  mysqli_query($enlace_sib3,"SELECT nombre FROM modelos ORDER BY nombre ASC");
include "../PHP/header.php";
require("../../ctrl/sql/Insertar.php");
require("../../ctrl/sql/Conexion.php");
if (isset($_GET['enviarModelo']))
{      
  $modModelos = new Insertar();
  $modModelos->brand = htmlspecialchars($_GET['marca']);
  $modModelos->modeloProduct = htmlspecialchars($_GET['modelo']);
  $modModelos->colorProduct = htmlspecialchars($_GET['color']);
  $modModelos->tipoProd = htmlspecialchars($_GET['tipo']);         
  $modModelos->nUnidades = htmlspecialchars($_GET['unidades']);         
  $modModelos->insertModelos();
  $mensaje = $modModelos->mensaje;
  // header('Location: productos.php');
}
$display_block = '<h2 class="modal-header">Informacion de productos </h2>';
//boton modelos
$display_botonModelo = '<button class="btn btn-warning">
Agregar Modelo<input type="hidden" name="enviarModelo" id="envio">
</button>';
echo $display_block;
include "../PHP/nav-busqueda.php";
$display_formulario_modelos = '<form class="form-inline form-group" action="pedidos.php" method="get" enctype="application/x-www-form-urlencoded">
<table class="table">
<tr>
 <td> 
     <label class="control-label">idmodel</label>
     <input type="text" name="idModelo" class="form-control">
 </td>
 <td>
   <label class="control-label">tipo</label>
    <select class="form-control" name="tipo" id="color">
      <option value="smartphone"> Smartphone</option>
      <option value="smartwatch">Smartwatch</option>
      <option value="tablet">Tablet</option>
      <option value="drone">Dron</option>
    </select>
 </td>
 <td>
    <label class="control-label">Nombre del modelo</label>
    <input type="text" name="nombreModel" class="form-control">
 </td>
<td>
   <label class="control-label">Color</label>
    <select class="form-control" name="color" id="color">
                  <option selected> --Selecciona un color -- </option>
                    <option value="negro">negro</option>
                    <option value="rojo">rojo</option>
                    <option value="rosa">rosa</option>
                    <option value="blanco">blanco</option>
                    <option value="azul">azul</option>
                    <option value="purpura">purpura</option>
                    <option value="dorado">dorado</option>
    </select>
</td>
<td>
  <label class="control-label">precio</label>
  <input type="text" name="precio" class="form-control">
</td>
<td>'.$display_botonModelo.'</td>
</tr></table>
</form>';
$display_formulario = '<form class="form-inline form-group" action="productos.php" method="get" enctype="application/x-www-form-urlencoded">
<br><br><br><br><br><br>
<table class="table"><tr>
<td><label class="control-label">Marca</label><input type="text" name="marca" class="form-control"></td>
<td><label class="control-label">Modelo</label><input type="text" name="modelo" class="form-control"></td>
<td>
  <label class="control-label">Color</label>
    <select class="form-control" name="color" id="color">
                    <option value="negro">negro</option>
                    <option value="rojo">rojo</option>
                    <option value="rosa">rosa</option>
                    <option value="blanco">blanco</option>
                    <option value="azul">azul</option>
                    <option value="purpura">purpura</option>
                    <option value="dorado">dorado</option>
    </select>
</td>
<td><label class="control-label">Tipo</label><input type="text" name="tipo" class="form-control"></td>
<td><label class="control-label">Numero de unidades</label><input type="text" name="unidades" class="form-control"><br></td>
<td>'.$display_botonModelo.'</td></tr></table>
</form>';
//$row = mysqli_fetch_array($result); 
?>
<?php
echo "<hr> <a href='#modelos'> Modelos </a>";
?>
<div class="row-fliud">
<br><br><br>
<?php
echo $display_formulario_modelos;
?>
<br><br><br> 
<h4 class="jumbotron"><a name="proveedor">Ingresa datos del modelo</a></h4>
<form class="form " action="pedidos.php" method="get">
  <label for="cantidad">Cantidad</label>
  <input type="text" name="cantidad">
  <label for="proveedor">Proveedor</label>
  <select name="proveedor" id="selectProveedor">
    <option selected="default">--Selecciona un proveedor--</option>
    <option value='<?php echo $nombreProveedor ?>'>Pionero Grupo</option>
  </select>  
  <label for="modelos">Modelos</label>
  <select name="modelos" id="model">
    <?php
      while ($row1 = mysqli_fetch_assoc($result4modelos))
      {
       echo "<option value=".$row1['nombre'].">" . $row1['nombre']."</option>";
      }
      ?>
  </select>
  <button class="btn btn-warning">
    Siguiente
   <input type="hidden" name="pedidos" value='<?php session_id();?>'>  
  </button>
</form>
<!--Mostramos modelos-->
<h4 class="jumbotron"><a name="modelos"> Modelos</a></h4>
<?php
echo "<table class='table' border = '1'> \n"; 
echo "<tr><td>idmodel</td><td>tipo</td><td>nombre</td><td>Color</td><td>precio</td></tr> \n";         
 while ($row3 = mysqli_fetch_array($result4modelos))
 { 
   echo "<tr><td>".$row3[0]."</td><td>".utf8_encode($row3[1])."</td><td>".$row3[2]."</td><td>".$row3[3]."</td><td>".$row3[4]."</td></tr> \n"; //se copia td completos esta funcio decodifica a utf8
 } 
echo "</table> \n";
?>
</div>
<?php

//Bolque de formulario alta productos
echo "<div class='container'>";
echo "<div class='col-md-8'>";
echo $display_formulario;
echo "</div>";//form-end
?>
<!-- <details>
  <summary><h3>Productos ya ingresados</h3> </summary> -->
  <?php  
  // mostramos productos
 // echo "<table class='table' border = '1'> \n"; 
 // echo "<tr><td>idProducto</td><td>Marca</td><td>Modelo</td><td>Color</td><td>tipo de producto</td><td>Numero de Unidades</td></tr> \n";         
 //  while ($row2 = mysqli_fetch_array($result2))
 //  { 
 //    echo "<tr><td>".$row2[0]."</td><td>".utf8_encode($row2[1])."</td><td>".$row2[2]."</td><td>".$row2[3]."</td><td>".$row2[4]."</td><td>".$row2[5]."</td></tr> \n"; //se copia td completos esta funcio decodifica a utf8
 //  } 
 // echo "</table> \n";
  ?>          
<!-- </details>  -->
<?php
echo "</div>"; //aqui termina el container
?>
<?php
//$consultaProveedores = mysql_query('SELECT * FROM proveedor');
require("../PHP/conexion2.php"); // viene de un mysqli
include "../PHP/header.php";

require("../../ctrl/sql/Insertar.php");
require("../../ctrl/sql/Conexion.php");
include '../ctrl/armarProveedor.php';
include 'nav.php';
$result = mysqli_query($enlace_sib3, "SELECT idProveedor,razon_social,domicilio,telefonos,wechat,contacto,descripcion,email,pagina FROM proveedor ORDER BY idProveedor DESC");
$display_block = '<h2 class="modal-header">Informacion de proveedores </h2>';
echo $display_block;
//include "../PHP/nav-busqueda.php";
$display_boton = '<button class="btn btn-warning">
Agregar Proveedor<input type="hidden" name="enviar">
</button>';
$display_formulario = '<form class="form-inline form-group" action="proveedores.php" method="get" enctype="application/x-www-form-urlencoded">
<table class="table"><tr>
<td><label class="control-label">Nombre</label><input type="text" name="nombreProveedor" class="form-control"></td>
<td><label class="control-label">Tipo de producto</label><input type="text" name="tipoProducto" class="form-control"></td>
<td><label class="control-label">Modelo</label><input type="text" name="modelo" class="form-control"></td>
<td><label class="control-label">Color</label><input type="text" name="color" class="form-control"><br></td>
<td>'.$display_boton.'</td></tr></table>
</form>';
echo "<div class='container'>";
echo "<div class='col-md-8'>";
echo $display_formulario;
echo "</div>";
echo "<table class='table' border = '1'> \n"; 
echo "<tr>
<td>idProveedor</td>
<td>Nombre\\Razon social</td>
<td>Domicilio</td>
<td>telefonos</td>
<td>wechat</td> 
<td>contacto</td>
<td>descripcion</td>
<td>email</td>
<td>pagina</td>

</tr> \n"; 
//$row = mysqli_fetch_array($result);
while ($row = mysqli_fetch_array($result))
{ 
  echo "<tr><td>".$row[0]."</td><td>".utf8_encode($row[1])."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td></tr> \n"; //se copia td completos esta funcio decodifica a utf8
} 
echo "</table> \n"; 
echo "</div>"; //aqui termina el container
echo "<hr> <a href='almacen.php'> Almacen </a>";

include('footer.php');

?>

<?php
echo "<div class='col-md-8'>Proveedores disponibles</div>";  
echo "<table class='table'>";          
$resultproveedor = mysqli_query($enlace_sib3,"SELECT idProveedor,razon_social FROM proveedor WHERE razon_social='PIONERO GRUPO COMERCIAL SA. DE CV.'");
  echo "<tr><td>idProveedor</td><td>nombre del proveedor</td></tr>";
  while ($row = mysqli_fetch_array($resultproveedor))
  {
  echo "<tr><td>".$row[0]."</td><td>
  <input class='form-control' name='proveedor' value='".$row[1]."'></td>
       </tr>";
  }      
  echo "</table>";

?> 
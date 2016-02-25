<?php
include 'conexion.php';
$q = $_POST['q'];
$con = conexion();
$sql = "select idProducto, nombre,modelo,color,tipo,IMEI from Productos where nombre LIKE '".$q."%'";

$res=mysql_query($sql,$con);

if(mysql_num_rows($res)==0){

  echo '<b>No hay sugerencias</b>';
} 
 else{
echo '<b>Sugerencias:</b><br />';
	while($fila=mysql_fetch_array($res)){
	  echo "<a href='#ancla".utf8_encode($fila['idProducto'])."'>".utf8_encode($fila['nombre']).'</a><br />';
	}
}

?>

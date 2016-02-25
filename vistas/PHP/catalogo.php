<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="../js/myCode.js"></script>
<?php 
setlocale(LC_TIME,"es_MX");
session_start(); //catalogo.php
$id=$_SESSION['idUsuario'];
error_reporting(E_ALL);

function insertarFecha($dia,$mes,$ano, $hr){
   date_default_timezone_set ('America/Mexico_City');
   //echo date(DATE_ATOM);
   $fecha = (string)date(DATE_ATOM);
   $fechafinal= substr($fecha, 0,19);
   $dia = substr($fecha, 8,-15);
   $mes = substr($fecha, 5,-18);
   $ano = substr($fecha, 0,4);
   $hr = substr($fecha, 11,-6);
   
   return $ano.'-'.$mes.'-'.$dia.' '.$hr;
}
 //echo '<br>';
//echo insertarFecha($dia,$mes,$ano, $hr);
if (!($_SESSION['enLinea'])) {
    header('Location: ../login.php');
}
    include('headerCatalogo.php');
    include('../ctrl/conexion.php');
 $result = mysql_query("SELECT idCepa, nombreCepa, tipo, reino, precio,imagen FROM cepa");  
?>
<div class="container">
	Buscar <input type="text" id="bus" name="bus" onkeyup="loadXMLDoc()" required />
				<div id="myDiv">
         <a id="ancla" href="#"></a>    
        </div>
<?php 

$result2 = mysql_query("SELECT idCliente FROM cliente where idUs = $id"); 
$client = mysql_fetch_row($result2);
echo $client[0];

echo "<table class='table' border = '1'> \n"; 
echo "<tr><td>pedido</td><td>idCepa</td><td>Nombre de la Cepa</td><td>Tipo</td> <td>Reino</td><td>Precio</td><td>imagen</td></tr> \n"; 
while ($row = mysql_fetch_row($result )){ 

  echo "<tr><td>
       <form action='../ctrl/armarCarrito.php' method='POST'>
        <select name='cantidad'>
          <option value='1'>1</option>
          <option value='2'>2</option>
          <option value='3'>3</option>
          <option value='4'>4</option>
          <option value='5'>5</option>
        </select>
<input type='hidden' name='idcompra' value='".$idCom."'/>
<input type='hidden' name='idCepa' value='".$row[0]."'/>
<input type='hidden' name='idCliente' value='".$client[0]."'/>
<input type='hidden' name='fecha' value='".insertarFecha($dia,$mes,$ano, $hr)."'/>
<button type='submit' class='btn btn-primary'>Agregar al carrito</button>
</form>
</td><td><a name='ancla".$row[0]."'></a>".$row[0]."</td><td>".utf8_encode($row[1])."</td><td>".utf8_encode($row[2])."</td><td>".$row[3]."</td><td>".$row[4]."</td><td><img src='../img/".$row[5]."'/></td></tr> \n"; //se copia td completos esta funcio decodifica a utf8
} 
echo "</table> \n"; 
echo "</div>";
include('footer.php');
?>

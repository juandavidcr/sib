<!DOCTYPE html>
 <html lang="es">
  <head>   
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootswatch.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Inspección</title>
    
     <link href="../../bower_components/bootstrap/dist/css/bootswatch.css" rel="stylesheet" type="text/css">
     <script src="https://code.jquery.com/jquery-1.12.1.js"></script>
     <link rel="stylesheet" href="../../font-awesome/css/font-awesome.css">
     <link rel="stylesheet" href="../../estilos/estilo.css">
  </head>
<?php require_once('../../Connections/conexion1.php'); 

?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO inspeccion (folio, fecha_inspeccion, proveedor, tipo_producto, model, almacen, zona, cantidadTotal) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['folio'], "int"),
                       GetSQLValueString($_POST['fecha_inspeccion'], "date"),
                       GetSQLValueString($_POST['proveedor'], "text"),
                       GetSQLValueString($_POST['tipo_producto'], "text"),
                       GetSQLValueString($_POST['model'], "text"),
                       GetSQLValueString($_POST['almacen'], "int"),
                       GetSQLValueString($_POST['zona'], "text"),
                       GetSQLValueString($_POST['cantidadTotal'], "int"));

  mysql_select_db($database_conexion1, $conexion1);
  $Result1 = mysql_query($insertSQL, $conexion1) or die(mysql_error());
}

if ((isset($_GET['id_inspeccion'])) && ($_GET['id_inspeccion'] != "")) {
  $deleteSQL = sprintf("DELETE FROM inspeccion WHERE id_inspeccion=%s",
                       GetSQLValueString($_GET['id_inspeccion'], "int"));

  mysql_select_db($database_conexion1, $conexion1);
  $Result1 = mysql_query($deleteSQL, $conexion1) or die(mysql_error());

  $deleteGoTo = "inspeccion2.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

mysql_select_db($database_conexion1, $conexion1);
$query_Recordset1 = "SELECT razon_social FROM proveedor";
$Recordset1 = mysql_query($query_Recordset1, $conexion1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conexion1, $conexion1);
$query_Recordset2 = "SELECT * FROM modelos";
$Recordset2 = mysql_query($query_Recordset2, $conexion1) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_conexion1, $conexion1);
$query_Recordset3 = "SELECT * FROM almacen";
$Recordset3 = mysql_query($query_Recordset3, $conexion1) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

mysql_select_db($database_conexion1, $conexion1);
$query_Recordset4 = "SELECT folio_de_fabrica FROM folios";
$Recordset4 = mysql_query($query_Recordset4, $conexion1) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);

mysql_select_db($database_conexion1, $conexion1);
$query_inspeccion = "SELECT * FROM inspeccion";
$inspeccion = mysql_query($query_inspeccion, $conexion1) or die(mysql_error());
$row_inspeccion = mysql_fetch_assoc($inspeccion);
$totalRows_inspeccion = mysql_num_rows($inspeccion);
include 'navEntrada.php';
include 'nav.php';
include_once 'headAlmacen.php';

?>



<body>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table width="100%" border="0">
    <tr>
      <th colspan="8" scope="col"><div align="center">INSPECCION</div></th>
    </tr>
    <tr>
      <td align="right" valign="baseline" nowrap="nowrap">Folio:</td>
      <td valign="baseline"><select name="folio" id="folio">
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset4['folio_de_fabrica']?>"><?php echo $row_Recordset4['folio_de_fabrica']?></option>
          <?php
} while ($row_Recordset4 = mysql_fetch_assoc($Recordset4));
  $rows = mysql_num_rows($Recordset4);
  if($rows > 0) {
      mysql_data_seek($Recordset4, 0);
	  $row_Recordset4 = mysql_fetch_assoc($Recordset4);
  }
?>
        </select>      </td>
      <td align="right" valign="baseline" nowrap="nowrap">Fecha_inspeccion:</td>
      <td valign="baseline"><input type="date" name="fecha_inspeccion" value="" size="32" /></td>
      <td align="right" valign="baseline" nowrap="nowrap">Proveedor:</td>
      <td valign="baseline"><select name="proveedor" id="proveedor">
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset1['razon_social']?>"><?php echo $row_Recordset1['razon_social']?></option>
          <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
      </select></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right" valign="baseline" nowrap="nowrap">Tipo_producto:</td>
      <td valign="baseline">
	  <select name="tipo_producto" id="tipo_producto">
          <option value="smartphone">Smartphone</option>
		  <option value="smartwatch">Smartwatch</option>
		  <option value="tablet">Tablet</option>
		  <option value="drone">Drone</option>
      </select>
	  </td>
	  
      <td align="right" valign="baseline" nowrap="nowrap">Model:</td>
      <td valign="baseline"><select name="model" id="model">
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset2['idmodel']?>"><?php echo $row_Recordset2['idmodel']?></option>
          <?php
} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
  $rows = mysql_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
  }
?>
      </select></td>
      <td align="right" valign="baseline" nowrap="nowrap">Almacen:</td>
      <td valign="baseline">
	  <select name="almacen" id="almacen">
        <option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
       </select>      </td>
      <td align="right" valign="baseline" nowrap="nowrap">Zona:</td>
      <td valign="baseline"><select name="zona" id="zona">
       	<option value="A">A</option>
		<option value="B">B</option>
		<option value="C">C</option>
		<option value="D">D</option>
		<option value="E">E</option>
		<option value="F">F</option>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right" valign="baseline" nowrap="nowrap">CantidadTotal:</td>
      <td valign="baseline"><input type="text" name="cantidadTotal" value="" size="32" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insertar registro"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>

<div class="col-md-8">
</div>


<form id="form2" name="form2" method="post" action="">
  <table class="table" border="1" cellpadding="1" cellspacing="1">
    <tr>
      <td>id_inspeccion</td>
      <td>folio</td>
      <td>fecha_inspeccion</td>
      <td>proveedor</td>
      <td>tipo_producto</td>
      <td>model</td>
      <td>almacen</td>
      <td>zona</td>
      <td>cantidadTotal</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_inspeccion['id_inspeccion']; ?></td>
        <td><?php echo $row_inspeccion['folio']; ?></td>
        <td><?php echo $row_inspeccion['fecha_inspeccion']; ?></td>
        <td><?php echo $row_inspeccion['proveedor']; ?></td>
        <td><?php echo $row_inspeccion['tipo_producto']; ?></td>
        <td><?php echo $row_inspeccion['model']; ?></td>
        <td><?php echo $row_inspeccion['almacen']; ?></td>
        <td><?php echo $row_inspeccion['zona']; ?></td>
        <td><?php echo $row_inspeccion['cantidadTotal']; ?></td>
      </tr>
      <?php } while ($row_inspeccion = mysql_fetch_assoc($inspeccion)); ?>
  </table>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);

mysql_free_result($Recordset4);

mysql_free_result($inspeccion);
?>

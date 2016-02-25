<?php require_once('../../Connections/conexion1.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO devoluciones (folio, vendedor, fecha, razon_social, rfc, email, telefono, direccion, colonia, cp, modelo, color, almacen, zona, cantidad, precio_unitario, precio_total, cantidad_letra, sub_total_dev, iva, total, notas) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['folio'], "int"),
                       GetSQLValueString($_POST['vendedor'], "text"),
                       GetSQLValueString($_POST['fecha'], "date"),
                       GetSQLValueString($_POST['razon_social'], "text"),
                       GetSQLValueString($_POST['rfc'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['telefono'], "text"),
                       GetSQLValueString($_POST['direccion'], "text"),
                       GetSQLValueString($_POST['colonia'], "text"),
                       GetSQLValueString($_POST['cp'], "int"),
                       GetSQLValueString($_POST['modelo'], "text"),
                       GetSQLValueString($_POST['color'], "text"),
                       GetSQLValueString($_POST['almacen'], "int"),
                       GetSQLValueString($_POST['zona'], "int"),
                       GetSQLValueString($_POST['cantidad'], "int"),
                       GetSQLValueString($_POST['precio_unitario'], "int"),
                       GetSQLValueString($_POST['precio_total'], "int"),
                       GetSQLValueString($_POST['cantidad_letra'], "text"),
                       GetSQLValueString($_POST['sub_total_dev'], "int"),
                       GetSQLValueString($_POST['iva'], "int"),
                       GetSQLValueString($_POST['total'], "int"),
                       GetSQLValueString($_POST['notas'], "text"));

  mysql_select_db($database_conexion1, $conexion1);
  $Result1 = mysql_query($insertSQL, $conexion1) or die(mysql_error());
}

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_conexion1, $conexion1);
$query_Recordset1 = "SELECT * FROM devoluciones";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $conexion1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Devolución</title>
<link href="../../bower_components/bootstrap/dist/css/bootswatch.css" rel="stylesheet" type="text/css" />
</head>
<?php
include 'headAlmacen.php';
include 'nav2.php';
include 'nav.php';

?>
<body>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table width="100%" border="1" class="table">
    <tr>
      <th colspan="7" scope="col"><div align="center">DEVOLUCION</div></th>
    </tr>
    <tr>
      <td width="12%" align="right" valign="baseline" nowrap="nowrap">Folio:</td>
      <td width="22%" valign="baseline"><input type="text" name="folio" value="" size="32" /></td>
      <td width="7%" align="right" valign="baseline" nowrap="nowrap">&nbsp;</td>
      <td width="6%" valign="baseline">&nbsp;</td>
      <td width="7%">&nbsp;</td>
      <td width="24%" align="right" valign="baseline" nowrap="nowrap">Vendedor:</td>
      <td width="22%"><select name="vendedor" id="vendedor">
        <option value="Jorge">Jorge</option>
      </select></td>
    </tr>
    <tr>
      <td align="right" valign="baseline" nowrap="nowrap">Fecha:</td>
      <td valign="baseline"><input type="date" name="fecha" value="" size="32" /></td>
      <td align="right" valign="baseline" nowrap="nowrap">&nbsp;</td>
      <td valign="baseline">&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right" valign="baseline" nowrap="nowrap">Razon_social:</td>
      <td><input type="text" name="razon_social" value="" size="32" /></td>
    </tr>
    <tr>
      <td align="right" valign="baseline" nowrap="nowrap">Rfc:</td>
      <td valign="baseline"><input type="text" name="rfc" value="" size="32" /></td>
      <td align="right" valign="baseline" nowrap="nowrap">&nbsp;</td>
      <td valign="baseline">&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right" valign="baseline" nowrap="nowrap">Email:</td>
      <td><input type="text" name="email" value="" size="32" /></td>
    </tr>
    <tr>
      <td align="right" valign="baseline" nowrap="nowrap">Telefono:</td>
      <td valign="baseline"><input type="text" name="telefono" value="" size="32" /></td>
      <td align="right" valign="baseline" nowrap="nowrap">&nbsp;</td>
      <td valign="baseline">&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right" valign="baseline" nowrap="nowrap">Direccion:</td>
      <td><input type="text" name="direccion" value="" size="32" /></td>
    </tr>
    <tr>
      <td align="right" valign="baseline" nowrap="nowrap">Colonia:</td>
      <td valign="baseline"><input type="text" name="colonia" value="" size="32" /></td>
      <td align="right" valign="baseline" nowrap="nowrap">&nbsp;</td>
      <td valign="baseline">&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right" valign="baseline" nowrap="nowrap">Cp:</td>
      <td><input type="text" name="cp" value="" size="32" /></td>
    </tr>
    <tr>
      <td align="right" valign="baseline" nowrap="nowrap"><div align="center">Modelo:</div></td>
      <td align="right" valign="baseline" nowrap="nowrap"><div align="center">Color:</div></td>
      <td align="right" valign="baseline" nowrap="nowrap">Almacen:</td>
      <td align="right" valign="baseline" nowrap="nowrap"><div align="center">Zona:</div></td>
      <td align="right" valign="baseline" nowrap="nowrap">Cantidad:</td>
      <td align="right" valign="baseline" nowrap="nowrap"><div align="center">Precio_unitario:</div></td>
      <td align="right" valign="baseline" nowrap="nowrap"><div align="center">Precio_total:</div></td>
    </tr>
    <tr>
      <td align="right" valign="baseline" nowrap="nowrap"><select name="modelo" id="modelo">
        <option value="smartphone">smartphone</option>
        <option value="smartwatch">smartwatch</option>
        <option value="tablet">tablet</option>
        <option value="drone">drone</option>
      </select>
</td>
      <td valign="baseline"><div align="center">
        <select name="color" id="color">
          <option value="blanco">blanco</option>
          <option value="negro">negro</option>
          <option value="dorado">dorado</option>
          <option value="rojo">rojo</option>
          <option value="rosa">rosa</option>
        </select>
      </div></td>
      <td><select name="almacen" id="almacen">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
</td>
      <td><div align="center">
        <select name="zona" id="zona">
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
          <option value="E">E</option>
          <option value="F">F</option>
        </select>
      </div></td>
      <td><div align="center">
        <input type="text" name="cantidad" value="" size="9" />
      </div></td>
      <td><div align="center"> $
<input type="text" name="precio_unitario" value="" size="9" />
      </div></td>
      <td><div align="center"> $
<input type="text" name="precio_total" value="" size="9" />
      </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right" valign="baseline" nowrap="nowrap">Sub_total_dev:</td>
      <td><div align="center"> $
<input type="text" name="sub_total_dev" value="" size="9" />
      </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right" valign="baseline" nowrap="nowrap">Iva:</td>
      <td><div align="center">$
          <input type="text" name="iva" value="" size="9" />
      </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Cantidad_letra:</td>
      <td align="right" valign="baseline" nowrap="nowrap">Total:</td>
      <td><div align="center">$
          <input type="text" name="total" value="" size="9" />
      </div></td>
    </tr>
    <tr>
      <td align="right" valign="baseline" nowrap="nowrap">Notas:</td>
      <td colspan="3" valign="baseline"><input type="text" name="notas" value="" size="32" /></td>
      <td colspan="3"><input type="text" name="cantidad_letra" value="" size="32" /></td>
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
<p>&nbsp;</p>

<table border="1" cellpadding="1" cellspacing="1">
  <tr>
    <td>id_devoluciones</td>
    <td>folio</td>
    <td>vendedor</td>
    <td>fecha</td>
    <td>razon_social</td>
    <td>rfc</td>
    <td>email</td>
    <td>telefono</td>
    <td>direccion</td>
    <td>colonia</td>
    <td>cp</td>
    <td>modelo</td>
    <td>color</td>
    <td>almacen</td>
    <td>zona</td>
    <td>cantidad</td>
    <td>precio_unitario</td>
    <td>precio_total</td>
    <td>cantidad_letra</td>
    <td>sub_total_dev</td>
    <td>iva</td>
    <td>total</td>
    <td>notas</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['id_devoluciones']; ?></td>
      <td><?php echo $row_Recordset1['folio']; ?></td>
      <td><?php echo $row_Recordset1['vendedor']; ?></td>
      <td><?php echo $row_Recordset1['fecha']; ?></td>
      <td><?php echo $row_Recordset1['razon_social']; ?></td>
      <td><?php echo $row_Recordset1['rfc']; ?></td>
      <td><?php echo $row_Recordset1['email']; ?></td>
      <td><?php echo $row_Recordset1['telefono']; ?></td>
      <td><?php echo $row_Recordset1['direccion']; ?></td>
      <td><?php echo $row_Recordset1['colonia']; ?></td>
      <td><?php echo $row_Recordset1['cp']; ?></td>
      <td><?php echo $row_Recordset1['modelo']; ?></td>
      <td><?php echo $row_Recordset1['color']; ?></td>
      <td><?php echo $row_Recordset1['almacen']; ?></td>
      <td><?php echo $row_Recordset1['zona']; ?></td>
      <td><?php echo $row_Recordset1['cantidad']; ?></td>
      <td><?php echo $row_Recordset1['precio_unitario']; ?></td>
      <td><?php echo $row_Recordset1['precio_total']; ?></td>
      <td><?php echo $row_Recordset1['cantidad_letra']; ?></td>
      <td><?php echo $row_Recordset1['sub_total_dev']; ?></td>
      <td><?php echo $row_Recordset1['iva']; ?></td>
      <td><?php echo $row_Recordset1['total']; ?></td>
      <td><?php echo $row_Recordset1['notas']; ?></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>

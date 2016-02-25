<?php require_once('../../../Connections/conexion1.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO prestamos (vendedor_pr, fecha_pr, razonsocial_pr, rfc_pr, email_pr, telefono_pr, direccion_pr, colonia_pr, cp_pr, equipo_pr, modelo_pr, color_pr, cantidad_pr, cliente_pr, fechadev_pr, nota_pr) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['vendedor_pr'], "text"),
                       GetSQLValueString($_POST['fecha_pr'], "date"),
                       GetSQLValueString($_POST['razonsocial_pr'], "text"),
                       GetSQLValueString($_POST['rfc_pr'], "text"),
                       GetSQLValueString($_POST['email_pr'], "text"),
                       GetSQLValueString($_POST['telefono_pr'], "text"),
                       GetSQLValueString($_POST['direccion_pr'], "text"),
                       GetSQLValueString($_POST['colonia_pr'], "text"),
                       GetSQLValueString($_POST['cp_pr'], "text"),
                       GetSQLValueString($_POST['equipo_pr'], "text"),
                       GetSQLValueString($_POST['modelo_pr'], "text"),
                       GetSQLValueString($_POST['color_pr'], "text"),
                       GetSQLValueString($_POST['cantidad_pr'], "int"),
                       GetSQLValueString($_POST['cliente_pr'], "text"),
                       GetSQLValueString($_POST['fechadev_pr'], "date"),
                       GetSQLValueString($_POST['nota_pr'], "text"));

  mysql_select_db($database_conexion1, $conexion1);
  $Result1 = mysql_query($insertSQL, $conexion1) or die(mysql_error());

  $insertGoTo = "prestamo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO prestamos (vendedor_pr, fecha_pr, razonsocial_pr, rfc_pr, email_pr, telefono_pr, direccion_pr, colonia_pr, cp_pr, equipo_pr, modelo_pr, color_pr, cantidad_pr, cliente_pr, fechadev_pr, nota_pr) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['vendedor_pr'], "text"),
                       GetSQLValueString($_POST['fecha_pr'], "date"),
                       GetSQLValueString($_POST['razonsocial_pr'], "text"),
                       GetSQLValueString($_POST['rfc_pr'], "text"),
                       GetSQLValueString($_POST['email_pr'], "text"),
                       GetSQLValueString($_POST['telefono_pr'], "text"),
                       GetSQLValueString($_POST['direccion_pr'], "text"),
                       GetSQLValueString($_POST['colonia_pr'], "text"),
                       GetSQLValueString($_POST['cp_pr'], "text"),
                       GetSQLValueString($_POST['equipo_pr'], "text"),
                       GetSQLValueString($_POST['modelo_pr'], "text"),
                       GetSQLValueString($_POST['color_pr'], "text"),
                       GetSQLValueString($_POST['cantidad_pr'], "int"),
                       GetSQLValueString($_POST['cliente_pr'], "text"),
                       GetSQLValueString($_POST['fechadev_pr'], "date"),
                       GetSQLValueString($_POST['nota_pr'], "text"));

  mysql_select_db($database_conexion1, $conexion1);
  $Result1 = mysql_query($insertSQL, $conexion1) or die(mysql_error());
}

mysql_select_db($database_conexion1, $conexion1);
$query_Recordset1 = "SELECT * FROM modelos";
$Recordset1 = mysql_query($query_Recordset1, $conexion1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Prestamo</title>
<link href="../../../bower_components/bootstrap/dist/css/bootswatch.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" class="active">
  <table width="100%" border="1" class="table">
    <tr>
      <th colspan="6" scope="col"><div align="center">PRESTAMO DE EQUIPO </div></th>
    </tr>
    <tr>
      <td align="right" valign="baseline" nowrap>Vendedor_pr:</td>
      <td colspan="2" valign="baseline"><input type="text" name="vendedor_pr" value="" size="32"></td>
      <td align="right" valign="baseline" nowrap>Fecha_pr:</td>
      <td colspan="2" valign="baseline"><input type="date" name="fecha_pr" value="" size="32"></td>
    </tr>
    <tr>
      <td align="right" valign="baseline" nowrap>Razonsocial_pr:</td>
      <td colspan="2" valign="baseline"><input type="text" name="razonsocial_pr" value="" size="32"></td>
      <td align="right" valign="baseline" nowrap>Rfc_pr:</td>
      <td colspan="2" valign="baseline"><input type="text" name="rfc_pr" value="" size="32"></td>
    </tr>
    <tr>
      <td align="right" valign="baseline" nowrap>Email_pr:</td>
      <td colspan="2" valign="baseline"><input type="text" name="email_pr" value="" size="32"></td>
      <td align="right" valign="baseline" nowrap>Telefono_pr:</td>
      <td colspan="2" valign="baseline"><input type="text" name="telefono_pr" value="" size="32"></td>
    </tr>
    <tr>
      <td align="right" valign="baseline" nowrap>Direccion_pr:</td>
      <td colspan="5" valign="baseline"><input type="text" name="direccion_pr" value="" size="32"></td>
    </tr>
    <tr>
      <td align="right" valign="baseline" nowrap>Colonia_pr:</td>
      <td colspan="2" valign="baseline"><input type="text" name="colonia_pr" value="" size="32"></td>
      <td align="right" valign="baseline" nowrap>Cp_pr:</td>
      <td colspan="2" valign="baseline"><input type="text" name="cp_pr" value="" size="32"></td>
    </tr>
    <tr>
      <td align="right" valign="baseline" nowrap>Equipo_pr:</td>
      <td valign="baseline"><select name="equipo_pr" id="equipo_pr">
        <?php
do {  
?>
        <option value="<?php echo $row_Recordset1['tipo']?>"><?php echo $row_Recordset1['tipo']?></option>
        <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
      </select></td>
      <td align="right" valign="baseline" nowrap>Modelo_pr:</td>
      <td valign="baseline"><select name="modelo_pr" id="modelo_pr">
        <?php
do {  
?>
        <option value="<?php echo $row_Recordset1['idmodel']?>"><?php echo $row_Recordset1['idmodel']?></option>
        <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
      </select></td>
      <td align="right" valign="baseline" nowrap>Color_pr:</td>
      <td valign="baseline"><select name="color_pr" id="color_pr">
        <?php
do {  
?>
        <option value="<?php echo $row_Recordset1['color']?>"<?php if (!(strcmp($row_Recordset1['color'], $row_Recordset1['idmodel']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset1['color']?></option>
        <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right" valign="baseline" nowrap>Cantidad_pr:</td>
      <td valign="baseline"><input type="text" name="cantidad_pr" value="" size="32"></td>
    </tr>
    <tr>
      <td align="right" valign="baseline" nowrap>Cliente_pr:</td>
      <td valign="baseline"><input type="text" name="cliente_pr" value="" size="32"></td>
      <td align="right" valign="baseline" nowrap>Fechadev_pr:</td>
      <td valign="baseline"><input type="date" name="fechadev_pr" value="" size="32"></td>
      <td align="right" valign="baseline" nowrap>Nota_pr:</td>
      <td valign="baseline"><input type="text" name="nota_pr" value="" size="32"></td>
    </tr>
  </table>

  <table align="center">
    <tr valign="baseline">
      <td width="75" align="right" nowrap>&nbsp;</td>
      <td width="235"><input type="submit" value="Insertar registro"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>

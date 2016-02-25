<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cambio Fisico</title>
<link href="../../../bower_components/bootstrap/dist/css/bootswatch.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="cambiofisico" name="cambiofisico" method="get" action="cambio-fisico.php">
  <table width="100%" border="1" class="table">
    <tr>
      <th colspan="5" scope="col"><div align="center">CAMBIO FISICO</div></th>
    </tr>
    <tr>
      <td>Vendedor</td>
      <td colspan="2"><input name="vendedor_cf" type="text" id="vendedor_cf" size="20" /></td>
      <td>Fecha de emision </td>
      <td><input name="fechaemision_cf" type="date" id="fechaemision_cf" /></td>
    </tr>
    <tr>
      <td>Razon Social </td>
      <td colspan="2"><input name="razonsocial_cf" type="text" id="razonsocial_cf" /></td>
      <td>Fecha de compra </td>
      <td><input name="fechacompra_cf" type="date" id="fechacompra_cf" /></td>
    </tr>
    <tr>
      <td>FOLIO</td>
      <td>MODELO</td>
      <td>CANTIDAD</td>
      <td>COLOR</td>
      <td>DESCRIPCION</td>
    </tr>
    <tr>
      <td><input name="folio_cf" type="text" id="folio_cf" /></td>
      <td><input name="modelo_cf" type="text" id="modelo_cf" /></td>
      <td><input name="cantidad_cf" type="text" id="cantidad_cf" /></td>
      <td><input name="color_cf" type="text" id="color_cf" /></td>
      <td><input name="desc_cf" type="text" id="desc_cf" /></td>
    </tr>
    <tr>
      <td><input name="folio_cf2" type="text" id="folio_cf2" /></td>
      <td><input name="modelo_cf2" type="text" id="modelo_cf2" /></td>
      <td><input name="cantidad_cf2" type="text" id="cantidad_cf2" /></td>
      <td><input name="color_cf2" type="text" id="color_cf2" /></td>
      <td><input name="desc_cf2" type="text" id="desc_cf2" /></td>
    </tr>
    <tr>
      <td><input name="folio_cf22" type="text" id="folio_cf22" /></td>
      <td><input name="modelo_cf3" type="text" id="modelo_cf3" /></td>
      <td><input name="cantidad_cf3" type="text" id="cantidad_cf3" /></td>
      <td><input name="color_cf3" type="text" id="color_cf3" /></td>
      <td><input name="desc_cf3" type="text" id="desc_cf3" /></td>
    </tr>

    <tr>
      <td colspan="5">LOS EQUIPOS A CAMBIAR </td>
    </tr>
    <tr>
      <td>EQUIPO</td>
      <td>MODELO</td>
      <td>CANTIDAD</td>
      <td>COLOR</td>
      <td>DESCRIPCION</td>
    </tr>
    <tr>
      <td><input name="equipo_cf" type="text" id="equipo_cf" /></td>
      <td><input name="modelo_cf22" type="text" id="modelo_cf22" /></td>
      <td><input name="cantidad_cf2" type="text" id="cantidad_cf2" /></td>
      <td><input name="color_cf2" type="text" id="color_cf2" /></td>
      <td><input name="desc_cf2" type="text" id="desc_cf2" /></td>
    </tr>
    <tr>
      <td><input name="equipo_cf2" type="text" id="equipo_cf2" /></td>
      <td><input name="modelo_cf23" type="text" id="modelo_cf23" /></td>
      <td><input name="cantidad_cf22" type="text" id="cantidad_cf22" /></td>
      <td><input name="color_cf22" type="text" id="color_cf22" /></td>
      <td><input name="desc_cf22" type="text" id="desc_cf22" /></td>
    </tr>
    <tr>
      <td><input name="equipo_cf3" type="text" id="equipo_cf3" /></td>
      <td><input name="modelo_cf24" type="text" id="modelo_cf24" /></td>
      <td><input name="cantidad_cf23" type="text" id="cantidad_cf23" /></td>
      <td><input name="color_cf23" type="text" id="color_cf23" /></td>
      <td><input name="desc_cf23" type="text" id="desc_cf23" /></td>
    </tr>
    <tr>
      <td colspan="5"><div align="center">
        <input type="submit" name="Submit" value="Guardar" />
      </div></td>
    </tr>
  </table>
  
  
  <div align="center"></div>
</form>
</body>
</html>

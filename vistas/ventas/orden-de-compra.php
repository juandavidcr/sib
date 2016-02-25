<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Orden de Compra</title>
<link href="../../bower_components/bootstrap/dist/css/bootswatch.css" rel="stylesheet" typ"text/css>
</head>

<body>
<form name="orden de compra" method="get" action="ordendecompra.php"><label></label>
<label>
<div align="center">ORDEN DE COMPRA<br>
  <table width="100%" border="1" class="table">
    <tr>
      <th width="5%" scope="col">*Nombre o Razon Social </th>
      <th colspan="5" "><div align="left">
        <input name="nombre_rs" type="text" id="nombre_rs" size="100">
      </div></th>
      <th colspan="2" rowspan="2" scope="col"><p align="center">Folio</p>
        <p align="center">
          <input name="folio_oc" type="text" id="folio_oc">
        </p></th>
      </tr>
    <tr>
      <td>*Nombre Comercial </td>
      <td colspan="5"><input name="nombrecom_oc" type="text" id="nombrecom_oc" size="100"></td>
      </tr>
    <tr>
      <td height="24">*RFC</td>
      <td colspan="5"><input name="rfc_oc" type="text" id="rfc_oc" size="100"></td>
      <td colspan="2" rowspan="2"><p align="center">Vendedor</p>
        <p align="center">
          <input name="vendedor_oc" type="text" id="vendedor_oc">
        </p></td>
      </tr>
    <tr>
      <td>*Direcci&oacute;n</td>
      <td colspan="3"><input name="direccion_oc" type="text" id="direccion_oc" size="60"></td>
      <td width="24%">*Colonia</td>
      <td width="19%"><input name="colonia_oc" type="text" id="colonia_oc" size="60"></td>
      </tr>
    <tr>
      <td>*Delegaci&oacute;n</td>
      <td width="9%"><input name="delegacion_oc" type="text" id="delegacion_oc" size="30"></td>
      <td width="8%">*Estado</td>
      <td width="19%"><input name="estado_oc" type="text" id="estado_oc" size="30"></td>
      <td>*C&oacute;digo Postal </td>
      <td><input name="cp_oc" type="text" id="cp_oc" size="8"></td>
      <td colspan="2" rowspan="2"><p align="center">Fecha de Emisi&oacute;n</p>
        <p align="center">
          <input name="fecha_oc" type="date" id="fecha_oc">
</p></td>
      </tr>
    <tr>
      <td>*Tel&eacute;fono</td>
      <td colspan="5"><input name="telefono_oc" type="text" id="telefono_oc" size="18"></td>
      </tr>
    <tr>
      <td>Email</td>
      <td colspan="5"><input name="email_oc" type="text" size="100"></td>
      <td width="8%">&nbsp;</td>
      <td width="8%">&nbsp;</td>
    </tr>
    <tr>
      <td>N&deg;</td>
      <td>Equipo</td>
      <td>Modelo</td>
      <td>Color</td>
      <td>Descripcion</td>
      <td>Cantidad</td>
      <td>Precio Unitario </td>
      <td>Precio Total </td>
    </tr>
    <tr>
      <td><input name="numero_oc" type="text" id="numero_oc" size="3"></td>
      <td><input name="equipo_oc" type="text" id="equipo_oc"></td>
      <td><input name="modelo_oc" type="text" id="modelo_oc"></td>
      <td><input name="color_oc" type="text" id="color_oc"></td>
      <td><input name="descripcion_oc" type="text" id="descripcion_oc"></td>
      <td><input name="cantidad_oc" type="text" id="cantidad_oc"></td>
      <td><input name="preciou_oc" type="text" id="preciou_oc"></td>
      <td><input name="preciot_oc" type="text" id="preciot_oc"></td>
    </tr>
    <tr>
      <td colspan="4" rowspan="3">Importe total con letra 
        <textarea name="imptotletra_oc" cols="120" id="imptotletra_oc"></textarea></td>
      <td colspan="2">Sub Total </td>
      <td colspan="2"><input name="subtotal_oc" type="text" id="subtotal_oc"></td>
      </tr>
    <tr>
      <td colspan="2">IVA</td>
      <td colspan="2"><input name="iva_oc" type="text" id="iva_oc"></td>
      </tr>
    <tr>
      <td colspan="2">Total</td>
      <td colspan="2"><input name="total_oc" type="text" id="total"></td>
      </tr>
    <tr>
      <td rowspan="3">Forma de Pago </td>
      <td rowspan="3">Efectivo
        <input name="forma_de_pago" type="radio" id="checkefe_oc" value="efectivo"></td>
      <td rowspan="3">Transferencia
        <input name="forma_de_pago" type="radio" id="checktransf_oc" value="transferencia"></td>
      <td rowspan="3">Dep&oacute;sito
        <input name="forma_de_pago" type="radio" id="checkdep_oc" value="deposito"></td>
      <td colspan="2">Monto</td>
      <td colspan="2"><input name="monto_oc" type="text" id="monto_oc"></td>
      </tr>
    <tr>
      <td colspan="2">Anticipo</td>
      <td colspan="2"><input name="anticipo_oc" type="text" id="anticipo_oc"></td>
      </tr>
    <tr>
      <td colspan="2">Deuda</td>
      <td colspan="2"><input name="deuda_oc" type="text" id="deuda_oc"></td>
      </tr>
    <tr>
      <td>Forma de Env&iacute;o </td>
      <td>Paqueter&iacute;a
        <input name="forma_de_envio" type="radio" id="checkpaq_oc" value="paqueteria"></td>
      <td>Entrega en Oficina
        <input name="forma_de_envio" type="radio" id="checkof_oc" value="oficina"></td>
      <td>Entrega a Domicilio
        <input name="forma_de_envio" type="radio" id="checkdom_oc" value="domicilio"></td>
      <td colspan="2">Costo de env&iacute;o </td>
      <td colspan="2"><input name="costoenvio_oc" type="text" id="costoenvio_oc"></td>
      </tr>
    <tr>
      <td colspan="2">Piezas Totales </td>
      <td colspan="2"><input name="piezast_oc" type="text" id="piezast_oc"></td>
      <td colspan="2">Factura</td>
      <td>Si
        <input name="factura" type="radio" id="checksi_oc" value="si"></td>
      <td>No
        <input name="factura" type="radio" id="checkno_oc" value="no"></td>
    </tr>
    <tr>
      <td colspan="8">Notas
        <textarea name="notas_oc" cols="255" id="notas_oc"></textarea></td>
      </tr>
  </table>
</div>
</label>

<div align="center">
  <input name="Submit" type="submit" class="btn-default" value="Guardar">
</div>
</form>


</body>
</html>

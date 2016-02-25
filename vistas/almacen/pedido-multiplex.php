<!DOCTYPE html>
 <html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Sistema Integral Bebeit </title>
     <link href="../../bower_components/bootstrap/dist/css/bootswatch.css" rel="stylesheet" type="text/css">
     <script src="https://code.jquery.com/jquery-1.12.1.js"></script>
     <link rel="stylesheet" href="../../font-awesome/css/font-awesome.css">
     <link rel="stylesheet" href="../../estilos/estilo.css">
        <script src="../jqueryui.js"></script>
         <link rel="stylesheet" href="../Untitled-1.css" />
     
</head>
<?php
  session_start();
  include 'navEntrada.php';
  include_once '../../ctrl/sql/Conexion.php';
  include_once '../../ctrl/sql/Insertar.php';
  //include_once '../PHP/conexion2.php'; //aqui esta el enlace a sib3
  include '../PHP/conexion2.php';
  $result4 = mysqli_query($enlace_sib3,"SELECT * from folios");
  include 'nav.php';
  include_once 'headAlmacen.php';
  include '../ctrl/armarPedido.php';
  include '../ctrl/armarFolio.php';
 // include "nav.php";
  $result4proveedor = mysqli_query($enlace_sib3,"SELECT idProveedor,razon_social FROM proveedor");
  $colorOpal = mysqli_query($enlace_sib3,"SELECT color FROM modelos WHERE nombre='Opal' ");
  $result4tipo = mysqli_query($enlace_sib3,"SELECT tipo FROM modelos group by tipo");
 // $result4sm = mysqli_query($enlace_sib3,"SELECT nombre FROM modelos group by nombre");
  //$result4tb = mysqli_query($enlace_sib3,"SELECT nombre FROM tablet");
  //$result4sw = mysqli_query($enlace_sib3,"SELECT nombre FROM smartwatch");
  $result4modelo = mysqli_query($enlace_sib3,"SELECT nombre FROM modelos group by nombre");
  $result4color = mysqli_query($enlace_sib3,"SELECT color FROM modelos  group by color");
?>
<article class="">
      <h2>Instrucciones</h2>
      <p> 
        1.- Ingresa los datos del folio de fabrica. Que se ingresan a la tabla folios.<br>
        2.- Ingresa los datos de pedido de fabrica con tu respectivo modelo.Que se insertan en la tabla pedidos.
        <br>
        3.- Clasifica la mercancía y valida si es buena.<br>
        4.- Ingresa el imei y/o números de serie de los equipos. <br>
      </p>
    </article>
<form class="col-md-8 text-center" action="../ctrl/armarFolio.php" method="get" enctype="application/x-www-form-urlencoded">
      <table class="table table-striped" border="1">
        <tr class="default">
            <td>* Folio de Fabrica</td>
            <td>
              <input class="form-control" type="text" name="folio">
            </td>
        </tr>
        <tr>
            <td>* Fecha 
            <input type="hidden" name="fecha" value='<?php echo $fecha;?>'>
            </td>
            <td><?php  $fecha =   getfecha();
            echo "" . $fecha
            ?></td> 
        </tr>
        <tr>
          <td>
             * Total            
            </td> 
            <td><input type="text" class="form-control" name="total" placeholder="Cantidad Total de Articulos"></td>
        </tr>
        <tr>
            <td>
             * Numero de Cajas
            </td>
            <td> 
              <input class="form-control" type="text" name="numCaja" value="" />
            </td>                             
        </tr>
        <tr>
        <td><label for="producto"> Tipo de Producto</label></td>
          <td>
            <select name="producto" id="tipoProd">
             <option value="smartphone">Smartphone</option>
             <option value="smartwatch">Smartwatch</option>
             <option value="tablet">Tablet</option>
             <option value="drone">Dron</option>
            </select>
          </td>
        </tr>            
            <td>
            Usuario  
            
          </td> 
          <td><?php echo $_SESSION['username'];  ?></td>    
        <tr>
         <td rowspan="3">              
           <input class="btn btn-warning" type="submit" name="insertar" value="Guardar Folio">
          </td>              
        </tr>
      </table>
</form>
<?php
  echo "<form action='pedidos.php' method='get' >";
  echo "<table class='table' border='1'>";
  echo "<tr><td>id folio Local</td><td>FOLIO</td><td>FECHA</td><td>cantidad de cajas</td><td>total de equipos</td></tr>";    
  while ($row_folios = mysqli_fetch_array($result4))       
  {
    $folio_seleccionado = $row_folios[1];
    $total = $row_folios[4];
    echo "<tr>
    <td> ".$row_folios[0]."</td>
    <td id='folioFabrica'>
         <a href='pedidos.php?folio=$folio_seleccionado&total=$total'>".$folio_seleccionado."</a>
    </td>
    <td>".$row_folios[2]."</td><td>".$row_folios[3]."</td><td>".$total."</td>
    </tr>";
  }    
  echo "<input type='hidden' name='folio' value='".$folio_seleccionado."'>";
  echo "</table>";
  echo "<input type='hidden' name='entrada' value='Siguiente'>";
  echo "</form>";    
?>  

    
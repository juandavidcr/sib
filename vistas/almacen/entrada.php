<?php
session_start();

setlocale(LC_TIME,"es_MX");
if (isset($_GET['insertar'])) 
{
  $f = $_GET['folio'];
  $GLOBALS['usuario']  = $email;
}
//echo $usuario;
include_once('headAlmacen.php');
include '../ctrl/armarFolio.php';
include '../PHP/conexion2.php';
$result4 = mysqli_query($enlace_sib3,"SELECT * from folios");
?>
<body>
<script type="text/javascript" src="js/ajax.js"></script>
 <h2>Entrada</h2>
<?php
  include 'navEntrada.php';
 // $sesion = session_encode();
 // echo $sesion;
  //echo session_name();
  $result = mysqli_query($enlace_sib3, "SELECT idmodel,tipo,nombre,color,precio FROM modelos");
?> 
<div class="col-md-8">
    
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
  </div>     
  
</details> 
    <script type="text/javascript" src="../bower_components/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="../bower_components/bootstrap/js/dropdown.js"></script>
    <script type="text/javascript" src="../bower_components/bootstrap/js/collapse.js"></script> 
    
  </body>
  </html>
 
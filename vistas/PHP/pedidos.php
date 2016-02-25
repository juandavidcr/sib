<?php 
session_start();
$_SESSION['username'];
$total = $_SESSION['total'] = 1000;
setlocale(LC_TIME,"America/Mexico/Mexico_City/es_MX");
date_default_timezone_set('UTC');
$user = "david@bebeit.com";
$fecha = date("Y-m-d");
$a = localtime();
$a[4] += 1;
$a[5] += 1900;
//print "$a[5]-$a[4]-$a[3]";
$fecha = "$a[5]-$a[4]-$a[3]";
//echo $fecha;
require("conexion2.php");
require '../sql/Insertar.php';
require '../sql/Conexion.php';

$result3 = mysqli_query($enlace,"SELECT * FROM Pedidos ORDER BY idPedido DESC");
include "header.php";
 $_GET['usuario'] = $user;

 echo "<br>";
 //echo $fecha;
 //$_GET['folio'] = $folioFabrica;
 if (isset($_GET['insertar']))
 {      
  $modPedido = new Insertar();
  $modPedido->folio = htmlspecialchars($_GET['folio']);
  $modPedido->fecha = htmlspecialchars($_GET['fecha']);
  $modPedido->numCaja = htmlspecialchars($_GET['numCaja']);
  $modPedido->proveedor = htmlspecialchars($_GET['proveedor']);
  $modPedido->tipoProd = htmlspecialchars($_GET['producto']);
  $modPedido->usuario = htmlspecialchars($_GET['usuario']);
  $modPedido->numarticulos = htmlspecialchars($_GET['cantidad']);
  $modPedido->total = htmlspecialchars($_GET['total']);          
  $modPedido->insertPedidos();
  $mensaje = $modPedido->mensaje;
  header('Location: almacen.php');
}
?>
<!--A partir de aqui se puede ingresar texto sin problemas-->  
<body>
  <script type="text/javascript" src="AppJD.js"></script>
    <?php
     include 'nav-busqueda.php';
     //echo "".$folioFabrica;
    ?>                    
    <div class="row-fluid">
    <div class="container list-group table-of-contents">                              
           <div class="col-md-12">
             <ul class="nav navbar-nav navbar-left">                                              
                <li><a class="list-group-item" href="almacen-entrada.php"><i class="fa fa-level-down fa-3x"></i> Entrada </a></li>
                <li><a class="list-group-item" href="salida.php"><i class="fa fa-level-up fa-3x"></i> Salida </a></li>
                <li><a class="list-group-item" href="productos.php"><i class="fa fa-mobile-phone fa-3x"></i> Inventario </a></li>
                <li><a class="list-group-item" href="proveedores.php"><i class="fa fa-info-circle fa-3x"></i> Información Básica </a></li>
             </ul>
           </div><!--<div class="col-md-3"></div>fin del div.row-->  
        </div>
      <div class="reloj" id="clockDisplay"></div>  
    </div>          
        <div class="reloj" id="clockDisplay"></div>          
       <form class="form" action="<?php $_SERVER['PHP_SELF']?>" method="get">                   
          <table class="table table-striped" border="1">
            <tr class="default">
                <td>Folio de Fabrica</td>
                <td>
                  <input class="form-control" type="text" name="folio">
                </td>
                <td>
                  Numero de Caja
                </td>
                <td> 
                  <input class="form-control" type="text" name="numCaja" />
                </td>
                <td>Cantidad Total</td>
            </tr> 
            <tr>
              <td>Fecha</td>
              <td><?php echo "" . $fecha?><input type="hidden" name="fecha" value='<?php echo $fecha;?>'></td>
              <td>Id Usuario</td>
              <td><input type="text" class="form-control" name="usuario" id="idUs" value='<?php echo $user;?>'></td>
              <td><input type="text" class="form-control" name="total" placeholder="Cantidad Total"></td>
            </tr>            
          </table>
          <input type="hidden" name='insertar'>                  
           <table class="table table-striped table-hover">
           	<thead>
               <tr id="1">
                 <th>#</th>
                  <td>Proveedor</td>
                  <td>Tipo</td>
                  <td>Modelo</td>
                  <td>Color</td>
                  <td>Cantidad</td>
                </tr>  
            </thead>
            <tbody>              
              <tr id="2">
                <td>1</td>
                <td>
                  <select name="proveedor" id="proveedor">
                    <option value="ACM">ACM</option>
                    <option value="MOTOROLA">MOTO</option>                    
                  </select>
                </td>
                <td>
                  <select name="producto" id="tipoproducto">            
                    <option value="mobile_phone">Teléfono Móvil</option>
                    <option value="smart_watch">Smart Watch</option>
                    <option value="dron">Dron</option>
                    <option value="tablet">Tablet</option>
                  </select>
                </td>
                <td>
                  <select name="modelo" id="modelo">
                    <option value="T800">T800</option>
                    <option value="Opal">Opal</option>
                    <option value="Z50">Genius Z50</option>
                    <option value="Twist">T200</option>
                    <option value="SmartMe">XT303</option>
                  </select>
                </td>
                <td>                  
                  <select name="color" id="color">
                    <option value="negro">negro</option>
                    <option value="rojo">rojo</option>
                    <option value="rosa">rosa</option>
                    <option value="blanco">blanco</option>
                    <option value="azul">azul</option>
                    <option value="purpura">purpura</option>
                    <option value="dorado">dorado</option>
                  </select>
                </td>
                <td>
                 <input type="text" name="cantidad">
                </td>
                <td>                                        
                  <button class="btn btn-warning btn-lg">
                    <a href="pedidos.php?"></a>
                    Terminar
                  </button>
                </td>
              </tr>             
             </tbody>
           </table> 
           <input type="hidden" name='insertar' value='true'>                   
         </form>
         <?php
         echo "<table class='table' border = '1'> \n"; 
         echo "<tr><td>idPedido</td><td>Folio de Fabrica</td><td>fecha</td><td>numero de caja</td><td>proveedor</td><td>tipo de equipo</td><td>usuario</td><td>cantidad de articulos</td><td>total</td></tr> \n";
         while ($row3 = mysqli_fetch_array($result3)){ 
           echo "<tr><td>".utf8_encode($row3[0])."</td><td>".utf8_encode($row3[1])."</td><td>".$row3[2]."</td><td>".$row3[3]."</td><td>".$row3[4]."</td><td>".$row3[5]."</td><td>".$row3[6]."</td><td>".$row3[7]."</td><td>".$row3[8]."</td></tr> \n"; 
         } 
         echo "</table> \n";
        
         ?>
            
<?php 
include_once "footer.php";
?>
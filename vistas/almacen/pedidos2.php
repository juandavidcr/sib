<?php
session_start();

setlocale(LC_TIME,"es_MX");
if (isset($_GET['insertar'])) {
  $f = $_GET['folio'];
}
if (isset($_GET['insertar']))
 {   

  $modPedidos = new Insertar();
  $modPedidos->folio_fabrica = htmlspecialchars($_GET['folio']);
  $modPedidos->fecha_folio = htmlspecialchars($_GET['fecha']);
  $modPedidos->numdeCajas = htmlspecialchars($_GET['numCaja']);
  $modPedidos->equipos = htmlspecialchars($_GET['total']);
  $modPedidos->insertFolio();
  $mensaje = $modPedidos->mensaje;
  echo "<script>Folio ingresado con exito!</script>";
 // header('Location: entrada.php');
}
 setlocale(LC_TIME,"America/Mexico/Mexico_City/es_MX");
date_default_timezone_set('UTC');
//echo $user;
$fecha = date("Y-m-d");
$a = localtime();
$a[4] += 1;
$a[5] += 1900;
//print "$a[5]-$a[4]-$a[3]";
$fecha = "$a[5]-$a[4]-$a[3]"; echo "<br>";;
include('headAlmacen.php');
include '../PHP/conexion2.php';
$result4 = mysqli_query($enlace_sib3,"SELECT * from folios");
?>
<script type="text/javascript" src="ajax.js"></script>
<body>

<?php
  include 'navEntrada.php';
  $result = mysqli_query($enlace_sib3, "SELECT idmodel,tipo,nombre,color,precio FROM modelos");
?> <!--scripts -->  
  
  <div class="col-md-8">

      <article>
      <h2>Instrucciones</h2>
      <p> 
        1.- Ingresa los datos del folio de fabrica. Que se ingresan a la tabla folios.<br>
        2.- Ingresa los datos de pedido de fabrica con tu respectivo modelo.Que se insertan en la tabla pedidos.
        <br>
        3.- Clasifica la mercancía y valida si es buena.<br>
        4.- Ingresa el imei y/o números de serie de los equipos. <br>
      </p>
    </article>
  <details>
      <summary><h2><strong>Ingresar nuevo folio de fabrica</strong></h2></summary>
      <hr>  <!--Vista1-->
      <div class="reloj" id="clockDisplay"></div>                    
      <form class="col-md-8 text-center" action="pedidos.php" method="get" enctype="application/x-www-form-urlencoded">
        <table class="table table-striped" border="1">
          <tr class="default">
              <td>* Folio de Fabrica</td>
              <td>
                <input class="form-control" type="text" name="folio">
              </td>
          </tr>
          <tr>
            <td>
               * Cantidad Total de equipos                 
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
          <tr>
            <td>* Fecha</td>
            <td>
              <?php echo "" . $fecha?>
              <input type="hidden" name="fecha" value='<?php echo $fecha;?>'>
            </td>                          
          </tr>
          <tr>
            <td>
              Usuario  
              <input type="text" class="form-control" name="usuario" id="idUs" value='<?php echo $user?>'>
            </td>
            <td>
            Cada caja contiene<input type="text" class="form-control" name="cantidad" placeholder="Caja con">
            </td>
          </tr>            
          <tr>
           <td rowspan="3"colspan="5">              
             <input class="btn btn-warning" type="submit" name="insertar" value="Guardar Folio">
            </td>              
          </tr>
        </table>
        </form> 
        <hr>
    </details> 
    <div class="container">
  Buscar <input type="text" id="bus" name="bus" onkeyup="loadXMLDoc()" required />
        <div id="myDiv">
         <a id="ancla" href="#"></a>    
        </div>

<?php
//$p = new Insertar();
$numCaja =  "SELECT cantidad_de_cajas from folios";
$result_folio = mysqli_query($enlace_sib3,$numCaja);

while ($folios = mysqli_fetch_array($result_folio))
{
  echo "folios".$folios[0]; //#cajas
}
//$num = $p->numdeCajas= htmlspecialchars($_GET['numCaja']);
echo " <form action='../ctrl/armarPedido.php' method='POST'>";
echo "<table class='table' border = '1'> \n"; 
echo "<tr><td>pedido</td><td>idModel</td><td>Nombre del equipo</td><td>Tipo</td> <td>Color</td><td>Precio</td>
<td>cantidad</td></tr> \n"; 
while ($row = mysqli_fetch_array($result ))
{ 
  echo "<tr><td>
      
        <input type='hidden' name='numCaja' value='".$folios[0]."'/>
        <input type='hidden' name='idModel' value='".$row[0]."'/>
        <input type='hidden' name='tipo' value='".$row[1]."'/>
        <input type='hidden' name='nombre' value='".$row[2]."'/>
        <input type='hidden' name='fecha' value='".$fecha."'/>        
<button type='submit' class='btn btn-primary'>Agregar al pedido</button>

</td><td><a name='ancla".$row[0]."'></a>".$row[0]."</td><td>".utf8_encode($row[1])."</td><td>".utf8_encode($row[2])."</td><td>".$row[3]."</td><td>".$row[4]."</td><td><input type='text' name='cantidad' ></td></tr> \n"; //se copia td completos esta funcio decodifica a utf8
} 
echo "</table> \n"; 
echo "</form>";
?>
</div>
  <div class="col-md-12">
   
  </div>
    <script type="text/javascript" src="../bower_components/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="../bower_components/bootstrap/js/dropdown.js"></script>
    <script type="text/javascript" src="../bower_components/bootstrap/js/collapse.js"></script> 
    <?php
      echo "<form action='pedidos.php' method='get' >";
      echo "<table class='table' border='1'>";
      echo "<tr><td>id folio Local</td><td>FOLIO</td><td>FECHA</td><td>cantidad de cajas</td><td>total de equipos</td></tr>";    
      while ($row_folios = mysqli_fetch_array($result4))       
      {
        
        echo "<tr>
        <td><a href='pedidos.php'> ".$row_folios[0]."</a></td>
        <td id='folioFabrica'>".$row_folios[1]."</td>
        <td>".$row_folios[2]."</td><td>".$row_folios[3]."</td><td>".$row_folios[4]."</td>
        </tr>";
      }
      $folio_seleccionado = $row_folios[1];
      echo "<input type='hidden' value='".$folio_seleccionado."'>";
      echo "</table>";
      echo "<input type='submit' name='entrada' value='Siguiente'>";
      echo "</form>";
      include "../PHP/footer.php";
    ?>
  </body>
  </html>
 
<?php
if (isset($_GET['entrada'])) 
{
  $folio = $_GET['folio_seleccionado'];
}

$result3 = mysqli_query($enlace_sib3,"SELECT * from pedidos");
?>

         <details>
           <summary>Mostrar elementos en Pedidos</summary>
            <?php
              echo "<table class='table' border = '1'> \n"; 
              echo "<tr><td>idPedido</td>
                        <td>Folio de Fabrica</td>
                        <td>fecha</td><td>cantidad de cajas</td>
                        <td>proveedor</td>
                        <td>tipo</td> 
                        <td>usuario encargado</td>
                        <td>cantidad</td> 
                        <td>total</td>
                    </tr> \n";
              while ($row3 = mysqli_fetch_array($result3))
              { 
                echo "<tr><td>".utf8_encode($row3[0])."</td><td>".utf8_encode($row3[1])."</td><td>".$row3[2]."</td><td>".$row3[3]."</td><td>".$row3[4]."</td><td>".$row3[5]."</td><td>".$row3[6]."</td><td>".$row3[7]."</td><td>".$row3[8]."</td></tr> \n"; 
              } 
              echo "</table> \n";        
            ?>       
         </details> 
         
<form class="form" action="<?php $_SERVER['PHP_SELF']?>" method="get" enctype="application/x-www-form-urlencoded">                                                      
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
                <td><?php echo $folio ?></td>
                <td>
                  <select name="proveedor" id="proveedor">
                    <option value="ACM">ACM</option>
                    <option value="MOT">MOTO</option>                    
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
                  <button class="btn btn-warning">
                    <a href="almacen.php?"></a>
                    Enviar 
                  </button>
                </td>
              </tr>             
             </tbody>
           </table> 
           <input type="hidden" name='insertar' value='true'>                   
</form>     
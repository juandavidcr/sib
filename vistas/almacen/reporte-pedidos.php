<?php
$result3 = mysqli_query($enlace_sib3,"SELECT * from pedidos");
?>
<details>
    <summary>Mostrar elementos en Pedidos</summary>
     <?php
       echo "<table class='table' border = '1'> \n"; 
       echo "<tr><td>idPedido</td><td>Folio de Fabrica</td><td>fecha</td><td>cantidad de cajas</td><td>proveedor</td><td>tipo</td> <td>usuario encargado</td><td>cantidad</td><td>Equipo</td></tr> \n";
       while ($row3 = mysqli_fetch_array($result3))
       { 
         echo "<tr><td>".utf8_encode($row3[0])."</td><td>".utf8_encode($row3[1])."</td><td>".$row3[2]."</td><td>".$row3[3]."</td><td>".$row3[4]."</td><td>".$row3[5]."</td><td>".$row3[6]."</td><td>".$row3[7]."</td><td>".$row3[8]."</td></tr> \n"; 
       } 
       echo "</table> \n";        
     ?>       
  </details> 
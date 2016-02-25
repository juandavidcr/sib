<form name='frmTabla' action='pedido-fabrica-2.php' method='post'>
  <table cellpadding='0' cellspacing='0' id='tabla' class="table">
    <tr>
      <td id="modelo">Modelo</td>
      <td id="TipoProducto">Tipo de producto</td>
      <td id="color">Color</td>
      <td id="cantidad">Cantidad</td>
      <td>
      <input type='button' class="btn btn-info" name='btnMas' value='+' onclick='unaMas("tabla");' />
      </td>
    </tr>
     <tr>
       <td>           
       <label for="modelos">Modelos</label>
       <select name="modelos" id="model">
         <?php
           echo "<option selected>--Selecciona un modelo--</option>";
           while ($row1 = mysqli_fetch_assoc($result4modelos))
           {
            echo "<option value=".$row1['idmodel'].">".$row1['idmodel']."</option>";
           }
           ?>
       </select>         
       </td>
       <td>
       <label>Tipo</label>
         <select name="tipo" id="tipoProd">         
         <option selected>Selecciona un tipo de producto</option>
           <option value="smartphone">Smartphone</option>
           <option value="smartwatch">Smartwatch</option>
           <option value="tablet">Tableta</option>
           <option value="drone">Dron</option>
         </select>
       </td>
     </tr>
    </table>    
  </form>  
      <hr> 
<form class="form" name="calc">
    <input class="form-control" type="text" name="operando1" value="0" size="12">
    <br>
    <input type="Text" name="operando2" value="0" size="12" class="form-control">
    <br>
    <input type="Button" name="" value=" + " onclick="calcula('+')">
    <input type="Button" name="" value=" - " onclick="calcula('-')">
    <input type="Button" name="" value=" X " onclick="calcula('*')">
    <input type="Button" name="" value=" / " onclick="calcula('/')">
    <br>
    <input type="Text" name="resultado" value="0" size="12" class="form-control">
  </form>
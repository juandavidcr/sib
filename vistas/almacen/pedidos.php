<?php 
session_start();
if (isset($_GET['entrada']) and (isset($_SESSION['user']))) 
{
 $username = $_SESSION['username'];
}
$f = $_GET['folio'];
$c = $_GET['total'];
include_once '../../ctrl/sql/Conexion.php';
include_once '../../ctrl/sql/Insertar.php';
include_once '../PHP/conexion2.php'; //aqui esta el enlace a sib3
include 'nav2.php';
include 'nav.php';
include_once 'headAlmacen.php';
include '../ctrl/armarPedido.php';

$result4modelos =  mysqli_query($enlace_sib3,"SELECT idmodel FROM modelos ORDER BY nombre DESC");
$result4proveedor = mysqli_query($enlace_sib3,"SELECT razon_social FROM proveedor");
?>
<!--A partir de aqui se puede ingresar texto sin problemas-->  
<body> 
  
  <h3 class="col-md-8">Ingresar productos nuevos</h3>
   <form action="../ctrl/armarPedido.php" method="get">
    <table class="table table-striped" border="1">
      <tr class="default">         
          <td>
            Folio de Fabrica 
            <input class="form-control" type="text" name="folio" value='<?php echo $f ?>' readonly>
          </td> 
          <td>
              Fecha: &nbsp;<?php $fecha = fecha();  echo "" . $fecha?>
              <input type="hidden" name="fecha" value='<?php echo $fecha;?>' >
          </td>
          <td>
             Usuario <input readonly type="text" class="form-control" name="usuario" id="idUs" value='<?php echo $_SESSION['username'];?>'>
          </td>                  
      </tr> 
      <tr>        
        <td>
           <label for="cant">Total de equipos </label> <input type="text" name='cantidad' class="form-control" value="<?php echo $c?>" readonly>         
        </td>
        <td>
          <label for="proveedor">
            Proveedores
          </label>
          <select name="proveedor" id="model">
            <?php
              while ($row2 = mysqli_fetch_assoc($result4proveedor))
              {
               echo "<option value=".$row2['razon_social'].">".$row2['razon_social']."</option>";
              }
              ?>
          </select>
        </td>
      </tr>            
    </table>
    </form>
<hr>
<form name="form1" action="pedido-multiplex.php" method="post" enctype="application/x-www-form-urlencoded">             
    <table class="table table-responsive" border="1" id="tabla">
    <thead>
      <tr>
        <td>
          Folio <input type="text" name="folioF">
        </td>
        <td>           
           <?php $fecha = date('d/m/Y');?>  <!--Se asigna la variable fecha -->   
           <?php echo "Fecha: ";print  ($fecha). "\n"; ?>
          <input type="hidden" name="fecha" value="<?php echo date('Y-m-d') . "\r\n";?>">
        </td> 
        <td>      
            Cajas: <input class="control-medium-input" type="text" name="cajas" placeholder="numero de cajas">
              <!--Se asigna la variable no. de cajas-->
        </td>
        <td id="total">          
        
           Cantidad Total 
           <input type="text" name="cantidadTotal">                  
        </td>
        <td>
          <?php echo "Eres el usuario: " . $_SESSION['username'] ?>
          <input type="hidden" name="usuario" value="<?php echo $_SESSION['username']?>;">
        </td>
       </tr>
      <tr>        
          <td>
             Proveedor
          </td>
          <td>
            Tipo
          </td>
          <td>
            Modelo
          </td>
          <td>
            Color
          </td>
          <td>
            Cantidad 
          </td>
      </tr>
      </thead>
      <tbody>

        <tr >
           <td>            
             <select name="proveedor" id="proveedor" onchange="showUser(this.value)" >
                <option value="">Selecciona un proveedor</option> 
                <?php
                while ($row2 = mysqli_fetch_assoc($result4proveedor))
                {
                 echo "<option value=".$row2['idProveedor'].">".$row2['razon_social']."</option>";
                }
                ?>               
             </select>          
           </td>
           <td>            
            <select name="tipo" id="tipo" onchange="showModelo(this.value)">            
               <option value="">Selecciona un tipo</option> 
                <?php
                while ($f = mysqli_fetch_assoc($result4tipo))
                {
                 echo "<option value=".$f['tipo'].">".$f['tipo']."</option>";
                }
                ?>         
            </select>             
           </td>
           <td>             
               <select name="modelo" id="modelo" onchange="showColor(this.value)">
                <option value="">Selecciona un modelo</option>
                   <?php
                   while ($m = mysqli_fetch_assoc($result4modelo))
                   {
                    echo "<option value=".$m['nombre'].">".$m['nombre']."</option>";
                   }
                   ?>         
               </select>             
           </td>
           <td>             
               <select name="color" id="color" >
                  <option value="">Selecciona un color</option>
                   <?php
                   while ($c = mysqli_fetch_assoc($result4color))
                   {
                    echo "<option value=".$c['color'].">".$c['color']."</option>";
                   }
                   ?>           
               </select>             
           </td>
           <td>
             <input class="form-control" type="number" name="cantidad"  min="1" max="10000"> 
           </td>           
         <td>
           <input type="button" id="agregar" value="Agregar fila" />
         </td>
        </tr> 
         <tr class="fila-base">
           <td>            
             <select name="proveedor" id="proveedor" onchange="showUser(this.value)" >
                <option value="">Selecciona un proveedor</option> 
                <?php
                while ($row2 = mysqli_fetch_assoc($result4proveedor))
                {
                 echo "<option value=".$row2['idProveedor'].">".$row2['razon_social']."</option>";
                }
                ?>               
             </select>          
           </td>
           <td>            
            <select name="tipo" id="tipo" onchange="showModelo(this.value)">            
               <option value="">Selecciona un tipo</option> 
                <?php
                while ($f = mysqli_fetch_assoc($result4tipo))
                {
                 echo "<option value=".$f['tipo'].">".$f['tipo']."</option>";
                }
                ?>         
            </select>             
           </td>
           <td>             
               <select name="modelo" id="modelo" onchange="showColor(this.value)">
                <option value="">Selecciona un modelo</option>
                   <?php
                   while ($m = mysqli_fetch_assoc($result4modelo))
                   {
                    echo "<option value=".$m['nombre'].">".$m['nombre']."</option>";
                   }
                   ?>         
               </select>             
           </td>
           <td>             
               <select name="color" id="color" >
                  <option value="">Selecciona un color</option>
                   <?php
                   while ($c = mysqli_fetch_assoc($result4color))
                   {
                    echo "<option value=".$c['color'].">".$c['color']."</option>";
                   }
                   ?>           
               </select>             
           </td>
           <td>
             <input class="form-control" type="number" name="cantidad"  min="1" max="10000"> 
           </td>           
         <td>
          
         </td>
        </tr> 
        </tbody>
        <!-- <tr id="resultados">
          <td>
           <button></button> 
          </td>
        </tr> -->
     </table> 
      
    <div class="btn-group">
      <a href="#" class="btn btn-success">Nuevo</a>            
    </div>
   

</body>
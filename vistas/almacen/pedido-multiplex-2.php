<!DOCTYPE html>
 <html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Sistema Integral Bebeit </title>
     <link href="../../bower_components/bootstrap/dist/css/bootswatch.css" rel="stylesheet" type="text/css"><script src="https://code.jquery.com/jquery-1.12.1.js"></script>
     <link rel="stylesheet" href="../../font-awesome/css/font-awesome.css">
     <link rel="stylesheet" href="../../estilos/estilo.css">
     <script type="text/javascript">
      function getXMLHTTPRequest(){
        try{
          var request = new XMLHTTPRequest();
        }catch(err1){
            try{
              request = new ActiveXObject("Msxml2.XMLHTTP");
            }catch(err2){
              try{
                request = new ActiveXObject("Microsoft.XMLHTTP");
              }catch(err3){
                request = false;
              }
            }
        }
        return request;
      }
      var moduloAJAX = getXMLHTTPRequest();
      //termina objeto ajax
      function llamarAJAX(){
        var idProveedor = document.form1.tipo.value;
        var rand = parseInt(Math.rand()*999999);
        var url = "server/tipos_producto.php?idP="+idProveedor;
        moduloAJAX.open("GET",url+"&rand"+rand,true);
        moduloAJAX.onreadystatechange = respuestaAjax;
        moduloAJAX.send(null);
      }
       function respuestaAjax(){
        if ((moduloAJAX.readyState == 4)&& (moduloAJAX.status == 200 ))
        {
           
        }else{
          alert("A ocurrido un error"+moduloAJAX.statusText);
        }
       }
    </script> 
  </head>
<?php
  session_start();
  include_once '../../ctrl/sql/Conexion.php';
  include_once '../../ctrl/sql/Insertar.php';
  include_once '../PHP/conexion2.php'; //aqui esta el enlace a sib3
  include 'nav2.php';
  include_once 'headAlmacen.php';
  include '../ctrl/armarPedido.php';
  include "nav.php";
  $result4proveedor = mysqli_query($enlace_sib3,"SELECT idProveedor,razon_social FROM proveedor");
  $colorOpal = mysqli_query($enlace_sib3,"SELECT color FROM modelos WHERE nombre='Opal' ");
  $result4tipo = mysqli_query($enlace_sib3,"SELECT tipo FROM modelos group by tipo");
  $result4sm = mysqli_query($enlace_sib3,"SELECT nombre FROM modelos group by nombre");
  $result4tb = mysqli_query($enlace_sib3,"SELECT nombre FROM tablet");
  $result4sw = mysqli_query($enlace_sib3,"SELECT nombre FROM smartwatch");
  $result4modelo = mysqli_query($enlace_sib3,"SELECT nombre FROM modelos WHERE tipo='smartphone'");
  $result4color = mysqli_query($enlace_sib3,"SELECT color FROM modelos  group by color");
?>
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
<form name="form1" action="pedido-multiplex.php" method="post" enctype="application/x-www-form-urlencoded">             
    <table class="table table-responsive" border="1">
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
        <tr>
           <td>            
             <select name="proveedor" id="proveedor" onchange="llamarAJAX()" >
                           <?php
              while ($row2 = mysqli_fetch_assoc($result4proveedor))
              {
               echo "<option value=".$row2['idProveedor'].">".$row2['razon_social']."</option>";
              }
              ?>          
             </select>          
           </td>
           <td>            
            <select name="tipo" id="tipo" >            
             <?php   
              while ($tipo = mysqli_fetch_assoc($result4tipo))
              {
               echo "<option value=".$tipo['tipo'].">".$tipo['tipo']."</option>";
              }
              
              ?>              
            </select>             
           </td>
           <td>             
               <select name="modelo" id="modelo">
                <?php
                while ($row3 = mysqli_fetch_assoc($result4sm))
                {
                 echo "<option value=".$row3['nombre'].">".$row3['nombre']."</option>";
                }
                ?>             
               </select>             
           </td>
           <td>             
               <select name="color" id="color" >
                  <?php                   
                   while ($color = mysqli_fetch_assoc($result4color))
                   {
                    echo "<option value=".$color['color'].">".$color['color']."</option>";
                   }
                  ?>           
               </select>             
           </td>
           <td>
             <input class="form-control" type="number" name="cantidad"  min="1" max="10000"> 
           </td>           
         <td>
           <input type="button" value="Agregar">
         </td>
        </tr>  
        
        <tr id="resultados">
          <td>
           <button></button> 
          </td>
        </tr>
     </table> 
    </form> 
    <div class="btn-group">
      <a href="pedido-multiplex.php" class="btn btn-success">Nuevo</a>            
    </div>
    
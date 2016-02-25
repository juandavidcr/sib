<div class="row-fluid">
<div class="container list-group table-of-contents">                              
       <div class="col-md-12">
         <ul class="nav navbar-nav navbar-left">                                              
         <li>            
            <a class="list-group-item" href="#">
            <?php //entrada.php?email=<?php echo urlencode($email)?>
            <i class="fa fa-level-down fa-3x"></i>Entrada </a>
            <ul>
              <li>
                  <a href="pedido-multiplex.php"> Pedidos de Fábrica</a>                  
              </li>
              <li>
                  <a href="inspeccion.php">Inspeccion</a>
              </li>
              <li><a href="devoluciones.php">Devolución</a></li>
              <li><a href="#"> Entrada de Mercancia</a></li>
            </ul>
          </li>
         <li>
           <a class="list-group-item" href="#"><i class="fa fa-level-up fa-3x"></i> Salida </a>
           <ul>
             <li><a href="../ventas/orden-de-compra.php"> Ventas</a></li>
             <li><a href="salida/cambio-fisico.php"> Cambio Físico</a></li>
             <li><a href="salida/prestamo.php"> Préstamo</a></li>
           </ul>
         </li>
         <li>
          <a class="list-group-item" href="#">
          <i class="fa fa-mobile-phone fa-3x"></i>Inventario productos</a>         
        </li>
        <li>
         <a class="list-group-item" href="proveedores.php">
         <i class="fa fa-info-circle fa-3x"></i> Información Básica </a>
         <ul>
           <li><a href="proveedores.php"> Proveedor</a></li>
           <li><a href="almacen.php">Almacen</a></li>
           <li><a href="merch.php">Mercancia</a></li>
         </ul>
        </li>
      </ul> 
       </div><!--<div class="col-md-3"></div>fin del div.row-->  
    </div>
  <div class="reloj" id="clockDisplay"></div>  
</div>
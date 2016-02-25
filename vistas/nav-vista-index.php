<nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Bebeit</a>              
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->           
        </div><!-- /.container-fluid -->
        <!--menu desplegable-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">               
            <li>
              <form class="navbar-form" role="search" action="buscar.php">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Busqueda">
                 </div>
                    <button type="submit" class="btn btn-default">Buscar</button>
              </form>  
            </li>
            <li><img src="../imagenes/logo-bebeit.png" class="img-responsive logo" alt="logo"></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-plug fa-2x"></i>Network<span class="caret"></span></a>
              <ul class="dropdown-menu">
                                     
                <li><a href="almacen/proveedores.php">Proveedores </a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Ventas </a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Contabilidad</a></li>
                <li role="separator" class="divider"></li>
              </ul>
             </li>  
            <li><a href="logout.php"><i class="fa fa-sign-out fa-4x"></i>Salir del sistema</a></li>                            
          </ul>                                       
        </div><!-- /.navbar-collapse -->
      </nav>
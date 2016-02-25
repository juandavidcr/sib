<?php
 include "header.php";
?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Bebeit</a>              
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">              
        <li class="active">
          <a href="index.php">
              <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-home"></span>
              </button>
              <span class="sr-only">(current)</span>                    
          </a>
        </li>
        <li>
          <ul class="nav navbar-nav navbar-right">                                              
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sign In <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="login.php">Login</a></li>
                <li><a href="#">Centro de Servicio</a></li>
                <li><a href="#">Ventas</a></li>
                <li role="separator" class="divider"></li>
                <li>
                    <form class="navbar-form" role="search" action="buscar.php">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Busqueda">
                      </div>
                    <button type="submit" class="btn btn-default">Buscar</button>
                    </form>
                </li>
              </ul>
            </li>
          </ul>   
        </li>
        <li><a href="#contact">Contáctanos </a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="http://www.bebeit.com.mx">Productos </a></li>
            <li role="separator" class="divider"></li>
            <li><a href="http://bebeit.mx">Tienda </a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Redes sociales</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="vista/almacen.php">Almacen</a></li>
          </ul>
        </li>
      </ul>                                       
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container">
  <div class="row"> 
     <div class="col-md-6">
       <details>
         <summary><h1>Registrate</h1></summary>
          <button class="btn btn-warning">
                <a href="registro-interno.php"> <i class="fa fa-sign-in fa-4x"></i> </a>
          </button>
       </details>
     </div>
     <div class="col-md-6">
     
   </div>
</div>

<?php
  include "footer.php";
?>
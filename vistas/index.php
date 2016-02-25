<?php
  session_start();
  if (!isset($_SESSION['username']))
  {
    header('location:../index.php');
  }
 
    // setcookie("username", "myusername");
    // echo "estas firmado como " . $_COOKIE['username'] . ".";
?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Sistema Integral Bebeit </title>
        <!--<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">-->
         <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootswatch.css">
         <link href="../bower_components/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
         <link href="../estilos/estilo.css" rel="stylesheet" type="text/css">
    </head>
<?php
  // $_SESSION['username'] = $_GET['email'];;
   if (isset($_GET['guardar'])) 
   {
    $tipo = $_GET['tipo'];
    $correo = $_GET['email'];
    echo "tipo: ".$tipo." user: ".$correo;
   }
   ?>
     
    <?php

   
?>
<body>
<h2>Sistema Integral Bebeit</h2>              
<nav class="nav navbar-header">
<form action="../vistas/almacen/index.php?" method="get">
  <input class="form-control" type="email" name="email" value='<?php echo $_SESSION['username']?>' placeholder="Ingresa un email corporativo">
  <button class="btn btn-warning">
    Almacen<input type="hidden" name="almacen" value="<?php echo session_id();?>">
  </button>
  <button class="btn btn-warning">
    Ventas<input type="hidden" name="ventas" value="">
  </button>
  <button class="btn btn-warning">
   Centro de Servicio<input type="hidden" name="cs" value="">
  </button>
  <button class="btn btn-warning">
    Contabilidad<input type="hidden" name="conta" value="">
  </button>
  </form>
        <?php
         include "nav-vista-index.php";
         include 'footer.php';
        ?> 
</nav>                     
        	<script type="text/javascript" src="../bower_components/jquery/dist/jquery.js"></script>
        	<script type="text/javascript" src="../bower_components/bootstrap/dist/bootstrap.js"></script>
        	<script type="text/javascript" src="../bower_components/bootstrap/js/dropdown.js"></script>
        	<script type="text/javascript" src="../bower_components/bootstrap/js/collapse.js"></script>
    </div>
</body>
</html>

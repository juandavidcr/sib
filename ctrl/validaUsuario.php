<?php
session_start();
include "DBMySQL.php";
$us = $_POST['email'];
$pw = $_POST['contr'];
use Bebeit\MyDataBasefuncBBIT;
use Bebeit\Persona;
$DBMySQLclass = new MyDataBasefuncBBIT();
$DBMySQLclass->DB_mysql($bd = "sib3", $host = "localhost", $user = "bebeit", $pass = "admin");
$DBMySQLclass->conectar($bd, $host, $user, $pass);
$var = $DBMySQLclass->loginUser($us, $pw);	//devuelve el tipo de usuario
$person = new Persona($us,$var);
?>	
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
		<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootswatch.css">
		<link rel="stylesheet" href="../estilos/estilo.css">
	</head>
<body>
<?php
$_SESSION['username'] = $person->getEmail();
echo "".$person->greet();
$user = $_SESSION['username'];
?>
<!-- 
<form action="../vistas/index.php?" method="get">
	<input type="text" name="tipo" value='<?php //echo $var?>'>
	<input type="email" name="email" value='<?php //echo $_SESSION['username']?>'>
		<button class="btn btn-warning">
		  Entrar<input type="hidden" name="guardar" value="<?php //echo session_id();?>">
		</button> 
</form> -->
<div class="container">
    <nav>
    	<form method='get' action='../vistas/almacen/index.php?user'>    		
    	  
    	  <input type="hidden" name="usuario" value='<?php echo $user?>'> 
    	  <input  class="btn btn-info" type="submit" value="Almacen">
    	</form>
    	
    	
    	<button class="btn btn-info">
    		Centro de Servicio
    	</button>
    	<button class="btn btn-info">
    		Contabilidad
    	</button>
    	<button class="btn btn-info">
    		Ventas
    	</button>
    </nav>
	<?php
		echo "<h1>Bienvenido a tu perfil</h1>";
		include '../app/home/nav.php';
	?>
</div>
</body>
</html>
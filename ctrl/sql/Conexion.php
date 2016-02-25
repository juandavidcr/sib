
<?php
 class Conexion{
    
    
 	public function conectar(){
 	$usuario = 'bebeit';
 	$password = 'admin';
 	$host = 'localhost'; // esta variablke se cambiara una vez en linea
 	$bd = 'sib3';

 	return $conexion = new PDO("mysql:host=$host;dbname=$bd",$usuario,$password);
 	}

 }
?>


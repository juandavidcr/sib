<?php

// @var 
// $dsn = 'mysql:dbname=sib2;host=127.0.0.1';
$usuario = 'bebeit';
$contrasena = 'admin';
$link = mysql_connect('localhost', $usuario, $contrasena)
or die('No se pudo conectar: ' . mysql_error());
//echo '<h1>Connected successfully</h1>';
mysql_select_db('sib2') or die('No se pudo seleccionar la base de datos');
// Realizar una consulta MySQL

// Liberar resultados
//mysql_free_result($result); 
   // include "DBMySQL.php";

?>
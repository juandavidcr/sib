<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conexion1 = "localhost";
$database_conexion1 = "sib3";
$username_conexion1 = "bebeit";
$password_conexion1 = "admin";
$conexion1 = mysql_pconnect($hostname_conexion1, $username_conexion1, $password_conexion1) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
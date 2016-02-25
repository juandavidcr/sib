<?php
function conectar()
{
	mysql_connect("localhost", "bebeit", "admin");
	mysql_select_db("sib3");
}

function desconectar()
{
	mysql_close();
}
?>
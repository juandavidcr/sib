<?php

function conexion(){
	$con = mysql_connect("localhost","root","");
		if (!$con){
		die('Could not connect: ' . mysql_error());
		}
	mysql_select_db("sib2", $con);
    return($con);
}
?>
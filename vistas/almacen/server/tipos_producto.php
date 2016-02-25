<?php
$tipo_prod = $_GET['tipo'];

$user = "bebeit";
$pass = "admin" ;
$serv = "localhost";
$bd = "sib3";

$con = mysqli_connect($serv,$user,$pass,$bd);

$result = mysqli_query($con,"SELECT nombre FROM modelos WHERE tipo='$tipo_prod' GROUP BY nombre");

while ($row = mysqli_fetch_array($result)) 
{
  echo "<option value=".$row['nombre'].">".$row['nombre']."</option>";

}
             
            
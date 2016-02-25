<?php
$q = $_GET['proveedor'];
//echo $q;
$user = "bebeit";
$pass = "admin" ;
$serv = "localhost";
$bd = "sib3";

$con = mysqli_connect($serv,$user,$pass,$bd);

$result = mysqli_query($con,"SELECT tipo FROM modelos WHERE id_proveedor='$q' GROUP BY tipo");

while ($row = mysqli_fetch_array($result)) 
{
  echo "<option value=".$row['tipo'].">".$row['tipo']."</option>";
}
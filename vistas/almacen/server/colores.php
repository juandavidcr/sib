<?php
$modelo = $_GET['modelo'];

$user = "bebeit";
$pass = "admin" ;
$serv = "localhost";
$bd = "sib3";

$con = mysqli_connect($serv,$user,$pass,$bd);

$result = mysqli_query($con,"SELECT color FROM modelos WHERE nombre='$modelo' GROUP BY color");

while ($row = mysqli_fetch_array($result)) 
{
  echo "<option value=".$row['color'].">".$row['color']."</option>";

}
             
            
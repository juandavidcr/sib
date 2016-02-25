<?php
$enlace = mysqli_connect('localhost', 'bebeit', 'admin', 'sib3');
if (!$enlace) {
     die('Error de Conexión (' . mysqli_connect_errno() . ') '
             . mysqli_connect_error());
}

$enlace_sib3 = mysqli_connect('localhost', 'bebeit', 'admin', 'sib3');
if (!$enlace) {
     die('Error de Conexión (' . mysqli_connect_errno() . ') '
             . mysqli_connect_error());
}
?>
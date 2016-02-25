<?php
function insertarFecha($d,$m,$a, $h){
   date_default_timezone_set ('America/Mexico_City');
   //echo date(DATE_ATOM);
   $fecha = (string)date(DATE_ATOM);
   $fechafinal= substr($fecha, 0,19);
   $d = substr($fecha, 8,-15);
   $m = substr($fecha, 5,-18);
   $a = substr($fecha, 0,4);
   $h = substr($fecha, 11,-6);   
   return $a.'-'.$m.'-'.$d.' '.$h;
}

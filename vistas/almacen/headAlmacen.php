<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 <title>Sistema Integral Bebeit </title>
    <link href="../../bower_components/bootstrap/dist/css/bootswatch.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../../estilos/estilo.css">
    <link rel="stylesheet" href="../Untitled-1.css" />
    <script src="https://code.jquery.com/jquery-1.12.1.js"></script>
    <script src="../jqueryui.js"></script>
        <script>
          $(function() {
            $( "#tabs" ).tabs();
          });
          $(function(){
         // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
         $("#agregar").on('click', function(){
           $("#tabla tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla tbody");
         });
           // Evento que selecciona la fila y la elimina 
         $(document).on("click",".eliminar",function(){
           var parent = $(this).parents().get(0);
           $(parent).remove();
         });
        });
          function showUser(str) {
              if ((str == "")||(str == showUser(this.value) )) {
                  document.getElementById("proveedor").innerHTML = "";
                  return;
              } else { 
                  if (window.XMLHttpRequest) {
                      // code for IE7+, Firefox, Chrome, Opera, Safari
                      xmlhttp = new XMLHttpRequest();
                  } else {
                      // code for IE6, IE5
                      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                  }
                  xmlhttp.onreadystatechange = function() {
                      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                          document.getElementById("tipo").innerHTML = xmlhttp.responseText;
                      }
                  };
                  xmlhttp.open("GET","server/proveedores.php?proveedor="+str,true);
                  xmlhttp.send();
              }
          }
          function showModelo(str) {
              if (str == "") {
                  document.getElementById("tipo").innerHTML = "";
                  return;
              } else { 
                  if (window.XMLHttpRequest) {
                      // code for IE7+, Firefox, Chrome, Opera, Safari
                      xmlhttp = new XMLHttpRequest();
                  } else {
                      // code for IE6, IE5
                      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                  }
                  xmlhttp.onreadystatechange = function() {
                      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                          document.getElementById("modelo").innerHTML = xmlhttp.responseText;
                      }
                  };
                  xmlhttp.open("GET","server/tipos_producto.php?tipo="+str,true);
                  xmlhttp.send();
              }
          }
          function showColor(str) {
              if (str == "") {
                  document.getElementById("modelo").innerHTML = "";
                  return;
              } else { 
                  if (window.XMLHttpRequest) {
                      // code for IE7+, Firefox, Chrome, Opera, Safari
                      xmlhttp = new XMLHttpRequest();
                  } else {
                      // code for IE6, IE5
                      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                  }
                  xmlhttp.onreadystatechange = function() {
                      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                          document.getElementById("color").innerHTML = xmlhttp.responseText;
                      }
                  };
                  xmlhttp.open("GET","server/colores.php?modelo="+str,true);
                  xmlhttp.send();
              }
          }
     </script>     
</head>
 



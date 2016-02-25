<?php
 error_reporting(E_ALL);
 include('headRegistro.php');
 ?>
 
 <div class="container-fluid clearfix">
  <div class="row">
  	<div class="col-md-4 ">     
    </div>
    <br><br><br><br><br><br> 
  	<div class="col-md-6">
  		<fieldset>
  			<br>
  		   <form class="form center-block" action="registro.php" method="post">  		   	
  		   	<label for="email">Correo corporativo</label><input class="form-control" type="email" placeholder="Email">
  		   	<label for="nombre">Nombre(s)</label><input class="form-control" type="text" placeholder="Nombre">
  		   	<label for="">Apellido Paterno</label><input class="form-control" type="text" placeholder="Apellido Materno">
  		   	<label for="">Apellido Materno</label><input class="form-control" type="text" placeholder="Apellido Paterno">
  		   	<label for="Depto">Area</label><input class="form-control" type="text" placeholder="Departamento">
  		   	<label for="Dinos tu rol/puesto">Cargo</label><input class="form-control" type="text" placeholder="Puesto">
  		   	<label for="pass">Contraseña</label><input class="form-control" type="password" placeholder="Contraseña">
  		   	<label for="repass">Repite por favor la contraseña</label><input class="form-control" type="password" placeholder=" Repetir Contraseña"><label for="pass">Máximo 12 carateres de longitud</label>
  		   	<br>  		     		   
  		   	<button type="submit" class="btn btn-primary">Enviar</button>  		   	
          <button type="reset" class="btn btn-default">Cancelar</button>
  		   </form>	
  		</fieldset>  		
  	</div>
  </div>
 </div>
 <?php

 if(isset($_POST['Enviar']))
 {  // para saber si el botón registrar fue presionado. 
     //echo "<p>Envio datos</p>";
     if($_POST['email'] == '' or $_POST['password'] == '' or $_POST['repassword'] == '') 
     { 
        // Si los campos están vacíos muestra el siguiente mensaje, caso contrario sigue el siguiente codigo.
         echo 'Por favor llene todos los campos.';
     } 
     else 
     { 
         $correo = $_POST['email'];
         $sql = 'SELECT * FROM $correo';

         $rec = mysql_query($sql); 
         $verificar_usuario = 0;
         //Creamos la variable $verificar_usuario que empieza con el valor 0 
          // y si la condición que verifica el usuario(abajo), entonces la variable toma el valor de 1 que quiere decir que ya existe ese nombre de usuario por lo tanto no se puede registrar   
         while($result = mysql_fetch_object($rec)) 
         { 
             if($result->email == $_POST['email']) //Esta condición verifica si ya existe el usuario 
             { 
                 $verificar_usuario = 1; 
             } 
         }    
         if($verificar_usuario == 0) 
         { 
             if($_POST['password'] == $_POST['repassword'])//Si los campos son iguales, continua el registro y caso contrario saldrá un mensaje de error.
             { 
                 $email = $_POST['email']; 
                 $password = $_POST['password']; 
                 $sql = "INSERT INTO usuarios (email,password,tipoUs) VALUES ('$email',SHA2('$password',256), 2)";
                 //Se insertan los datos a la base de datos y el usuario ya fue registrado con exito.
                 mysql_query($sql); 
   
                 echo '<h3>Usted se ha registrado correctamente.</h3>'; 
             } 
             else 
             { 
                 echo 'Las claves no son iguales, intente nuevamente.'; 
             } 
         } 
         else 
         { 
             echo 'Este usuario ya ha sido registrado anteriormente.'; 
         } 
     } 
 }
 include('footer.php');
 ?>
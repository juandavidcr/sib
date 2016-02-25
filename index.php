
<?php
require_once 'ctrl/sql/Conexion.php'; // conecta a la base
require_once 'ctrl/sql/Insertar.php'; // clase que inserta datos
if (!isset($_SESSION['user'])==null) 
{
  header('Location: index.php');
  //echo "Se crea <b>var</b> de sesion";
}
include "header.php";
if (isset($_POST['insertar'])) 
     {
         $model = new Insertar();
         $model->nombre = htmlspecialchars($_POST['nombre']);
         $model->email = htmlspecialchars($_POST['email']);
         $model->password = sha1( htmlspecialchars($_POST['password']));
         $model->tipo = htmlspecialchars($_POST['tipo_user']);
         $model->insertUsuarios();
         $mensaje = $model->mensaje;
     }
?>
  <body>
  <nav class="navbar navbar-default">
     
      <div class="container-fluid">

          <div class="navbar-header">
            <a class="navbar-brand" href="#">
              <img class="img-responsive logo" src="imagenes/logo-bebeit.png" alt="logo">
            </a>
          </div>        
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Bebeit</a>                    
        </div>      
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">              
            <li class="active">
              <a href="index.php">
                  <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-home"></span>
                  </button>
                  <span class="sr-only">(current)</span>                    
              </a>
            </li>                                       
          </ul>                                           
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>           
    <div class="container">    
      <aside class="panel text-center">
        <form class="form-inline" action="ctrl/validaUsuario.php" method="POST" enctype="application/x-www-form-urlencoded">
          <fieldset class="form-group">
            <table class="table">                          
              <tr>
                <td class="text-center">
                  <label for="mail">Ingresa correo </label>                            
                </td>
                <td class="text-center">
                  <label for="pass">Ingresa password</label>
                </td>
              </tr>
            <tr>
              <td class="text-center">
                <i class="fa fa-at"></i>
                <input type="email" class="form-control" name="email" placeholder="Email">  
              </td>                                                                                  
              <td class="text-center">
              <i class="fa fa-key"></i>
                <input type="password" class="form-control" name="contr" placeholder="Password">                                    
              </td>                            
            </tr>              
            <tr>
              <td class="text-center">
                <input type="submit" class="btn btn-primary" name="login">                
              </td>              
              <td class="text-center">
                <input type="reset" class="btn btn-default" value="Limpiar formulario">
              </td>
            </tr>
            </table>
          </fieldset>
        </form>
      </aside>      
      <div class="container">
          <details open>
            <summary>
              Registrarse                    
            </summary>
              <form method="POST" action='index.php?registro' enctype="application/x-www-form-urlencoded">
                <table class="table">
                  <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="nombre" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>Email:</td>
                    <td><input type="email" name='email' class="form-control"></td>
                  </tr>
                  <tr>
                    <td>Password:</td>
                    <td><input type="password" name='password' class="form-control"></td>                    
                  </tr>
                  <tr>
                    <td><label for="password">Repite el password </label></td>
                    <td><input type="password" name='repassword' class="form-control"></td>
                  </tr>
                  <tr>                
                    <td>
                        <label for="rol">Selecciona el rol del usuario</label>
                        <select name="tipo_user" id="users">
                            <option selected>-- selecciona un rol --</option>
                            <option class="form-control" value="subgerente">Subgerente</option>
                            <option class="form-control" value="g_ventas">Gerente de Ventas</option>
                            <option class="form-control" value="contador">Contador</option>
                            <option class="form-control" value="almacenista">Almacenista</option>
                            <option class="form-control" value="vendedor">Vendedor</option>                                              
                            <option class="form-control" value="supervisor">Supervisor</option>
                            <option class="form-control" value="tecnico">Tecnico</option>
                            <option class="form-control" value="distribuidor">Distribuidor</option>
                            <option class="form-control" value="cliente">Cliente</option>                            
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <input class="btn btn-default" type="reset">
                      <input class="btn btn-default" type="submit" value="Enviar Datos" name="registro">
                    </td>  
                  </tr>
                </table>
                <input type="hidden" name='insertar'>
              </form>
        </details>
      </div>

    </div> <!--fin container-->
     <?php
     $password; 
     $repassword;
     //include "../home/footer-home.php";
     // Si los campos son iguales, continua el registro y caso contrario saldrá un mensaje de error.
     if (isset($_POST['registro'])) 
     {
       # code...

   
       if((string)$password == (string)$repassword)      
        { 
          $nombre = $_POST['nombre'];
          $email = $_POST['email']; 
          $tipoUs = $_POST['tipo_user'];
          $sql = "INSERT INTO usuarios (nombre, email,password,tipo_user) VALUES ('$nombre','$email',SHA1('$password'), '$tipoUs')";
          //Se insertan los datos a la base de datos y el usuario ya fue registrado con exito.
          mysql_query($sql);           
          echo 'Usted se ha registrado correctamente.'; 
        } 
        else 
        { 
          echo "<script>
          alert('Contraseñas diferentes');
          </script>";
          echo 'Las claves no son iguales, intente nuevamente.'; 
        }  
    }
     ?>
        <script type="text/javascript" src="bower_components/jquery/dist/jquery.js"></script>
        <script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
        <script type="text/javascript" src="bower_components/bootstrap/js/dropdown.js"></script>
        <script type="text/javascript" src="bower_components/bootstrap/js/collapse.js"></script>  
  </body>
</html>
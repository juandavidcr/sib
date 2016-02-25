<?php
namespace Bebeit;
class Persona 
{
     // Creating some properties (variables tied to an object)
     //public $isAlive = true;
     public $email;
     public $tipo;
     
     
     // Assigning the values
     public function __construct($nick, $tipo) {
       $this->email =$nick ;
       $this->tipo = $tipo;
     }

     public function getEmail(){
     	return $this->email;
     }
     
     // Creating a method (function tied to an object)
     public function greet() {
       return "<h3 class='modal-header'>Hola  " . $this->email . ",  puesto: " . $this->tipo . ".</h3>";
     }
}
class MyDataBasefuncBBIT
{ 
    // public $_SESSION['user'];
    // public $_SESSION['pw'];
    // public $_SESSION['tipo_user'];
    public $usuario_post;
    public $pass_post;
    public $tipousuario;
    	
	private $baseDatos;
	// @var server
	 private $servidor ;
	 private $usuario;
	 private $clave;  
	/* identificador de conexión y consulta */
	private $Conexion_ID = 1;
	private $Consulta_ID = 1;
	 
	/* número de error y texto error */
	private $Errno = 0;
	private $Error = "";
	  
	function __construct(){
	   $this->baseDatos = 'sib3';
	   $this->servidor= 'localhost';
	   $this->usuario = 'bebeit';
	   $this->clave = 'admin';
	}  
	/* Método Constructor: Cada vez que creemos una variable
	de esta clase, se ejecutará esta función */
	function DB_mysql($bd = "sib3", $host = "localhost", $user = "bebeit", $pass = "admin") {
		$this->baseDatos = $bd;
		$this->servidor = $host;
		$this->usuario = $user;
		$this->clave = $pass;
	}
	 
	/*Conexión a la base de datos*/
	function conectar($bd, $host, $user, $pass)
	{
	 
		if ($bd != "") $this->BaseDatos = $bd;
		if ($host != "") $this->Servidor = $host;
		if ($user != "") $this->Usuario = $user;
		if ($pass != "") $this->Clave = $pass;
		 
		// Conectamos al servidor		
		$enlace = mysqli_connect('localhost', 'bebeit', 'admin', 'sib3');
		if (!$enlace) {
		     die('Error de Conexión (' . mysqli_connect_errno() . ') '
		             . mysqli_connect_error());
		}		
		if (!$this->Conexion_ID) {
		$this->Error = "Ha fallado la conexión.";
		return 0;
		}		 
		//seleccionamos la base de datos
		if (!@mysql_select_db($this->BaseDatos, $this->Conexion_ID)) {
		$this->Error = "Imposible abrir ".$this->BaseDatos ;
		return 0;
		}		 
		/* Si hemos tenido éxito conectando devuelve 
		el identificador de la conexión, sino devuelve 0 */
		return $this->Conexion_ID;
	}

	/* Ejecuta un consulta */
	function consulta($sql = "")
	{
	 
		if ($sql == "") {
			$this->Error = "No ha especificado una consulta SQL";
			return 0;
		}
		//ejecutamos la consulta
		$this->Consulta_ID = @mysql_query($sql, $this->Conexion_ID);
		 
		if (!$this->Consulta_ID) {
			$this->Errno = mysql_errno();
			$this->Error = mysql_error();
		}
		/* Si hemos tenido éxito en la consulta devuelve 
		el identificador de la conexión, sino devuelve 0 */
			return $this->Consulta_ID;
	}
	 
	/* Devuelve el número de campos de una consulta */
	function numcampos() 
	{
		return mysql_num_fields($this->Consulta_ID);
	}
	 
	/* Devuelve el número de registros de una consulta */
	function numregistros()
	{
					
		return @mysql_num_rows($this->Consulta_ID);  
	}	
	/* Devuelve el nombre de un campo de una consulta */
	function nombrecampo($numcampo) 
	{
		return mysql_field_name($this->Consulta_ID, $numcampo);
	}	 
	/* Muestra los datos de una consulta */
	function verconsulta() 
	{	 
		echo "<table border=1>\n";		 
		// mostramos los nombres de los campos
		for ($i = 0; $i < $this->numcampos(); $i++)
		{
		 echo "<td><b>".$this->nombrecampo($i)."</b></td>\n";
		}
		echo "</tr>\n";
		// mostrarmos los registros
		 
		while ($row = mysql_fetch_row($this->Consulta_ID)) 
		{
		  echo "<tr> \n";
		 for ($i = 0; $i < $this->numcampos(); $i++)
		 {
		  echo "<td>".$row[$i]."</td>\n";
		 }
		  echo "</tr>\n";
		}		 
	}
    function loginUser($usuario_post, $pass_post)
	{			
	   if (isset($_POST['login'])) 	
	   {	   		  			   
		   	//echo $usuario."<br>";
		   	$encriptado = hash('sha1', $pass_post, false);
		   	$resultadoEncriptado = substr($encriptado, 0, -28); 
	
		   	//echo $resultadoEncriptado;
		   	$pass_post = $resultadoEncriptado;
		   	$con = mysqli_connect($this->servidor, $this->usuario, $this->clave, $this->baseDatos);
	   	if (!$con)
	   	{
          echo "No conecto";
	   	}
	   	else
	   	{
		$query_users = "SELECT email,password,tipo_user FROM usuarios WHERE email='$usuario_post' AND password='$pass_post'";
		   		$datos = mysqli_query($con,$query_users);
		   		$fila = mysqli_fetch_array($datos);
		   		
		   				 if ( (isset($con) && $usuario_post != '') && ($pass_post != '') && ( ($fila["email"] == $usuario_post &&  $fila["password"] == $pass_post )))
		   				 {
		   				 	echo "<script>alert('Bienvenido al SISTEMA INTEGRAL BEBEIT')</script>";		   		   	   		    		   		   	   		    		   		   	   		    
		   		   	   		    $usuario_post = $fila['email'];
		   				   	   	$pass_post = $fila['password'];
		   				   	   	$tipousuario = $fila['tipo_user'];		   				   	   
		   					//echo "<br>Bienvenido a Bebeit sistema integral<br>";
		   					//echo "<p>Iniciando sesion para " . $usuario_post . "</p>";		   					
		   				 }		   				   	   		   	     			   	   	   				   
		   	}//fin if conn
		   			 	   	
		 }
		   if ($datos = mysqli_query($con,$query_users)) 
		   {
		   		while($fila = mysqli_fetch_array($datos))
		   		{
		   			//echo "User: ".$fila["email"];
		   			//echo "<br>";
		   			//echo "Pass:".$fila["password"];
		   			//echo "<br>";
		   			//echo "Perfil: ".$fila["tipo_user"];
		   			//echo "<br>";
		   		}
		   		echo "<script>alert('Ingresa a la seccion correspondiente a tu puesto / rol')</script>";
		   	$fila = mysqli_fetch_array($datos);
		   //	print_r($fila);		   	 	   	 		
		 	}
		$datosUser = array();
		$datosUser[0] = $usuario_post;
		$datosUser[1] = $tipousuario;
		if ($datosUser[1]==null) {
			header('location:../index.php');
		}
		$var = $datosUser[1];
		return $var;		 
	}//fin func login
    public function getUserType()
    {
    	return $this->tipousuario;
    }
    public function getUser()
    {
    	return $this->usuario_post;
    }
} //fin de la Clase DB_mysql
?>
<?php 
class Insertar
{
	
    //proveedor
	public $nombreProveedor;
	public $tipoProducto;
	public $modelo;
	public $color;
    //pedidos
    public $folio;
    public $fecha;
    public $numCaja;
    public $proveedor;
    public $usuario;
    public $numarticulos;
    public $total;
    	//entrada
    public $folioFabrica;    public $numPaquetes;
    public $user;    public $fechaEntrada;
    
    //registro
	public $mensaje;
	public $nombre;
	public $email;
	public $password;
	public $tipo;
    public $nUnidades;
	public function insertUsuarios()
	{
		//$mensaje = null;
		$model = new Conexion();
		$conn = $model->conectar();
		$sql = "INSERT INTO usuarios(nombre,email,password,tipo_user)";
		$sql .= "VALUES(:nombre, :email, :password, :tipo_user)";  //concatenamos 
		$consulta = $conn->prepare($sql);
		$consulta->bindParam(':nombre',$this->nombre);
		$consulta->bindParam(':email',$this->email);
		$consulta->bindParam(':password',$this->password);
		$consulta->bindParam(':tipo_user',$this->tipo);

		if (!$consulta) 
		{
		   $this->mensaje = $conn->errorInfo();
		}
		else{
			$consulta->execute();
			$this->mensaje = 'Enhorabuena, datos guardados con exito';
			//$consulta->mysql_close();
		}	             
	}
	// para la tabla folios
    public $folio_fabrica; public $fecha_folio; public $numdeCajas; public $equipos;

	public function insertFolio()
	{     	
	 	$model = new Conexion();
	 	$conn = $model->conectar();
	 	$sql = "INSERT INTO `folios`( `folio_de_fabrica`, `fecha`, `cantidad_de_cajas`, `total_de_equipos`)";
	 	$sql .= "VALUES(:folio_de_fabrica, :fecha, :cantidad_de_cajas, :total_de_equipos)";   
	 	$consulta = $conn->prepare($sql);
	 	$consulta->bindParam(':folio_de_fabrica',$this->folio_fabrica);
	 	$consulta->bindParam(':fecha',$this->fecha_folio);
	 	$consulta->bindParam(':cantidad_de_cajas',$this->numdeCajas);
	 	$consulta->bindParam(':total_de_equipos',$this->equipos);	 
	 	if (!$consulta) 
	 	{
	 	   $this->mensaje = $conn->errorInfo();
	 	}
	 	else{
	 		$consulta->execute();
	 		$this->mensaje = 'Enhorabuena, datos guardados con exito';     
	 	}	             
	}

	public function insertProveedores()
	{
		
		$model = new Conexion();
		$conn = $model->conectar();
		$sql = "INSERT INTO proveedor(nombreProveedor,tipoProducto,modelo,color)";
		$sql .= "VALUES(:nombreProveedor, :tipo, :nombre_modelo, :color)";  //concatenamos 
		$consulta = $conn->prepare($sql);
		$consulta->bindParam(':nombreProveedor',$this->nombreProveedor);
		$consulta->bindParam(':tipoProducto',$this->tipoProducto);
		$consulta->bindParam(':modelo',$this->modelo);
		$consulta->bindParam(':color',$this->color);
		if (!$consulta) 
		{
		   $this->mensaje = $conn->errorInfo();
		}
		else{
			$consulta->execute();
			$this->mensaje = 'Enhorabuena, datos guardados con exito';
	
		}	             
	}

	//modelos
    public $idModelo;
    private $tipo_modelo;
    private $nombre_modelo;
    private $color_model;
    private $precio;
	
	
     
    public function insertPedidos()
    {     	
     	$model = new Conexion();
     	$conn = $model->conectar();
     	$sql = "INSERT INTO pedidos(folioFabrica,fecha,cantCaja,proveedor,tipo,usuario,cantidad,idmodelo)";
     	$sql .= "VALUES(:folioFabrica, :fecha, :cantCaja, :proveedor, :tipo,:usuario,:cantidad, :idmodelo)";   
     	$consulta = $conn->prepare($sql);
     	$consulta->bindParam(':folioFabrica',$this->folio);
     	$consulta->bindParam(':fecha',$this->fecha);
     	$consulta->bindParam(':cantCaja',$this->numCaja);
     	$consulta->bindParam(':proveedor',$this->proveedor);
     	$consulta->bindParam(':tipo',$this->tipoProd);
     	$consulta->bindParam(':usuario',$this->usuario);
     	$consulta->bindParam(':cantidad',$this->numarticulos);     	
     	$consulta->bindParam(':idmodelo',$this->idModelo);
     	if (!$consulta) 
     	{
     	   $this->mensaje = $conn->errorInfo();
     	}
     	else{
     		$consulta->execute();
     		$this->mensaje = 'Enhorabuena, datos guardados con exito';     
     	}	             
    }
    public function insertEntrada()
    {
       $model = new Conexion();
     	$conn = $model->conectar();
        $sql	= 'INSERT INTO `entrada` (`folio`, `total`, `fecha`, `paquetes`, `user`)';
        $sql .= "VALUES(:folio, :total, :fecha, :paquetes,:user)";  //concatenamos 
        $consulta = $conn->prepare($sql);
        $consulta->bindParam(':folio',$this->folioFabrica);
        $consulta->bindParam(':total',$this->total);
        $consulta->bindParam(':fecha',$this->fechaEntrada);
        $consulta->bindParam(':paquetes',$this->numPaquetes);
        $consulta->bindParam(':user',$this->user);
        if (!$consulta) 
        {
           $this->mensaje = $conn->errorInfo();
        }
        else{
        	$consulta->execute();
        	$this->mensaje = 'Enhorabuena, datos guardados con exito';
        
        }
    }	
}
?>
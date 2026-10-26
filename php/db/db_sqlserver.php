<?php 
@session_start();
/**
 * 
 */
//phpinfo();
$d = new db1();
$d->conexion_server();
class db
{
	private $usuario;
	private $password;  // en mi caso tengo contraseña pero en casa caso introducidla aquí.
	private $servidor;
	private $database;
	private $puerto;


	private $ssh_host;
	private $ssh_user;
	private $ssh_pass;
	private $ssh_port;
	function __construct()
	{
	    // $this->usuario = "diskcover"; //"root";
	    // $this->password = 'disk2017Cover'; //"";  // en mi caso tengo contraseña pero en casa caso introducidla aquí.
	    // $this->servidor = "mysql.diskcoversystem.com"; //"localhost";
	    // $this->database = "app_boot";
	    // $this->puerto = '13306';

	    // $this->usuario = $_SESSION['INICIO']['USU'];
	    // $this->password = $_SESSION['INICIO']['PASS'];  // en mi caso tengo contraseña pero en casa caso introducidla aquí.
	    // $this->servidor = $_SESSION['INICIO']['HOST'];
	    // $this->database = $_SESSION['INICIO']['DB'];

	    $this->usuario = 'sa';
	    $this->password = 'Tango456';  // en mi caso tengo contraseña pero en casa caso introducidla aquí.
	    $this->servidor = '186.4.219.172, 1487';
	    $this->database = 'APP';
	    $this->puerto = '1487';
		
	}
    function conexion_server()
	{

		  $connectionInfo = array("Database"=>$this->database, "UID" => $this->usuario,"PWD" => $this->password,"CharacterSet" => "UTF-8");
		// print_r($connectionInfo);die();
		$cid = sqlsrv_connect($this->servidor.', '.$this->puerto, $connectionInfo); //returns false
		if( $cid === false )
		   {
				echo 'no se pudo conectar a la base de datos';
				die( print_r( sqlsrv_errors(), true));
		   }else
		   {
		   	// echo 'sql con';
		   }
		return $cid;
	  
	}

	function conexion()
	{

		  $connectionInfo = array("Database"=>$this->database, "UID" => $this->usuario,"PWD" => $this->password,"CharacterSet" => "UTF-8");
		// print_r($connectionInfo);die();
		$cid = sqlsrv_connect($this->servidor.', '.$this->puerto, $connectionInfo); //returns false
		if( $cid === false )
		   {
				echo 'no se pudo conectar a la base de datos';
				die( print_r( sqlsrv_errors(), true));
		   }else
		   {
		   	// echo 'sql con';
		   }
		return $cid;
	  
	}


	function existente($sql)
	{
		$conn = $this->conexion();
		$stmt =sqlsrv_query($conn,$sql);
		$result = array();	
			if( $stmt === false) {
				die( print_r( sqlsrv_errors(), true) );
			}
			while( $row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC) ) 
	     	{
	     		$result[] = $row;
	     	}
	     	sqlsrv_close($conn);
	     	if(count($result)>0)
	     	{
	     		return 1;
	     	}else
	     	{
	     		return 0;
	     	}

	}
	function datos($sql)
	{		
		// print_r($sql);die();
		$sql = $this->sintaxis_SQL_SERVER($sql);
		// print_r($sql);die();
		$conn = $this->conexion();
		$stmt = sqlsrv_query($conn,$sql);
			// print_r($sql);die();
			$result = array();	
			if( $stmt === false) {
				die( print_r( sqlsrv_errors(), true) );
			}
			while( $row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC) ) 
	     	{
	     		$result[] = $row;
	     	}
	     	sqlsrv_close($conn);
	     	return $result;


	}
	function inserts($tabla,$datos)
	{
		$conn = $this->conexion();

		$valores = '';
 		$campos = '';
 		$sql = 'INSERT INTO '.$tabla;

 		foreach ($datos as $key => $value) {
 			$campos.=$value['campo'].',';
 			if(is_numeric($value['dato']))
 			{
 			  $valores.=$value['dato'].',';
 			}else
 			{
 				$valores.="'".$value['dato']."',";
 			}
 			 			
 		}
 		$campos = substr($campos, 0, -1);
 		$valores = substr($valores, 0, -1);
 		$sql.='('.$campos.')values('.$valores.');'; 	

 		// print_r($sql);die();	
		 $stmt = sqlsrv_query($conn, $sql);
		   if(!$stmt)
		   {
			   die( print_r( sqlsrv_errors(), true));
			   sqlsrv_close($conn);
			return -1;
		   }

		   sqlsrv_close($conn);
		   return 1;
	}

	function update ($tabla,$datos,$where)
	{
		$conn = $this->conexion();

		$valores = '';
 		$campos = '';
 		$sql = 'UPDATE '.$tabla.' SET ';

 		foreach ($datos as $key => $value) {
 			if(is_numeric($value['dato']))
 			{
 			   $sql.=$value['campo'].'='.$value['dato'];
 			}else
 			{
 				$sql.=$value['campo']."='".$value['dato']."'";
 			}
 			$sql.=',';
 			 			
 		}

 		$sql = substr($sql, 0, -1);

 		$sql.=" WHERE ";


 		foreach ($where as $key => $value) {
 			if(is_numeric($value['dato']))
 			{
 			  $sql.=$value['campo'].'='.$value['dato'];
 			}else
 			{
 			    $sql.=$value['campo']."='".$value['dato']."'";
 			//	$valores.='"'.$value['dato'].'",';
 			}
 			$sql.= " AND ";
 			 			
 		} 		
 		$sql = substr($sql, 0, -5);	
 	// 	if($tabla!='cliente')
 	// 	{
 		// print_r($sql);die();
 	// }
		 $stmt = sqlsrv_query($conn, $sql);
		   if(!$stmt)
		   {
			   die( print_r( sqlsrv_errors(), true));
			   sqlsrv_close($conn);
			return -1;
		   }

		   sqlsrv_close($conn);
		   return 1;


	}


	function delete($tabla,$datos)
	{
		$conn = $this->conexion();

		$valores = '';
 		$campos = '';
 		$sql = 'DELETE FROM '.$tabla.' WHERE ';

 		foreach ($datos as $key => $value) {
 			$campos.=$value['campo'].',';
 			if(is_numeric($value['dato']))
 			{
 			  $sql.=$value['campo'].'='.$value['dato'];
 			}else
 			{
 			    $sql.=$value['campo'].'="'.$value['dato'].'"';
 			//	$valores.='"'.$value['dato'].'",';
 			}
 			$sql.= " AND ";
 			 			
 		}
 		$sql = substr($sql, 0, -5);
 		//print_r($sql);	die();	
		 $stmt = sqlsrv_query($conn, $sql);
		   if(!$stmt)
		   {
			   die( print_r( sqlsrv_errors(), true));
			   sqlsrv_close($conn);
			return -1;
		   }

		   sqlsrv_close($conn);
		   return 1;


	}

	function sql_string($sql)
	{
	   $conn = $this->conexion();
        $stmt = sqlsrv_query($conn, $sql);
		   if(!$stmt)
		   {
			   die( print_r( sqlsrv_errors(), true));
			   sqlsrv_close($conn);
			return -1;
		   }

		   sqlsrv_close($conn);
		   return 1;		
	}

	function crear_db($sql,$conn)
	{
       $resultado = mysqli_query($conn, $sql);
		if(!$resultado)
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			return -1;
		}
		return 1;
		mysqli_close($conn);
		
	}

	function sql_string_cod_error($sql)
	{
		// print_r($sql);
		$conn = $this->conexion();
        $stmt = sqlsrv_query($conn, $sql);
		if(!$stmt)
		{
			$error = sqlsrv_errors();
			// print_r($error);die();
			return $error[0]['code'];
		}

		sqlsrv_close($conn);
		return 1;

	}

	function existente_db($sql,$conn)
	{
		$resultado = mysqli_query($conn, $sql);
		if(!$resultado)
		{

			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			return false;
		}else
		{
			return $resultado->num_rows;
			
		}

		mysqli_close($conn);

	}


}
?>
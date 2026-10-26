<?php
if(!class_exists('db'))
{
	include(dirname(__DIR__).'/db/db.php');
}
/**
 * 
 */
class loginM
{
	private $db;
	function __construct()
	{
		// $this->db = new db();
		$this->db = new db();
	}
	function add($tabla,$datos,$id_empresa)
	{
		return $this->db->inserts($tabla,$datos,$id_empresa);
	}
	function update($tabla,$datos,$where,$id_empresa)
	{
		return $this->db->update($tabla,$datos,$where,$id_empresa);
	}
	function delete($tabla,$datos,$id_empresa)
	{
		return $this->db->delete($tabla,$datos,$id_empresa);
	}
	function usuario_exist($parametros)
    {
    $sql = "SELECT * FROM usuario U
	INNER JOIN empresa E ON E.id_empresa = U.id_empresa 
	WHERE nick = '".$parametros['usu']."' AND pass='".$parametros['pass']."' AND E.RUC = '".$parametros['emp']."'";
	$result = $this->db->existente($sql,$parametros['idEmp']);
	// print_r($result);die();
	 return $result;
    }

    function usuario_datos($parametros)
    {
    $sql = "SELECT RUC,U.id_empresa,Nombre_Comercial,nick,id_usuario,pass,valor_iva,TIPO_BASE,serie,sucursal,N_MESAS,facturacion_electronica,procesar_automatico,T.tipo_usuario,U.tipo_usuario as 'id_tipo',encargado_envios,E.ambiente 
	FROM usuario U
	INNER JOIN empresa E ON E.id_empresa = U.id_empresa 
	LEFT JOIN  tipo_usuario T ON T.id_tipo_usuario = U.tipo_usuario 
	WHERE nick = '".$parametros['usu']."' AND pass='".$parametros['pass']."' AND E.RUC = '".$parametros['emp']."'";
	// print_r($sql);die();
	$result = $this->db->datos($sql,$parametros['idEmp']);
	// print_r($result);die();
	 return $result;
    }


    function notificaciones_usuario($estado =false,$leido=0,$id=false)
    {
    	$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
    	$usuario = $_SESSION['INICIO']['ID_USUARIO'];

    	$sql = "SELECT * FROM notificaciones 
    			WHERE empresa = '".$id_empresa."' 
    			AND usuario = '".$usuario."' ";
    			if($estado)
    			{
    				$sql.=" AND leido = '".$leido."'";
    			} 
    			if($id)
    			{
    				$sql.=" AND id_noti='".$id."'";
    			}

    	// print_r($sql);die();
    	$result = $this->db->datos($sql,$id_empresa);
        return $result;

    }


    function notificaciones_leida($id)
    {
    	$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
    	$sql = "UPDATE  notificaciones
    			SET leido = 1 
    			WHERE id_noti='".$id."'"; 

    	// print_r($sql);die();
    	$result = $this->db->sql_string($sql,$id_empresa);
        return $result;

    }

     function menu_lateral_dba($id_empresa,$menu=false,$submenu=false)
    {
    	$sql = "SELECT * FROM menu 
    	WHERE  1=1 ";
    	if($menu)
    	{
    	  $sql.=" AND LENGTH(codigo)=1";
    	}
    	if($submenu)
    	{
    		$sql.=" AND codigo like '".$submenu.".%'";
    	}
    	$sql.=" ORDER BY codigo"; 
    	$result = $this->db->datos($sql,$id_empresa);
        return $result;

    }
    function usuario_empresa($empresa,$ruc=false,$nick=false,$pass=false)
    {
    	$sql = "SELECT * from usuario WHERE id_empresa = '".$empresa."'";
    	if($ruc)
    	{
    		$sql.=" AND ci_ruc = '".$ruc."'";
    	}
    	if($nick)
    	{
    		$sql.=" AND nick = '".$nick."'";
    	}
    	if($pass)
    	{
    		$sql.=" AND pass = '".$pass."'";
    	}
    	// print_r($sql);die();

    	return $this->db->datos($sql,$empresa);
    }

     function menu_lateral_empresa($id_empresa,$menu=false,$submenu=false)
    {
    	$sql = "SELECT  codigo,detalle,link,icono FROM accesos_empresa AE
		INNER JOIN menu M ON AE.paginas = M.id_menu 
		 WHERE empresa ='".$id_empresa."' AND usuario='".$_SESSION['INICIO']['ID_USUARIO']."' ORDER BY codigo ";

    	if($menu)
    	{
    	  $sql ="SELECT * FROM menu WHERE codigo in (
				SELECT DISTINCT SUBSTR(codigo,1,1) as 'codigo' FROM accesos_empresa AE
				INNER JOIN menu M ON AE.paginas = M.id_menu  WHERE empresa ='".$id_empresa."' AND usuario='".$_SESSION['INICIO']['ID_USUARIO']."'
				ORDER BY codigo)";
    	}
    	if($submenu)
    	{
    		$sql =" SELECT  codigo,detalle,link,icono FROM accesos_empresa AE
		INNER JOIN menu M ON AE.paginas = M.id_menu 
		 WHERE empresa ='".$id_empresa."' AND usuario='".$_SESSION['INICIO']['ID_USUARIO']."' AND codigo like '".$submenu.".%' ORDER BY codigo ";
    	// print_r($sql);
    	}
    	// print_r($sql);die();
    	$result = $this->db->datos($sql,$id_empresa);
        return $result;

    }


    function buscar_empresa($ruc)
    {
    	$sql = "SELECT * FROM empresa WHERE RUC ='".$ruc."' "; 
    	// print_r($sql);die();
    	$this->db->default_conexion();
    	$conn = $this->db->conexion_server();
    	$resultado = $conn->query($sql,PDO::FETCH_ASSOC);
    	$datos = array();
    	while ($row = $resultado->fetch()) {
		    $datos[] =  $row;
		}
		$conn = null;		
		if(count($datos)>0)
		{
			return $datos[0];
		}else
		{
			return '-1';
		}

    }

    function buscar_codigo_secuencial($detalle=false,$tipo=false,$serie=false)
    {
    	$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
    	$sql = "SELECT * FROM codigos_secuenciales WHERE id_empresa='".$id_empresa."'";

    	if($detalle)
    	{
    		$sql.=" AND detalle_secuencial = '".$detalle."' ";
    	}
    	if($tipo)
    	{
    		$sql.=" AND tipo = '".$tipo."' ";
    	} 
    	if($serie)
    	{
    		$sql.=" AND Serie = '".$serie."' ";
    	} 
    	// print_r($sql);die();
    	$result = $this->db->datos($sql,$id_empresa);    
    	return $result;	

    }

    function base_principar()
    {
    	return $this->db->base_principal_datos();
    }

    function facturas()
    {

    	$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
    	$sql ="SELECT count(*) as 'cant' FROM facturas WHERE id_empresa = '".$_SESSION['INICIO']['ID_EMPRESA']."'";
    	return $this->db->datos($sql,$id_empresa);
    }
     function retenciones()
    {

    	$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
    	$sql ="SELECT count(*) as 'cant' FROM retenciones  WHERE id_empresa = '".$_SESSION['INICIO']['ID_EMPRESA']."'";
    	return $this->db->datos($sql,$id_empresa);    	
    }
     function guia_remision()
    {

    	$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
    	$sql ="SELECT count(*) as 'cant' FROM guia_remision  WHERE id_empresa = '".$_SESSION['INICIO']['ID_EMPRESA']."'";
    	return $this->db->datos($sql,$id_empresa);    	
    }
     function nota_credito()
    {

    	$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
    	$sql ="SELECT count(*) as 'cant' FROM nota_credito WHERE empresa = '".$_SESSION['INICIO']['ID_EMPRESA']."'";
    	return $this->db->datos($sql,$id_empresa);    	
    }
    // function liquidacion_compras()
    // {
    // 	$sql ="SELECT count(*) FROM   WHERE id_empresa = '".$_SESSION['INICIO']['ID_EMPRESA']."'";
    // 	return $this->db->datos($db);    	
    // }
	
}


?>
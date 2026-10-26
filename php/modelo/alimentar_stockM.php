<?php 
if(!class_exists('db'))
{
 include('../db/db.php');
}
/**
 * 
 */
class alimentar_stockM
{
	private $db;
	
	function __construct()
	{
		$this->db = new db();

	}

	function insert($tabla,$datos)
	{
		return $this->db->inserts($tabla,$datos,$_SESSION['INICIO']['ID_EMPRESA']);
	}
	function update($tabla,$datos,$where)
	{
		return $this->db->update($tabla,$datos,$where,$_SESSION['INICIO']['ID_EMPRESA']);
	}


	function listar_kardex()
	{
		$sql="SELECT id_kardex,id_producto as 'idp',P.referencia,P.nombre,entrada,valor_unitario,total_iva,TK.subtotal,TK.valor_total,existencias,costo,fecha_Fab,fecha_Exp,proveedor,serie,Factura 
			FROM kardex_temp TK
			INNER JOIN productos P ON TK.id_producto = P.id_productos
			WHERE 1=1
			AND usuario= '".$_SESSION['INICIO']['ID_USUARIO']."'
			AND fecha = '".date('Y-m-d')."'
			ORDER BY id_kardex DESC";
			return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}
	function listar_karde()
	{
		$sql="";
	}
	function listar_proveedor($query=false)
	{
		$sql="SELECT id_cliente as 'id',nombre,telefono,mail,direccion,ci_ruc,Razon_Social 
			 FROM cliente 
			 WHERE tipo = 'P'
			 AND id_empresa = '".$_SESSION['INICIO']['ID_EMPRESA']."'";
			 if($query)
			 {
			 	$sql.=" AND razonSocial like '%".$query."%'";
			 }
			 $sql.=' ORDER BY id_cliente DESC';
	    return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	function costo_stock($producto,$fecha)
	{
		$sql="SELECT id_kardex,entrada,salida,valor_unitario,valor_total,total_iva,TK.subtotal,existencias,costo 
			FROM trans_kardex TK
			INNER JOIN productos P ON TK.id_producto = P.id_productos
			WHERE 1=1 ";
			if($producto)
			{
				$sql.="	AND id_producto ='".$producto."'";
			}
			$sql.=" AND fecha>= '".$fecha."'
			ORDER BY id_kardex DESC";
	    return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}
	function producto_all($id)
	{
		$sql="SELECT * FROM productos WHERE id_productos = '".$id."'";
	    return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	function eliminar($id)
	{
		// $sql = "DELETE FROM kardex_temp WHERE id_kardex='".$id."'";
		$datos[0]['campo']='id_kardex';
		$datos[0]['dato']=$id;		
    	return $this->db->delete('kardex_temp',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
    	
		// print_r($sql);die();
		// return $this->db->sql_string($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	// function eliminar($id)
	// {
	// 	$sql="DELETE FROM kardex_temp WHERE id_kardex='".$id."'";
	// 	return $this->db->sql_string($sql,$_SESSION['INICIO']['ID_EMPRESA']);

	// }
}

?>
<?php 
require_once(dirname(__DIR__,1).'/db/db.php');

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

	function lista_articulos_stock($idempresa,$query=false,$categoria=false,$servicio=0,$referencia=false,$id=false)
	{
					$sql = "SELECT 
					    P.id_productos,
					    P.referencia,
					    P.nombre,
					    P.precio_uni,
					    COALESCE(MAX(TK.costo),0)                                AS costo,
					    COALESCE(SUM(TK.entrada) - SUM(TK.salida), 0) AS stock,
					    P.categoria,
					    P.iva, 
					    P.min,
					    P.max,
					    P.uni_medida

					FROM productos P
					LEFT JOIN trans_kardex TK 
					       ON P.id_productos = TK.id_producto 
					      AND P.id_empresa   = TK.empresa
					WHERE P.id_empresa = ".$idempresa."
					AND servicio = '".$servicio."'";
					if($categoria)
					{
						$sql.=" AND categoria= '".$categoria."' ";
					}  
					if($query)
					{
						$sql.=" AND (nombre like '%".$query."%' OR referencia  like '%".$query."%') ";
					}   

					if($id)
					{
						$sql.=" AND id_productos= '".$id."' ";
					}  
					if($referencia)
					{
						$sql.=" AND referencia = '".$referencia."'";
					}

		$sql.=" GROUP BY 
					    P.id_productos,
					    P.referencia,
					    P.nombre,
					    P.precio_uni,
					    P.categoria;";

		// print_r($sql);die();

    	return $this->db->datos($sql,$idempresa);
    }

    function lista_kardex($idempresa,$query=false,$categoria=false,$servicio=false,$referencia=false,$id=false,$entradas=false)
    {
    	$sql = "SELECT T.id_kardex as id,P.nombre as producto,T.fecha,entrada,salida,existencias,costo,CONCAT(F.serie,'-',F.num_factura) as factura ,detalle,O.num_orden as orden,C.nombre as categoria,C.id_categoria
    		FROM trans_kardex T
    		INNER JOIN productos P ON T.id_producto = P.id_productos
    		LEFT JOIN facturas F ON T.id_factura = F.id_factura
    		LEFT JOIN ordenes_trabajo O ON T.id_ordenTrabajo = O.id_orden 
    		LEFT JOIN categoria C ON P.categoria = C.id_categoria AND T.empresa = C.empresa     		
    		WHERE T.empresa = '".$idempresa."'";
    		if($query)
    		{
    			$sql.=" AND (P.nombre like '%".$query."%' or P.referencia like '%".$query."%')";
    		}

    		if($categoria)
			{
				$sql.=" AND categoria= '".$categoria."' ";
			}  
			
			if($id)
			{
				$sql.=" AND id_productos= '".$id."' ";
			}  
			if($referencia)
			{
				$sql.=" AND referencia = '".$referencia."'";
			}
			if($servicio)
			{
				if($servicio==1)
				{
					$sql.= " AND P.servicio = '".$servicio."'";
				}else{					
					$sql.= " AND P.servicio = '0'";
				}
			}

			if($entradas)
			{
				if($entradas==1)
				{
					$sql.= " AND T.entrada <> 0";
				}else{
					$sql.= " AND T.salida <> 0";					
				}
			}

			$sql.="  ORDER BY  T.fecha DESC";

			// print_r($sql);die();

			return $this->db->datos($sql,$idempresa);



    }
}

?>
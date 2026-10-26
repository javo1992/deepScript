<?php

// print_r(dirname(__DIR__));die();
include(dirname(__DIR__).'/db/db.php');
/**
 * 
 */
class lista_facturaM
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

	function delete_lineas_factura($empresa,$id,$factura)
	{
		$sql = "DELETE FROM lineas_factura WHERE 1=1";
		if($id)
		{
			$sql.=" AND id_lineas = '".$id."'";
		}
		if($factura)
		{
			$sql.=" AND id_factura= '".$factura."'";
		}
		return $this->db->sql_string($sql,$empresa);
	}

	function delete_factura($empresa,$id)
	{
		$sql = "DELETE FROM facturas WHERE id_empresa = '".$empresa."' ";
		if($id)
		{
			$sql.=" AND id_factura = '".$id."'";
		}

		return $this->db->sql_string($sql,$empresa);

	}

	function DCTipoPago()
	{
   	  $sql = "SELECT Codigo,CONCAT(Codigo,' ',Descripcion) As CTipoPago
         FROM tabla_referenciales_sri
         WHERE Tipo_Referencia = 'FORMA DE PAGO'
         ORDER BY Codigo ";

	      $result = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	         // print_r($result);die();
	        $datos =  array();
	        foreach ($result as $key => $value) {	        		
			$datos[] =array('Codigo'=>$value['Codigo'],'CTipoPago'=>$value['CTipoPago']);	
			 // $datos[] = $row;
		   }
	      return $datos;
	}
	
    function lista_facturas($parametros)
	{
		$sql= "SELECT id_factura as 'id',num_factura as 'num',fecha,C.nombre,total,serie,estado_factura as 'estado',Autorizacion,estado_pago as 'pago'
		FROM facturas F 
		INNER JOIN cliente C ON F.id_cliente = C.id_cliente 
		WHERE F.id_empresa = '".$_SESSION['INICIO']['ID_EMPRESA']."' ";
		if($parametros['query'])
		{			
			$sql.=" AND C.nombre LIKE '%".$parametros['query']."%'";
		}
		if($parametros['numfac'])
		{
			if(is_numeric($parametros['numfac']))
			{
				$sql.=" AND num_factura LIKE '%".$parametros['numfac']."%'";
			}
		}
		if($parametros['desde']!='' &&  $parametros['hasta']!='')
		{			
			$sql.=" AND fecha BETWEEN '".$parametros['desde']."' AND '".$parametros['hasta']."'";
		}

		if($parametros['serie'])
		{			
			$sql.=" AND serie = '".$parametros['serie']."'";
		}		
		$sql.=" ORDER BY F.id_factura DESC";
		$result = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	    return $result;
	}

	function lista_series()
	{
		$sql= "SELECT DISTINCT serie FROM facturas WHERE serie <> '' AND id_empresa='".$_SESSION['INICIO']['ID_EMPRESA']."'";
		$result = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	    return $result;
	}

	function linea_facturas($id,$id_empresa)
	{
		$sql= "SELECT id_lineas,producto,cantidad,LF.precio_uni,LF.iva,foto,total,subtotal,descuento,observacion FROM lineas_factura LF 
		INNER JOIN productos P ON LF.referencia = P.referencia
		WHERE id_factura = '".$id."'
		AND LF.Serie_No = '".$_SESSION['INICIO']['SERIE']."' 
		AND P.id_empresa ='".$id_empresa."'
		ORDER BY id_lineas DESC";
		// print_r($sql);die();
		$result = $this->db->datos($sql,$id_empresa);
	    return $result;
	}
	function linea_facturas_all($id,$id_empresa)
	{
		$sql= "SELECT * FROM lineas_factura LF 
		WHERE id_factura = '".$id."' ORDER BY id_lineas DESC";
		$result = $this->db->datos($sql,$id_empresa);
	    return $result;
	}

	function linea_detalle($id,$id_empresa)
	{
		$sql= "SELECT id_lineas as 'id',producto, precio_uni as 'precio',cantidad,iva,descuento,porc_descuento,total,subtotal FROM lineas_factura 
		WHERE id_lineas ='".$id."' ORDER BY id_lineas DESC";
		$result = $this->db->datos($sql,$id_empresa);
	    return $result;
	}

	function articulos_id($query,$empresa,$category=false)
	{
		$sql= "SELECT id_productos as 'id',nombre,precio_uni,foto,iva,referencia FROM productos WHERE id_empresa = '".$empresa."' and id_productos = '".$query."' ";
		if($category){
			$sql.=" AND categoria = '".$category."'";
		}
		$sql.= ' ORDER BY id_productos LIMIT 10;';
		// print_r($sql);die();
		$result = $this->db->datos($sql,$empresa);
	    return $result;
	}

	function cliente_factura($id,$id_empresa)
	{
		$sql="SELECT C.id_cliente,nombre,mail,C.telefono,C.direccion,ci_ruc,num_factura,serie,valor_iva,Autorizacion,fecha,estado_factura,Tipo_pago,datos_adicionales,estado_pago FROM facturas 
		INNER JOIN cliente C ON facturas.id_cliente = C.id_cliente
		INNER JOIN empresa ON facturas.id_empresa = empresa.id_empresa
		WHERE facturas.id_factura = '".$id."'";
		$result = $this->db->datos($sql,$id_empresa);
	    return $result;
				
	}

	function buscar_cliente($query,$idempresa)
	{
		$sql = "SELECT id_cliente,nombre,ci_ruc,telefono,mail,direccion FROM cliente WHERE nombre LIKE '%".$query."%' AND id_empresa = '".$idempresa."'";
		$result = $this->db->datos($sql);
	    return $result;

	}

	function datos_empresa($idempresa)
	{
		$sql = "SELECT * FROM empresa WHERE  id_empresa = '".$idempresa."'";
		$result = $this->db->datos($sql,$idempresa);
	    return $result;

	}

	function numero_factura($empresa)
	{
		$sql="SELECT max(o.num) as 'num' FROM
		(
			SELECT CAST(num_factura as INT) as 'num' FROM facturas WHERE id_empresa ='".$empresa."'
		) as o";
		$numero = $this->db->datos($sql,$empresa);
		return $numero[0]['num'];
	}

	 function buscar_facturas($empresa,$numero=false,$cliente=false)
	{
		$sql= "SELECT id_factura as 'id',num_factura as 'num',fecha,C.nombre,estado_factura  
		FROM facturas F 
		INNER JOIN cliente C ON F.id_cliente = C.id_cliente 
		WHERE F.id_empresa = '".$empresa."' 
		AND id_usuario = '".$_SESSION['INICIO']['ID_USUARIO']."'";
		if($numero)
		{			
			$sql.=" AND num_factura = '".$numero."'";			
		}
		if($cliente)
		{			
			$sql.=" AND id_cliente = '".$cliente."'";			
		}
		
		$sql.=" ORDER BY F.fecha DESC";
		$result = $this->db->datos($sql,$empresa);
	    return $result;
	}

	function categorias($empresa,$query=false)
	{
		$sql= "SELECT id_categoria as 'id',nombre 
		FROM categoria 
		WHERE estado ='A' AND empresa = '".$empresa."' ";
		if($query && $query !='0')
		{
			$sql.=" AND nombre LIKE '%".$query."%'";
		}
		// print_r($sql);die();
		$result = $this->db->datos($sql,$empresa);
	    return $result;
	}

	function datos_empresa_sucursal_usuario($idUsuario,$id_empresa)
	{
		$sql = "SELECT * FROM usuario U
		INNER JOIN empresa E ON U.id_empresa = E.id_empresa
		LEFT JOIN sucursales S ON U.sucursal = S.id_sucursal 
		WHERE id_usuario = '".$idUsuario."'";
		// print_r($sql);die();
		$result = $this->db->datos($sql,$id_empresa);
	    return $result;

	}

	function articulos($query=false,$ref=false,$categoria=false,$tipo=false,$id_empresa)
	{
		$sql= "SELECT id_productos,referencia,P.nombre,stock,precio_uni,peso,uni_medida,marca,modelo,C.nombre as 'categoria',inventario,iva,codigo_aux,nombre_sucursal,foto
		FROM productos P
		INNER JOIN categoria C ON P.categoria = C.id_categoria
 		LEFT JOIN sucursales Su ON P.sucursal = Su.id_sucursal
		WHERE id_empresa = '".$id_empresa."'";
		if($query)
		{
			$sql.=" AND P.nombre LIKE '%".$query."%'";
		}
		if($ref)
		{
			$sql.=" AND referencia LIKE '%".$ref."%'";
		}
		if($tipo=='P')
		{
			$sql.=" AND inventario ='1' ";
		}else
		{
			$sql.=" AND inventario ='0' ";
		}
		if($categoria)
		{
			$sql.=" AND P.categoria = '".$categoria."'";
		}
		if(isset($_SESSION['INICIO']['SUCURSAL']) && $_SESSION['INICIO']['SUCURSAL']!='')
		{
			$sql.=" AND sucursal='".$_SESSION['INICIO']['SUCURSAL']."' ";
		}
		$sql.= '  ORDER BY id_productos DESC LIMIT 50;';

		print_r($sql);die();
		$result = $this->db->datos($sql,$id_empresa);
	    return $result;
	}

	function articulos_all($id_empresa,$query=false,$ref=false,$categoria=false,$inventario=false,$materia_p=false,$servicios=false,$producto_ter = false)
	{
		$sql= "SELECT id_productos,referencia,P.nombre,stock,precio_uni,peso,uni_medida,marca,modelo,inventario,iva,codigo_aux,nombre_sucursal,foto,max,min
		FROM productos P
 		LEFT JOIN sucursales Su ON P.sucursal = Su.id_sucursal
		WHERE id_empresa = '".$id_empresa."'";
		if($query)
		{
			$sql.=" AND P.nombre LIKE '%".$query."%'";
		}
		if($ref)
		{
			$sql.=" AND referencia LIKE '%".$ref."%'";
		}
		if($inventario)
		{
			$sql.=" AND inventario ='".$inventario."' ";
		}
		if($servicios)
		{
			$sql.=" AND servicio ='".$servicios."' ";
		}
		if($materia_p)
		{
			$sql.=" AND materia_prima =1 ";
		}
		if($producto_ter)
		{
			$sql.=" AND producto_terminado ='".$producto_ter."' ";
		}
		if($categoria)
		{
			$sql.=" AND P.categoria = '".$categoria."'";
		}
		if(isset($_SESSION['INICIO']['SUCURSAL']) && $_SESSION['INICIO']['SUCURSAL']!='')
		{
			$sql.=" AND sucursal='".$_SESSION['INICIO']['SUCURSAL']."' ";
		}
		$sql.= '  ORDER BY id_productos DESC LIMIT 50;';

		// print_r($sql);die();
		$result = $this->db->datos($sql,$id_empresa);
	    return $result;
	}

	function articulos_all2($id_empresa,$query=false,$categoria=false,$inventario=false,$materia_p=false,$servicios=false,$producto_ter = false)
	{
		$sql= "SELECT id_productos,referencia,P.nombre,stock,precio_uni,peso,uni_medida,marca,modelo,C.nombre as 'categoria',inventario,iva,codigo_aux,nombre_sucursal,foto
		FROM productos P
		INNER JOIN categoria C ON P.categoria = C.id_categoria
 		LEFT JOIN sucursales Su ON P.sucursal = Su.id_sucursal
		WHERE id_empresa = '".$id_empresa."'";
		if($query)
		{
			$sql.=" AND (P.nombre LIKE '%".$query."%' OR referencia LIKE '%".$query."%')";
		}
		if($inventario)
		{
			$sql.=" AND inventario ='".$inventario."' ";
		}
		if($servicios)
		{
			$sql.=" AND servicio ='".$servicios."' ";
		}
		if($materia_p)
		{
			$sql.=" AND materia_prima =1 ";
		}
		if($producto_ter)
		{
			$sql.=" AND producto_terminado ='".$producto_ter."' ";
		}
		if($categoria)
		{
			$sql.=" AND P.categoria = '".$categoria."'";
		}
		if(isset($_SESSION['INICIO']['SUCURSAL']) && $_SESSION['INICIO']['SUCURSAL']!='')
		{
			$sql.=" AND sucursal='".$_SESSION['INICIO']['SUCURSAL']."' ";
		}
		$sql.= '  ORDER BY id_productos DESC LIMIT 50;';

		// print_r($sql);die();
		$result = $this->db->datos($sql,$id_empresa);
	    return $result;
	}

	
}


?>
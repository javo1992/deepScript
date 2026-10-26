<?php
if(!class_exists('db'))
{
   // print_r(dirname(__DIR__));die();
   include(dirname(__DIR__).'/db/db.php');
}
/**
 * 
 */
class mesaM
{
	private $db;
	function __construct()
	{
		// $this->db = new db();
		$this->db = new db();
	}

	function add($tabla,$datos)
	{
		return $this->db->inserts($tabla,$datos,$_SESSION['INICIO']['ID_EMPRESA']);
	}
	function update($tabla,$datos,$where)
	{
		return $this->db->update($tabla,$datos,$where,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	function update_app($tabla,$datos,$where,$empresa)
	{
		return $this->db->update($tabla,$datos,$where,$empresa);
	}

	function delete($tabla,$datos)
	{
		return $this->db->delete($tabla,$datos,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	
    function lista_facturas($query=false,$num_fac,$empresa='1')
	{
		$sql= "SELECT id_factura as 'id',num_factura as 'num',fecha,C.nombre,estado_factura  
		FROM facturas F 
		INNER JOIN cliente C ON F.id_cliente = C.id_cliente 
		WHERE F.id_empresa = '".$empresa."' ";
		if($query)
		{			
				$sql.=" AND C.nombre LIKE '%".$query."%'";
		}
		if($num_fac)
		{			
			$sql.=" AND num_factura LIKE '%".$num_fac."%'";
		}				
		$sql.=" ORDER BY F.fecha DESC";
		// print_r($sql);die();
		$result = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	    return $result;
	}

	function linea_facturas($id,$referencia=false)
	{
		$sql= "SELECT id_mesa,P.id_productos as 'idp',producto,cantidad,LF.precio_uni,LF.iva,foto,total,subtotal,descuento,servido,LF.referencia,procesar,llevar FROM mesa LF 
		INNER JOIN productos P ON LF.referencia = P.referencia
		WHERE LF.empresa = P.id_empresa AND mesa = '".$id."' AND LF.empresa ='".$_SESSION['INICIO']['ID_EMPRESA']."' ";
		if($referencia)
		{
			$sql.=" AND LF.referencia = '".$referencia."'";
		}
		$sql.=" ORDER BY id_mesa DESC";

		// print_r($sql);die();
		$result = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	    return $result;
	}

	function linea_facturas_all($id)
	{
		$sql= "SELECT * FROM lineas_factura LF 
		WHERE id_factura = '".$id."' ORDER BY id_lineas DESC";
		$result = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	    return $result;
	}

	function linea_detalle($id)
	{
		$sql= "SELECT id_lineas as 'id',producto, precio_uni as 'precio',cantidad,iva,descuento,porc_descuento,total,subtotal FROM lineas_factura 
		WHERE id_lineas ='".$id."' ORDER BY id_lineas DESC";
		$result = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	    return $result;
	}

	function articulos($query,$empresa,$category=false)
	{
		$sql= "SELECT id_productos as 'id',nombre,precio_uni,foto,iva
		FROM productos 
		WHERE id_empresa = '".$empresa."' ";
		if($query)
		{
		  $sql.=" AND nombre LIKE '%".$query."%' ";
		}
		if($category){
			$sql.=" AND categoria = '".$category."'";
		}
		$sql.= ' ORDER BY id_productos LIMIT 10';
		// print_r($sql);die();
		$result = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	    return $result;
	}

	function articulos_id($query,$empresa,$category=false)
	{
		$sql= "SELECT id_productos as 'id',nombre,precio_uni,foto,iva,referencia FROM productos WHERE id_empresa = '".$empresa."' and id_productos = '".$query."' ";
		if($category){
			$sql.=" AND categoria = '".$category."'";
		}
		$sql.= ' ORDER BY id_productos LIMIT 10';
		// print_r($sql);die();
		$result = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	    return $result;
	}

	function cliente_factura($id)
	{
		$sql="SELECT C.id_cliente,C.nombre,mail,C.telefono,C.direccion,C.ci_ruc,num_factura,facturas.serie,valor_iva,Autorizacion,fecha,estado_factura,usuario.nombre,total,subtotal,iva,descuento  as 'usuario' FROM facturas 
		INNER JOIN cliente C ON facturas.id_cliente = C.id_cliente
		INNER JOIN empresa ON facturas.id_empresa = empresa.id_empresa
    INNER JOIN usuario ON facturas.id_usuario = usuario.id_usuario
		WHERE facturas.id_factura= '".$id."'";
		$result = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	    return $result;				
	}

	function buscar_cliente($query=false,$idempresa,$ci=false,$id=false)
	{
		$sql = "SELECT id_cliente,nombre,ci_ruc,telefono,mail,direccion,Razon_Social FROM cliente WHERE 1=1";
		if($query)
			{
				$sql.="  AND nombre LIKE '%".$query."%' ";
			}
			if($ci)
			{
					$sql.="  AND ci_ruc like '".$ci."%' ";
			}
			if($id)
			{
					$sql.="  AND id_cliente =  '".$id."' ";
			}
			 $sql.=" AND id_empresa = '".$idempresa."'";

			 // print_r($sql);die();
		$result = $this->db->datos($sql,$idempresa);
	    return $result;

	}

	function datos_empresa($idempresa)
	{
		$sql = "SELECT * FROM empresa WHERE  id_empresa = '".$idempresa."'";
		$result = $this->db->datos($sql,$idempresa);
	    return $result;

	}

	function datos_empresa_serie($idempresa,$sucursal)
	{
		$sql = "SELECT * FROM usuario U
			INNER JOIN sucursales S ON U.sucursal = S.id_sucursal 
			WHERE empresa = '".$idempresa."' AND id_sucursal = '".$sucursal."'";
		$result = $this->db->datos($sql,$idempresa);
	   return $result;
	}


	function numero_factura($empresa)
	{
		$sql="SELECT max(o.num) as 'num' FROM
		(
			SELECT CAST(num_factura as INT) as 'num' FROM facturas WHERE id_empresa ='".$empresa."'
		) as o";

		// print_r($sql);die();
		$numero = $this->db->datos($sql,$empresa);
		return $numero[0]['num'];
	}

	 function buscar_facturas($empresa,$numero=false)
	{
		$sql= "SELECT id_factura as 'id',num_factura as 'num',fecha,C.nombre,estado_factura,total  
		FROM facturas F 
		INNER JOIN cliente C ON F.id_cliente = C.id_cliente 
		WHERE F.id_empresa = '".$empresa."' ";
		if($numero)
		{			
			$sql.=" AND num_factura = '".$numero."'";			
		}
		
		$sql.=" ORDER BY F.fecha DESC";
		$result = $this->db->datos($sql,$empresa);
	    return $result;
	}

	function categorias($empresa,$query=false)
	{
		$sql= "SELECT id_categoria as 'id',nombre,imagen 
		FROM categoria 
		WHERE estado ='A' AND empresa = '".$empresa."' ";
		if($query)
		{
			$sql.=" AND nombre LIKE '%".$query."%'";
		}
		$result = $this->db->datos($sql,$empresa);
	    return $result;
	}

	function datos_empresa_sucursal_usuario($idUsuario)
	{
		$sql = "SELECT * FROM usuario U
		INNER JOIN empresa E ON U.id_empresa = E.id_empresa
		LEFT JOIN sucursales S ON U.sucursal = S.id_sucursal 
		WHERE id_usuario = '".$idUsuario."'";
		$result = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	    return $result;
	}

	function mesa_ocupada($id)
	{
		$sql= "SELECT mesa FROM mesa WHERE mesa = '".$id."'";
		return $this->db->existente($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	function formas_pago($empresa)
	{
		$sql= "SELECT id_forma_pago as 'id', forma_pago as 'nombre' 
		FROM forma_pago WHERE mostrar_en = '1' AND estado_forma_pago = 'A' AND id_empresa='".$empresa."' ";
		$result = $this->db->datos($sql,$empresa);
	   return $result;
	}
	function pagos_agregados($mesa)
	{
		$sql="SELECT id_pagos as 'id',FP.forma_pago as 'pago',PC.valor_pago as 'valor' FROM pagos_caja PC
		INNER JOIN forma_pago FP ON PC.id_forma_pago = FP.id_forma_pago 
		WHERE mesa = '".$mesa."' AND estado=0";
		$result = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	   return $result;
	}

	function comanda_mesas()
	{
		$sql="SELECT DISTINCT mesa FROM mesa WHERE servido = 0 AND procesar = 1 AND empresa='".$_SESSION['INICIO']['ID_EMPRESA']."'";
		$result = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	   return $result;
	}

	function comanda_mesas_lineas($mesa)
	{
		$sql="SELECT * FROM mesa WHERE servido = 0 AND procesar = 1 AND mesa = '".$mesa."' AND empresa='".$_SESSION['INICIO']['ID_EMPRESA']."'";
		$result = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	   return $result;
	}

	function envios($id=false,$procesado=false,$entregado=false,$responsable=false)
	{
		$sql="SELECT id_localizacion as 'id',E.pedido,nombre,latitud,longitud,E.direccion,E.telefono,principal,secundario,numero_casa,responsable,num_factura,fecha,E.id_factura as 'idF' FROM entregas E 
		INNER JOIN facturas F ON E.id_factura = F.id_factura
		INNER JOIN cliente C ON F.id_cliente = C.id_cliente
		WHERE empresa='".$_SESSION['INICIO']['ID_EMPRESA']."' ";
		if($entregado)
		{
			$sql.=' AND entregado = 1';
		}else
		{
			$sql.= ' AND entregado = 0 ';
		}
		if($procesado)
		{
			$sql.= ' AND responsable IS NOT NULL'; 
		}else
		{
			$sql.= ' AND responsable is NULL'; 
		}
		if($id)
		{
			$sql.=" AND id_localizacion = ".$id;
		}
		if($responsable)
		{
			$sql.=" AND responsable ='".$_SESSION['INICIO']['ID_USUARIO']."' ";
		}
		$sql.=" ORDER BY fecha DESC";
		// print_r($sql);die();

		$result = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	   return $result;
	}

	function lista_motorizados()
	{
		$tipo = $_SESSION['INICIO']['MOTORIZADOS'];
		$sql = "SELECT id_usuario as 'id',nombre as 'nombre' FROM usuario WHERE tipo_usuario = '".$tipo."' AND id_empresa = '".$_SESSION['INICIO']['ID_EMPRESA']."'";
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	function revisar_caja_inicio()
	{
		$date = date('Y-m-d');
		$sql = "SELECT * FROM pagos_caja WHERE inicial = 1 AND valor_pago <> 0 AND fecha ='".$date."'";
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	function total_caja()
	{
		$date = date('Y-m-d');
		$sql = "SELECT SUM(valor_pago) as 'total' FROM pagos_caja WHERE fecha ='".$date."' AND valor_pago > 0 AND inicial=0";
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	function total_retiros()
	{
		$date = date('Y-m-d');
		$sql = "SELECT SUM(valor_pago) as 'total' FROM pagos_caja WHERE fecha ='".$date."' AND valor_pago < 0";
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);

	}

	function eliminar_pagos_caja()
	{
		return $this->db->delete('pagos_caja',$where=false,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	function lineas_mesa_all()
	{
		$sql= "SELECT * FROM mesa WHERE empresa='".$_SESSION['INICIO']['ID_EMPRESA']."'";
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	function eliminar_pago($parametros)
	{
		// print_r('s');die();
    if($parametros['id']!='')
    {
    	$datos[0]['campo'] = 'id_pagos';
    	$datos[0]['dato'] = $parametros['id'];
    	$datos[1]['campo'] = 'inicial';
    	$datos[1]['dato'] = '0';
    	// $sql = "DELETE FROM pagos_caja WHERE id_pagos = '".$parametros['id']."' AND inicial = 0";
    }else
    {
    	$datos[0]['campo'] = 'mesa';
    	$datos[0]['dato'] = $parametros['mesa'];
    	$datos[1]['campo'] = 'inicial';
    	$datos[1]['dato'] = '0';
    	$datos[2]['campo'] = 'stado';
    	$datos[2]['dato'] = '0';

    	// $sql = "DELETE FROM pagos_caja WHERE mesa = '".$parametros['mesa']."' AND inicial = 0 and estado=0";
    }
    // print_r($sql);die();
    return $this->db->delete('pagos_caja',$datos,$_SESSION['INICIO']['ID_EMPRESA']);

	}
	function numero_pedido($id,$empresa)
	{
		$sql ="SELECT * FROM mesa WHERE APP_CLIENTE='".$id."' AND facturado=1";
		return $this->db->datos($sql,$empresa);
	}

	function cargar_adicionales($id,$empresa)
	{
		$sql ="SELECT id_combo,C.id_producto as 'idp',P2.nombre,C.id_producto_add as 'idadd',P.nombre as 'adicional',P.foto 
		FROM combo C
		INNER JOIN productos P ON C.id_producto_add = P.id_productos
		INNER JOIN productos P2 ON C.id_producto = P2.id_productos 
		WHERE id_producto = '".$id."'";
		return $this->db->datos($sql,$empresa);
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

	
}


?>
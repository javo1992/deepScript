<?php 
include('../db/db.php');
/**
 * 
 */
class StoreM
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


	function categorias($empresa)
	{
		$sql = "SELECT id_categoria as 'ID',nombre as 'NOMBRE' FROM categoria WHERE empresa = '".$empresa."' AND estado = 'A'";
		return $this->db->datos($sql,$empresa);

	}

	function buscar_articulo($empresa,$query=false,$categoria=false,$id=false,$promociones=false)
	{
		$sql = "SELECT id_productos as 'ID',P.nombre AS 'NOMBRE',precio_uni AS 'PVP',foto AS 'FOTO',C.nombre AS 'CATEGORIA',descripcion2 as 'DETALLE',P.categoria as 'ID_CATE',referencia AS 'REFERENCIA',iva as 'IVA' FROM productos P 
		INNER JOIN categoria C ON P.categoria = C.id_categoria
		WHERE id_empresa = '".$empresa."'";
		if($categoria)
		{
			if($categoria!='T'){
			$sql.="	 AND categoria = '".$categoria."' ";
		   }
		}
		if($query)
		{
			$sql.="	AND P.nombre like '%".$query."%'";
		}
		if($id)
		{
			$sql.="	AND id_productos = ".$id;
		}
		if($promociones)
		{
			$sql.="	AND promocion = 1";
		}
		// print_r($sql);die();
		return $this->db->datos($sql,$empresa);

	}

	function buscar_cliente($email,$pass,$empresa)
	{
		$sql ="SELECT id_cliente as 'id_usuario',nombre as 'usuario',password as 'pass' FROM cliente WHERE mail='".$email."' AND password='".$pass."'";
		return $this->db->datos($sql,$empresa);
	}

	function buscar_cliente_datos($empresa,$id)
	{
		$sql ="SELECT nombre,mail as 'usuario',C.password as 'pass',mail as 'email',telefono,ci_ruc as 'ci'  FROM cliente C WHERE id_cliente='".$id."' AND id_empresa='".$empresa."'";
		return $this->db->datos($sql,$empresa);
	}


	function buscar_motorizado($email,$pass,$empresa)
	{
		$sql ="SELECT id_usuario,nombre,nick as 'usuario',pass,email,telefono,ci_ruc as 'ci' FROM usuario WHERE nick ='".$email."' AND pass='".$pass."' AND id_empresa='".$empresa."'";
		return $this->db->datos($sql,$empresa);
	}
	function buscar_motorizado_datos($empresa,$id)
	{
		$sql ="SELECT id_usuario,nombre,nick as 'usuario',pass,email,telefono,ci_ruc as 'ci'  FROM usuario WHERE id_usuario ='".$id."' AND id_empresa='".$empresa."'";
		// print_r($sql);die();
		return $this->db->datos($sql,$empresa);
	}

	function empresa($empresa)
	{
		$sql ="SELECT * FROM empresa WHERE id_empresa='".$empresa."'";
		return $this->db->datos($sql,$empresa);
	}
	function lista_carrito($empresa,$mesa)
	{
		$sql="SELECT id_mesa as 'ID',producto,cantidad,M.precio_uni,total,foto FROM mesa M
		INNER JOIN productos P ON M.referencia = P.referencia
		WHERE empresa = '".$empresa."' AND mesa = '".$mesa."' AND procesar=0";
		// print_r($sql);die();
		return $this->db->datos($sql,$empresa);
	}

	function delete_pedido($empresa,$id=false,$mesa=false,$entregado=false)
	{
		$sql = 'DELETE FROM mesa WHERE 1=1';
		if($id)
		{
		  $sql.=" AND id_mesa='".$id."'";

		}
		if($mesa)
		{
			$sql.= " AND mesa='".$mesa."'";
		}
		if($entregado)
		{
			$sql.=' AND servido = 1';
		}

		return $this->db->sql_string($sql,$empresa);

	}

	function canti_carrito($empresa,$mesa)
	{
		$sql="SELECT COUNT(*)as 'CANT' FROM mesa WHERE empresa = '".$empresa."' AND mesa = '".$mesa."' AND procesar = 0";
		// print_r($sql);die();
		return $this->db->datos($sql,$empresa);
	}
	function tamanio($id,$empresa)
	{
		$sql="SELECT id_tamanio as 'id',nombre,precio FROM tamanio WHERE id_producto = '".$id."'";
		return $this->db->datos($sql,$empresa);

	}
	function adicionales($empresa,$id=false,$nombre=false,$adi_nombre=false)
	{
		$sql="SELECT id_producto as 'idpro',id_combo as 'idcom',id_producto_add 'idadd',P.nombre,foto,CA.nombre as 'cate' FROM combo C
		INNER JOIN productos P on C.id_producto_add = P.id_productos
		INNER JOIN categoria CA on P.categoria = CA.id_Categoria
		WHERE 1=1 ";
		if($id)
		{
			$sql.=" AND id_producto = '".$id."'";
		}
		if($adi_nombre)
		{
			$sql.=" AND P.nombre = '".$adi_nombre."'";
		}
		return $this->db->datos($sql,$empresa);

	}

	
	function promos_articulos($empresa)
	{
		$sql="SELECT id_productos as 'id',nombre,foto FROM promos P
			INNER JOIN productos PR ON P.id_producto = PR.id_productos
			WHERE id_producto <> ''";
		return $this->db->datos($sql,$empresa);

	}

	function promos_categoria($empresa)
	{
		$sql="SELECT id_categorias as 'id',nombre FROM promos P
			INNER JOIN categoria C on P.id_categorias = C.id_categoria
			WHERE id_categorias <> ''";
		return $this->db->datos($sql,$empresa);

	}



	function mis_pedidos($empresa,$pedido=false,$factura=false)
	{
		$sql="SELECT latitud,longitud,E.id_factura as 'idF',num_factura,entregado,F.fecha,lat_responsable as 'lat_moto',lon_responsable as 'lon_moto'  
			FROM entregas E
			INNER JOIN facturas F ON E.id_factura = F.id_factura
			WHERE empresa = '".$empresa."'";
			if($pedido)
			{
				$sql.=" AND pedido = '".$pedido."' ";
			} 
			if($factura)
			{
				$sql.=" AND E.id_factura = '".$factura."' ";
			} 
			$sql.=" ORDER BY id_localizacion DESC";
			// print_r($sql);die();
		return $this->db->datos($sql,$empresa);
	}


	function mis_rutas_moto($empresa,$pedido=false,$factura=false)
	{
		$sql="SELECT latitud,longitud,E.id_factura as 'idF',num_factura,entregado,F.fecha,lat_responsable as 'lat_moto',lon_responsable as 'lon_moto'  
			FROM entregas E
			INNER JOIN facturas F ON E.id_factura = F.id_factura
			WHERE empresa = '".$empresa."'";
			if($pedido)
			{
				$sql.=" AND responsable = '".$pedido."' ";
			} 
			if($factura)
			{
				$sql.=" AND E.id_factura = '".$factura."' ";
			} 
			$sql.=" ORDER BY id_localizacion DESC";
			// print_r($sql);die();
		return $this->db->datos($sql,$empresa);
	}

	function numero_pedido($id,$empresa)
	{
		$sql ="SELECT * FROM mesa WHERE APP_CLIENTE='".$id."' AND facturado=1";
		return $this->db->datos($sql,$empresa);
	}

}
?>
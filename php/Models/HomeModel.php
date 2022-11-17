<?php
	class HomeModel extends Mysql{

		public function __construct(){
			parent::__construct();
		}

		public function getSubCategoriaById($id)
		{
			$query = "SELECT * FROM subcategorias where id = $id";
			$request = $this->select($query);
			return $request;
		}

		public function getCategorias()
		{
			$query = "SELECT cat.id as id_cat, cat.nombre as categoria, 
						sub.id as id_sub, sub.nombre as subcategoria 
						FROM categorias as cat 
						LEFT JOIN subcategorias as sub ON sub.id_categoria = cat.id";
			return $request = $this->select_all($query);
		}

		public function getProductosMasVendido()
		{
			$query = "SELECT prod.id as id_producto, prod.modelo, 
						prod.especificaciones, prod.precio, mar.nombre as marca_nombre, 
						SUM(com.calificacion) as total, prod.nombre as producto,
						prod.imagen
						FROM productos as prod 
						LEFT JOIN marcas as mar ON mar.id = prod.id_marca
						LEFT JOIN comentarios as com ON com.id_producto = prod.id
						GROUP BY prod.id 
						ORDER BY total DESC
						LIMIT 10";
			return $request = $this->select_all($query);
		}

		public function getProductosDestacados()
		{
			$query = "SELECT prod.id as id_producto, prod.modelo, prod.especificaciones, 
						prod.precio, mar.nombre as marca_nombre, prod.nombre as producto,
						prod.imagen
						FROM productos as prod 
						LEFT JOIN marcas as mar ON mar.id = prod.id_marca
						ORDER BY RAND()
						LIMIT 10";
			return $request = $this->select_all($query);
		}
	}
<?php
	class ProductoModel extends Mysql{

		public function __construct(){
			parent::__construct();
		}

		public function getProductosBySubCategoria($idSubCategoria)
		{
			$query = "SELECT prod.id as id_producto, prod.nombre as producto, prod.precio,
                sub.nombre as subCategoria, prod.imagen
                FROM rel_productos_subcategorias as rel
                LEFT JOIN productos as prod on prod.id = rel.id_producto
                LEFT JOIN subcategorias as sub on sub.id = rel.id_subcategoria
                WHERE rel.id_subcategoria = $idSubCategoria";
			return $request = $this->select_all($query);
		}

        public function getAccesoriosBySubCategoria($idSubCategoria)
        {
            $query = "SELECT prod.id as id_producto, prod.precio, prod.nombre as producto
                    FROM rel_productos_accesorios as rel
                    INNER JOIN productos as prod on prod.id = rel.id_producto
                    INNER JOIN accesorios as acc on acc.id = rel.id_accesorio
                    WHERE acc.id_subcategoria = $idSubCategoria";
            return $request = $this->select_all($query);
        }

        public function actualizarVisitasProducto($id)
        {
            $query = "SELECT visitas FROM productos where id = $id";
			$visitas = $this->select($query);
            $numVisitas = $visitas['visitas'] + 1;
           
            $query = "UPDATE productos SET visitas = ? where id = $id";
			$arrData = array($numVisitas);
			$request = $this->update($query,$arrData);
			return $request;
        }

        public function getProductoById($id)
        {
            $query = "SELECT prod.nombre as producto, prod.modelo, prod.especificaciones, 
                    prod.precio, prod.imagen, mar.nombre as marca, prod.created_at as creado
                    FROM productos as prod
                    LEFT JOIN marcas as mar on mar.id = prod.id_marca
                    WHERE prod.id = $id";
			$request = $this->select($query);
			return $request;
        }

        public function getComentariosProductosbyIdProducto($idProducto)
        {
            $query = "SELECT com.comentario, com.calificacion, 
                    com.created_at as creado, com.titulo 
                    FROM comentarios as com
                    INNER JOIN productos as prod on prod.id = com.id_producto
                    WHERE com.id_producto = $idProducto";
            return $request = $this->select_all($query);
        }

        public function getProductoBusqueda($texto)
        {
            $query = "SELECT prod.id as id_producto, prod.nombre as producto, prod.precio,
                sub.nombre as subCategoria, prod.imagen
                FROM rel_productos_subcategorias as rel
                LEFT JOIN productos as prod on prod.id = rel.id_producto
                LEFT JOIN subcategorias as sub on sub.id = rel.id_subcategoria
                WHERE prod.modelo LIKE '%" . $texto . "%'
                OR prod.nombre LIKE '%" . $texto . "%'
                OR prod.especificaciones LIKE '%" . $texto . "%'";
			return $request = $this->select_all($query);
        }

        public function insertarMarcas($marca)
        {
            $query_insert = "INSERT INTO marcas(nombre) values (?)";
			$arrData = array($marca);
			$request_insert = $this->insert($query_insert,$arrData);
			return $request_insert;
        }

        public function insertarCategorias($categoria)
        {
            $query_insert = "INSERT INTO categorias(nombre) values (?)";
			$arrData = array($categoria);
			$request_insert = $this->insert($query_insert,$arrData);
			return $request_insert;
        }

        public function insertarSubCategorias($subcategoria, $idCategoria)
        {
            $query_insert = "INSERT INTO subcategorias(nombre, id_categoria) values (?,?)";
			$arrData = array($categoria, $idCategoria);
			$request_insert = $this->insert($query_insert,$arrData);
			return $request_insert;
        }

        public function insertarProducto(
            $producto,
            $idMarca,
            $modelo,
            $especificaciones,
            $precio,
            $imagen
        )
        {
            $query_insert = "INSERT INTO 
                                productos(nombre, id_marca, modelo, especificaciones, precio, imagen) 
                                values (?, ?, ?, ?, ?, ?)";
			$arrData = array($producto, $idMarca, $modelo, $especificaciones, $precio, $imagen);
			$request_insert = $this->insert($query_insert,$arrData);
			return $request_insert;
        }

        public function insertarComentario($titulo, $comentario, $producto, $calificacion)
        {
            $query_insert = "INSERT INTO 
                                comentarios(titulo, comentario, calificacion, id_producto) 
                                values (?, ?, ?, ?)";
			$arrData = array($titulo, $comentario, $calificacion, $producto);
			$request_insert = $this->insert($query_insert,$arrData);
			return $request_insert;
        }

        public function insertarAccesorio($accesorio, $idSubCategoria, $imagen)
        {
            $query_insert = "INSERT INTO 
                                comentario(nombre, id_subcategoria, imagen) 
                                values (?, ?, ?)";
			$arrData = array($accesorio, $idSubCategoria, $imagen);
			$request_insert = $this->insert($query_insert,$arrData);
			return $request_insert;
        }

        public function insertarRelProdSub($idProducto, $idSubCategoria)
        {
            $query_insert = "INSERT INTO 
                                comentario(id_producto, id_subcategoria) 
                                values (?, ?)";
			$arrData = array($idProducto, $idSubCategoria);
			$request_insert = $this->insert($query_insert,$arrData);
			return $request_insert;
        }

        public function insertarRelProdAcc($idSubCategoria, $idAccesorio)
        {
            $query_insert = "INSERT INTO 
                        rel_productos_accesorios(id_producto, id_accesorio) 
                        values (?, ?)";
            $arrData = array($idSubCategoria, $idAccesorio);
            $request_insert = $this->insert($query_insert,$arrData);
            return $request_insert;
        }

        public function getProductoRandom()
        {
            $query = "SELECT * FROM productos
                        ORDER BY RAND()
                        LIMIT 1;";
            $request = $this->select($query);
            return $request; 
        }

        public function getCategoriaRandom()
		{
			$query = "SELECT * FROM categorias
                        ORDER BY RAND()
                        LIMIT 1;";
			$request = $this->select($query);
			return $request;
		}

        public function getSubCategoriaRandom()
		{
			$query = "SELECT * FROM subcategorias
                        ORDER BY RAND()
                        LIMIT 1;";
			$request = $this->select($query);
			return $request;
		}

        public function getMarcaRandom()
        {
            $query = "SELECT * FROM marcas
                        ORDER BY RAND()
                        LIMIT 1;";
			$request = $this->select($query);
			return $request;
        }

        public function getAccesorioRandom()
        {
            $query = "SELECT * FROM accesorios
                        ORDER BY RAND()
                        LIMIT 1;";
			$request = $this->select($query);
			return $request;
        }
    }
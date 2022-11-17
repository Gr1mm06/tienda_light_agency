<?php 

class Producto extends Controllers
{	
	public function __construct()
    {
		parent::__construct();
	}

    public function mostrarProductosBySubcategoria($idSubCategoria)
	{
		try {
			$productos = $this->model->getProductosBySubCategoria($idSubCategoria);
			$accesorios = $this->model->getAccesoriosBySubCategoria($idSubCategoria);
            if (empty($productos)) {
                $subCategoria = 'No hay productos para esta subcategoria';
            } else {
                $subCategoria = $productos[0]['subCategoria'];
            }
			//isArray($productos);
            $data = 
                [
                    'productos' => $productos,
                    'accesorios' => $accesorios,
                    'subCategoria' => $subCategoria,
                ];

            $this->views->getViews($this, 'productosSubCat',$data);
		} catch ( Exception $e ) {
            echo "Error: " . $e->getMessage();
		}
	}

    public function detalleProducto($idProducto)
    {
        try {
			$producto = $this->model->getProductoById($idProducto);
            $comentarios = $this->model->getComentariosProductosbyIdProducto($idProducto);

            $this->model->actualizarVisitasProducto($idProducto);
			
			//sArray($subCategoria);
            $data = 
                [
                    'producto' => $producto,
                    'comentarios' => $comentarios,
                ];

            $this->views->getViews($this, 'detalleProducto',$data);
		} catch ( Exception $e ) {
            echo "Error: " . $e->getMessage();
		}
    }

    public function buscar($busqueda)
    {
        try {
            $busqueda = str_replace('_', ' ', $busqueda);
			$productos = $this->model->getProductoBusqueda($busqueda);

            $data = 
                [
                    'productos' => $productos,
                ];

            $this->views->getViews($this, 'busqueda',$data);
		} catch ( Exception $e ) {
            echo "Error: " . $e->getMessage();
		}
    }

    public function generarInformacionBasica()
    {
        $cantidadProductos  = $_POST["cantidad"];
        $cantidadComentarios = 10;
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyz';
        try {
            if ($cantidadProductos == 200) {
                $cantidadComentarios = 1000;
            } 
            $this->_guardarMarcas();
            $this->_guardarCategorias($caracteres, 10);
            $this->_guardarSubCategoria($caracteres, 10);
            $this->_guardarProductos($caracteres, $cantidadProductos);
            $this->_guardarComentarios($caracteres, $cantidadComentarios);
            $this->_guardarAccesorios($caracteres, 10);
            $this->_guardarRelacionProductoSubcategoria(10);
            return json_encode(true);
        } catch (Exception $e ) {
            crearLog("Error: " . $e->getMessage());
            echo "Error: " . $e->getMessage();
            return json_encode(false);
        }
        
    }

    private function _guardarMarcas()
    {
        $marcas = 
        [
            'GHIA',
            'VORAGO',
            'YEYIAN',
            'EVOTEC',
            'PERFECT CHOICE',
            'APPLE',
            'GAME FACTOR',
            'OPG',
            'BENQ',
            'LG'
        ];
        $numRegistros = 1;
        
        for ($i=0;$i<=9;$i++) {
            try {
                
                $this->model->insertarMarcas($marcas[$i]);       

                crearLog("Registro guardado: " . $marcas[$i] . " en la tabla marcas");

                $numRegistros++;
            } catch (Exception $e ) {
                crearLog("Error: " . $e->getMessage());
            }
        }
        crearLog("Cantidad de registros guardados en la tabla marcas: " . $numRegistros);
        return true;
    }

    private function _guardarCategorias($caracteres, $cantidad)
    {
        $numRegistros = 0;
        for ($i=1;$i<=$cantidad;$i++) {
            try {
                $categoria = substr(str_shuffle($caracteres), 0, 10);
                $this->model->insertarCategorias($categoria);       

                crearLog("Registro guardado: " . $categoria . " en la tabla categorias");

                $numRegistros++;
            } catch (Exception $e ) {
                crearLog("Error: " . $e->getMessage());
            }
        }
        crearLog("Cantidad de registros guardados en la tabla categorias: " . $numRegistros);
        return true;
    }

    private function _guardarSubCategoria($caracteres, $cantidad)
    {
        $numRegistros = 0;
        for ($i=1;$i<=$cantidad;$i++) {
            try {
                $subcategoria = substr(str_shuffle($caracteres), 0, 10);
                $idCategoria = $this->model->getCategoriaRandom();
                $this->model->insertarSubCategorias($subcategoria, $idCategoria['id']);   

                crearLog("Registro guardado: " . $subcategoria . " en la tabla subcategorias");

                $numRegistros++;
            } catch (Exception $e ) {
                crearLog("Error: " . $e->getMessage());
            }
        }
        crearLog("Cantidad de registros guardados en la tabla subcategorias: " . $numRegistros);
        return true;
    }

    private function _guardarProductos($caracteres, $cantidad)
    {
        $especificaciones = 
            [
                '14"',
                '165Hz',
                '16GB',
                'AMD Ryzen 5 5600G 3.90GHz',
                '1000VA',
                'Entrada 94-150V',
                'Inalámbrico',
                'Láser',
                '128GB',
                '5378 Mbit/s',
                '4x RJ-45',
                'FULL HD'
            ];

        $modelos = 
            [
                '90IG06T0-MA1100',
                'WHW0301',
                'A.6X',
                'SG-IC018',
                'SG-IC049',
                'P2722H',
                'E2216HV',
                '5-14ALC05',
                'D513UA',
                '5-14ALC05'
            ];
        $numRegistros = 0;
        for ($i=1;$i<=$cantidad;$i++) {
            try {
                $producto = substr(str_shuffle($caracteres), 0, 10);
                $precio = mt_rand(10000,60000);
                $especificacion = array_rand($especificaciones, 3);
                $especificacion = 
                        $especificaciones[$especificacion[0]] . ', ' . 
                        $especificaciones[$especificacion[1]] . ', ' . 
                        $especificaciones[$especificacion[2]];
                $modelo = array_rand($modelos, 1);
                $modelo = $modelos[$modelo];
                $imagen = 'productos.png';
                
                $idMarca = $this->model->getMarcaRandom();

                $this->model->insertarProducto(
                        $producto, 
                        $idMarca['id'], 
                        $modelo,
                        $especificacion,
                        $precio,
                        $imagen
                    );   

                crearLog("Registro guardado: " . $producto . " en la tabla productos");

                $numRegistros++;
            } catch (Exception $e ) {
                crearLog("Error: " . $e->getMessage());
            }
        }
        crearLog("Cantidad de registros guardados en la tabla productos: " . $numRegistros);
        return true;
    }

    private function _guardarComentarios($caracteres, $cantidad)
    {
        $content = file_get_contents('http://loripsum.net/api/1/short');
        $numRegistros = 0;
        for ($i=1;$i<=$cantidad;$i++) {
            try {
                $titulo = substr(str_shuffle($caracteres), 0, 10);
                $calificacion = mt_rand(1,5);

                $idProducto = $this->model->getProductoRandom();
                
                $this->model->insertarComentario($titulo, $content, $idProducto['id'], $calificacion);   

                crearLog("Registro guardado: " . $titulo . " en la tabla comentario");

                $numRegistros++;
            } catch (Exception $e ) {
                crearLog("Error: " . $e->getMessage());
                $numRegistros  = $numRegistros - 1;
                if($numRegistros < 0){
                    $numRegistros = 0;
                }
            }
        }
        crearLog("Cantidad de registros guardados en la tabla comentarios : " . $numRegistros);
        return true;
    }

    private function _guardarAccesorios($caracteres, $cantidad)
    {
        $numRegistros = 0;
        for ($i=1;$i<=$cantidad;$i++) {
            try {
                $nombre = substr(str_shuffle($caracteres), 0, 10);
                $imagen = 'accesorios.jpg';

                $idSubCategoria = $this->model->getSubCategoriaRandom();

                $this->model->insertarAccesorio($nombre, $idSubCategoria['id'], $imagen);   

                crearLog("Registro guardado: " . $nombre . " en la tabla accesorios");

                $numRegistros++;
            } catch (Exception $e ) {
                crearLog("Error: " . $e->getMessage());
            }
        }
        crearLog("Cantidad de registros guardados en la tabla accesorios : " . $numRegistros);
        return true;
    }

    private function _guardarRelacionProductoSubcategoria($cantidad)
    {
        $numRegistros = 0;
        for ($i=1;$i<=$cantidad;$i++) {
            try {
                $idProducto = $this->model->getProductoRandom();
                $idSubCategoria = $this->model->getSubCategoriaRandom();

                $this->model->insertarRelProdSub($idProducto['id'], $idSubCategoria['id']);   

                crearLog("Registro guardado el id producto : " . $idProducto['id'] . 
                            "con relacion al id subcategoria : ". $idSubCategoria['id'] .
                            " en la tabla rel_productos_subcategorias");

                $numRegistros++;
            } catch (Exception $e ) {
                crearLog("Error: " . $e->getMessage());
            }
        }
        crearLog("Cantidad de registros guardados en la tabla rel_productos_subcategorias : " . $numRegistros);
        return true;
    }

    private function _guardarRelacionProductoAccesorio($cantidad)
    {
        $numRegistros = 0;
        for ($i=1;$i<=$cantidad;$i++) {
            try {
                $idProducto = $this->model->getProductoRandom();
                $idAccesorio = $this->model->getAccesorioRandom();

                $this->model->insertarRelProdAcc($idProducto['id'], $idAccesorio['id']);   

                crearLog("Registro guardado el id producto : " . $idProducto['id'] .
                            " con relacion al id accesorio : " . $idAccesorio['id'] . 
                            "en la tabla rel_productos_accesorios");

                $numRegistros++;
            } catch (Exception $e ) {
                crearLog("Error: " . $e->getMessage());
            }
        }
        crearLog("Cantidad de registros guardados en la tabla rel_productos_accesorios : " . $numRegistros);
        return true;
    }
}
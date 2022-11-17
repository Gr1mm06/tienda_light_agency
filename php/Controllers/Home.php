<?php 

class Home extends Controllers
{	

	private $productoModel = 'Producto';

	public function __construct()
    {
		parent::__construct();
	}

	public function home($params)
    {
		try {
			$menu = array();
			$menuRegistros = $this->model->getCategorias();
			$productosMasVendido = $this->model->getProductosMasVendido();
			$productosDestacados = $this->model->getProductosDestacados();
			
			foreach ($menuRegistros as $reg => $r) {
				$menu[$r['categoria']][] = 
					[
						'id_categoria' => $r['id_cat'],
						'id_subcategoria' => $r['id_sub'],
						'subcategoria' => $r['subcategoria']
					]; 
			}

			//isArray($menu);
			$data = 
				[
					'menu' => $menu,
					'productosMasVendido' => $productosMasVendido,
					'productosDestacados' => $productosDestacados
				];

			$this->views->getViews($this, 'home', $data);
		} catch ( Exception $e ) {
            echo "Error: " . $e->getMessage();
		}
	}
}
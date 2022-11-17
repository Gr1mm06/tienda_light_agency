/*Tabla Marcas*/;
INSERT INTO `marcas` (`id`, `nombre`) VALUES
	(1, 'DELL'),
	(2, 'HP'),
	(3, 'TOSHIBA'),
	(4, 'LENOVO'),
	(5, 'ACER'),
	(6, 'ALIENWARE'),
	(7, 'LANIX'),
	(8, 'HUAWEI'),
	(9, 'GATEWAY'),
	(10, 'SAMSUNG'),
	(11, 'WINDOWS');

/*Tabla Marcas*/;
INSERT INTO `categorias` (`id`, `nombre`) VALUES
	(1, 'Computadoras'),
	(2, 'Energia'),
	(3, 'Hogar'),
	(4, 'Computo (Hardware)'),
	(5, 'Audio y Video'),
	(6, 'Impresion y Copiado'),
	(7, 'Punto de Venta'),
	(8, 'Seguridad y Vigilencia'),
	(9, 'Software'),
	(10, 'Telecomunicacion');


/*Tabla subcategorias*/;	
INSERT INTO `subcategorias` (`id`, `nombre`, `id_categoria`) VALUES
	(1, 'PC de Escritorio', 1),
	(2, 'Laptop', 1),
	(3, 'Smart Home', 3),
	(4, 'Monitores', 4),
	(5, 'Impresoras', 6),
	(6, 'Proyectores', 5),
	(7, 'Fuentes de poder', 2),
	(8, 'Sistemas POS', 7),
	(9, 'Sistemas Operativos', 9),
	(10, 'Telefonia Movil', 10),
	(11, 'Kit de Alarma', 8);
	
/*Tabla productos*/;	
INSERT INTO `productos` (`id`, `nombre`, `id_marca`, `modelo`, `especificaciones`, `precio`, `visitas`, `imagen`) VALUES
	(1, 'Laptop Lenovo IdeaPad 3', 4, '14ITL05', '14" HD, Intel Core i3-1115G4 3GHz, 8GB, 512GB SSD, Windows 11 Home 64-bit, Español, Plata',
	 		8249.0, 0, 'productos.png'),
	(2, 'Laptop ASUS L410', 5, '90NB0Q15-M002F0', '14" HD, Intel Celeron N4020 1.10GHz, 4GB, 128GB eMMC, Windows 11 Pro 64-bit, Español, Negro',4419.00, 0, 'productos.png'),
	(3, 'Computadora Dell OptiPlex 7090 SFF', 1, 'W29VK3WY-VW','Intel Core i7-10700 2.90GHz, 8GB, 1TB HDD, Windows 10 Pro 64-bit (2021)', 17319.00, 0, 'productos.png'),
	(4, 'Computadora Huawei MateStation B515', 8, '53011VHL','AMD Ryzen 5 4600G 3.70GHz, 8GB, 256GB SSD, Windows 10 Home 64-bit', 11849.00, 0, 'productos.png'),
	(5, 'Monitor HP P24v G4', 2, '9TT78AA', 'LED 23.8", Full HD, Widescreen, HDMI, Negro', 3179.00, 0, 'productos.png'),
	(6, 'HP LaserJet M111w', 2, '7MD68A', 'Blanco y Negro, Láser, Inalámbrico, Print', 2539.00, 0, 'productos.png'),
	(7, 'Smartphone Samsung Galaxy A52', 10, 'SM-A525MZKELTM', '6.5", 128GB, 6GB RAM, Negro', 7679.00, 0, 'productos.png'),
	(8, 'Kit Sistema de Alarma C30', 5, 'C30', 'Inalámbrico, WiFi, RF, Incluye Panel/PIR/Magneto/2 Llaveros', 2329.00, 0, 'productos.png'),
	(9, 'Microsoft Windows 10 Pro Español', 11, 'FQC-08981', '64-bit, 1 Usuario, OEM', 3139.00, 0, 'productos.png'),
	(10, 'PTE0105W-4-120 Sistema POS', 7, 'PTE0105W-4-120', '15", Intel Celeron J1900 2GHz, 4GB, 120GB SSD', 13919.00, 0, 'productos.png');
	
/*Tabla comentarios*/;
INSERT INTO `comentarios` (`id`,`titulo` ,`comentario`, `calificacion`, `id_producto`) VALUES
	(1,'Producto regular' ,'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 3, 1),
	(2,'Producto Malo' ,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc consectetur.', 2, 1),
	(3,'Excelente Producto' ,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras viverra.', 5, 6),
	(4,'Buena Calidad' ,'Etiam gravida odio fermentum imperdiet elementum. Suspendisse ut nunc mauris.', 4, 8),
	(5,'Pesima Calidad' ,'Aliquam interdum tristique ex, ac suscipit sapien luctus id. Pellentesque.', 1, 10),
	(6,'Regular' ,'Quisque eleifend, nibh vel efficitur efficitur, tortor augue ultrices turpis.', 3, 3),
	(7,'La mejor compra' ,'Aliquam in laoreet magna. Maecenas vitae dapibus arcu, sed aliquam.', 5, 2),
	(8,'Mala compra' ,'Vivamus at odio elementum, tristique leo non, lobortis magna. Pellentesque.', 1, 5),
	(9,'Pudo haber sido mejor' ,'Nulla sodales nec nisl vitae lacinia. Nunc vehicula eros libero.', 2, 7),
	(10,'Buena eleccion' ,'Phasellus ipsum nisl, aliquam et mi sit amet, posuere ultricies.', 4, 9);
	
	
/*Tabla rel_productos_subcategorias*/;	
INSERT INTO `rel_productos_subcategorias` (`id`, `id_producto`, `id_subcategoria`) VALUES
	(1, 1, 2),
	(2, 2, 2),
	(3, 3, 1),
	(4, 4, 1),
	(5, 5, 4),
	(6, 6, 5),
	(7, 7, 10),
	(8, 8, 11),
	(9, 9, 9),
	(10, 10, 8);

/*Tabla accesorios*/;	
INSERT INTO `accesorios` (`id`, `nombre`, `id_subcategoria`, `imagen`) VALUES
	(1, 'Soporte para Monitores', 4, 'accesorios.jpg'),
	(2, 'Teclado', 1, 'accesorios.jpg'),
	(3, 'Mouse', 1, 'accesorios.jpg'),
	(4, 'Cartuchos', 5, 'accesorios.jpg'),
	(5, 'Toner', 5, 'accesorios.jpg'),
	(6, 'Mochilas', 2, 'accesorios.jpg'),
	(7, 'Cargaadores', 2, 'accesorios.jpg'),
	(8, 'Fundas', 2, 'accesorios.jpg'),
	(9, 'Filtros', 4, 'accesorios.jpg'),
	(10, 'Software', 1, 'accesorios.jpg');
	
/*Tabla rel_productos_accesorios*/;	
INSERT INTO `rel_productos_accesorios` (`id`, `id_producto`, `id_accesorio`) VALUES
	(1, 9, 10),
	(2, 2, 2),
	(3, 3, 1),
	(4, 4, 1),
	(5, 5, 4),
	(6, 6, 5),
	(7, 7, 10),
	(8, 8, 11),
	(9, 9, 9),
	(10, 10, 8);

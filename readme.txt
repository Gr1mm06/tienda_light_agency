Roberto Antonio Arroyo Pastor - FullStack - Nivel de Conocimiento 75% - sherk_258@hotmail.com
Intermendio(Aun que fue intermedio, hice algunos puntos de nivel avanzado)
Instalacion:
	- Primero se necesita PHP y Mysql instalado en la maquina, yo recomiendo bajar XAMPP ya que te facilita la instalacion
	- Una vez instalado PHP y MySQL, corremos los scripts sql que estan en la carpeta install, en esta carepta esan los siguientes scripts:
		- tienda.sql (es la estructura de la base de datos, tambien crea la base de datos como, en dado caso que se le quiera cambiar 
				el nombre es necesario abrir el script y en en el comando CREATE DATABASE cambiar el nombre al que quieras)
		-inserts.sql(este script contiende los insert para agregar datos a las tablas, vienen en orden para evitar problemas con los FK)
		-vista_comentarios_productos.sql(tiene el script para la creacion de vista del siguiente punto 
			"Crear una vista de los productos con sus comentarios, ordenados por mejor calificación	promedio.")
		-add_columna_visitas.sql(contiene el codigo para agregar la columna vistas a la tabla producto)
	-En la carpeta install hay una carpeta llamada config en esa carpeta hay un archivo, dentro de archivo podremos cambiar 
		el usuario, host, password y el nombre de la base datos y configurarla a nuestra convenencia
	-Con esto configurado, ya seria posible correr el proyecto, solo quedaria pasar el proyecto a la carpeta htdocs 
		en caso de tener xampp o ponerla en la carpeta correspondiente dependiento de lo que se este utilizando
Actividades Realizadas
	Base de datos
		-Se requiere un script que deberá contener la creación de un mínimo de 3 tablas donde se guardará la información del producto, 
			comentarios y categoría del producto. Deberá guardarse como mínimo el modelo, especificaciones y precio del producto; para los 
			comentarios se deberán guardar mínimo texto, nombre y clasificación. Y para las categorías deberán 
			tener la capacidad de estar anidadas.
		-Cada tabla deberá tener un código para insertar no menos de 10 registros por cada una y no hay limitación en las columnas
		-Crear una vista de los productos con sus comentarios, ordenados por mejor calificación promedio.
		-Cada tabla debe de tener sus índices, llaves foráneas y constraints.
		-Crear una tabla de accesorios asociados a la categoría del producto.
		-Como parte del script agregar el código para modificar la tabla de productos existente
			agregando una nueva columna con la cantidad de visitas a cada producto.
		-Agregar una tabla o columnas de metainformación que se actualice automáticamente,relacionada a cada producto para guardar 
			sus estadísticas como fecha de registro, fecha de modificación, cantidad de visitas, cantidad de “likes”, etc.
	PHP
		-Deberá utilizar PDO para conectarse con la base de datos y hacer un script en el nivel básico que agregue otros 10 
			registros a cada tabla. El script deberá generar un log donde reporte los errores y la cantidad de registros insertados.
		-Hacer un código donde genere 200 productos de forma aleatoria con especificaciones, marcas y modelos utilizando términos 
       			técnicos y precios en un rango de 10,000 hasta 60,000 MXN.
		-Hacer un código Lorem Ipsum para inicializar los comentarios con textos y calificaciones aleatorias, con un mínimo de 1,000 
			comentarios repartidos entre los productos.
	HTML
		-Crear un home que muestre el listado de categorías padres dentro de un menú.
		-Listado de 10 productos seleccionados aleatoriamente bajo el texto de productos
			destacados.
		-Debajo un listado de mínimo 10 productos más vendidos con base en su clasificación.
		-Cuando se dé click en una categoría, se abrirán categorías hijas y se mostrarán los dos
			listados, tanto destacados como de más vendidos filtrados por la categoría seleccionada.
		-Finalmente al visitar un producto se abrirá una nueva página donde se mostrará el detalle
			del producto con sus especificaciones y comentarios.
		-Agregar un campo y funcionalidad de búsqueda.

Comentarios:
	En el proyecto en la pagina principal a lado del campo de buscar hay un boton que dice "Generar Registros Basicos" ese 
		boton es el que corre el script para insertar informacion adicional a la bd y otro que es "Generar Registros Intermedio" 
		ese es para guardar los 200 productos y los mil comentarios, asi no supe donde ponerlos asi que los puse ahi.
	Hubo varias cosas que me hubiera gustado poner pero por tiempos no pude
	En el espacio de busqueda es necesario darle click al boton de la lupa
	







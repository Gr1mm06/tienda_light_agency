<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <?php require_once('header.php'); ?>
    <title>Tienda</title>
  </head>
  <body>
  	<header>
		<div class="contenedor">
			<div class="logo izquierda">
				<p><a href="<?php echo BASE_URL; ?>">Tienda</a></p>
			</div>
			<div class="derecha">
				<div  name="frmBusqueda" class="buscar">
					<input type="text" id="busqueda" name="busqueda" placeholder="Buscar">
					<button onclick="buscar();" class="icono fa fa-search"></button>
				</div>
				
			</div>
		</div>
	</header>
	<div>
    	<?php require_once('menu.php'); ?>
	</div>
	<div id="cuerpo" class="cuerpo" >
		<div class="col-md-12">
			<?php require_once('productosDestacados.php'); ?>
		</div>
		<div class="col-md-12">
    		<?php require_once('productosMasVendidos.php'); ?>
		</div>
	</div>
    <?php require_once('footer.php'); ?>
  </body>
</html>
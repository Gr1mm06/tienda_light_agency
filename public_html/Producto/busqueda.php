<div class="col-md-12" style="margin-left:20px;">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Busqueda</li>
    </ol>
    </nav>
    <div class="row">
        <?php foreach ($data['productos'] as $producto => $prod) { ?>
            <div class="card col-md-4" >
                <img class="card-img-top" src="<?php echo VIEWS; ?>images/productos/<?php echo $prod['imagen'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $prod['producto'] ?></h5>
                    <p class="card-text">Precio : $ <?php echo number_format($prod['precio'],  2, '.', ',') ?></p>
                    <a onclick="detalleProducto('<?php echo $prod['id_producto'] ?>')" class="btn btn-primary">Detalle</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
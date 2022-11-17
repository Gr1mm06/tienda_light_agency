<div class="col-md-12" style="margin-left:5px;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Detalle Producto</li>
        </ol>
    </nav>
    <div class="row">
        <div class="card col-md-6 " style="margin:auto;">
            <img class="card-img-top" src="<?php echo VIEWS; ?>images/productos/<?php echo $data['producto']['imagen'] ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $data['producto']['producto'] ?></h5>
                <input type="hidden" id="precio" value="<?php echo $data['producto']['precio'] ?>">
                <p class="card-text">Precio : $ <?php echo number_format($data['producto']['precio'],  2, '.', ',') ?></p>
                <p class="card-text">Marca : <?php echo $data['producto']['marca'] ?></p>
                <p class="card-text">Modelo : <?php echo $data['producto']['modelo'] ?></p>
                <p class="card-text">Especifiaciones : <?php echo $data['producto']['especificaciones'] ?></p>
                <p class="card-text">Forma de Pago : 
                    <select onchange="deferir();" class="form-select" aria-label="Default select example" id="forma">
                            <option selected disabled>Seleccione el plazo</option>
                            <option value="6">6 meses</option>
                            <option value="12">12 meses</option>
                    </select>
                </p>
                <p class="card-text">Pagos de $ <label id="pagos"></label> al mes</p>
            </div>
        </div>
    </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Comentarios</li>
  </ol>
</nav>
<div class="col-md-8" style="margin:auto;margin-top: 15px;">
    <div class="list-group" >
        <?php foreach ($data['comentarios'] as $comentario => $com) { ?>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><?php echo $com['titulo'] ?></h5>
                <small class="text-muted"><?php echo $com['creado'] ?></small>
                </div>
                <p class="mb-1"><?php echo $com['comentario'] ?></p>
                <small class="text-muted">
                    <form>
                        <p class="clasificacion">
                            <input 
                                <?php echo ($com['calificacion'] == 5) ? 'checked' : '' ?> 
                                id="radio1" 
                                type="radio" 
                                name="estrellas" 
                                value="5"
                                disabled
                            >
                            <label for="radio1">★</label>
                            <input 
                                <?php echo ($com['calificacion'] == 4) ? 'checked' : '' ?>   
                                id="radio2" 
                                type="radio" 
                                name="estrellas" 
                                value="4"
                                disabled
                            >
                            <label for="radio2">★</label>
                            <input 
                                <?php echo ($com['calificacion'] == 3) ? 'checked' : '' ?>   
                                id="radio3" 
                                type="radio" 
                                name="estrellas" 
                                value="3"
                                disabled
                            >
                            <label for="radio3">★</label>
                            <input 
                                <?php echo ($com['calificacion'] == 2) ? 'checked' : '' ?> 
                                id="radio4" 
                                type="radio" 
                                name="estrellas" 
                                value="2"
                                disabled
                            >
                            <label for="radio4">★</label>
                            <input 
                                <?php echo ($com['calificacion'] == 1) ? 'checked' : '' ?> 
                                id="radio5" 
                                type="radio"  
                                name="estrellas" 
                                value="1"
                                disabled
                            >
                            <label for="radio5">★</label>
                        </p>
                    </form>
                </small>
            </a>
        <?php } ?>
    </div>
</div>
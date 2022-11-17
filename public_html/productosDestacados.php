
<div id="carrusel" >
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Productos Destacados</li>
    </ol>
</nav>
    <a href="#" class="left-arrow left-destacados"><img src="<?php echo VIEWS; ?>images/left-arrow.png" /></a>
    <a href="#" class="right-arrow right-destacados"><img src="<?php echo VIEWS; ?>images/right-arrow.png" /></a>
    <div class="carrusel destacados">
        <?php $countDes = 0 ?>
        <?php foreach ($data['productosDestacados'] as $destacados => $des) { ?>
            <div class="product" id="product_<?php echo $countDes ?>">
                <a onclick="detalleProducto('<?php echo $des['id_producto'] ?>')">
                    <img 
                        src="<?php echo VIEWS; ?>images/productos/<?php echo $des['imagen'] ?>" 
                        width="195" 
                        height="100" 
                    />
                </a>
                <h5><?php echo $des['producto'] ?></h5>
                <p>$ <?php echo number_format($des['precio'],  2, '.', ',') ?></p>
            </div>
            <?php $countDes++ ?>
        <?php } ?>
    </div>
</div>
<script>
    var current = 0;
    var imagenes = new Array();
    
    $(document).ready(function() {
        var numImages = 10;
        if (numImages <= 3) {
            $('.right-destacados').css('display', 'none');
            $('.left-destacados').css('display', 'none');
        }
    
        $('.left-destacados').on('click',function() {
            if (current > 0) {
                current = current - 1;
            } else {
                current = numImages - 3;
            }
    
            $(".destacados").animate({"left": -($('#product_'+current).position().left)}, 600);
    
            return false;
        });
    
        $('.left-destacados').on('hover', function() {
            $(this).css('opacity','0.5');
        }, function() {
            $(this).css('opacity','1');
        });
    
        $('.right-destacados').on('hover', function() {
            $(this).css('opacity','0.5');
        }, function() {
            $(this).css('opacity','1');
        });
    
        $('.right-destacados').on('click', function() {
            if (numImages > current + 3) {
                current = current+1;
            } else {
                current = 0;
            }
    
            $(".destacados").animate({"left": -($('#product_'+current).position().left)}, 600);
    
            return false;
        }); 
    });
</script>
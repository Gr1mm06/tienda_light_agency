<div id="carrusel">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Mas Vendidos</li>
        </ol>
    </nav>
    <a href="#" class="left-arrow left-vendidos"><img src="<?php echo VIEWS; ?>images/left-arrow.png" /></a>
    <a href="#" class="right-arrow right-vendidos"><img src="<?php echo VIEWS; ?>images/right-arrow.png" /></a>
    <div class="carrusel masVendidos">
        <?php $countVen = 0 ?>
        <?php foreach ($data['productosMasVendido'] as $vendidos => $ven) { ?>
            <div class="product" id="product_<?php echo $countVen ?>">
                <a onclick="detalleProducto('<?php echo $ven['id_producto'] ?>')">
                    <img 
                        src="<?php echo VIEWS; ?>images/productos/<?php echo $ven['imagen'] ?>" 
                        width="195" 
                        height="100" 
                    />
                </a>
                <h5><?php echo $ven['producto'] ?></h5>
                <p>$ <?php echo number_format($ven['precio'],  2, '.', ',') ?></p>
            </div>
            <?php $countVen++ ?>
        <?php } ?>
    </div>
</div>
<script>
    var current = 0;
    var imagenes = new Array();
    
    $(document).ready(function() {
        var numImages = 10;
        if (numImages <= 3) {
            $('.right-vendidos').css('display', 'none');
            $('.left-vendidos').css('display', 'none');
        }
    
        $('.left-vendidos').on('click',function() {
            if (current > 0) {
                current = current - 1;
            } else {
                current = numImages - 3;
            }
    
            $(".masVendidos").animate({"left": -($('#product_'+current).position().left)}, 600);
    
            return false;
        });
    
        $('.left-vendidos').on('hover', function() {
            $(this).css('opacity','0.5');
        }, function() {
            $(this).css('opacity','1');
        });
    
        $('.right-vendidos').on('hover', function() {
            $(this).css('opacity','0.5');
        }, function() {
            $(this).css('opacity','1');
        });
    
        $('.right-vendidos').on('click', function() {
            if (numImages > current + 3) {
                current = current+1;
            } else {
                current = 0;
            }
    
            $(".masVendidos").animate({"left": -($('#product_'+current).position().left)}, 600);
    
            return false;
        }); 
    });
</script>
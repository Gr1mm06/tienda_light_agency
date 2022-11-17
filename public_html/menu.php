<div id="menu">
    <ul>
        <?php foreach ($data['menu'] as $menus => $menu) { ?>
            <li class="has-sub"><a title="" href=""><?php echo $menus ?></a>
                <ul>
                    <?php foreach ($menu as $men => $m) { ?>
                        <?php if (!empty($m['subcategoria'])) { ?>
                            <li class="has-sub">
                                <a title="" 
                                onclick="cargarProdcutos(<?php echo $m['id_subcategoria'] ?>)" > 
                                    <?php echo $m['subcategoria'] ?>
                                </a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
    </ul>
    <button onclick="guardarRegistros(10);" class="btn btn-primary">Generar Registros Basicos</button>
    <button onclick="guardarRegistros(200);" class="btn btn-primary">Generar Registros Intermedios</button>
</div>

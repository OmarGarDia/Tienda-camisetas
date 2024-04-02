<?php if (isset($pro)) : ?>
    <h1><?= $pro["nombre"]; ?></h1>
    <div id="detail-product">
        <div class="image">
            <a href="<?= base_url ?>producto/ver&id=<?= $pro["id"]; ?>">
                <?php if ($pro["imagen"] != null) : ?>
                    <img src="<?= base_url ?>uploads/images/<?= $pro["imagen"] ?>" alt="">
                <?php else : ?>
                    <img src="<?= base_url ?>assets/img/camiseta.png" alt="">
                <?php endif; ?>
            </a>
        </div>
        <div class="data">
            <p class="descripcion"><?= $pro["descripcion"]; ?></p>
            <p class="price"><?= $pro["precio"]; ?>&euro;</p>
            <a href="<?= base_url ?>carrito/add&id=<?= $pro["id"]; ?>" class="button">Comprar</a>
        </div>

    </div>
<?php else : ?>
    <h1>El producto no existe</h1>
<?php endif; ?>
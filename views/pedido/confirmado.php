<?php if (isset($_SESSION["pedido"]) && $_SESSION["pedido"] == 'complete') : ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>Tu pedido ha sido guardado con exito, una vez que realices la transferencia bancaria a la cuenta 293892184921519 con el coste del pedido, será procesado y enviado.</p>
    <br />
    <?php if (isset($pedido)) : ?>
        <h3>Datos del pedido:</h3>
        <br>
        Nº de pedido: <?= $pedido["id"]; ?><br>
        Total a pagar: <?= $pedido["coste"]; ?> &euro;<br>
        Productos: <br>
        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
            </tr>
            <?php foreach ($productos as $product) : ?>
                <tr>
                    <td>
                        <?php if ($product["imagen"] != null) : ?>
                            <img src="<?= base_url ?>uploads/images/<?= $product["imagen"] ?>" class="img_carrito">
                        <?php else : ?>
                            <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito">
                        <?php endif; ?>
                    </td>
                    <td><a href="<?= base_url ?>producto/ver&id=<?= $product["id"] ?>"><?= $product["nombre"]; ?></a></td>
                    <td><?= $product["precio"]; ?> &euro;</td>
                    <td><?= $product["unidades"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
<?php elseif ($_SESSION["pedido"] != 'complete') : ?>
    <h1>Problemas al hacer el pedido</h1>
<?php endif; ?>
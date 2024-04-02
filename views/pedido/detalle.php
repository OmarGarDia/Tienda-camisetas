<h1>Detalles del pedido</h1>

<?php if (isset($pedido)) : ?>
    <?php if (isset($_SESSION["admin"])) : ?>
        <h3>Cambiar estado del pedido:</h3>
        <form action="<?= base_url ?>pedido/estado" method="post">
            <input type="hidden" value="<?= $pedido["id"]; ?>" name="pedido_id" />
            <select name="estado">
                <option value="confirm" <?= $pedido["estado"] == "confirm" ? 'selected' : ''; ?>>Pendiente</option>
                <option value="preparing" <?= $pedido["estado"] == "preparing" ? 'selected' : ''; ?>>En preparacion</option>
                <option value="ready" <?= $pedido["estado"] == "ready" ? 'selected' : ''; ?>>Preparado para enviar</option>
                <option value="sended" <?= $pedido["estado"] == "sended" ? 'selected' : ''; ?>>Enviado</option>
            </select>
            <input type="submit" value="Cambiar estado">
        </form>
        <br>

    <?php endif; ?>
    <h3>Direccion de envio</h3>
    Provincia: <?= $pedido["provincia"]; ?><br>
    Localidad: <?= $pedido["localidad"]; ?><br>
    Direccion: <?= $pedido["direccion"]; ?><br>

    <h3>Datos del pedido:</h3>
    <br>
    Estado: <?= Utils::showStatus($pedido["estado"]); ?><br>
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
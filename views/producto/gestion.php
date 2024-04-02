<h1>Gestión de productos</h1>

<a href="<?= base_url ?>producto/crear" class="button button-small">Crear producto</a>

<?php if (isset($_SESSION["producto"]) && $_SESSION["producto"] == "complete") : ?>
    <strong class="alert_green">El producto se ha añadido correctamente</strong>
<?php elseif (isset($_SESSION["producto"]) && $_SESSION["producto"] == "failed") : ?>
    <strong class="alert_red">Error al añadir el producto</strong>
<?php endif; ?>
<?php Utils::deleteSession("producto"); ?>

<?php if (isset($_SESSION["delete"]) && $_SESSION["delete"] == "complete") : ?>
    <strong class="alert_green">El producto se ha borrado correctamente</strong>
<?php elseif (isset($_SESSION["delete"]) && $_SESSION["delete"] == "failed") : ?>
    <strong class="alert_red">Error al borrar el producto</strong>
<?php endif; ?>
<?php Utils::deleteSession("delete"); ?>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
    </tr>
    <?php
    foreach ($productos as $producto) : ?>
        <tr>
            <td><?= $producto["id"]; ?></td>
            <td><?= $producto["nombre"]; ?></td>
            <td><?= $producto["precio"]; ?></td>
            <td><?= $producto["stock"]; ?></td>
            <td>
                <a href="<?= base_url ?>producto/editar&id=<?= $producto["id"]; ?>" class="button button-gestion">Editar</a>
                <a href="<?= base_url ?>producto/eliminar&id=<?= $producto["id"]; ?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php if (isset($_SESSION["identity"])) : ?>
    <h1>Hacer pedido</h1>
    <p>
        <a href="<?= base_url ?>carrito/index">Ver los productos y el precio del pedido.</a>
    </p>
    <br />
    <h3>Datos para el envio</h3>
    <form action="<?= base_url ?>pedido/add" method="post">
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia" required />

        <label for="localidad">Localidad</label>
        <input type="text" name="localidad" required />

        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" required />

        <input type="submit" value="Confirmar Pedido">
    </form>
<?php else : ?>
    <h1>Necesitas estar identificado.</h1>
    <p>Necesitas estar logueado en la web para poder realizar el pedido</p>
<?php endif; ?>
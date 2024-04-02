<?php if (isset($gestion)) : ?>
    <h1>Gestionar pedidos</h1>

<?php else : ?>
    <h1>Mis pedidos</h1>
<?php endif; ?>
<table>
    <tr>
        <th>Nº Pedido</th>
        <th>Coste</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>
    <?php
    foreach ($pedidos as $pedido) :
    ?>
        <tr>
            <td><a href="<?= base_url ?>pedido/detalle&id=<?= $pedido["id"]; ?>"><?= $pedido["id"]; ?></a></td>
            <td><?= $pedido["coste"]; ?> &euro;</td>
            <td><?= $pedido["fecha"]; ?></td>
            <td><?= Utils::showStatus($pedido["estado"]); ?></td>
        </tr>
    <?php endforeach; ?>

</table>
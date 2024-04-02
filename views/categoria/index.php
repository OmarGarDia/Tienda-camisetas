<h1>Gestionar categorias</h1>

<a href="<?= base_url ?>categoria/crear" class="button button-small">Crear categoria</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
    </tr>
    <?php
    foreach ($categorias as $categoria) : ?>
        <tr>
            <td><?= $categoria["id"]; ?></td>
            <td><?= $categoria["nombre"]; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php if (isset($edit) && isset($pro)) : ?>
    <h1>Editar Producto <?= $pro["nombre"]; ?></h1>
    <?php $url_action = base_url . "producto/save&id=" . $pro["id"]; ?>
<?php else : ?>
    <h1>Crear nuevos productos</h1>
    <?php $url_action = base_url . "producto/save"; ?>
<?php endif; ?>

<div class="form_container">
    <form action="<?= $url_action ?>" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?= isset($pro["nombre"]) ? $pro["nombre"] : false; ?>">

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion"><?= isset($pro["descripcion"]) ? $pro["descripcion"] : false; ?></textarea>

        <label for="precio">Precio</label>
        <input type="text" name="precio" value="<?= isset($pro["precio"]) ? $pro["precio"] : false; ?>">

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?= isset($pro["stock"]) ? $pro["stock"] : false; ?>">

        <label for="categoria">Categoria</label>
        <select name="categoria">
            <?php $categorias = Utils::showCategorias(); ?>
            <?php foreach ($categorias as $categoria) : ?>
                <option value="<?= $categoria["id"]; ?>" <?= isset($pro["nombre"]) && $categoria["id"] == $pro["categoria_id"] ? "selected" : ''; ?>><?= $categoria["nombre"]; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="imagen">Imagen</label>
        <?php if (isset($pro["imagen"]) && !empty($pro["imagen"])) : ?>
            <img src="<?= base_url ?>uploads/images/<?= $pro["imagen"] ?>" alt="" width="120px">
        <?php endif; ?>
        <input type="file" name="imagen">

        <input type="submit" value="Guardar">
    </form>
</div>
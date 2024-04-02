<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css">
    <title>Tienda de camisetas</title>
</head>

<body>
    <div id="container">
        <!-- CABECERA -->
        <header id="header">
            <div id="logo">
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="Camiseta Loog" />
                <a href="<?= base_url ?>">
                    Tienda de camisetas
                </a>
            </div>
        </header>
        <!-- MENU -->
        <?php $categorias = Utils::showCategorias(); ?>
        <nav id="menu">
            <ul>
                <li><a href="<?= base_url ?>">Inicio</a></li>
                <?php foreach ($categorias as $categoria) : ?>
                    <li><a href="<?= base_url ?>categoria/ver&id=<?= $categoria["id"]; ?>"><?= $categoria["nombre"]; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div id="content">
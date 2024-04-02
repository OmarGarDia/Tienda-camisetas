<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Tienda de camisetas</title>
</head>

<body>
    <div id="container">
        <!-- CABECERA -->
        <header id="header">
            <div id="logo">
                <img src="assets/img/camiseta.png" alt="Camiseta Loog" />
                <a href="index.php">
                    Tienda de camisetas
                </a>
            </div>
        </header>
        <!-- MENU -->
        <nav id="menu">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Categoria1</a></li>
                <li><a href="#">Categoria2</a></li>
                <li><a href="#">Categoria3</a></li>
                <li><a href="#">Categoria4</a></li>
                <li><a href="#">Categoria5</a></li>
            </ul>
        </nav>

        <div id="content">
            <aside id="lateral">
                <!-- BARRA LATERAL -->

                <div id="login" class="block_aside">
                    <h3>Entrar a la web</h3>
                    <form action="#" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email" />

                        <label for="pass">Password</label>
                        <input type="password" name="pass" />
                        <input type="submit" value="Enviar">
                    </form>
                    <ul>
                        <li><a href="#">Mis pedidos</a></li>
                        <li><a href="#">Gestionar pedidos</a></li>
                        <li><a href="#">Gestionar categorias</a></li>
                    </ul>

                </div>
            </aside>
            <div id="central">
                <h1>Productos destacados</h1>
                <!-- CONTENIDO CENTRAL -->
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 €</p>
                    <a href="#" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 €</p>
                    <a href="#" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 €</p>
                    <a href="#" class="button">Comprar</a>
                </div>
            </div>
        </div>

        <footer id="footer">
            <!-- FOOTER -->
            <p>Desarrollador por Omar Garrocho Web &copy; <?= date('Y'); ?></p>

        </footer>
    </div>
</body>

</html>
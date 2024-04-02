<?php
require_once 'models/pedido.php';
class pedidoController
{

    public function hacer()
    {
        require_once 'views/pedido/hacer.php';
    }

    public function add()
    {

        if (isset($_POST)) {
            if (isset($_SESSION["identity"])) {

                $provincia = isset($_POST["provincia"]) ? $_POST["provincia"] : false;
                $localidad = isset($_POST["localidad"]) ? $_POST["localidad"] : false;
                $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : false;
                $usuario_id = $_SESSION["identity"]["id"];
                $stats = Utils::statsCarrito();
                $coste = $stats["total"];

                if ($provincia && $localidad && $direccion) {
                    //Guardar datos en la BD
                    $pedido = new Pedido();
                    $pedido->setUsuarioId($usuario_id);
                    $pedido->setProvincia($provincia);
                    $pedido->setLocalidad($localidad);
                    $pedido->setDireccion($direccion);
                    $pedido->setCoste($coste);

                    $save = $pedido->save();

                    //Guardar la linea de pedido

                    $pedido->save_linea();


                    if ($save) {
                        $_SESSION["pedido"] = "complete";
                    } else {
                        $_SESSION["pedido"] = "failed";
                    }
                } else {
                    $_SESSION["pedido"] = "failed";
                }
            } else {
                //Redirigir al index
                header("Location:" . base_url);
            }
            header("Location:" . base_url . "pedido/confirmado");
        }
    }

    public function confirmado()
    {
        if (isset($_SESSION["identity"])) {
            $identity = $_SESSION["identity"];
            $pedido = new Pedido();
            $pedido->setUsuarioId($identity["id"]);
            $pedido = $pedido->getOneByUser();

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($pedido["id"]);
        }

        require_once 'views/pedido/confirmado.php';
    }

    public function mis_pedidos()
    {
        Utils::isIdentity();

        $usuario_id = $_SESSION["identity"]["id"];
        $pedido = new Pedido();

        // Sacar los pedidos del usuario
        $pedido->setUsuarioId($usuario_id);
        $pedidos = $pedido->getAllByUser();

        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle()
    {
        Utils::isIdentity();

        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            //Sacar el pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($id);

            require_once 'views/pedido/detalle.php';
        } else {
            header("Location:" . base_url . "pedido/mis_pedidos");
        }
    }

    public function gestion()
    {
        Utils::isAdmin();

        $gestion = true;

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once 'views/pedido/mis_pedidos.php';
    }

    public function estado()
    {
        Utils::isAdmin();

        if (isset($_POST["pedido_id"]) && isset($_POST["estado"])) {
            $id = $_POST["pedido_id"];
            $estado = $_POST["estado"];
            // hacer update del estado del pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->updateOne();
            header("Location:" . base_url . "pedido/detalle&id=" . $id);
        } else {
            header("Location:" . base_url);
        }
    }
}

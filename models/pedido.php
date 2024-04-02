<?php

class Pedido
{
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;


    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    public function getProvincia()
    {
        return $this->provincia;
    }

    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }

    public function getLocalidad()
    {
        return $this->localidad;
    }

    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getCoste()
    {
        return $this->coste;
    }

    public function setCoste($coste)
    {
        $this->coste = $coste;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM pedidos order by id desc";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }


    public function getOne()
    {
        $sql = "SELECT * FROM pedidos WHERE id={$this->id}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getOneByUser()
    {
        $sql = "SELECT p.id, p.coste FROM pedidos p WHERE p.usuario_id={$this->usuario_id} order by id desc limit 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getAllByUser()
    {
        $sql = "SELECT * FROM pedidos p WHERE p.usuario_id={$this->usuario_id} order by id desc";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getProductosByPedido($id_pedido)
    {
        //$sql = "SELECT * FROM productos pr WHERE pr.id in (select producto_id from lineas_pedidos lp WHERE pedido_id = {$id_pedido})";
        $sql = "SELECT pr.*, lp.unidades FROM productos pr INNER JOIN lineas_pedidos lp on pr.id = lp.producto_id WHERE pedido_id = {$id_pedido}";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function save()
    {
        $sql = "INSERT INTO pedidos VALUES (null, :usuario_id, :provincia, :localidad, :direccion, :coste, 'confirm', CURDATE(), CURTIME())";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':usuario_id', $this->usuario_id);
        $stmt->bindParam(':provincia', $this->provincia);
        $stmt->bindParam(':localidad', $this->localidad);
        $stmt->bindParam(':direccion', $this->direccion);
        $stmt->bindParam(':coste', $this->coste);

        return $stmt->execute();
    }

    public function save_linea()
    {
        $sql = "SELECT LAST_INSERT_ID() as pedido";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $last_inserted_pedido_id = $result["pedido"];

        foreach ($_SESSION["carrito"] as $elemento) {
            $producto = $elemento["producto"];
            $unidades = $elemento["unidades"];

            $insert = "INSERT INTO lineas_pedidos (pedido_id, producto_id, unidades) VALUES (:pedido_id, :producto_id, :unidades)";
            $stmt = $this->db->prepare($insert);
            $stmt->bindParam(':pedido_id', $last_inserted_pedido_id);
            $stmt->bindParam(':producto_id', $producto["id"]);
            $stmt->bindParam(':unidades', $unidades);
            $stmt->execute();
        }
    }

    public function updateOne()
    {
        $sql = "UPDATE pedidos SET estado='{$this->getEstado()}'";
        $sql .= " WHERE id={$this->getId()}";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute();
    }
}

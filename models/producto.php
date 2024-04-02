<?php

class Producto
{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;


    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getCategoriaId()
    {
        return $this->categoria_id;
    }

    function setCategoriaId($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function getDescripcion()
    {
        return $this->descripcion;
    }

    function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    function getPrecio()
    {
        return $this->precio;
    }

    function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    function getStock()
    {
        return $this->stock;
    }

    function setStock($stock)
    {
        $this->stock = $stock;
    }

    function getOferta()
    {
        return $this->oferta;
    }

    function setOferta($oferta)
    {
        $this->oferta = $oferta;
    }

    function getFecha()
    {
        return $this->fecha;
    }

    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    function getImagen()
    {
        return $this->imagen;
    }

    function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM productos order by id desc";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getAllCategory()
    {
        $sql = "SELECT p.*, c.nombre as 'catNombre' FROM productos p inner join categorias c on c.id = p.categoria_id WHERE p.categoria_id={$this->categoria_id} order by id desc";
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
        $sql = "SELECT * FROM productos WHERE id={$this->id}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getRandom($limit)
    {
        $sql = "SELECT * FROM productos ORDER BY RAND() LIMIT $limit";
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
        $sql = "INSERT INTO productos VALUES (null, :categoria_id, :nombre, :descripcion, :precio, :stock, null, CURDATE(), :imagen)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':precio', $this->precio);
        $stmt->bindParam(':stock', $this->stock);
        $stmt->bindParam(':categoria_id', $this->categoria_id);
        $stmt->bindParam(':imagen', $this->imagen);

        return $stmt->execute();
    }

    public function edit()
    {
        $sql = "UPDATE productos SET nombre=:nombre, categoria_id=:categoria_id,  descripcion=:descripcion, precio=:precio, stock=:stock";
        if ($this->imagen != null) {
            $sql .= ", imagen=:imagen ";
        }

        $sql .= " WHERE id={$this->id}";

        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':precio', $this->precio);
        $stmt->bindParam(':stock', $this->stock);
        $stmt->bindParam(':categoria_id', $this->categoria_id);

        if ($this->imagen !== null) {
            $stmt->bindParam(':imagen', $this->imagen);
        }
        return $stmt->execute();
    }

    public function delete()
    {

        // Preparar la sentencia SQL para eliminar el producto con el ID correspondiente
        $sql = "DELETE FROM productos WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}

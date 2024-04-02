<?php

class Categoria
{
    private $id;
    private $nombre;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getAll()
    {

        $sql = "SELECT * FROM categorias order by id desc";
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

        $sql = "SELECT * FROM categorias WHERE id={$this->id}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function save()
    {
        $sql = "INSERT INTO categorias (id, nombre) VALUES (null, :nombre)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':nombre', $this->nombre);


        return $stmt->execute();
    }
}

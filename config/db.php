<?php

class Database
{

    public static function connect()
    {
        $host = "localhost";
        $dbname = "tienda_master";
        $username = "root";
        $password = "";

        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $db->exec("SET NAMES utf8");

            return $db;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }
}

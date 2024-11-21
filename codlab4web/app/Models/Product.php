<?php

namespace app\Models;

include "app/Config/DatabaseConfiguration.php";


use app\Config\DatabaseConfig;
use mysqli;

class Product extends DatabaseConfig
{
    public $conn;

    public function _construct()
    {
        //connect ke database mysql
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database_name, $this->port);
        //check koneksi
        if ($this->conn->connect_error) {
            die("Connection Falled: " . $this->conn->connect_error);
        }
    }

    //Function menampikan sebuah data
    public function findAll()
    {
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);
        $this->conn->close();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    
    // Function menampilkan data dengan id
    public function findById($id)
    {
        $sql = "SELECTS* FROM products where id = ?";
        $stet = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stet->execute();
        $result = $stet->get_result();
        $this->conn->close();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}
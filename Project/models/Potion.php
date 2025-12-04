<?php
class Potion {
    private $conn;
    private $table_name = "potions";

    public $id;
    public $nama_potion;
    public $efek;
    public $harga;

    public function __construct($db) { 
        $this->conn = $db;
     }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->nama_potion = $row['nama_potion'];
            $this->efek = $row['efek'];
            $this->harga = $row['harga'];
        }
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nama_potion=:n, efek=:e, harga=:h";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":n", $this->nama_potion);
        $stmt->bindParam(":e", $this->efek);
        $stmt->bindParam(":h", $this->harga);
        return $stmt->execute();
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nama_potion=:n, efek=:e, harga=:h WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":n", $this->nama_potion);
        $stmt->bindParam(":e", $this->efek);
        $stmt->bindParam(":h", $this->harga);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        return $stmt->execute();
    }
}
?>
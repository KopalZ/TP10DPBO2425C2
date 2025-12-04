<?php
class Grimoire {
    private $conn;
    private $table_name = "grimoires";

    public $id;
    public $nama_buku;
    public $magic_power;
    public $id_wizard;

    public function __construct($db) { $this->conn = $db; }

    // READ (Untuk List)
    public function read() {
        // Join ke table wizards biar muncul nama pemiliknya
        $query = "SELECT g.*, w.nama_wizard FROM " . $this->table_name . " g
                  LEFT JOIN wizards w ON g.id_wizard = w.id ORDER BY g.id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // READ ONE
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($row) {
            $this->nama_buku = $row['nama_buku'];
            $this->magic_power = $row['magic_power'];
            $this->id_wizard = $row['id_wizard'];
        }
    }

    // CREATE
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nama_buku=:n, magic_power=:mp, id_wizard=:iw";
        $stmt = $this->conn->prepare($query);
        
        // Bersihkan data
        $this->nama_buku = htmlspecialchars(strip_tags($this->nama_buku));
        $this->magic_power = htmlspecialchars(strip_tags($this->magic_power));
        $this->id_wizard = htmlspecialchars(strip_tags($this->id_wizard));

        // Binding
        $stmt->bindParam(":n", $this->nama_buku);
        $stmt->bindParam(":mp", $this->magic_power);
        $stmt->bindParam(":iw", $this->id_wizard);
        
        return $stmt->execute();
    }

    // UPDATE
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nama_buku=:n, magic_power=:mp, id_wizard=:iw WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        
        $this->nama_buku = htmlspecialchars(strip_tags($this->nama_buku));
        $this->magic_power = htmlspecialchars(strip_tags($this->magic_power));
        $this->id_wizard = htmlspecialchars(strip_tags($this->id_wizard));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":n", $this->nama_buku);
        $stmt->bindParam(":mp", $this->magic_power);
        $stmt->bindParam(":iw", $this->id_wizard);
        $stmt->bindParam(":id", $this->id);
        
        return $stmt->execute();
    }

    // DELETE
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);
        return $stmt->execute();
    }
}
?>
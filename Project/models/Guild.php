<?php
class Guild {
    private $conn;
    private $table_name = "guilds";

    public $id;
    public $nama_guild;
    public $base_region;
    public $deskripsi;

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
            $this->nama_guild = $row['nama_guild'];
            $this->base_region = $row['base_region'];
            $this->deskripsi = $row['deskripsi'];
        }
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nama_guild=:n, base_region=:b, deskripsi=:d";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":n", $this->nama_guild);
        $stmt->bindParam(":b", $this->base_region);
        $stmt->bindParam(":d", $this->deskripsi);
        return $stmt->execute();
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nama_guild=:n, base_region=:b, deskripsi=:d WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":n", $this->nama_guild);
        $stmt->bindParam(":b", $this->base_region);
        $stmt->bindParam(":d", $this->deskripsi);
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
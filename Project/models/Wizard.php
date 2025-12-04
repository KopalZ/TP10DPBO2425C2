<?php
class Wizard {
    private $conn;
    private $table_name = "wizards";

    public $id;
    public $nama_wizard;
    public $elemen;
    public $level;
    public $id_guild;

    public function __construct($db) { $this->conn = $db; }

    public function read() {
        // JOIN TABLE untuk menampilkan nama guild
        $query = "SELECT w.*, g.nama_guild FROM " . $this->table_name . " w
                  LEFT JOIN guilds g ON w.id_guild = g.id ORDER BY w.id ASC";
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
            $this->nama_wizard = $row['nama_wizard'];
            $this->elemen = $row['elemen'];
            $this->level = $row['level'];
            $this->id_guild = $row['id_guild'];
        }
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nama_wizard=:n, elemen=:e, level=:l, id_guild=:ig";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":n", $this->nama_wizard);
        $stmt->bindParam(":e", $this->elemen);
        $stmt->bindParam(":l", $this->level);
        $stmt->bindParam(":ig", $this->id_guild);
        return $stmt->execute();
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nama_wizard=:n, elemen=:e, level=:l, id_guild=:ig WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":n", $this->nama_wizard);
        $stmt->bindParam(":e", $this->elemen);
        $stmt->bindParam(":l", $this->level);
        $stmt->bindParam(":ig", $this->id_guild);
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
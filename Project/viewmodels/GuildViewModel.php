<?php
require_once '../models/Guild.php';
require_once '../config/Database.php';

class GuildViewModel {
    public $model; // Public agar bisa diakses View
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->model = new Guild($this->db);
    }

    // Mengambil semua data untuk ditampilkan di List
    public function fetchAll() {
        $stmt = $this->model->read();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mengambil 1 data untuk ditampilkan di Form Edit
    public function getById($id) {
        $this->model->id = $id;
        $this->model->readOne(); // Data tersimpan di property model
    }

    // Logika Simpan (Bisa Create atau Update)
    public function save($data, $id = null) {
        // Mapping input dari Form ke Model
        $this->model->nama_guild = $data['nama_guild'];
        $this->model->base_region = $data['base_region'];
        $this->model->deskripsi = $data['deskripsi'];

        if ($id) {
            // Mode Update
            $this->model->id = $id;
            return $this->model->update();
        } else {
            // Mode Create
            return $this->model->create();
        }
    }

    // Logika Hapus
    public function delete($id) {
        $this->model->id = $id;
        return $this->model->delete();
    }
}
?>
<?php
require_once '../models/Potion.php';
require_once '../config/Database.php';

class PotionViewModel {
    public $model;
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->model = new Potion($this->db);
    }

    public function fetchAll() {
        $stmt = $this->model->read();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $this->model->id = $id;
        $this->model->readOne();
    }

    public function save($data, $id = null) {
        $this->model->nama_potion = $data['nama_potion'];
        $this->model->efek = $data['efek'];
        $this->model->harga = $data['harga'];

        if ($id) {
            $this->model->id = $id;
            return $this->model->update();
        } else {
            return $this->model->create();
        }
    }

    public function delete($id) {
        $this->model->id = $id;
        return $this->model->delete();
    }
}
?>
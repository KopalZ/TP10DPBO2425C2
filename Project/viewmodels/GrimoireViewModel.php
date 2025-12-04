<?php
require_once '../models/Grimoire.php';
require_once '../config/Database.php';

class GrimoireViewModel {
    public $model;
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->model = new Grimoire($this->db);
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
        $this->model->nama_buku = $data['nama_buku'];
        $this->model->magic_power = $data['magic_power'];
        $this->model->id_wizard = $data['id_wizard'];

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
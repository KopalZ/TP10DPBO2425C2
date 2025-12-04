<?php
require_once '../models/Wizard.php';
require_once '../config/Database.php';

class WizardViewModel {
    public $model;
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->model = new Wizard($this->db);
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
        $this->model->nama_wizard = $data['nama_wizard'];
        $this->model->elemen = $data['elemen'];
        $this->model->level = $data['level'];
        $this->model->id_guild = $data['id_guild'];

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
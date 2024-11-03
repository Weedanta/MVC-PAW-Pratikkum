<?php
include_once("m_programKerja.php");

class c_programKerja {
    public $model;

    public function __construct() {
        $this->model = new m_programKerja();
    }

    public function invoke() {
        $action = $_GET['action'] ?? 'read';

        if ($action == 'create' && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->createProgramKerja($_POST['nomorProgram'], $_POST['namaProgram'], $_POST['suratKeterangan']);
        } elseif ($action == 'update' && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->updateProgramKerja($_POST['nomorProgram'], $_POST['namaProgram'], $_POST['suratKeterangan']);
        } elseif ($action == 'delete') {
            $this->model->deleteProgramKerja($_GET['nomorProgram']);
        }

        $proker = $this->model->readProgramKerja();
        include 'v_programKerja.php';
    }
}
?>

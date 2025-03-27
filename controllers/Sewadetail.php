<?php
include_once('../models/SewadetailModel.php');

class SewadetailController
{
    private $model;

    public function __construct()
    {
        $this->model = new SewadetailModel();
    }

    public function addSewadetail($id_sewa, $kode_film, $jumlah_hari)
    {
        return $this->model->addSewadetail($id_sewa, $kode_film, $jumlah_hari);
    }

    public function getSewadetail($id)
    {
        return $this->model->getSewadetail($id);
    }

    public function countSewadetail($id)
    {
        return $this->model->countSewadetail($id);
    }

    public function Show($id)
    {
        $rows = $this->model->getSewadetail($id);
        foreach($rows as $row){
            $val = $row['nama'];
        }
        return $val;
    }

    public function updateSewadetail($id, $id_sewa, $kode_film, $jumlah_hari)
    {
        return $this->model->updateSewadetail($id, $id_sewa, $kode_film, $jumlah_hari);
    }

    public function deleteSewadetail($id)
    {
        return $this->model->deleteSewadetail($id);
    }

    public function getSewadetailList($id)
    {
        return $this->model->getSewadetailList($id);
    }
    
    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }

    public function calculateTotal($kode_film, $jumlah_hari)
    {
        if (!method_exists($this->model, 'calculateTotal')) {
            throw new Exception("Method calculateTotal tidak ditemukan di model.");
        }
    
        return $this->model->calculate
        ($kode_film, $jumlah_hari);
    }
}
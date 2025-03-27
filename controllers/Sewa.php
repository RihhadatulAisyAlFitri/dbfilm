<?php
include_once('../models/SewaModel.php');

class SewaController
{
    private $model;

    public function __construct()
    {
        $this->model = new SewaModel();
    }

    public function addSewa($kode_sewa, $nomor_pelanggan, $tanggal_sewa)
    {
        return $this->model->addSewa($kode_sewa, $nomor_pelanggan, $tanggal_sewa);
    }

    public function getSewa($id)
    {
        return $this->model->getSewa($id);
    }

    public function show($id)
    {
        $rows = $this->model->getSewa($id);
        foreach($rows as $row){
            $val = $row['kode_sewa'];
        }
        return $val;
    }

    public function updateSewa($id, $kode_sewa, $nomor_pelanggan, $tanggal_sewa, $tanggal_kembali)
    {
        return $this->model->updateSewa($id, $kode_sewa, $nomor_pelanggan, $tanggal_sewa, $tanggal_kembali);
    }

    public function updateStatus($id, $status)
    {
        return $this->model->updateStatus($id, $status);
    }

    public function updateDikembalikan($id, $status)
    {
        return $this->model->updateDikembalikan($id, $status);
    }

    public function deleteSewa($id)
    {
        return $this->model->deleteSewa($id);
    }

    public function getSewaList()
    {
        return $this->model->getSewaList();
    }
    
    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }
}
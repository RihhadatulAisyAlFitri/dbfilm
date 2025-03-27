<?php
include_once('../models/PelangganModel.php');

class PelangganController
{
    private $model;

    public function __construct()
    {
        $this->model = new PelangganModel();
    }

    public function addPelanggan($nomor_pelanggan, $nama, $email, $no_telepon)
    {
        return $this->model->addPelanggan($nomor_pelanggan, $nama, $email, $no_telepon);
    }

    public function getPelanggan($id)
    {
        return $this->model->getPelanggan($id);
    }

    public function Show($id)
    {
        $rows = $this->model->getPelanggan($id);
        foreach($rows as $row){
            $val = $row['nama'];
        }
        return $val;
    }

    public function updatePelanggan($id, $nomor_pelanggan, $nama, $email, $no_telepon)
    {
        return $this->model->updatePelanggan($id, $nomor_pelanggan, $nama, $email, $no_telepon);
    }

    public function deletePelanggan($id)
    {
        return $this->model->deletePelanggan($id);
    }

    public function getPelangganList()
    {
        return $this->model->getPelangganList();
    }
    
    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }
}

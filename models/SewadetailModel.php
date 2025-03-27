<?php

include_once('../db/database.php');

class SewadetailModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addSewadetail($id_sewa, $kode_film, $jumlah_hari)
    {
        // First get the film price to calculate total
        $sql_price = "SELECT harga FROM film WHERE kode_film = :kode_film";
        $params_price = array(":kode_film" => $kode_film);
        $harga = $this->db->executeQuery($sql_price, $params_price)->fetchColumn();
        
        // Calculate total price
        $total_harga = $harga * $jumlah_hari;

        $sql = "INSERT INTO sewadetail (id_sewa, kode_film, jumlah_hari, total_harga) 
                VALUES (:id_sewa, :kode_film, :jumlah_hari, :total_harga)";
        $params = array(
            ":id_sewa" => $id_sewa,
            ":kode_film" => $kode_film,
            ":jumlah_hari" => $jumlah_hari,
            ":total_harga" => $total_harga
        );

        $result = $this->db->executeQuery($sql, $params);
        
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Insert successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Insert failed"
            );
        }
    
        return json_encode($response);
    }

    public function getSewadetail($id)
    {
        $sql = "SELECT S.id, S.id_sewa, S.kode_film, S.jumlah_hari, S.total_harga, 
                F.id as idfilm, F.kode_film, F.judul 
                FROM `sewadetail` S 
                LEFT JOIN `film` F ON (S.kode_film = F.kode_film) 
                WHERE S.id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countSewadetail($id)
    {
        $sql = "SELECT count(*) as total FROM `sewadetail` WHERE id_sewa = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchColumn();
    }

    public function updateSewadetail($id, $id_sewa, $kode_film, $jumlah_hari)
    {
        // First get the film price to calculate total
        $sql_price = "SELECT harga FROM film WHERE kode_film = :kode_film";
        $params_price = array(":kode_film" => $kode_film);
        $harga = $this->db->executeQuery($sql_price, $params_price)->fetchColumn();
        
        // Calculate total price
        $total_harga = $harga * $jumlah_hari;

        $sql = "UPDATE sewadetail 
                SET id_sewa = :id_sewa, 
                    kode_film = :kode_film, 
                    jumlah_hari = :jumlah_hari, 
                    total_harga = :total_harga 
                WHERE id = :id";
        $params = array(
            ":id_sewa" => $id_sewa,
            ":kode_film" => $kode_film,
            ":jumlah_hari" => $jumlah_hari,
            ":total_harga" => $total_harga,
            ":id" => $id
        );
    
        $result = $this->db->executeQuery($sql, $params);
    
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Update successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Update failed"
            );
        }
    
        return json_encode($response);
    }

    public function deleteSewadetail($id)
    {
        $sql = "DELETE FROM sewadetail WHERE id = :id";
        $params = array(":id" => $id);

        $result = $this->db->executeQuery($sql, $params);
        
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Delete successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Delete failed"
            );
        }
    
        return json_encode($response);
    }

    public function getSewadetailList($id)
    {
        $sql = "SELECT S.id, S.id_sewa, S.kode_film, S.jumlah_hari, S.total_harga, 
                F.id as idfilm, F.kode_film, F.judul 
                FROM `sewadetail` S 
                LEFT JOIN `film` F ON (S.kode_film = F.kode_film) 
                WHERE S.id_sewa = :id";
        $params = array(":id" => $id);
        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataCombo()
    {
        $sql = 'SELECT * FROM sewadetail';
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
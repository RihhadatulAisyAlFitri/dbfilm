<?php

include_once('../db/database.php');

class PelangganModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addPelanggan($nomor_pelanggan, $nama, $email, $no_telepon)
    {
        $sql = "INSERT INTO pelanggan (nomor_pelanggan, nama, email, no_telepon) VALUES (:nomor_pelanggan, :nama, :email, :no_telepon)";
        $params = array(
          ":nomor_pelanggan" => $nomor_pelanggan,
          ":nama" => $nama,
          ":email" => $email,
          ":no_telepon" => $no_telepon
        );

        $result= $this->db->executeQuery($sql, $params);
        // Check if the insert was successful
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
    
        // Return the response as JSON
        return json_encode($response);
    }

    public function getPelanggan($id)
    {
        $sql = "SELECT * FROM pelanggan WHERE id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updatePelanggan($id, $nomor_pelanggan, $nama, $email, $no_telepon)
    {
        $sql = "UPDATE pelanggan SET nomor_pelanggan = :nomor_pelanggan, nama = :nama, email = :email, no_telepon = :no_telepon WHERE id = :id";
        $params = array(
          ":nomor_pelanggan" => $nomor_pelanggan,
          ":nama" => $nama,
          ":email" => $email,
          ":no_telepon" => $no_telepon,
          ":id" => $id
        );
    
        // Execute the query
        $result = $this->db->executeQuery($sql, $params);
    
        // Check if the update was successful
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
    
        // Return the response as JSON
        return json_encode($response);
    }
    

    public function deletePelanggan($id)
    {
        $sql = "DELETE FROM pelanggan WHERE id = :id";
        $params = array(":id" => $id);

        $result = $this->db->executeQuery($sql, $params);
        // Check if the delete was successful
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
    
        // Return the response as JSON
        return json_encode($response);
    }

    public function getPelangganList()
    {
        $sql = 'SELECT * FROM pelanggan limit 100';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataCombo()
    {
        $sql = 'SELECT * FROM pelanggan';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

<?php

include_once('../db/database.php');

class SewaModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addSewa($kode_sewa, $nomor_pelanggan, $tanggal_sewa)
    {
        $sql = "INSERT INTO sewa (kode_sewa, nomor_pelanggan, tanggal_sewa) VALUES (:kode_sewa, :nomor_pelanggan, :tanggal_sewa)";
        $params = array(
            ":kode_sewa" => $kode_sewa,
            ":nomor_pelanggan" => $nomor_pelanggan,
            ":tanggal_sewa" => $tanggal_sewa
        );

        $result = $this->db->executeQuery($sql, $params);
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

    public function getSewa($id)
    {
        $sql = "SELECT * FROM sewa S LEFT JOIN pelanggan P ON (S.nomor_pelanggan = P.nomor_pelanggan) WHERE S.id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateSewa($id, $kode_sewa, $nomor_pelanggan, $tanggal_sewa, $tanggal_kembali)
    {
        $sql = "UPDATE sewa SET kode_sewa = :kode_sewa, nomor_pelanggan = :nomor_pelanggan, tanggal_sewa = :tanggal_sewa, tanggal_kembali = :tanggal_kembali WHERE id = :id";
        $params = array(
            ":kode_sewa" => $kode_sewa,
            ":nomor_pelanggan" => $nomor_pelanggan,
            ":tanggal_sewa" => $tanggal_sewa,
            ":tanggal_kembali" => $tanggal_kembali,
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

    public function updateStatus($id, $status)
    {
        $sql = "UPDATE sewa SET disewa = :disewa WHERE id = :id";
        $params = array(
            ":disewa" => $status,
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

    public function updateDikembalikan($id, $status)
    {
        $date = date('Y-m-d');
        $sql = "UPDATE sewa SET dikembalikan = :dikembalikan, tanggal_kembali = :tanggal_kembali WHERE id = :id";
        $params = array(
            ":dikembalikan" => $status,
            ":tanggal_kembali" => $date,
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

    public function deleteSewa($id)
    {
        $sql = "DELETE FROM sewa WHERE id = :id";
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

    public function getSewaList()
    {
        $sql = 'SELECT S.id, S.kode_sewa, S.nomor_pelanggan, S.tanggal_sewa, S.tanggal_kembali, S.disewa, S.dikembalikan, P.id as idpelanggan, P.nama 
        FROM sewa S LEFT JOIN pelanggan P ON (S.nomor_pelanggan = P.nomor_pelanggan) LIMIT 100';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataCombo()
    {
        $sql = 'SELECT * FROM sewa';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

?>

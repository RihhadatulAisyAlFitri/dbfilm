<?php

include_once('../db/database.php');

class FilmModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addFilm($kode_film, $judul, $genre, $tahun_rilis, $harga)
    {
        $sql = "INSERT INTO film (kode_film, judul, genre, tahun_rilis, harga) VALUES (:kode_film, :judul, :genre, :tahun_rilis, :harga)";
        $params = array(
          ":kode_film" => $kode_film,
          ":judul" => $judul,
          ":genre" => $genre,
          ":tahun_rilis" => $tahun_rilis,
          ":harga" => $harga
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

    public function getFilm($id)
    {
        $sql = "SELECT * FROM film WHERE id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateFilm($id, $kode_film, $judul, $genre, $tahun_rilis, $harga)
    {
        $sql = "UPDATE film SET kode_film = :kode_film, judul = :judul, genre = :genre, tahun_rilis = :tahun_rilis, harga = :harga WHERE id = :id";
        $params = array(
          ":kode_film" => $kode_film,
          ":judul" => $judul,
          ":genre" => $genre,
          ":tahun_rilis" => $tahun_rilis,
          ":harga" => $harga,
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
    

    public function deleteFilm($id)
    {
        $sql = "DELETE FROM film WHERE id = :id";
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

    public function getFilmList()
    {
        $sql = 'SELECT * FROM film limit 100';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataCombo()
    {
        $sql = 'SELECT * FROM film';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

<?php

class Petugas_model
{
    private $db;
    private $table1 = 'user';
    private $table2 = 'pengaduan';

    public function __construct()
    {
        $this->db = new Database();
    }

    public function validate($data)
    {
        $query = "SELECT * FROM {$this->table1} WHERE username = :username AND password = :password";

        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->execute();
        return $this->db->single();
    }

    public function getAllKeluhan()
    {
        $query = "SELECT * FROM {$this->table2}";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->setResults();
    }

    public function markAsRead($id)
    {
        $query = "DELETE FROM {$this->table2} WHERE id_pengaduan = :id_pengaduan";

        $this->db->query($query);
        $this->db->bind('id_pengaduan', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}

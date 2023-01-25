<?php

class Admin_model
{
    private $db;
    private $table1 = 'petugas';
    private $table2 = 'pengaduan';
    private $table3 = 'masyarakat';

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllKeluhan()
    {
        $query = "SELECT * FROM {$this->table3}, {$this->table2} WHERE {$this->table3}.nik = {$this->table2}.nik";
        $this->db->query($query);
        return $this->db->setResults();
    }

    public function getAllUser()
    {
        $query = "SELECT * FROM {$this->table1}";
        $this->db->query($query);
        return $this->db->setResults();
    }

    public function getUserByID($id_user)
    {
        $query = "SELECT * FROM {$this->table1} WHERE id_user = :id_user";
        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        return $this->db->single();
    }

    public function editUser($data)
    {
        $query = "UPDATE {$this->table1} SET `username` = :username, `email` = :email WHERE id_user = :id_user";
        $this->db->query($query);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        return $this->db->rowCount();
    }

    public function deleteUserFromId($id)
    {
        $query = "DELETE FROM {$this->table1} WHERE id_user = :id_user";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        return $this->db->rowCount();
    }
}

<?php

class Admin_model
{
    private $db;
    private $table1 = 'user';
    private $table2 = 'pengaduan';

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllKeluhan()
    {
        $query = "SELECT * FROM {$this->table2}";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->setResults();
    }

    public function getAllUser()
    {
        $query = "SELECT * FROM {$this->table1}";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->setResults();
    }

    public function getUserByID($id_user)
    {
        $query = "SELECT * FROM {$this->table1} WHERE id_user = :id_user";
        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->execute();
        return $this->db->single();
    }

    public function editUser($data)
    {
        $query = "UPDATE {$this->table1} SET `username` = :username, `email` = :email WHERE id_user = :id_user";
        $this->db->query($query);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteUserFromId($id)
    {
        $query = "DELETE FROM {$this->table1} WHERE id_user = :id_user";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}

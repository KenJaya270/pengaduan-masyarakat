<?php

class Petugas_model
{
    private $db;
    private $table1 = 'user';

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
}

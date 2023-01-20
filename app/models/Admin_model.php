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
}

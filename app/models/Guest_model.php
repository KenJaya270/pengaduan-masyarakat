<?php
class Guest_model
{
    private $db;
    private $table1 = 'pengaduan';
    public function __construct()
    {
        $this->db = new Database();
    }

    public function insertKeluhan($data, $data2)
    {
        $query = "INSERT INTO {$this->table1} VALUES(null, :email, :subjek, :pengaduan, :foto)";
        $this->db->query($query);
        $this->db->bind('email', $data['email']);
        $this->db->bind('subjek', $data['subjek']);
        $this->db->bind('pengaduan', $data['pengaduan']);
        $this->db->bind('foto', $data2['foto']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}

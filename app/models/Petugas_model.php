<?php

class Petugas_model
{
    private $db;
    private $table1 = 'petugas';
    private $table2 = 'pengaduan';
    private $table3 = 'masyarakat';
    private $table4 = 'tanggapan';

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
        return $this->db->single();
    }

    public function getAllKeluhan()
    {
        $query = "SELECT {$this->table2}.*,
        {$this->table3}.*,
        {$this->table4}.id_tanggapan, 
        {$this->table4}.tgl_tanggapan, 
        {$this->table4}.tanggapan, 
        {$this->table4}.id_petugas
        FROM {$this->table2}
        LEFT OUTER JOIN {$this->table4} ON {$this->table2}.id_pengaduan = {$this->table4}.id_pengaduan
        LEFT OUTER JOIN {$this->table3} ON {$this->table2}.nik = {$this->table3}.nik";
        $this->db->query($query);
        return $this->db->setResults();
    }

    public function markAsRead($id)
    {
        $query = "DELETE FROM {$this->table2} WHERE id_pengaduan = :id_pengaduan";

        $this->db->query($query);
        $this->db->bind('id_pengaduan', $id);
        return $this->db->rowCount();
    }

    public function insertTanggapan()
    {
        $query = "INSERT INTO {$this->table4} VALUES(null, :id_pengaduan, :tgl_tanggapan, :tanggapan, :id_petugas)";
        $this->db->query($query);
        $this->db->bind('id_pengaduan', $_POST['id_pengaduan']);
        $this->db->bind('tgl_tanggapan', date('Y-m-d'));
        $this->db->bind('tanggapan', $_POST['tanggapan']);
        $this->db->bind('id_petugas', $_POST['id_petugas']);
        return $this->db->rowCount();
    }

    public function updateTanggapan()
    {
        $query = "UPDATE {$this->table4} SET  tgl_tanggapan = :tgl_tanggapan, tanggapan = :tanggapan, id_petugas = :id_petugas WHERE id_tanggapan = :id_tanggapan";
        $this->db->query($query);
        $this->db->bind('id_tanggapan', $_POST['id_tanggapan']);
        $this->db->bind('tgl_tanggapan', date('Y-m-d'));
        $this->db->bind('tanggapan', $_POST['tanggapan']);
        $this->db->bind('id_petugas', $_POST['id_petugas']);
        return $this->db->rowCount();
    }

    public function updateStatus()
    {
        // if ($this->insertTanggapan() > 0) {
        $query = "UPDATE {$this->table2} SET status = :status WHERE id_pengaduan = :id_pengaduan";
        $this->db->query($query);
        $this->db->bind('id_pengaduan', $_POST['id_pengaduan']);
        switch ($_POST['submit']) {
            case 'Belum Ditindaklanjuti':
                $this->db->bind('status', "0");
                break;
            case 'Sedang Ditindaklanjuti':
                $this->db->bind('status', 'proses');
                break;
            case 'Sudah Ditindaklanjuti':
                $this->db->bind('status', 'selesai');
                break;
        }
        return $this->db->rowCount();
        // }
    }
}

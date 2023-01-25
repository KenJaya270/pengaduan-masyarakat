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
        $query = "SELECT * FROM {$this->table2}, {$this->table3} WHERE {$this->table2}.nik = {$this->table3}.nik";
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
        $this->db->bind('tgl_tanggapan', $_POST['tgl_tanggapan']);
        $this->db->bind('tanggapan', $_POST['tanggapan']);
        $this->db->bind('id_petugas', $_POST['id_petugas']);
        return $this->db->rowCount();
    }

    public function updateStatus($status)
    {
        if ($this->insertTanggapan() > 0) {
            $query = "UPDATE {$this->table2} SET status = :status";
            $this->db->query($query);
            switch ($_POST['submit']) {
                case 'Sedang Ditangani':
                    return header('Location: ' . BASEURL . '/petugas/updateStatus/proses');
                    exit;
                case 'Sudah Ditangani':
                    return header('Location: ' . BASEURL . '/petugas/updateStatus/selesai');
                    exit;
                default:
                    return header('Location: ' . BASEURL . '/petugas/updateStatus/0');
                    exit;
            }
            $this->db->bind('status', $status);
            return $this->db->rowCount();
        }
    }
}

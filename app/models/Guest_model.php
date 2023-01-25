<?php
class Guest_model
{
    private $db;
    private $table1 = 'pengaduan';
    private $table2 = 'masyarakat';
    public function __construct()
    {
        $this->db = new Database();
    }

    public function setFoto($nameInput)
    {
        if (isset($_FILES[$nameInput])) {
            $ukuranFile = $_FILES[$nameInput]['size'];
            $error = $_FILES[$nameInput]['error'];
            $tmp_file = $_FILES[$nameInput]['tmp_name'];
            $namaFile = $_FILES[$nameInput]['name'];

            if ($error === 4) {
                echo "<script>alert('Pilih Gambar Terlebih Dahulu!')</script>";
                return false;
            }

            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));
            if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
                echo "<script>alert('Pilih Ekstensi Gambar JPG/JPEG/PNG')</script>";
                return false;
            }

            if ($ukuranFile >= 50000000) {
                echo "<script>alert('Ukuran Foto Terlalu Besar, maksimal dibawah 50MB')</script>";
                return false;
            }

            move_uploaded_file($tmp_file, 'img/' . $namaFile);
            return $namaFile;
        }
    }

    public function validate()
    {
        $query = "SELECT * FROM {$this->table2}  WHERE nik = :nik";
        $this->db->query($query);
        $this->db->bind('nik', $_POST['nik']);
        return $this->db->rowCount();
    }

    public function validateAll()
    {
        $query = "SELECT * FROM {$this->table2} WHERE nik = :nik && nama = :nama";
        $this->db->query($query);
        $this->db->bind('nik', $_POST['nik']);
        $this->db->bind('nama', $_POST['nama']);
        return $this->db->rowCount();
    }

    public function insertUser()
    {
        $query = "INSERT INTO {$this->table2} VALUES(:nik, :nama, :telp)";
        $this->db->query($query);
        $this->db->bind('nik', $_POST['nik']);
        $this->db->bind('nama', $_POST['nama']);
        $this->db->bind('telp', $_POST['telp']);
        return $this->db->rowCount();
    }

    public function insertKeluhan()
    {
        $query = "INSERT INTO {$this->table1} VALUES(null,:tgl_pengaduan, :nik, :subjek, :pengaduan, :foto, :status)";
        $this->db->query($query);
        $this->db->bind('tgl_pengaduan', $_POST['tgl_pengaduan']);
        $this->db->bind('nik', $_POST['nik']);
        $this->db->bind('subjek', $_POST['subjek']);
        $this->db->bind('pengaduan', $_POST['pengaduan']);
        $this->db->bind('foto', $this->setFoto('foto'));
        $this->db->bind('status', '0');
        return $this->db->rowCount();
    }
}

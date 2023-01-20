<?php
class Guest_model
{
    private $db;
    private $table1 = 'pengaduan';
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

    public function insertKeluhan($data, $data2)
    {
        $query = "INSERT INTO {$this->table1} VALUES(null, :email, :subjek, :pengaduan, :foto)";
        $this->db->query($query);
        $this->db->bind('email', $data['email']);
        $this->db->bind('subjek', $data['subjek']);
        $this->db->bind('pengaduan', $data['pengaduan']);
        $this->db->bind('foto', $this->setFoto('foto'));
        $this->db->execute();
        return $this->db->rowCount();
    }
}

<?php
class Guest extends Controller
{
    private $bodyColor = '#4e73df';
    public function index()
    {
        $data['judul'] = 'Guest/index';
        $data['body-color'] = $this->bodyColor;
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('guest/index');
        $this->view('templates/footer');
    }

    public function pengaduan()
    {
        $data['judul'] = 'Guest/pengaduan';
        $data['body-color'] = '';

        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('guest/pengaduan');
        $this->view('templates/footer');
    }

    public function setFoto($nameInput)
    {
        if (isset($_FILES[$nameInput])) {
            $tmp = $_FILES[$nameInput]['tmp_name'];
            $target_dir = "C:/laragon/www/pengaduan-masyarakat/public/img/";
            $target_file = $target_dir . basename($_FILES[$nameInput]['name']);
            $imageFileType = strtolower($_FILES[$nameInput]['size']);
            $type = [
                "jpeg" => "image/jpeg",
                "png" => "image/png",
                "jpg" => "image/jpg"
            ];
            if (!$_FILES[$nameInput]['size'] < 4000000) {
                echo "<script>alert('Size File harus dibawah 4MB')</script>";
            }

            if ($imageFileType != $type[0] || $imageFileType != $type[1] || $imageFileType != $type[2]) {
                echo "<script>alert('Tipe File harus JPEG/PNG/JPG')</script>";
            }

            $result = move_uploaded_file($tmp, $target_dir);
            return $result;
            // var_dump($_FILES[$nameInput]);
        }
    }
    public function insertAduan()
    {
        $this->setFoto('foto');
        if ($this->model('Guest_model')->insertKeluhan($_POST, $_FILES) > 0) {
            Flasher::setFlash('keluhkan', 'success', 'Keluhan Berhasil');
            header('Location: ' . BASEURL . '/guest/pengaduan');
            exit;
        } else {
            Flasher::setFlash('keluhkan', 'danger', 'Keluhan Berhasil');
            header('Location: ' . BASEURL . '/guest/pengaduan');
            exit;
        }
    }
}

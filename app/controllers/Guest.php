<?php
class Guest extends Controller
{
    private $bodyColor = '#4e73df';
    public function index()
    {
        session_destroy();
        unset($_SESSION['user-login']);
        Middleware::level('');
        $data['judul'] = 'Guest/index';
        $data['body-color'] = $this->bodyColor;
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('guest/index');
        $this->view('templates/footer');
    }

    public function pengaduan()
    {
        session_destroy();
        unset($_SESSION['user-login']);
        Middleware::level('');
        $data['judul'] = 'Guest/pengaduan';
        $data['body-color'] = '';
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('guest/pengaduan');
        $this->view('templates/footer');
    }
    public function insertAduan()
    {
        Middleware::level('');
        if ($this->model('Guest_model')->insertKeluhan($_POST, $_FILES) > 0) {
            Flasher::setFlash('kirim', 'success', 'Keluhan Berhasil');
            header('Location: ' . BASEURL . '/guest/pengaduan');
            exit;
        } else {
            Flasher::setFlash('kirim', 'danger', 'Keluhan Gagal');
            header('Location: ' . BASEURL . '/guest/pengaduan');
            exit;
        }
    }
}

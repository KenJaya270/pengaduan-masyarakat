<?php
class Petugas extends Controller
{
    private $bodyColor = '';
    private $navItem1 = '';
    private $navItem2 = '';
    private $navMethod1 = '';
    private $navMethod2 = '';
    public function index()
    {
        Middleware::level('petugas');
        Middleware::level('petugas');
        $data['judul'] = 'Petugas/index';
        $data['body-color'] = $this->bodyColor;
        $data['user'] = $_SESSION['user-login'];
        $data['allKeluhan'] = $this->model('Petugas_model')->getAllKeluhan();
        $data['nav-item1'] = $this->navItem1;
        $data['nav-item2'] = $this->navItem2;
        $data['nav-method1'] = $this->navMethod1;
        $data['nav-method2'] = $this->navMethod2;
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('petugas/index', $data);
        $this->view('templates/footer', $data);
    }

    public function insertTanggapan()
    {
        // if ($this->model('Petugas_model')->updateStatus() > 0) {
        //     Flasher::setFlash('update', 'success', 'Status Berhasil');
        //     header('Location: ' . BASEURL . '/petugas');
        //     exit;
        // } else {
        //     Flasher::setFlash('update', 'danger', 'Status Gagal');
        //     header('Location: ' . BASEURL . '/petugas');
        //     exit;
        // }
        $this->model('Petugas_model')->insertTanggapan();
        $this->model('Petugas_model')->updateStatus();
        return header('Location: ' . BASEURL . '/petugas');
    }

    public function updateTanggapan()
    {
        $this->model('Petugas_model')->updateTanggapan();
        $this->model('Petugas_model')->updateStatus();
        return header('Location: ' . BASEURL . '/petugas');
    }

    public function sudahDibaca($id)
    {
        $this->model('Petugas_model')->markAsRead($id);
        header('Location: ' . BASEURL . '/petugas');
        exit;
    }
}

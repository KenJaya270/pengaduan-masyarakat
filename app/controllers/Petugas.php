<?php
class Petugas extends Controller
{
    private $bodyColor = '';
    public function index()
    {
        Middleware::auth();
        Middleware::level('petugas');
        $data['judul'] = 'Petugas/index';
        $data['body-color'] = $this->bodyColor;
        $data['user'] = $_SESSION['user-login'];
        $data['allKeluhan'] = $this->model('Petugas_model')->getAllKeluhan();
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('petugas/index', $data);
        $this->view('templates/footer');
    }

    public function sudahDibaca($id)
    {
        $this->model('Petugas_model')->markAsRead($id);
    }
}

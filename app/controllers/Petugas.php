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
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('petugas/index');
        $this->view('templates/footer');
    }
}

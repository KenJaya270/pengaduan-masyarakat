<?php
class Admin extends Controller
{
    private $bodyColor = '';

    public function index()
    {
        Middleware::auth();
        Middleware::level('admin');
        $data['judul'] = 'Admin/index';
        $data['body-color'] = $this->bodyColor;
        $data['allKeluhan'] = $this->model('Admin_model')->getAllKeluhan();
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('admin/index', $data);
        $this->view('templates/footer');
    }

    public function user()
    {
        Middleware::auth();
        Middleware::level('admin');
        $data['judul'] = 'Admin/user';
        $data['body-color'] = $this->bodyColor;
        $data['allUser'] = $this->model('Admin_model')->getAllUser();
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('admin/user', $data);
        $this->view('templates/footer');
    }
}

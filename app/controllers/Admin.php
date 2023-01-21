<?php
class Admin extends Controller
{
    private $bodyColor = '';
    private $navItem1 = 'Keluhan';
    private $navItem2 = 'User';
    private $navMethod1 = 'admin';
    private $navMethod2 = 'admin/user';

    public function index()
    {
        Middleware::auth();
        Middleware::level('admin');
        $data['judul'] = 'Admin/index';
        $data['body-color'] = $this->bodyColor;
        $data['allKeluhan'] = $this->model('Admin_model')->getAllKeluhan();
        $data['nav-item1'] = $this->navItem1;
        $data['nav-item2'] = $this->navItem2;
        $data['nav-method1'] = $this->navMethod1;
        $data['nav-method2'] = $this->navMethod2;
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
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
        $data['nav-item1'] = $this->navItem1;
        $data['nav-item2'] = $this->navItem2;
        $data['nav-method1'] = $this->navMethod1;
        $data['nav-method2'] = $this->navMethod2;
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('admin/user', $data);
        $this->view('templates/footer');
    }

    public function lihatUser($id_user)
    {
        Middleware::auth();
        Middleware::level('admin');
        $data['body-color'] = $this->bodyColor;
        $data['getUserByID'] = $this->model('Admin_model')->getUserByID($id_user);
        $data['judul'] = 'Profil ' . $data['getUserByID']['username'];
        $data['nav-item1'] = $this->navItem1;
        $data['nav-item2'] = $this->navItem2;
        $data['nav-method1'] = $this->navMethod1;
        $data['nav-method2'] = $this->navMethod2;
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('admin/lihatUser', $data);
        $this->view('templates/footer');
    }

    public function editUser()
    {
        if ($this->model('Admin_model')->editUser($_POST) > 0) {
            Flasher::setFlash('ubah', 'success', 'Petugas Berhasil');
            header('Location: ' . BASEURL . '/admin/user');
            exit;
        } else {
            Flasher::setFlash('ubah', 'danger', 'Petugas Berhasil');
            header('Location: ' . BASEURL . '/admin/user');
            exit;
        }
    }

    public function hapusUser($id)
    {
        if ($this->model('Admin_model')->deleteUserFromId($id) > 0) {
            Flasher::setFlash('hapus', 'success', 'Petugas Berhasil');
            header('Location: ' . BASEURL . '/admin/user');
            exit;
        } else {
            Flasher::setFlash('hapus', 'danger', 'Petugas Berhasil');
            header('Location: ' . BASEURL . '/admin/user');
            exit;
        }
    }
}

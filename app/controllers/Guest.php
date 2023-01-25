<?php
class Guest extends Controller
{
    private $bodyColor = '#4e73df';
    private $navItem1 = '';
    private $navItem2 = '';
    private $navMethod1 = '';
    private $navMethod2 = '';
    public function index()
    {
        $data['judul'] = 'Guest/index';
        $data['body-color'] = $this->bodyColor;
        $data['nav-item1'] = $this->navItem1;
        $data['nav-item2'] = $this->navItem2;
        $data['nav-method1'] = $this->navMethod1;
        $data['nav-method2'] = $this->navMethod2;
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('guest/index');
        $this->view('templates/footer');
    }

    public function pengaduan()
    {
        $data['judul'] = 'Guest/pengaduan';
        $data['body-color'] = '';
        $data['nav-item1'] = $this->navItem1;
        $data['nav-item2'] = $this->navItem2;
        $data['nav-method1'] = $this->navMethod1;
        $data['nav-method2'] = $this->navMethod2;
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('guest/pengaduan');
        $this->view('templates/footer');
    }
    public function insertAduan()
    {
        if ($this->model('Guest_model')->validate()) {
            if (!$this->model('Guest_model')->validateAll()) {
                Flasher::setFlash('', 'danger', 'Nama Salah atau NIK telah dipakai orang lain');
                return Functions::back();
            }
        } else {
            $this->model('Guest_model')->insertUser();
        }
        $this->model('Guest_model')->insertKeluhan();
        Flasher::setFlash('', 'success', 'Berhasil Mengirim Keluhan!');
        return header('Location: ' . BASEURL . '/guest/pengaduan');
    }
}

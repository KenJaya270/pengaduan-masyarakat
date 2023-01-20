<?php
class Auth extends Controller
{
    private $userData;
    private $bodyColor = '#393E46';
    public function index()
    {
        session_destroy();
        unset($_SESSION['user-login']);
        $data['judul'] = 'Login';
        $data['body-color'] = $this->bodyColor;
        $this->view('templates/header', $data);
        $this->view('auth/index');
        $this->view('templates/footer');
    }

    public function userValidate()
    {
        $this->userData = $this->model('Petugas_model')->validate($_POST);

        if ($this->userData === false) {
            Flasher::setFlash('Salah', 'danger', 'Username atau Password');
            header('Location: ' . BASEURL . '/auth');
            exit;
        } else {
            $_SESSION['user-login'] = $this->userData;
            header('Location: ' . BASEURL . "/" . $_SESSION['user-login']['level']);
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['user-login']);
        Middleware::auth();
    }
}

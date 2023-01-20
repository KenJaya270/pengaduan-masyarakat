<?php
class Flasher
{
    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
            <strong>' . $_SESSION['flash']['pesan'] . '</strong> Di' . $_SESSION['flash']['aksi'] . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
        unset($_SESSION['flash']);;
    }

    public static function login()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">' . $_SESSION['flash']['pesan'] . ' ' . $_SESSION['flash']['aksi'] . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
        unset($_SESSION['flash']);
    }

    public static function setFlash($aksi, $tipe, $pesan)
    {
        $_SESSION['flash'] = [
            "aksi" => $aksi,
            "tipe" => $tipe,
            "pesan" => $pesan
        ];
    }
}

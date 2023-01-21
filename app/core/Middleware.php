<?php
class Middleware
{
    static function auth()
    {
        if (!isset($_SESSION['user-login'])) {
            header('Location: ' . BASEURL);
            exit;
        }
    }

    static function level($level)
    {
        if (isset($_SESSION['user-login']) && $level = '') {
            Functions::back();
            exit;
        }

        if (!isset($_SESSION['user-login']) || $level != $level) {
            Functions::back();
            exit;
        }
    }
}

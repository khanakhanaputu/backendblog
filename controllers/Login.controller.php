<?php

include_once('views/login.view.php');
include_once('models/User.model.php');

class LoginController extends UserModel
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['username'], $_POST['password'])) {
                $auth = parent::auth($_POST['username'], $_POST['password']);
                if (!$auth) {
                    login(true);
                    exit; // Supaya tidak lanjut ke redirect
                }
                header('Location: /');
                exit;
            }
        }

        login(); // Hanya tampilkan view kalau belum submit login
    }
}

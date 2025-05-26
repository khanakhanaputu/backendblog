<?php
require_once 'views/register.view.php';
include_once 'models/User.model.php';
include_once 'models/Model.model.php';
class RegisterController extends Model
{
    public function index()
    {
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
            if ($_POST['password'] !== $_POST['confirm_password']) {
                echo "password tidak sama anjay";
                exit;
            }
            $username = $_POST['username'];
            $password = $_POST['password'];
            $this->create('users', ["NULL", "'$username'", "'$password'"]);
        }
        // Your code here
        register();
    }
    // public function checkPassword($password, $confirmPassword){
    //     if ($password !== $confirmPassword) {
    //         return false;
    //     }
    //     return true;
    // }
}

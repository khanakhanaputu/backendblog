<?php
require_once 'views/register.view.php';
include_once 'models/User.model.php';
class RegisterController extends UserModel{
    public function index() {
        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password'])){
            if($_POST['password'] !== $_POST['confirm_password']){
                echo "password tidak sama anjay";
                exit;
            }
            $this->createUser($_POST['username'],$_POST['password']);
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
?>
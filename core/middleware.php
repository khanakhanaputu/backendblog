<?php
include_once('models/User.model.php');
// Middleware

class Middleware extends userModel
{

    public function ifAuth(){
        session_start();
        if(!isset($_SESSION['user_data'])){
            echo "blom login";
            exit;
        }
    }
    public function roleCheck(){
        // masih perlu atau blm saya tidak tahu
    }
}
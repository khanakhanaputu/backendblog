<?php

include_once("models/user.model.php");

// Middleware

class Middleware extends userModel
{

    public function ifAuth(){
        session_start();
        if(!isset($_SESSION['user_data'])){
            echo "blom login";
        }
        var_dump($_SESSION["user_data"]);
    }
    public function roleCheck(){
        // masih perlu atau blm saya tidak tahu
    }
}
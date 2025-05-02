<?php

include_once("models/user.model.php");

// Middleware

class Middleware extends userModel
{
    public function auth($username, $password){
        $result = parent::auth($username,$password);
        if($result){
            var_dump($_SESSION['user_data']);
        }else{
            $_POST['gagal_login'] = true;
        }
    }
    
}
<?php

include_once('views/login.view.php');
include_once('models/User.model.php');

class LoginController extends UserModel
{
    public function index()
    {
        // Your code for handling the login logic goes here
        login();
        
        if(isset($_POST['username']) && $_POST['password']){
            $auth = parent::auth($_POST['username'],$_POST['password']);
            if (!$auth) {
                login(false);
            }
          }
        
        
    }
}
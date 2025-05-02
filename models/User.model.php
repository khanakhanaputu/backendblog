<?php
include_once("core/database.php");
class UserModel extends Database{
    public function auth($username,$password){
        $query = "SELECT * FROM users WHERE username='$username' && password='$password'";
        $result = mysqli_query($this->connect, $query);
        $data =[];
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            $_SESSION['user_data'] = $data;
            return true;
        }else{
            return false;
        }
    }

}
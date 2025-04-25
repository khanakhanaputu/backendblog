<?php
include_once("core/database.php");
class DummyModel extends Database{
    private $table;
    public function __construct(){
        parent::__construct();
        $this->table = "products";
    }
    public function getAll(){
        $query = "SELECT * FROM $this->table";
        $result = mysqli_query($this->connect, $query);
        $data = [];
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }
    public function getById($id){
        $query = "SELECT * FROM $this->table WHERE id = $id";
        $result = mysqli_query($this->connect, $query);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            return $data;
        }else{
            return false;
        }
    }
    public function create($name,$description,$price,$stock){
        $query = "INSERT INTO $this->table (name,description,price,stock) VALUES ('$name','$description','$price','$stock')";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    public function auth($username,$password){
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($this->connect, $query);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
                $_SESSION['userdata'] = $data;
        }
        return $data;
    }
    }

    public function publicproducts(){
        $query = "SELECT * FROM `public_product`";
        $result = mysqli_query($this->connect, $query);
        $data = [];
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }
}
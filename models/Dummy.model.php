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
        while($row = mysqli_fetch_array($result)){
            $data[] = $row;
        }
        return $data;
    }
    public function getById($id){
        $query = "SELECT * FROM $this->table WHERE id = $id";
        $result = mysqli_query($this->connect, $query);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)){
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
}
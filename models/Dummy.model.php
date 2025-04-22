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
}
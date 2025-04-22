<?php
include_once("views/dummy.view.php");
include_once("views/tambah.view.php");
include_once("views/item.view.php");
include_once("models/dummy.model.php");
class DummyController extends DummyModel{
    public function index(){
        dummy($this->getAll());
    }
    public function item($id){
        item($this->getById($id));
    }
    public function insert(){
        insert(); // panggil viewnya
        if (isset($_POST['create_data'])) {
            $this->create($_POST['name'],$_POST['description'],$_POST['price'],$_POST['stock']);
        }
    }
}
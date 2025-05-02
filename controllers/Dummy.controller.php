<?php
include_once("views/dummy.view.php");
include_once("views/tambah.view.php");
include_once("views/item.view.php");
include_once("models/dummy.model.php");
include_once("views/login.view.php");
class DummyController extends DummyModel{
    public function index(){
        dummy($this->getAll());
    }
    public function item($id){
        try {
            item($this->getById($id));
        } catch (Throwable $e) {
            error();
        }
    }
    public function insert(){
        insert(); // panggil viewnya
        if (isset($_POST['create_data'])) {
            $this->create($_POST['name'],$_POST['description'],$_POST['price'],$_POST['stock']);
        }
    }
}
<?php
include_once("models/Dummy.model.php");
class ApiController extends DummyModel{
    public function getallproduct(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($this->getAll(),JSON_PRETTY_PRINT);
    }
}
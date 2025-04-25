<?php
include_once("models/Dummy.model.php");
class ApiController extends DummyModel{
    private $api_key;
    public function __construct(){
        parent::__construct();
        $this->api_key = 'khana123';
    }
    
    public function getallproduct($key = ""){
        if($key === $this->api_key){
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            echo json_encode($this->publicproducts(),JSON_PRETTY_PRINT);
        }else{
            header("Content-Type: application/json; charset=UTF-8");
            echo json_encode(array("message" => "Invalid API Key"));
        }
    }
}
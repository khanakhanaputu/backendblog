<?php
// include_once("models/Dummy.model.php");
class ApiController
{
    // public function __construct(){
    //     parent::__construct();
    // }
    // public function getallproduct(){
    //     header("Access-Control-Allow-Origin: *");
    //     header("Content-Type: application/json; charset=UTF-8");
    //     return json_encode($this->publicproducts(),JSON_PRETTY_PRINT);
    // }
    public function getuser($id = "")
    {
        return ($id === "") ? "error" : json_encode($id, JSON_PRETTY_PRINT);
    }
    public function users()
    {
        return json_encode("biji kuda", JSON_PRETTY_PRINT);
    }
}

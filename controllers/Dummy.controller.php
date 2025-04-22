<?php
include_once("views/dummy.view.php");
include_once("models/dummy.model.php");
class DummyController extends DummyModel{
    public function index(){
        dummy($this->getAll());
    }
}
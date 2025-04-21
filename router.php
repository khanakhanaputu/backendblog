<?php
include("controllers/test.controller.php");
include("views/apalah.view.php");
class Router {
    private $url;

    public function __construct() {
        $this->url = explode("/", $_SERVER["REQUEST_URI"]);
    }

    public function route($param_one, $param_two, $param_three) {
        // Cek apakah param_one adalah controller
        if ($param_one === ""){
            echo "nigga";
        }else{
            $nameController = $param_one."Controller";
        if (class_exists($nameController)) {
            $controller = new $nameController();
            $method = ($param_two === "none") ? "index" : $param_two;

            if (method_exists($controller, $method)) {
               return $param_three === "none" ? $controller->$method() : $controller->$method($param_three);
            } else {
                echo "ga nemu dawg";
            }
        } else {
            if ($param_two === "none") {
                return $param_one();
            }else{
                return $param_one($param_two);
            }
        }
        }
    }

    public function run() {
        $controller = $this->url[1] ?? "HomeController";
        $method = $this->url[2] ?? "none";
        $params = $this->url[3] ?? "none";

        return $this->route($controller, $method, $params);
    }
}

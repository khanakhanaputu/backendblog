<?php
class Router {
    private $url;

    public function __construct() {
        // Ambil URI dan ubah menjadi array berdasarkan "/"
        $uri = explode("/", $_SERVER["REQUEST_URI"]);
        
        // array values buat rapiin array, array di dif buat ngilangin backendblog
        $this->url = array_values(array_diff($uri, ["backendblog"]));

    }
    
    public function route($param_one, $param_two, $param_three) {
        // Cek apakah param_one adalah controller
        if ($param_one === ""){
            include_once("views/home.view.php");
            home();
        }else{
        $getControllerName = "controllers/$param_one.controller.php";
        if (file_exists($getControllerName)) {
            include_once($getControllerName);
            $nameController = $param_one."Controller";
            if (class_exists($nameController)) {
                $controller = new $nameController();
                $method = ($param_two === "none") ? "index" : $param_two;
    
                if (method_exists($controller, $method)) {
                   return $param_three === "none" ? $controller->$method() : $controller->$method($param_three);
                } else {
                    echo "ga nemu dawg";
                }
            }else{
                echo "class tidak ada";
            }
        }
        else {
            if ($param_two === "none") {
                $file = "views/$param_one.view.php";
                if (file_exists($file)) {
                    include_once($file);
                    return $param_one();
                }else{
                    include_once("views/error.view.php");
                    return error();
                }
            }else{
                $file = "views/$param_one.view.php";
                if (file_exists($file)) {
                    include_once($file);
                    return $param_one($param_two);
                }else{
                    include_once("views/error.view.php");
                    return error();
                }
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

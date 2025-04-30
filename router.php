<?php
include_once("views/error.view.php");
class Router {
    private $url;

    public function __construct() {
        // Ambil URI dan ubah menjadi array berdasarkan "/"
        $uri = explode("/", $_SERVER["REQUEST_URI"]);
        
        // array values buat rapiin array, array di dif buat ngilangin backendblog
        $this->url = array_values(array_diff($uri, ["backendblog"]));

    }
    
    /**
     * alur kerja
     * jadi pertama ambil param_one, disini param_one bisa aja controller atau view jadi di cek dlu
     * abistu cek ada param_two, param_two bisa aja method atau parameter pertama
     * abistu cek ada param_three, param_three bisa aja parameter kedua
     */
    public function route($param_one, $param_two, $param_three) {
        // Cek apakah param_one adalah controller
        if ($param_one === ""){
            include_once("views/home.view.php");
            return home();
        }
        $getControllerName = "controllers/$param_one.controller.php";
        if (file_exists($getControllerName)) {
            include_once($getControllerName);
            $nameController = $param_one."Controller";
            if($nameController === "apiController"){
                $controller = new $nameController();
                $err_api = [
                    'message' => 'what?'
                ];
                $method = $param_two == "" ? $err_api : $param_two;
                if(!method_exists($controller, $method) && $method !== ""){
                   return json_encode($err_api);
                }
                return $controller->$method();
            }
            if (!class_exists($nameController)) {
                return error();
            }
            $controller = new $nameController();
            $method = ($param_two === "none") ? "index" : $param_two;

            if (!method_exists($controller, $method)) {
                return error();
            }
            return $param_three === "none" ? $controller->$method() : $controller->$method($param_three);
        }
        else {
            $file = "views/$param_one.view.php";
            if (!file_exists($file)) {
               return error(); 
            }
            include_once($file);
            if ($param_two === "none") {
                return $param_one();
            }
            return $param_one($param_two);
        }
    }

    /**
     * @param string $param_one nama controller atau view
     * @param string $param_two nama method atau parameter pertama
     * @param string $param_three parameter kedua
     */
    public function run() {
        $controller = $this->url[1] ?? "HomeController";
        $method = $this->url[2] ?? "none";
        $params = $this->url[3] ?? "none";

        return $this->route($controller, $method, $params);
    }

}

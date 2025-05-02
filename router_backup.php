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
            // jadi disini cek dulu apakah dia mengarah ke controller api atau tydack
            if($nameController === "apiController"){
                $controller = new $nameController();

                // disini gwehj bikin array yang isinya pesan error untuk api nanti
                $err_api = [
                    'message' => 'what?'
                ];
                // disini cek dlu apakah methodnya kosong atau tidak, kalau kosong dia lgsg ngeluarin pesan api error
                $method = $param_two == "" ? $err_api : $param_two;
                // disini cek juga, kalau semisal methodnya ga ada jadi dia juga bakalan ngeluarin pesan error juga
                if(!method_exists($controller, $method) && $method !== ""){
                   return json_encode($err_api);
                }
                // kalau semuanya lolos maka api bakan di return dari pangsiennyah
                return $controller->$method();
            }
            // jadi semisal controller tadi bukan dari api maka cek dlu apa controllernya ada atau tidak
            if (!class_exists($nameController)) {
                return error();
            }
            // disini kalau semisal udah ada maka bikin objek controller baru (biar bisa manggil si controllernyua)
            $controller = new $nameController();
            // disini akan dicek apakah parameter kedua diisi atau tidak, kalau tidak maka otomatis dialihkan ke method index
            $method = ($param_two === "none") ? "index" : $param_two;
            // cek apakah method ada 
            if (!method_exists($controller, $method)) {
                return error();
            }
            /** 
             * nah ini yang bikin radak puyeng bikinnya, dimana cek apakah function ni ada parameternya atau engga
             * biar menghindari function yang ga isi parameter tapi diurl ada(ga rapi), contohnya /login/adadasdfwefw
             * url masih bisa diakses tanpa error karena adadasdfwefw ga dianggep, tapi gwehj greget aja liatnya
             * jadi alurnya ini nge-inspect funnctionnya gitu (fitur bawaan php), dicek kalau parameternya 0 berarti true
             * */ 
            if(testingFunc($param_two)){
                // cek dlu urlnya ga aneh" kek /login/adasda , kalau iya yaudah redirect user ke url yang bener
                if($_SERVER['REQUEST_URI'] !== "/$param_one/$param_two"){
                    header("Location: /$param_one/$param_two");
                    exit;
                }
                // return controllernya kalau url dah ga ngaco
                return $controller->$method();
            }
            return $controller->$method($param_three);
        }
        else {
            $file = "views/$param_one.view.php";
            if (!file_exists($file)) {
               return error(); 
            }
            include_once($file);
            if(testingFunc($param_one)){
                if($_SERVER['REQUEST_URI'] !== "/$param_one"){
                    header("Location: /$param_one");
                    exit;
                }
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

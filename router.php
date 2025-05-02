<?php
include_once("views/error.view.php");

class Router {
    private $url;

    public function __construct() {
        // Ambil URI dan ubah menjadi array berdasarkan "/"
        $uri = explode("/", $_SERVER["REQUEST_URI"]);
        
        // array_values buat rapiin array, array_diff buat ngilangin 'backendblog'
        $this->url = array_values(array_diff($uri, ["backendblog"]));
    }

    /**
     * Alur kerja:
     * - Pertama ambil param_one, di sini param_one bisa aja controller atau view, jadi dicek dulu.
     * - Lalu cek apakah ada param_two, param_two bisa aja method atau parameter pertama.
     * - Kemudian cek apakah ada param_three, param_three bisa aja parameter kedua.
     */
    public function route($param_one, $param_two, $param_three) {
        // Cek apakah param_one kosong, kalau iya tampilkan home view
        if ($param_one === "") {
            include_once("views/home.view.php");
            return home();
        }

        $getControllerName = "controllers/$param_one.controller.php";

        // Cek apakah param_one adalah controller
        if (file_exists($getControllerName)) {
            include_once($getControllerName);
            $nameController = $param_one . "Controller";

            // Cek apakah controller ini adalah controller API
            if ($nameController === "apiController") {
                $controller = new $nameController();

                // Bikin array untuk pesan error API
                $err_api = [
                    'message' => 'what?'
                ];

                // Cek apakah method kosong, kalau iya langsung kasih error API
                $method = $param_two == "" ? $err_api : $param_two;

                // Cek apakah method nggak ada, kalau nggak ada juga kasih error API
                if (!method_exists($controller, $method) && $method !== "") {
                    return json_encode($err_api);
                }

                // Kalau semuanya lolos, jalankan API dan return hasilnya
                return $controller->$method();
            }

            // Cek apakah class controller ada atau nggak
            if (!class_exists($nameController)) {
                return error();
            }

            // Kalau class ada, bikin objek controller
            $controller = new $nameController();

            // Kalau param_two kosong, default ke method 'index'
            $method = ($param_two === "none") ? "index" : $param_two;

            // Cek apakah method tersebut ada
            if (!method_exists($controller, $method)) {
                return error();
            }

            /**
             * Nah ini bagian yang agak bikin gwehj pusing dikit wk:
             * - Cek apakah function tersebut ada parameternya atau nggak
             * - Tujuannya untuk ngehindarin URL aneh seperti /login/abcxyz
             *   padahal /login seharusnya nggak butuh parameter
             * - Jadi ini pakai fitur bawaan PHP buat inspect jumlah parameter function
             */
            if (testingFunc($param_two)) {
                // Kalau URL-nya aneh (ada tambahan param), redirect ke URL yang bener
                if ($_SERVER['REQUEST_URI'] !== "/$param_one/$param_two") {
                    header("Location: /$param_one/$param_two");
                    exit;
                }

                // Return controllernya kalau URL sudah bener
                return $controller->$method();
            }

            // Kalau method punya parameter, panggil dengan param_three
            return $controller->$method($param_three);
        } else {
            // Kalau bukan controller, cek apakah view ada
            $file = "views/$param_one.view.php";
            if (!file_exists($file)) {
                return error(); 
            }

            include_once($file);

            // Cek apakah function di dalam view nggak butuh parameter
            if (testingFunc($param_one)) {
                // Cek apakah URL aneh, redirect ke URL yang bener
                if ($_SERVER['REQUEST_URI'] !== "/$param_one") {
                    header("Location: /$param_one");
                    exit;
                }

                // Jalankan function view
                return $param_one();
            }

            // Jalankan function view dengan parameter (kalau ada)
            return $param_one($param_two);
        }
    }

    /**
     * @param string $param_one Nama controller atau view
     * @param string $param_two Nama method atau parameter pertama
     * @param string $param_three Parameter kedua
     */
    public function run() {
        $controller = $this->url[1] ?? "HomeController";
        $method = $this->url[2] ?? "";
        $params = $this->url[3] ?? "";

        return $this->route($controller, $method, $params);
    }
}

<?php
include_once("views/error.view.php");

class Router
{
    private $url;

    public function __construct()
    {
        $uri = explode("/", $_SERVER["REQUEST_URI"]);
        $this->url = array_values(array_diff($uri, ["backendblog"]));
    }

    public function run()
    {
        $controller = $this->url[1] ?? "";
        $method = $this->url[2] ?? "";
        $param = $this->url[3] ?? "";

        return $this->route($controller, $method, $param);
    }

    private function route($param_one, $param_two, $param_three)
    {
        if ($param_one === "") {
            include_once("views/home.view.php");
            return home();
        }

        $controllerFile = "controllers/$param_one.controller.php";

        // Kalau file controller ada, berarti ini request ke controller
        if (file_exists($controllerFile)) {
            include_once($controllerFile);
            $controllerClass = $param_one . "Controller";

            if (!class_exists($controllerClass)) {
                return error();
            }

            $controller = new $controllerClass();

            // API khusus
            if ($controllerClass === "apiController") {
                return $this->handleApi($controller, $param_two, $param_three);
            }

            return $this->handleController($controller, $param_two, $param_three);
        }

        // Kalau bukan controller, cek view
        return $this->handleView($param_one, $param_two);
    }

    private function handleController($controller, $method, $param)
    {
        $method = ($method === "") ? "index" : $method;

        if (!method_exists($controller, $method)) {
            return error();
        }

        return ($param === "") ? $controller->$method() : $controller->$method($param);
    }

    private function handleView($viewName, $param = "")
    {
        $viewFile = "views/$viewName.view.php";

        if (!file_exists($viewFile)) {
            return error();
        }

        include_once($viewFile);

        return ($param === "") ? $viewName() : $viewName($param);
    }

    private function handleApi($controller, $method, $param)
    {
        $err_api = ['message' => 'error not found'];

        if (empty($method) || !method_exists($controller, $method)) {
            http_response_code(404);
            echo json_encode($err_api);
            exit;
        }

        $check_param = new ReflectionMethod($controller, $method);
        if ($check_param->getNumberOfParameters() == 0 && $param !== "") {
            http_response_code(404);
            echo json_encode($err_api);
            exit;
        }
        return ($param === "") ? $controller->$method() : $controller->$method($param);
    }
}

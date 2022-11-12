<?php

namespace app\mvc\core;

class Application
{
    private $controller = 'home';
    private $action = 'index';
    private array $params = [];

    public function __construct()
    {
        $arr = $this->urlProcess();
        if (isset($arr[0]) && file_exists(CONTROLLER_PATH . "$arr[0].php")) {
            $this->controller = $arr[0];
        } else {
            exit("NOT FOUND CONTROLLER");
        }
        // require_once CONTROLLER_PATH . $this->controller.'.php';

        $class = "\\app\\mvc\\controllers\\$this->controller";
        $this->controller = new $class;

        if (isset($arr[1]) && method_exists($this->controller, $arr[1])) {
            $this->action = $arr[1];
        }
        unset($arr[0], $arr[1]);
        $this->params = $arr ?? [];

        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    public function urlProcess()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(trim($_GET['url'], '/')));
        }
        return ['0' => 'home'];
    }
}
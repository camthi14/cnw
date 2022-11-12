<?php

namespace app\mvc\core;

class Controller
{
    public function model($model)
    {
        if (isset($model) && file_exists(MODEL_PATH . $model . '.php')) {
            $class = "app\\mvc\\models\\$model";
            return new $class;
        }
        exit("Model not found");
    }

    public function view($view, $params = [])
    {
        if (!isset($params['title']) || !isset($params['page']) || !isset($params['css'])) {
            if (!is_array($params['css']))
                exit("css is array.");
            exit("Missing: title or page or css");
        }

        if (isset($view) && file_exists(VIEW_PATH . $view . '.php')) {
            return require_once VIEW_PATH . "$view.php";
        }
        exit("View not found");
    }

    public function getLayout($nameLayout, $params = [])
    {
        if (isset($nameLayout) && file_exists(VIEW_LAYOUTS_PATH . $nameLayout . '.php')) {
            return require_once VIEW_LAYOUTS_PATH . "$nameLayout.php";
        }
        exit("Get Layout not found");
    }

    public function getPage($namePage, $params = [])
    {
        if (isset($namePage) && file_exists(VIEW_PAGES_PATH . $namePage . '.php')) {
            return require_once VIEW_PAGES_PATH . "$namePage.php";
        }
        exit("Get Page not found");
    }

    public function getCss($nameFile)
    {
        echo PUBLIC_PATH . "/assets/css/$nameFile.css";
    }

    public function getAdminCss($nameFile)
    {
        echo PUBLIC_PATH . "/assets/admin/css/$nameFile.css";
    }

    public function getJs($nameFile)
    {
        echo PUBLIC_PATH . "/assets/js/$nameFile.js";
    }

    public function getJsAdmin($nameFile)
    {
        echo PUBLIC_PATH . "/assets/admin/js/$nameFile.js";
    }

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet()
    {
        return $this->method() === 'get';
    }

    public function isPost()
    {
        return $this->method() === 'post';
    }
    public function getBody()
    {
        $body = [];

        if ($this->method() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->method() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }

    public function redirect($url = '')
    {
        return header('Location: ' . BASE_URL . '/' . $url);
    }

    public function getLayoutAdmin($nameLayout, $params = [])
    {
        if (file_exists(VIEW_LAYOUTS_PATH . "admin\\" . $nameLayout . '.php')) {
            return require_once VIEW_LAYOUTS_PATH . "admin\\" . $nameLayout . '.php';
        }

        exit("GET LAYOUT NOT FOUND!");
    }

    public function getComponentAdmin($component, $nameLayout, $params = [])
    {
        if (file_exists(VIEW_COMPONENTS_PATH . "admin\\$component\\$nameLayout.php")) {
            return require_once VIEW_COMPONENTS_PATH . "admin\\$component\\$nameLayout.php";
        }

        exit("GET COMPONENTS NOT FOUND!");
    }

    public function getPageAdmin($namePage, $params = [])
    {
        if (file_exists(VIEW_PAGES_PATH . "admin\\" . $namePage . '.php')) {
            return require_once VIEW_PAGES_PATH . "admin\\" . $namePage . '.php';
        }

        exit("GET PAGE NOT FOUND!");
    }

    protected function processImg($file_name, $tmp_name, $folder_upload = '')
    {
        // $folder_upload = UPLOAD_PRODUCT_PATH || UPLOAD_USER_PATH;

        if (isset($file_name)) {
            $date = new \DateTimeImmutable();

            $file_name_arr = explode(".", $file_name);

            if (isset($file_name_arr[1])) {
                $img = rand(0, $date->getTimestamp()) . '.' . $file_name_arr[1];

                $target_file = $_SERVER['DOCUMENT_ROOT'] . '/shirley/uploads/products/' . basename($img);

                if (move_uploaded_file($tmp_name, $target_file))
                    return $img;
                else {
                    echo 'error: move_uploaded_file failed', PHP_EOL;
                    echo "<pre>";
                    print_r(error_get_last());
                    exit;
                }
            }

            return "";
        }
    }

    public function getColorByStatusId($id)
    {
        if ($id == 1) {
            return 'text-warning';
        } else if ($id == 2) {
            return 'text-primary';
        } else if ($id == 3) {
            return 'text-success';
        } else {
            return 'text-danger';
        }
    }
}

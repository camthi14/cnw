<?php

define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);

define('CONTROLLER_PATH', ROOT_PATH . 'mvc\controllers' . DIRECTORY_SEPARATOR);

define('MODEL_PATH', ROOT_PATH . 'mvc\models' . DIRECTORY_SEPARATOR);

define('VIEW_PATH', ROOT_PATH . 'mvc\views' . DIRECTORY_SEPARATOR);

define('VIEW_PAGES_PATH', VIEW_PATH . 'pages' . DIRECTORY_SEPARATOR);

define('VIEW_LAYOUTS_PATH', VIEW_PATH . 'layouts' . DIRECTORY_SEPARATOR);

define('CORE_PATH', ROOT_PATH . 'mvc\core' . DIRECTORY_SEPARATOR);

define('VENDOR_PATH', ROOT_PATH . 'mvc\vendor' . DIRECTORY_SEPARATOR);

define('VIEW_COMPONENTS_PATH', VIEW_PATH . 'components' . DIRECTORY_SEPARATOR);

$array_request_uri = explode("/", $_SERVER['REQUEST_URI']);

define("BASE_URL", $_SERVER['REQUEST_SCHEME'] . ":" . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR . $_SERVER['SERVER_NAME'] . DIRECTORY_SEPARATOR . $array_request_uri[1]);

unset($array_request_uri);

define("PUBLIC_PATH", BASE_URL . DIRECTORY_SEPARATOR . 'public');

define("UPLOAD_PRODUCT_PATH", BASE_URL . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR);

// $modules = [ROOT_PATH, CONTROLLER_PATH, MODEL_PATH, VIEW_PATH, CORE_PATH, VIEW_PAGES_PATH, PUBLIC_PATH, APP_PATH];

// set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $modules));

// spl_autoload_register('spl_autoload');
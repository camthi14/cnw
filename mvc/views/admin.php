<?php

use app\mvc\controllers\admin\Auth;

$auth = new Auth();

if(!$auth->isUserLoginAdmin()) {
    return $this->redirect('admin/login');
}

$this->getLayoutAdmin("header", $params);
$this->getLayoutAdmin($params['content'], $params);
$this->getLayoutAdmin("footer", $params);
<?php 


namespace app\mvc\controllers;

use app\mvc\core\Controller;

class Logout extends Controller {
    public function index() {
        unset($_SESSION['user_id_client']);
        $this->redirect('login');
    }
}
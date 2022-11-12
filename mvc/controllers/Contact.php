<?php

namespace app\mvc\controllers;

use app\mvc\core\Controller;

class Contact extends Controller
{
    public function index()
    {
        $this->view("client", [
            'page' => 'contact',
            'title' => 'Liên hệ',
            'css' => ['main', 'contact'],
            'js' => ['main']
        ]);
    }
}
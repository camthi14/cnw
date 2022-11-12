<?php

namespace app\mvc\controllers;

use app\mvc\core\Controller;

class Alert extends Controller
{
    public function paySuccess()
    {
        $this->view('client', [
            'page' => 'paySuccess',
            'css' => ['main'],
            'title' => 'Thanh toán thành công',
        ]);
    }
}

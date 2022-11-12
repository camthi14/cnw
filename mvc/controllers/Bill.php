<?php

namespace app\mvc\controllers;

use app\mvc\core\Controller;
use app\mvc\models\BillModel;

class Bill extends Controller
{
    private BillModel $bill;

    public function __construct()
    {
        $this->bill = new BillModel();
    }

    public function index()
    {
        $bills = $this->bill->getByUserId($_SESSION['user_id_client']);

        $this->view('client', [
            'page' => 'bill',
            'title' => 'Đơn hàng',
            'css' => ['main'],
            'bills' => $bills
        ]);
    }
}

<?php

namespace app\mvc\controllers\admin;

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
        $search_product = $_GET['search_product'] ?? '';
        $page = $_GET['page'] ?? 1;
        $page -= 1;

        if (isset($_GET['action']) && !empty($_GET['action'])) {
            if (strtolower($_GET['action']) == 'next') {
                $this->redirect("admin?page=" . $_GET['page'] + 1);
            } else {
                $this->redirect("admin?page=" . $_GET['page'] - 1);
            }
        }

        $data = $this->bill->getAll([
            'search_product' => $search_product,
            'limit' => 5,
            'page' => $page
        ]);

        $total = $this->bill->count();

        $total_row = ceil($total / 5);

        $this->view("admin", [
            'title' => 'Thông tin đơn hàng',
            'page' => 'bill',
            'content' => 'contentTable',
            'component' => [
                'form' => ['name' => 'bill'],
                'pagination' => ['name' => 'bill'],
            ],
            'css' => ['main'],
            'bills' => $data,
            'total_row' => $total_row,
        ]);
    }

    public function update() {
        $status_id = (int) $_POST['status_id'] + 1;
        $id = (int) $_POST['id'];
        $this->bill->updateStatus($status_id, $id);
        $this->redirect('admin/bill');
    }
}

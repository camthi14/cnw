<?php

namespace app\mvc\controllers;

use app\mvc\core\Controller;
use app\mvc\models\admin\MemberModel;
use app\mvc\models\BillModel;

class Checkout extends Controller
{
    private MemberModel $user;
    private BillModel $bill;

    public function __construct()
    {
        $this->user = new MemberModel();
        $this->bill = new BillModel();
    }

    public function  index()
    {

        $find_user = '';
        $cart_buy = $_SESSION['cart']['buy'];
        $cart_info = $_SESSION['cart']['info'];
        $data = array();
        $error = '';

        if (isset($_SESSION['user_id_client'])) {
            $find_user = $this->user->findById($_SESSION['user_id_client']);
        } else {
            $this->redirect('login');
        }

        if ($this->isPost()) {
            $data['address'] = $_POST['address'] ?? '';
            $data['phone'] = $_POST['phone'] ?? '';

            if (empty($data['address']) || empty($data['phone'])) {
                $error = 'Vui lòng nhập địa chỉ và số điện thoại';
            } else if (!is_numeric($data['phone']) || !preg_match('/^0[0-9]{9}$/', $data['phone'])) {
                $error = 'Số điện thoại không đúng định dạng';
            } else if ((empty($find_user['address']))
                && (empty($find_user['phone']))
            ) {
                // Update address and phone
                $this->user->updateAddressAndPhone($find_user['id'], [
                    'phone' => $data['phone'],
                    'address' => $data['address'],
                ]);
            }

            // Pay => [quantity, product_id, user_id, status_id = 1 <=> 'CONFIRM']
            foreach ($_SESSION['cart']['buy'] as $item) {
                $this->bill->create(
                    [
                        'quantity' => $item['quantity'],
                        'product_id' => $item['id'],
                        'user_id' => $find_user['id'],
                        'status_id' => 1,
                    ],
                    ['quantity', 'product_id', 'user_id', 'status_id']
                );
            }

            unset($_SESSION['cart']);
            $this->redirect('alert/paySuccess');
        }

        $this->view('client', [
            'page' => 'checkout',
            'title' => 'Kiểm tra đơn hàng',
            'css' => ['main', 'checkout'],
            'user' => $find_user,
            'cart_buy' => $cart_buy,
            'cart_info' => $cart_info,
            'error' => $error,
            'data' => $data,
        ]);
    }
}

<?php

namespace app\mvc\controllers;

use app\mvc\core\Controller;
use app\mvc\models\admin\ProductModel;

class Cart extends Controller {
    private ProductModel $product;

    public function __construct() {
        $this->product = new ProductModel;
    }

    public function index() {
        $cart = $this->getCart();

        // echo "<pre>";
        // print_r($cart);

        $this->view('client', [
            'page' => 'cart',
            'title' => 'Giỏ hàng',
            'css' => ['main'],
            'js' => ['cart'],
            'buy' => $cart['buy'] ?? [],
            'info' => $cart['info'] ?? [],
        ]);
    }

    public function add() {
       $this->handle_add_to_cart();
       $this->update_cart();
       $this->redirect('cart');
    }

    public function updateQuantity() {
        $id = $_GET['id'] ?? '';
        $quantity = $_GET['quantity'] ?? '';
        
        if(!empty($id) && !empty($quantity)) {
            if(isset($_SESSION['cart']['buy'][$id])) {
                $find_product = $this->product->findById($id);

                $_SESSION['cart']['buy'][$id]['quantity'] = $quantity;
                $_SESSION['cart']['buy'][$id]['sub_total'] = $quantity * $find_product['price'];

                $this->update_cart();
                $cart = $this->getCart();

                echo json_encode($cart['info']);
            }
        }
    }

    private function handle_add_to_cart() {
        $id = $_GET['id'] ?? '';
        $quantity = $_GET['quantity'] ?? '';

        if (!empty($id) && !empty($quantity)) {
            $find_product = $this->product->findById($id);

            unset($find_product['created_at'], $find_product['updated_at']);

            if (isset($_SESSION['cart']) && isset($_SESSION['cart']['buy'][$id])) {
                $session_cart = $_SESSION['cart']['buy'][$id];
                $quantity += $session_cart['quantity'];
            }

            $find_product['quantity'] = $quantity;
            $find_product['sub_total'] = $quantity * $find_product['price'];

            $_SESSION['cart']['buy'][$id] = $find_product;
        }
    }

    private function update_cart() {
        if($_SESSION['cart']) {
            $num_order = 0;
            $total = 0;

            foreach($_SESSION['cart']['buy'] as $item) {
                $num_order += $item['quantity'];
                $total += $item['sub_total'];
            }

            $_SESSION['cart']['info'] = [
                'num_order' => $num_order,
                'total' => $total,
            ];
        }
    }

    private function getCart() {
        if(isset($_SESSION['cart'])) {
            return $_SESSION['cart'];
        }

        return [];
    }

    public function delete() {
        if(isset($_POST['id']) && isset($_SESSION['cart']['buy'][$_POST['id']])) {
            unset($_SESSION['cart']['buy'][$_POST['id']]);
            $this->update_cart();
            $this->redirect('cart');
        }
    }
}
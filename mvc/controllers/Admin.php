<?php

namespace app\mvc\controllers;

use app\mvc\controllers\admin\Auth;
use app\mvc\controllers\admin\Bill;
use app\mvc\controllers\admin\Category;
use app\mvc\controllers\admin\Member;
use app\mvc\controllers\admin\Product;
use app\mvc\controllers\admin\Profile;
use app\mvc\core\Controller;
use app\mvc\models\admin\ProductModel;

class Admin extends Controller
{
    public function index()
    {

        $product = new ProductModel();

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

        $data = $product->getAll([
            'search_product' => $search_product,
            'limit' => 5,
            'page' => $page
        ]);

        $total = $product->count();

        $total_row = ceil($total / 5);
    

        $this->view("admin", [
            'title' => 'Sản phẩm',
            'page' => 'product',
            'css' => ['main'],
            'content' => 'contentTable',
            'head_title' => 'Danh sách sản phẩm',
            'products' => $data,
            'total_row' => $total_row,
            'js' => ['product'],
            'component' => [
                'form' => ['name' => 'product'],
                'pagination' => ['name' => 'product'],
            ]
        ]);
    }

    public function product($params = '', $id = 0)
    {
        $product = new Product();

        if (!empty($params) && method_exists($product, $params))
            return call_user_func([$product, $params], $id);
    }

    public function category($params = '', $id = 0)
    {
        $category = new Category();

        if (!empty($params) && method_exists($category, $params))
            return call_user_func([$category, $params], $id);

        return $category->index();
    }

    public function login()
    {
        (new Auth())->login();
    }

    public function logout()
    {
        (new Auth())->logout();
    }

    public function bill($params = '', $id = 0)
    {
        $bill = new Bill();

        if (!empty($params) && method_exists($bill, $params))
            return call_user_func([$bill, $params], $id);

        return $bill->index();
    }

    public function member($params = '', $id = 0)
    {
        $member = new Member();

        if (!empty($params) && method_exists($member, $params))
            return call_user_func([$member, $params], $id);

        return $member->index();
    }
}
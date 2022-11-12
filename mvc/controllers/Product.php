<?php

namespace app\mvc\controllers;

use app\mvc\core\Controller;
use app\mvc\models\admin\CategoryModel;
use app\mvc\models\admin\ProductModel;

class Product extends Controller
{
    public function index()
    {
        $category = new CategoryModel();
        $product = new ProductModel();

        $search_product = $_GET['search_product'] ?? '';
        $page = $_GET['page'] ?? 1;
        $page -= 1;
        $id = 0;

        if (isset($_GET['category_id']))
            $id = $_GET['category_id'];

        if (isset($_GET['action']) && !empty($_GET['action'])) {
            if (strtolower($_GET['action']) == 'next') {
                $this->redirect("admin?page=" . $_GET['page'] + 1);
            } else {
                $this->redirect("admin?page=" . $_GET['page'] - 1);
            }
        }

        $products = $product->getAll([
            'category_id' => $id,
            'search_product' => $search_product,
            'limit' => 8,
            'page' => $page
        ]);

        $data = $category->getAll();
        // $findCate = $category->findById($id);
        // print_r($findCate);
        $total = $product->count();

        $total_row = ceil($total / 8);

        $this->view("client", [
            'page' => 'product',
            'title' => 'Sản phẩm',
            'css' => ['main', 'product'],
            'js' => ['main'],
            'total_row' => $total_row,
            'categories' => $data,
            'product' => $products
            // 'product' => count($findCate) > 0 ? $findCate : $products,
        ]);
    }
    public function detail($id = 0)
    {
        $product = new ProductModel();

        $product_one = $product->findById($id);

        $products = $product->getAll();

        $this->view("client", [
            'page' => 'product_detail',
            'title' => 'Chi tiết sản phẩm',
            'css' => ['main', 'product'],
            'js' => ['main'],
            'product' => $products,
            'product_one' => $product_one,
        ]);
    }
}

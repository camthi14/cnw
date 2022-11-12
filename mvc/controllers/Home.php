<?php

namespace app\mvc\controllers;

use app\mvc\core\Controller;
use app\mvc\models\admin\CategoryModel;
use app\mvc\models\admin\ProductModel;

class Home extends Controller
{
    public function index()
    {
        $product = new ProductModel();
        $categories = new CategoryModel();
        $array = array();

        foreach($categories->getAll() as $item) {
            $result = $product->findByCateId($item['id']);
            $array[$item['id']] = array(
                'category' => $item,
                'product' => $result,
            );
        }

        $this->view("client", [
            'title' => 'Trang chủ',
            'page' => 'home',
            'css' => ['main'],
            'js' => ['main'],
            'category_product' => $array,
            'product_slick' => $product->getAll(['limit' => 4, 'page' => 0]),
            'product_review' => $product->getAll(['limit' => 10, 'page' => 0]),
        ]);
    }
}
<?php

namespace app\mvc\controllers\admin;

use app\mvc\core\Controller;
use app\mvc\models\admin\CategoryModel;
use app\mvc\models\admin\ProductModel;

class Product extends Controller
{

    public function add()
    {
        $product = new ProductModel();
        $category = new CategoryModel();
        $message = '';
        $data = array();
        $error = false;



        if ($this->isPost()) {

            if (empty($_POST['name_product']) || empty($_POST['price']) || empty($_POST['description']) ||  empty($_FILES['image']['name'])) {
                $message = 'Vui lòng nhập tất cả các trường, Vui lòng chọn ảnh';
            } else {
                $data['name'] = $_POST['name_product'];
                $data['price'] = $_POST['price'];
                $data['description'] = $_POST['description'];
                $data['category_id'] = $_POST['cate_id'] ?? '';


                $exist_username = $product->findOne(['name' => $data['name']]);

                if ((isset($exist_username) && !empty($exist_username) && count($exist_username))) {
                    $message = 'Tên sản phẩm đã tồn tại;';
                    $error = true;
                } else {
                    $error = false;
                }

                if (isset($_FILES['image']) && !empty($_FILES['image'])) {
                    $data['thumb'] = $this->processImg($_FILES['image']['name'], $_FILES['image']['tmp_name'], UPLOAD_PRODUCT_PATH);
                }

                if (!$error) {
                    $product->create($data);
                    $_SESSION['message'] = 'Thêm sản phẩm thành công';
                    $this->redirect('admin');
                }
            }
        }

        $this->view("admin", [
            'title' => 'Thêm sản phẩm',
            'page' => 'productAdd',
            'css' => ['main'],
            'content' => 'content',
            'message' => $message,
            'data' => $data,
            'category' => $category->getAll(['page' => 0, 'limit' => 25])
        ]);
    }

    public function update($id = 0)
    {
        $model = new ProductModel();
        $category = new CategoryModel();

        $product = $model->findById($id);

        if ($this->isPost()) {
            $name = $_POST['name_product'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $category_id = $_POST['cate_id'] ?? '';
            $thumb = $this->processImg($_FILES['image']['name'], $_FILES['image']['tmp_name'], UPLOAD_PRODUCT_PATH);

            $model->update($id, [
                'name' => $name,
                'price' => $price,
                'description' => $description,
                'category_id' => $category_id,
                'thumb' => $thumb
            ]);
            
            $_SESSION['message'] = 'Cập nhật sản phẩm thành công';

            $this->redirect('admin');
        }

        $this->view("admin", [
            'title' => 'Cập nhật sản phẩm',
            'page' => 'productUpdate',
            'css' => ['main'],
            'content' => 'content',
            'product' => $product,
            'category' => $category->getAll(['page' => 0, 'limit' => 25])
        ]);
    }

    public function delete()
    {
        if ($this->isPost()) {
            $product = new ProductModel();

            $id = $_POST['id'];

            $product->delete($id);

            $_SESSION['message'] = "Xoá sản phẩm thành công";

            exit(json_encode(['message' => 'Delete success', 'error' => false]));
        }

        $this->view("admin", [
            'title' => 'Sản phẩm',
            'page' => 'product',
            'css' => ['main', 'toast'],
            'content' => 'contentTable',
            'head_title' => 'Danh sách sản phẩm',
            'label_add' => 'Thêm sản phẩm',
        ]);
    }
}

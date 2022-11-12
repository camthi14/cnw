<?php

namespace app\mvc\controllers\admin;

use app\mvc\core\Controller;
use app\mvc\models\admin\CategoryModel;

class Category extends Controller
{
    public function index()
    {
        $category = new CategoryModel();

        $search_category = $_GET['search_category'] ?? '';
        $page = $_GET['page'] ?? 1;
        $page -= 1;

        if (isset($_GET['action']) && !empty($_GET['action'])) {
            if (strtolower($_GET['action']) == 'next') {
                $this->redirect("/admin/category?page=" . $_GET['page'] + 1);
            } else {
                $this->redirect("/admin/category?page=" . $_GET['page'] - 1);
            }
        }

        $data = $category->getAll([
            'search_category' => $search_category,
            'limit' => 5,
            'page' => $page
        ]);

        $total = $category->count();

        $total_row = ceil($total / 5);

        $this->view("admin", [
            'title' => 'Danh mục',
            'page' => 'category',
            'css' => ['main', 'toast'],
            'content' => 'contentTable',
            'head_title' => 'Danh sách danh mục',
            'label_add' => 'Thêm danh mục',
            'categories' => $data,
            'total_row' => $total_row,
            'js' => ['category'],
            'component' => [
                'form' => ['name' => 'category'],
                'pagination' => ['name' => 'category']
            ]
        ]);
    }


    public function add()
    {
        $category = new CategoryModel();
        $message = '';
        $data = array();

        if ($this->isPost()) {
            if (empty($_POST['name'])) {
                $message = 'Vui lòng không bỏ trống tên danh mục!';
            } else {
                $exist_name = $category->findOne(['name' => $_POST['name']]);

                if ($exist_name['name'] == $_POST['name']) {
                    $message = 'Tên danh mục đã tồn tại';
                } else {
                    $data['name'] = $_POST['name'];
                }
            }

            if (count($data) > 0) {
                $category->create($data);
                $_SESSION['message'] = "Thêm danh mục thành công";
                $this->redirect("admin/category");
            }
        }

        $this->view("admin", [
            'title' => 'Thêm danh mục',
            'page' => 'categoryAdd',
            'css' => ['main', 'toast'],
            'content' => 'content',
            'model' => $category,
            'message' => $message,
            'data' => $data,
        ]);
    }

    public function update($id = 0)
    {
        $category = new CategoryModel();

        $findCategory = $category->findById($id);

        if ($this->isPost()) {
            $name = $_POST['name'];
            $id = $_POST['id'];

            $category->update($id, ['name' => $name]);
            $_SESSION['message'] = "Cập nhật danh mục thành công";
            $this->redirect('/admin/category');
        }

        $this->view("admin", [
            'title' => 'Cập nhật danh mục',
            'page' => 'categoryUpdate',
            'css' => ['main', 'toast'],
            'content' => 'content',
            'category' => $findCategory
        ]);
    }

    public function delete()
    {
        if ($this->isPost()) {
            $category = new CategoryModel();

            $id = $_POST['id'];

            $category->delete($id);

            $_SESSION['message'] = "Xoá danh mục thành công";

            exit(json_encode(['message' => 'Delete success', 'error' => false]));
        }

        $this->view("admin", [
            'title' => 'Danh mục',
            'page' => 'category',
            'css' => ['main', 'toast'],
            'content' => 'contentTable',
            'head_title' => 'Danh sách danh mục',
            'label_add' => 'Thêm danh mục',
            'js' => ['category']
        ]);
    }
}

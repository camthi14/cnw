<?php

namespace app\mvc\controllers\admin;

use app\mvc\core\Controller;
use app\mvc\models\admin\GroupRoleModel;
use app\mvc\models\admin\MemberModel;

class Member extends Controller
{
    public function index()
    {
        $member = new MemberModel();

        $search_member = $_GET['search_member'] ?? '';
        $page = $_GET['page'] ?? 1;
        $page -= 1;

        if (isset($_GET['action']) && !empty($_GET['action'])) {
            if (strtolower($_GET['action']) == 'next') {
                $this->redirect("admin/member?page=" . $_GET['page'] + 1);
            } else {
                $this->redirect("admin/member?page=" . $_GET['page'] - 1);
            }
        }

        $data = $member->getAll([
            'search_member' => $search_member,
            'limit' => 5,
            'page' => $page
        ]);

        $total = $member->count();

        $total_row = ceil($total / 5);

        $this->view("admin", [
            'title' => 'Thành viên',
            'page' => 'member',
            'css' => ['main'],
            'content' => 'contentTable',
            'head_title' => 'Danh sách thành viên',
            'label_add' => 'Thêm thành viên',
            'members' => $data,
            'total_row' => $total_row,
            'js' => ['member'],
            'component' => [
                'form' => ['name' => 'member'],
                'pagination' => ['name' => 'member'],
            ]
        ]);
    }

    public function add()
    {
        $member = new MemberModel();
        $group_role = new GroupRoleModel();
        $message = '';
        $data = array();
        $error = false;

        if ($this->isPost()) {
            if (empty($_POST['fullname']) || empty($_POST['username']) || empty($_POST['password'])) {
                $message = 'Vui lòng nhập tất cả các trường!';
            } else {
                $data['fullname'] = $_POST['fullname'];
                $data['username'] = $_POST['username'];
                $data['password'] = $_POST['password'];
                $data['group_id'] = $_POST['group_id'] ?? '';

                if (strlen($_POST['fullname']) < 4  && strlen($_POST['username']) < 4 && strlen($_POST['password']) < 4) {
                    $message = 'Vui nhập Họ và tên, tài khoản và mật khẩu ít nhất 4 ký tự!';
                    $error = true;
                } else {
                    $exist_username = $member->findOne(['username' => $data['username']]);

                    if (isset($exist_username) && !empty($exist_username) && count($exist_username)) {
                        $message = 'Tài khoản đã tồn tại';
                        $error = true;
                    } else {
                        $error = false;
                    }
                }

                if (!$error) {
                    $member->create($data);
                    $_SESSION['message'] = 'Thêm thành viên thành công';
                    $this->redirect('admin/member');
                }
            }
        }

        $this->view("admin", [
            'title' => 'Thêm thành viên',
            'page' => 'memberAdd',
            'css' => ['main'],
            'content' => 'content',
            'message' => $message,
            'data' => $data,
            'group_roles' => $group_role->getAll(['page' => 0, 'limit' => 25]),
        ]);
    }

    public function update($id = 0)
    {
        $model = new MemberModel();

        $group_role = new GroupRoleModel();

        $member = $model->findById($id);

        if ($this->isPost()) {
            $fullname = $_POST['fullname'] ?? '';
            $username = $_POST['username'] ?? '';
            $group_id = $_POST['group_id'];

            $model->update($id, [
                'fullname' => $fullname,
                'username' => $username,
                'group_id' => $group_id,
            ]);

            $_SESSION['message'] = 'Cập nhật thành viên thành công';

            $this->redirect('admin/member');
        }

        $this->view("admin", [
            'title' => 'Cập nhật danh mục',
            'page' => 'memberUpdate',
            'css' => ['main', 'toast'],
            'content' => 'content',
            'member' => $member,
            'group_roles' => $group_role->getAll(['page' => 0, 'limit' => 25]),
        ]);
    }

    public function delete()
    {
        if ($this->isPost()) {
            $member = new MemberModel();

            $id = $_POST['id'];

            $member->delete($id);

            $_SESSION['message'] = "Xoá thành viên thành công";

            exit(json_encode(['message' => 'Delete success', 'error' => false]));
        }

        $this->view("admin", [
            'title' => 'Thành viên',
            'page' => 'member',
            'css' => ['main', 'toast'],
            'content' => 'contentTable',
            'head_title' => 'Danh sách thành viên',
            'label_add' => 'Thêm thành viên',
        ]);
    }
}

<?php

namespace app\mvc\controllers\admin;

use app\mvc\core\Controller;
use app\mvc\models\admin\MemberModel;

class Auth extends Controller
{
    private MemberModel $user;

    public function __construct()
    {
        $this->user = new MemberModel();
    }

    public function login()
    {
        $error = '';
        $data = array();

        if ($this->isPost()) {
            $data['username'] = $_POST['username'] ?? '';
            $data['password'] = $_POST['password'] ?? '';

            if (empty($data['username']) || empty($data['password'])) {
                $error = 'Vui lòng nhập tất cả các trường.';
            } else {

                $find_user = $this->user->findOne(['username' => $data['username']]);

                if (empty($find_user)) {
                    $error = 'Tài khoản không tồn tại';
                } else if (!password_verify($data['password'], $find_user['password'])) {
                    $error = 'Mật khẩu không chính xác';
                } else if ((int)$find_user['group_id'] == 1 || (int)$find_user['group_id'] == 5) {
                    $_SESSION['user_id_admin'] = $find_user['id'];
                    $_SESSION['message'] = 'Đăng nhập thành công';
                    $this->redirect('admin');
                } else {
                    $error = 'Bạn không có quyền đăng nhập vào hệ thống';
                }
            }
        }

        $this->view("loginAdmin", [
            'title' => 'Đăng nhập',
            'page' => 'login',
            'css' => ['index'],
            'error' => $error,
            'data' => $data
        ]);
    }

    public function logout()
    {
        if($this->isUserLoginAdmin()) {
            unset($_SESSION['user_id_admin']);
            $this->redirect('admin/login');
        }
    }

    public function getUser()
    {
        if ($this->isUserLoginAdmin()) {
            $find_user = $this->user->findById($_SESSION['user_id_admin']);
            return $find_user;
        }
    }

    public function isUserLoginAdmin(): bool
    {
        if (isset($_SESSION['user_id_admin'])) {
            return true;
        }

        return false;
    }
}

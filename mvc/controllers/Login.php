<?php

namespace app\mvc\controllers;

use app\mvc\models\UserModel;
use app\mvc\core\Controller;
use app\mvc\models\admin\MemberModel;

class Login extends Controller
{
    private MemberModel $user;

    public function __construct()
    {
        $this->user = new MemberModel();
    }

    public function index()
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
                } else {
                    $_SESSION['user_id_client'] = $find_user['id'];
                    $_SESSION['message'] = 'Đăng nhập thành công';
                    $this->redirect('');
                }
            }
        }

        $this->view("client", [
            'page' => 'login',
            'title' => 'Đăng nhập',
            'css' => ['main', 'contact'],
            'js' => ['main'],
            'error' => $error,
            'data' => $data
        ]);
    }

    public function getUser()
    {
        if ($this->isUserLoginClient()) {
            $find_user = $this->user->findById($_SESSION['user_id_client']);
            return $find_user;
        }
    }

    public function isUserLoginClient(): bool
    {
        if (isset($_SESSION['user_id_client'])) {
            return true;
        }

        return false;
    }
}

<?php

namespace app\mvc\controllers;

use app\mvc\core\Controller;
use app\mvc\models\admin\MemberModel;

class Register extends Controller
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

        if($this->isPost()){
            $data['fullname'] = $_POST['fullname'] ?? '';
            $data['username'] = $_POST['username'] ?? '';
            $data['password'] = $_POST['password'] ?? '';

            if(empty($data['fullname']) || empty($data['username']) || empty($data['password'])){
                $error = 'Vui lòng nhập tất cả các trường.';
            }else{

                $exits_user = $this->user->findOne(['username' => $data['username']]);
                
                if (!empty($exits_user)) {
                    $error = 'Tài khoản đã tồn tại';
                }else{
                    $this->user->create($data);
                    $_SESSION['message'] = 'Đăng ký thành công';
                    $this->redirect('login');   
                }
            }
        }

        $this->view("client", [
            'page' => 'register',
            'title' => 'Đăng ký',
            'css' => ['main', 'contact'],
            'js' => ['main'],
            'error' => $error,
            'data' => $data,
            
        ]);
    }
}
<?php

namespace app\mvc\models;

use app\mvc\core\db\DB;

class AuthModel extends DB
{
    public function validate($data = [])
    {
        $errors = [];
        if (empty($data['fullname'])) {
            $errors['fullname'] = 'Không được bỏ trống!';
        }

        if (empty($data['email'])) {
            $errors['email'] = 'Không được bỏ trống!';
        }

        if (empty($data['password'])) {
            $errors['password'] = 'Không được bỏ trống!';
        }

        return ['errors' => $errors];
    }
}
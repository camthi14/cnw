<?php

namespace app\mvc\models\admin;

use app\mvc\core\db\DB;

class MemberModel extends DB
{
    public function findById($id)
    {
        return parent::pdo_findById('SELECT * FROM `users` WHERE id=' . $id);
    }

    public function getAll($params = [])
    {
        $sql = 'SELECT u.id, u.fullname, u.username, g.role FROM `users` u JOIN `group_roles` g ON u.group_id=g.id';

        if (isset($params['search_member']) && !empty($params['search_member'])) {
            $sql .= ' WHERE fullname LIKE "%' . $params['search_member'] . '%"';
        }

        if (isset($params['page']) && isset($params['limit']))
            $sql .= ' LIMIT ' . $params['limit'] . ' OFFSET ' . $params['page'] * $params['limit'];

        return parent::pdo_getAll($sql);
    }

    public function count()
    {
        return parent::pdo_count('users');
    }

    public function update($id, $data = [])
    {
        $sql = 'UPDATE `users` SET username="' . $data['username'] . '", fullname="' . $data['fullname'] . '", group_id="' . $data['group_id'] . '" WHERE id=' . $id;
        return parent::pdo_update($sql);
    }

    public function updateAddressAndPhone($id, $data = [])
    {
        $sql = 'UPDATE `users` SET address="' . $data['address'] . '", phone="' . $data['phone'] . '" WHERE id=' . $id;
        return parent::pdo_update($sql);
    }

    public function create($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return parent::pdo_create('users', ['fullname', 'username', 'password', 'group_id'], $data);
    }

    public function findOne($where)
    {
        $attributes = array_keys($where);

        $params = implode("AND ", array_map(fn ($attr) => "$attr = :$attr", $attributes));

        $sql = "SELECT * FROM `users` WHERE $params;";

        return parent::pdo_findOne($sql, $where);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM `users` WHERE id=' . $id;
        return parent::pdo_delete($sql);
    }
}

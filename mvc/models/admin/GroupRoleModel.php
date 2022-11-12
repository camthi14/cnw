<?php

namespace app\mvc\models\admin;

use app\mvc\core\db\DB;

class GroupRoleModel extends DB {
    public function findById($id)
    {
        return parent::pdo_findById('SELECT * FROM `group_roles` WHERE id=' . $id);
    }

    public function getAll($params = [])
    {
        $sql = 'SELECT * FROM `group_roles` LIMIT ' . $params['limit'] . ' OFFSET ' . $params['page'] * $params['limit'];

        if (isset($params['search_category']) && !empty($params['search_category'])) {
            $sql .= ' WHERE name LIKE "%' . $params['search_category'] . '%"';
        }

        return parent::pdo_getAll($sql);
    }

    public function count()
    {
        return parent::pdo_count('group_roles');
    }

    public function update($id, $data = [])
    {
        $sql = 'UPDATE `group_roles` SET name="' . $data['name'] . '" WHERE id=' . $id;
        return parent::pdo_update($sql);
    }

    public function create($data)
    {
        return parent::pdo_create('group_roles', ['name'], $data);
    }

    public function findOne($data)
    {
        $sql = 'SELECT name FROM `group_roles` WHERE name="' . $data['name'] . '"';
        return parent::pdo_findOne($sql);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM `group_roles` WHERE id=' . $id;
        return parent::pdo_delete($sql);
    }
}
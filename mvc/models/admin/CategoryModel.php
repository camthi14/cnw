<?php

namespace app\mvc\models\admin;

use app\mvc\core\db\DB;

class CategoryModel extends DB
{
    public function findById($id)
    {
        return parent::pdo_findById('SELECT * FROM `categories` WHERE id=' . $id);
    }
    
    public function getAll($params = [])
    {
        $sql = 'SELECT * FROM `categories` ';

        if(isset($params['search_category']) && !empty($params['search_category'])) {
            $sql .= ' WHERE name LIKE "%' . $params['search_category'] . '%"';
        }

        if(isset($params['limit']) && !empty($params['limit']) &&isset($params['page']) && !empty($params['page']))
        $sql .= ' LIMIT ' . $params['limit'] . ' OFFSET ' . $params['page'] * $params['limit'];

        return parent::pdo_getAll($sql);
    }

    public function count()
    {
        return parent::pdo_count('categories');
    }

    public function update($id, $data = [])
    {
        $sql = 'UPDATE `categories` SET name="' . $data['name'] . '" WHERE id=' . $id;
        return parent::pdo_update($sql);
    }

    public function create($data)
    {
        return parent::pdo_create('categories', ['name'], $data);
    }

    public function findOne($where)
    {
        $attributes = array_keys($where);

        $params = implode("AND ", array_map(fn ($attr) => "$attr = :$attr", $attributes));

        $sql = "SELECT * FROM `categories` WHERE $params;";

        return parent::pdo_findOne($sql, $where);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM `categories` WHERE id=' . $id;
        return parent::pdo_delete($sql);
    }
}

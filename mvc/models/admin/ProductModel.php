<?php

namespace app\mvc\models\admin;

use app\mvc\core\db\DB;

class ProductModel extends DB
{
    public function findById($id)
    {
        return parent::pdo_findById('SELECT * FROM `products` WHERE id=' . $id);
    }

    public function getAll($params = [])
    {
        $sql = 'SELECT p.id, p.name, p.price, p.thumb, p.description, p.category_id, c.name as name_cate FROM `products` p JOIN `categories` c ON p.category_id = c.id';

        if (isset($params['category_id']) && $params['category_id'] > 0) {
            $sql .= ' WHERE category_id = ' . $params['category_id'];
        }

        if (isset($params['search_product']) && !empty($params['search_product'])) {
            $sql .= ' WHERE p.name LIKE "%' . $params['search_product'] . '%"';
        }

        $sql .= ' ORDER BY p.created_at ' ;

        if (isset($params['limit'])  && isset($params['page'])){
            $sql .= ' LIMIT ' . $params['limit'] . ' OFFSET ' . $params['page'] * $params['limit'];
        }



        return parent::pdo_getAll($sql);
    }

    public function count()
    {
        return parent::pdo_count('products');
    }

    public function update($id, $data = [])
    {
        if (empty($data['thumb'])) {
            $sql = 'UPDATE `products` SET name="' . $data['name'] . '", price="' . $data['price'] . '", description="' . $data['description'] . '", category_id="' . $data['category_id'] . '" WHERE id=' . $id;
        } else {
            $sql = 'UPDATE `products` SET name="' . $data['name'] . '", price="' . $data['price'] . '", description="' . $data['description'] . '", thumb="' . $data['thumb'] . '", category_id="' . $data['category_id'] . '" WHERE id=' . $id;
        }
        return parent::pdo_update($sql);
    }

    public function create($data)
    {
        return parent::pdo_create('products', ['name', 'price', 'description', 'thumb', 'category_id'], $data);
    }

    public function findOne($where)
    {
        $attributes = array_keys($where);

        $params = implode("AND ", array_map(fn ($attr) => "$attr = :$attr", $attributes));

        $sql = "SELECT * FROM `products` WHERE $params;";

        return parent::pdo_findOne($sql, $where);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM `products` WHERE id=' . $id;
        return parent::pdo_delete($sql);
    }

    public function findByCateId($cate_id) {
        if(isset($cate_id)) {
            $sql = 'SELECT id, name, price, thumb, description, category_id FROM `products`';
            $sql .= ' WHERE category_id=' . $cate_id . ' LIMIT 5';

            return parent::pdo_getAll($sql);
        }
    }
}

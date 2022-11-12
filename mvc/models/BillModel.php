<?php

namespace app\mvc\models;

use app\mvc\core\db\DB;

class BillModel extends DB
{
    public function findById($id)
    {
        return parent::pdo_findById('SELECT * FROM `cart` WHERE id=' . $id);
    }

    public function getByUserId($user_id)
    {
        $sql = 'SELECT c.id as id_bill, p.name as product_name, p.price, c.quantity, c.created_at, s.name as status_name, s.id as status_id FROM `cart` c JOIN `products` p ON c.product_id = p.id 
        JOIN `statuses` s ON c.status_id = s.id WHERE c.user_id = ' . $user_id . ' ORDER BY c.created_at DESC';
        
        return parent::pdo_getAll($sql);
    }

    public function updateStatus($status_id, $id)
    {
        $sql = 'UPDATE `cart` SET status_id = ' . $status_id . ' WHERE id =' . $id;
        return parent::pdo_update($sql);
    }

    public function getAll($params = [])
    {
        $sql = 'SELECT c.id as id_bill, p.name as product_name, p.price, u.fullName as customer_name, c.quantity, s.name as status_name, s.id as status_id FROM `cart` c JOIN `products` p ON c.product_id = p.id JOIN `users` u ON c.user_id = u.id JOIN `statuses` s ON c.status_id = s.id';

        if (isset($params['search_product']) && !empty($params['search_product'])) {
            $sql .= ' WHERE p.name LIKE "%' . $params['search_product'] . '%"';
        }

        $sql .= ' ORDER BY c.created_at DESC';

        if (isset($params['limit'])  && isset($params['page'])) {
            $sql .= ' LIMIT ' . $params['limit'] . ' OFFSET ' . $params['page'] * $params['limit'];
        }

        return parent::pdo_getAll($sql);
    }

    public function count()
    {
        return parent::pdo_count('cart');
    }

    public function update($id, $data = [])
    {
        if (empty($data['thumb'])) {
            $sql = 'UPDATE `cart` SET name="' . $data['name'] . '", price="' . $data['price'] . '", description="' . $data['description'] . '", category_id="' . $data['category_id'] . '" WHERE id=' . $id;
        } else {
            $sql = 'UPDATE `cart` SET name="' . $data['name'] . '", price="' . $data['price'] . '", description="' . $data['description'] . '", thumb="' . $data['thumb'] . '", category_id="' . $data['category_id'] . '" WHERE id=' . $id;
        }
        return parent::pdo_update($sql);
    }

    public function create($data, $attributes)
    {
        return parent::pdo_create('cart', $attributes, $data);
    }

    public function findOne($where)
    {
        $attributes = array_keys($where);

        $params = implode("AND ", array_map(fn ($attr) => "$attr = :$attr", $attributes));

        $sql = "SELECT * FROM `cart` WHERE $params;";

        return parent::pdo_findOne($sql, $where);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM `cart` WHERE id=' . $id;
        return parent::pdo_delete($sql);
    }

    public function findByCateId($cate_id)
    {
        if (isset($cate_id)) {
            $sql = 'SELECT id, name, price, thumb, description, category_id FROM `cart`';
            $sql .= ' WHERE category_id=' . $cate_id . ' LIMIT 5';

            return parent::pdo_getAll($sql);
        }
    }
}

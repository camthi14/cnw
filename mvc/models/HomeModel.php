<?php

namespace app\mvc\models;

use app\mvc\core\db\DB;

class HomeModel extends DB
{
    public function getAll()
    {
        try {
            $stmt = $this->getConn()->prepare("SELECT * FROM users");
            $stmt->execute();
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            exit;
        }
    }

    function total()
    {
        return 50;
    }
}
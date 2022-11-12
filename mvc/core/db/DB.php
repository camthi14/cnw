<?php

namespace app\mvc\core\db;

class DB
{
  private \PDO $conn;
  private string $hostname = 'localhost';
  private string $username = 'root';
  private string $password = '';
  private string $dbName = 'shirley';

  public function __construct()
  {
    try {
      $this->conn = new \PDO("mysql:host=$this->hostname;dbname=$this->dbName", $this->username, $this->password);
      $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } catch (\PDOException $e) {
      echo "Connection database failed: " . $e->getMessage();
      exit;
    }
  }

  public function getConn(): \PDO
  {
    return $this->conn;
  }

  public function pdo_create($table, $attributes = [], $data = [])
  {
    try {
      $params = array_map(fn ($attr) => ":$attr", $attributes);

      $sql = "INSERT INTO $table (" . implode(',', $attributes) . ") VALUES(" . implode(',', $params) . ");";

      $statement = $this->getConn()->prepare($sql);

      foreach ($attributes as $attribute) {
        $statement->bindValue(":$attribute", $data[$attribute]);
      }

      $statement->execute();
      return true;
    } catch (\PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }

  public function pdo_getAll($sql)
  {
    try {
      $statement = $this->getConn()->prepare($sql);
      $statement->execute();
      return $statement->fetchAll(\PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }

  public function pdo_count($table = '')
  {
    try {
      $sql = '';
      if (!empty($table)) {
        $sql = 'SELECT count(*) FROM `' . $table . '`;';
        $statement = $this->getConn()->prepare($sql);
        $statement->execute();
        return $statement->fetchColumn();
      } else {
        return 'Missing param table.';
      }
    } catch (\PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }

  public function pdo_findById($sql)
  {
    try {
      $statement = $this->getConn()->prepare($sql);
      $statement->execute();
      return $statement->fetch(\PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }

  public function pdo_update($sql)
  {
    try {
      $statement = $this->getConn()->prepare($sql);
      $statement->execute();
      return true;
    } catch (\PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }

  public function pdo_findOne($sql, $where)
  {
    try {
      $statement = $this->getConn()->prepare($sql);

      foreach ($where as $key => $item) {
        $statement->bindValue(":$key", $item);
      }
      
      $statement->execute();
      return $statement->fetch(\PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }

  public function pdo_delete($sql)
  {
    try {
      $statement = $this->getConn()->prepare($sql);
      $statement->execute();
      return true;
    } catch (\PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }
}

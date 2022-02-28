<?php

namespace src\Model;

use MWManager\Model\Connection;

class Model
{
  protected $table;
  protected $connection;
  protected $fetchType = \PDO::FETCH_ASSOC;

  public function __construct()
  {
    $this->connection = new Connection;
  }

  public function all()
  {
      $sql = "SELECT * FROM $this->table;";

      return $this->connection->con->query($sql)->fetchAll($this->fetchType);
  }

  public function fetchType($fetchType)
  {
      $this->fetchType = $fetchType;
  }

  public function save($data)
  {
      $data = array_filter($data, fn($value) => !is_null($value));

      $fields = implode(',', array_keys($data));
      $values = implode(',', array_values($data)); 
      $valuesSth = implode(',', array_fill(0, count($data), '?'));

      $this->connection->query("INSERT INTO $this->table ($fields) VALUES ($valuesSth);");

      $save =  $this->connection->execute(array_values($data));

      if ($save) {
          return  $this->connection->con->lastInsertId();
      }

      return false;
  }
}
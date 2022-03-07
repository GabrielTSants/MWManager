<?php

namespace MWManager\Model;

use src\Model\Model;

class Item extends Model
{
  protected $table;

  public function __construct($item)
  {
    parent::__construct();
    $this->table = $item;
  }

  public function getCategoryItems()
  {
    $sql = "SELECT c.id, c.name, c.completed, c.cover FROM $this->table c
    INNER JOIN user u ON u.id = c.fk_user WHERE u.id = $this->userId;";
    $sql = $this->search(['id', 'name', 'completed', 'cover'], ['id' => $_SESSION['userId']]);

    $this->connection->query($sql);
    return $this->connection->execute()->fetchAll(\PDO::FETCH_OBJ);
  }
}
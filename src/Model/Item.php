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
    $sql = $this->search(['id', 'name', 'completed', 'cover'], ['id' => $_SESSION['userId']]);

    $this->connection->query($sql);
    return $this->connection->execute()->fetchAll(\PDO::FETCH_OBJ);
  }
}
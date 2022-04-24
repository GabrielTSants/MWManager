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
    $sql = $this->search(['id', 'name', 'completed', 'cover', 'created_at'], ['fk_user' => $_SESSION['userId']]);
    $this->connection->query($sql);
    return $this->connection->execute()->fetchAll(\PDO::FETCH_OBJ);
  }

  public function getItem($id)
  {
    $sql = $this->search(['id', 'name', 'completed', 'cover'], ['id' => $id, 'fk_user' => $_SESSION['userId']]);
    $this->connection->query($sql);
    return $this->connection->execute()->fetchAll(\PDO::FETCH_OBJ);
  }

  public function completeItem()
  {
    $sqk = $this->search(['']);
  }
}
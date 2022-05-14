<?php

namespace MWManager\Model;

use src\Model\Model;

class Items extends Model
{
  protected $table;

  public function __construct()
  {
    parent::__construct();
    $this->table = 'items';
  }

  public function getCategoryItems()
  {
    $item_type = substr($_SERVER['PATH_INFO'], 1);
    $sql = $this->search(['id', 'name', 'author', 'completed', 'cover', 'created_at', 'item_type'], ['fk_user' => $_SESSION['userId'], 'item_type' => $item_type]);
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
    $sql = $this->search(['']);
  }
}
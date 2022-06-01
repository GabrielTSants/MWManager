<?php

namespace MWManager\Model;

use src\Model\Model;

class Items extends Model
{
  protected $table;
  protected $user;

  public function __construct()
  {
    parent::__construct();
    $this->table = 'items';
    $this->user = $_SESSION['userId'];
  }

  public function getCategoryItems()
  {
    $item_type = substr($_SERVER['PATH_INFO'], 1);
    $sql = $this->search(['id', 'name', 'author', 'completed_at', 'cover', 'created_at', 'item_type', 'genre.name AS genre'], ['fk_user' => $_SESSION['userId'], 'item_type' => $item_type], ['JOIN_CATEGORY' => 'LEFT JOIN genre ON genre.id = items.fk_genre']);
    $this->connection->query($sql);
    return $this->connection->execute()->fetchAll(\PDO::FETCH_OBJ);
  }

  public function getItem($id)
  {
    $sql = $this->search(['id', 'name', 'completed_at', 'cover'], ['id' => $id, 'fk_user' => $_SESSION['userId']]);
    $this->connection->query($sql);
    return reset($this->connection->execute()->fetchAll(\PDO::FETCH_OBJ));
  }

  public function getUserItens()
  {
    $sql = $this->search(['id', 'name', 'completed_at', 'cover', 'item_type'], ['fk_user' => $_SESSION['userId']]);
    $this->connection->query($sql);
    return reset($this->connection->execute()->fetchAll(\PDO::FETCH_OBJ));
  }

  public function completedItems()
  {
    $sql = "SELECT item_type, SUM(completed) AS completed, COUNT(item_type) AS total_items
            FROM (
              SELECT item_type, CASE WHEN completed_at IS NOT NULL AND TRIM (completed_at, ' ') != '' THEN 1 ELSE 0 END AS completed FROM items WHERE items.fk_user = '$this->user' 
            ) GROUP BY item_type ";

    $this->connection->query($sql);
    return $this->connection->execute()->fetchAll(\PDO::FETCH_OBJ);
  }
}
<?php

namespace MWManager\Model;

use src\Model\Model;

class Category extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getNewCategory($userId)
  {
    $sql = "SELECT c.id, c.name FROM category c
    WHERE c.id not in (select uc.fk_category from user_category uc where uc.fk_user = $userId);";

    $this->connection->query($sql);
    return $this->connection->execute()->fetchAll(\PDO::FETCH_OBJ);
  }

  public function getUserCategory($user)
  {
    $sql = "SELECT c.id, c.name FROM category c 
    INNER JOIN user_category uc ON uc.fk_category = c.id
    INNER JOIN user u ON uc.fk_user = u.id 
    WHERE u.username = '$user';";
    
    $this->connection->query($sql);
    return $this->connection->execute()->fetchAll(\PDO::FETCH_OBJ);
  }

  public function getCategoryItems($user, $table)
  {
    $sql = "SELECT c.id, c.name, c.completed, c.cover FROM $table c
    INNER JOIN user u ON u.id = c.fk_user WHERE u.username = '$user';";

    $this->connection->query($sql);
    return $this->connection->execute()->fetchAll(\PDO::FETCH_OBJ);
  }
}
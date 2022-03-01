<?php

namespace MWManager\Model;

use src\Model\Model;

class Category extends Model
{
  protected $table = 'category';
  private $userId;

  public function __construct()
  {
    parent::__construct();
    $this->userId = $_SESSION['userId'];
  }

  public function getNewCategory()
  {
    $sql = "SELECT c.id, c.name FROM $this->table c
    WHERE c.id not in (select uc.fk_category from user_category uc where uc.fk_user = $this->userId) 
    ORDER BY c.name ASC;";

    $this->connection->query($sql);
    return $this->connection->execute()->fetchAll(\PDO::FETCH_OBJ);
  }

  public function getUserCategory()
  {
    $sql = "SELECT c.id, c.name FROM $this->table c
    INNER JOIN user_category uc ON uc.fk_category = c.id
    INNER JOIN user u ON uc.fk_user = u.id 
    WHERE u.id = $this->userId;";
    
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
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
    $sql = $this->search(['id', 'name'], "category.id NOT IN (SELECT uc.fk_category FROM user_category uc WHERE uc.fk_user = $this->userId)", ['ORDER' => 'name ASC']);

    $this->connection->query($sql);
    return $this->connection->execute()->fetchAll(\PDO::FETCH_OBJ);  }

  public function getUserCategory()
  {
    $sql = $this->search(['id', 'name'], "category.id IN (SELECT uc.fk_category FROM user_category uc WHERE uc.fk_user = $this->userId)", ['ORDER' => 'name ASC']);
    
    $this->connection->query($sql);
    return $this->connection->execute()->fetchAll(\PDO::FETCH_OBJ);
  }

  public function getCategoryItems($user, $table)
  {
    $sql = "SELECT c.id, c.name, c.completed, c.cover FROM $table c
    INNER JOIN user u ON u.id = c.fk_user WHERE u.id = $this->userId;";
    $sql = $this->search(['id', 'name', 'completed', 'cover'], '');

    $this->connection->query($sql);
    return $this->connection->execute()->fetchAll(\PDO::FETCH_OBJ);
  }
}
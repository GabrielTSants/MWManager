<?php

namespace MWManager\Model;

use src\Model\Model;

class Genres extends Model
{
  protected $table = 'genre';

  public function __construct()
  {
    parent::__construct();
  }

  public function getCategoryGenres($categoryId)
  {
    $sql = "SELECT name FROM $this->table g WHERE g.fk_category = $categoryId ORDER by name ASC";

    $this->connection->query($sql);
    return $this->connection->execute()->fetchAll(\PDO::FETCH_OBJ);
  }
}
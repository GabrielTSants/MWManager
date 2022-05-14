<?php

namespace MWManager\Model;

use src\Model\Model;

class Genres extends Model implements InterfaceDuplicate
{
  protected $table = 'genre';
  protected $fk_user;

  public function __construct()
  {
    parent::__construct();
    $this->fk_user = $_SESSION['userId'];
  }

  public function getUserGenres(int $categoryId)
  {
    $sql = $this->search(['id', 'name'], ['fk_category' => $categoryId, 'fk_user' => $this->fk_user], ['ORDER' => 'name ASC']);
    $this->connection->query($sql);
    return $this->connection->execute()->fetchAll(\PDO::FETCH_OBJ);
  }

  public function saveUserGenre(string $genreName, array $categoryList)
  {
    $duplicateData = $this->dontAllowDuplicate($genreName, $this->fk_user);

    foreach ($categoryList as $category){
      $this->save(['name' => $genreName, 'fk_category' => $category, 'fk_user' => $this->fk_user]);
    }
  }

  public function dontAllowDuplicate(string $genreName, int $fk_user)
  {
    $sql = $this->search(['fk_user'], ['name' => $genreName, 'fk_user' => $fk_user]);
    $this->connection->query($sql);
    $data = $this->connection->execute()->fetchAll(\PDO::FETCH_COLUMN);

    if (!empty($data)){
      return implode(',', $data);
    }

    return '';
  }
}
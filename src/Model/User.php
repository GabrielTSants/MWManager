<?php

namespace MWManager\Model;

use src\Model\Model;

final class User extends Model
{
  protected $table = 'user';
  private $userId;

  public function __construct()
  {
    parent::__construct();
    if (isset($_SESSION['userId'])) $this->userId = $_SESSION['userId'];
  }

  public function getUserByName($user)
  {
    $sql = "SELECT count(*) as totalUser from $this->table WHERE username = '$user';";

    $this->connection->query($sql);
    return $this->connection->execute()->fetch(\PDO::FETCH_OBJ);
  }

  public function checkLogin($user, $password)
  {
    $sql = "SELECT * from $this->table WHERE username = '$user' AND password = '$password';";
    $this->connection->query($sql);
    return $this->connection->execute()->fetch(\PDO::FETCH_OBJ);
  }

  public function getAPI($apiType)
  {
    $sql = $this->search(["api_$apiType"], ['id' => $this->userId]);

    $this->connection->query($sql);
    $api = $this->connection->execute()->fetch();
    return $api["api_$apiType"];
  }

  public function getUserInfo($user, $info)
  {
    $sql = "SELECT $info FROM $this->table WHERE username = '$user'";
    
    $this->connection->query($sql);
    $user = $this->connection->execute()->fetch();
    return $user[$info];
  }

}
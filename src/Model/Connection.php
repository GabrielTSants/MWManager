<?php

namespace MWManager\Model;

class Connection
{
  private $db = 'sqlite';
  private $database = __DIR__.'/../../config/db.sqlite';
  public $con;

  public function __construct()
  {
    $dsn = "$this->db:$this->database";
    
    try {
      $this->con = new \PDO($dsn);
    } catch(\PDOException $e) {
      print("Error: ".  $e->getMessage() . "<br/>");
    }
  }

  public function query($query)
  {
    return $this->stmt = $this->con->prepare($query);
  }

  public function execute($data = null)
  {
    $this->stmt->execute($data);
    return $this->stmt;
  }
}
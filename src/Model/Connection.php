<?php

namespace MWManager\Model;

use PDOException;

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
    try {
      $this->stmt = $this->con->prepare($query);
      //echo $query;
    } catch (PDOException $e){
      echo "SQL ERROR: " . $query;
      file_put_contents('C:/Temp/sql.txt', $query);
    } 
  }

  public function execute($data = null)
  {
    $this->stmt->execute($data);
    return $this->stmt;
  }
}
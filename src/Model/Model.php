<?php

namespace src\Model;

use MWManager\Helpers\Validate;
use MWManager\Model\Connection;

class Model
{
  protected $table;
  protected $connection;
  protected $fetchType = \PDO::FETCH_ASSOC;
  use Validate;

  public function __construct()
  {
    $this->connection = new Connection;
  }

  public function all()
  {
      $sql = "SELECT * FROM $this->table;";

      return $this->connection->con->query($sql)->fetchAll($this->fetchType);
  }

  public function fetchType($fetchType)
  {
      $this->fetchType = $fetchType;
  }

  public function save($data)
  {
      $data = array_filter($data, fn($value) => !is_null($value));

      $fields = implode(',', array_keys($data));
      $values = implode(',', array_values($data)); 
      $valuesSth = implode(',', array_fill(0, count($data), '?'));

      $this->connection->query("INSERT INTO $this->table ($fields) VALUES ($valuesSth);");
      $data = array_filter($data, fn($value) => !is_null($value));

      $save =  $this->connection->execute(array_values($data));

      if ($save) {
          return  $this->connection->con->lastInsertId();
      }

      return false;
  }

  public function search($columns, $options = [], $conditions = [])
  {
    $whereClause = '';
    $whereConditions = [];
    $conditionClause = '';
    $joinClause = '';
    $columnClause = '';
    $columnName = '';

    if (is_array($columns)){
      foreach($columns as $column){
        $columnName = $this->checkownTable($column);
        $columnClause .= ($column != end($columns) ? "$columnName, " : $columnName);
      }
    } else if (is_string($columns)){
      if ($columns === 'all' || empty($columns)){
        $columnName = '*';
      }
    }

    if (is_array($options)){
      foreach ($options as $key => $value){
        $whereName = ';';
        $whereConditions[] = ' '.$this->checkownTable($key).' = '.(!$this->checkString(['id', 'fk'], $key) ? "\"$value\"" : $value).'';
      }
      $whereClause = "WHERE ".implode(' AND ', $whereConditions);
    } else if (is_string($options)){
      $whereClause = 'WHERE '.$options;
    } else {
      throw new \Exception('Wrong parameter');
    }

    if (!empty($conditions) && is_array($conditions)){
      foreach ($conditions as $key => $condition){
        if (str_contains($key, 'JOIN')){
          $joinClause .= " $condition ";
        } else if (strtoupper($key) == 'ORDER'){
          $conditionClause .= " ORDER BY ".$this->checkOwntable($condition);
        } else if (strtoupper($key) == 'LIMIT'){
          $conditionClause .= " LIMIT $condition";
        }
      }
    }

    $sql = "SELECT $columnClause FROM $this->table".(!empty($joinClause) ? $joinClause : ' ')." $whereClause".((!empty($conditionClause) ? $conditionClause : '')).";";
    echo $sql;
    return $sql;
  }

  private function checkownTable($value) : string
  {
    $value = (!str_contains($value, '.') ? $this->table.'.'.$value : $value );

    return $value;
  }
}
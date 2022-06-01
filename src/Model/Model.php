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

  public function save($data, $options = [])
  {
      $where = '';
      $data = array_filter($data, fn($value) => !is_null($value));
      $fields = implode(',', array_keys($data));
      $valuesSth = implode(',', array_fill(0, count($data), '?'));

      if (!empty($options)){
        if (is_array($options)){
          $where = "WHERE " . http_build_query($options, '', ', ');
        } else if (array() === $options){
          $where = "WHERE $options";
        }
      }

      $this->connection->query("INSERT INTO $this->table ($fields) VALUES ($valuesSth) $where;");
      $data = array_filter($data, fn($value) => !is_null($value));

      $save =  $this->connection->execute(array_values($data));

      if ($save) {
          return  $this->connection->con->lastInsertId();
      }

      return false;
  }

  public function delete($options = [])
  {
      if (is_array($options)){
        foreach ($options as $key => $value){
          $whereConditions[] = ' '.$this->checkownTable($key).' = '.(!$this->checkString(['id', 'fk'], $key) ? "\"$value\"" : "\"$value\"" ).''; // Ternary else for fk/id with strings too (SQlite problem)
        }
        $whereClause = "WHERE ".implode(' AND ', $whereConditions);
      } else if (is_string($options)){
        $whereClause = 'WHERE '.$options;
      } else {
        throw new \Exception('Wrong parameter');
      }

      $sql = "DELETE FROM $this->table ".$whereClause.";";

      $update =  $this->connection->execute($sql);

      if ($update) {
          return true;
      }

      return false;
  }

  public function update($data, $where)
  {
    $data  = urldecode(http_build_query($data, '', ', '));
    $where = urldecode(http_build_query($where, '', ' AND '));
    
    $sql = $this->connection->query("UPDATE $this->table SET $data WHERE $where;");
    $this->connection->execute($sql);
  }

  public function search($columns, $options = [], $conditions = [])
  {
    $whereClause = $conditionClause = $joinClause = $columnClause = $columnName = '';
    $whereConditions = [];

    if (is_array($columns)){
      foreach($columns as $column){
        $columnName = $this->checkownTable($column);
        $columnClause .= ($column != end($columns) ? "$columnName, " : $columnName);
      }
    } else {
        $columnName = '*';
    }

    if (is_array($options)){
      foreach ($options as $key => $value){
        $whereConditions[] = ' '.$this->checkownTable($key).' = '.(!$this->checkString(['id', 'fk'], $key) ? "\"$value\"" : "\"$value\"" ).''; // Ternary else for fk/id with strings too (SQlite Fault!)
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

    return $sql;
  }

  private function checkownTable($value) : string
  {
    $value = (!str_contains($value, '.') ? $this->table.'.'.$value : $value );

    return $value;
  }
}
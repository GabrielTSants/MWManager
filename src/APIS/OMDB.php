<?php

namespace MWManager\APIS;

use src\Model\Model;

class OMDB extends Model
{
  private $key;
  private $userId;
  private $url = 'http://www.omdbapi.com';

  public function __construct($key)
  {
    parent::__construct();
    $this->userId = $_SESSION['userId'];
    $this->key = $key;
  }

  public function getInfo($title)
  {
      $path = "$this->url/?apikey=$this->key&t=$title";
      $json = file_get_contents($path);
      return json_decode($json, TRUE);
  }
  

}
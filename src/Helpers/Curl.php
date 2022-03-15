<?php

namespace MWManager\Helpers;

use MWManager\APIS\OMDB;
use MWManager\Model\User;
use src\Model\Model;

class Curl extends Model

{
  private $user;

  public function __construct()
  {
    parent::__construct();
    $this->user = new User;
  }

  public function downInfo($title, $api)
  {
    switch($api){
      case 'movies':
        $api = new OMDB($this->user->getAPI($api));
        $api->getInfo($title);
        return $api;
    }
  }
}
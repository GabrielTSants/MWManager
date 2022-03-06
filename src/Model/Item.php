<?php

namespace MWManager\Model;

use src\Model\Model;

class Item extends Model
{
  protected $table;

  public function __construct($item)
  {
    parent::__construct();
    $this->table = $item;
  }
}
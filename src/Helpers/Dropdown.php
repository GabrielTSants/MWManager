<?php

namespace MWManager\Helpers;

use MWManager\Controller\InterfaceRequisition;
use MWManager\Model\Genres;

class Dropdown implements InterfaceRequisition
{
  public function process()
  {
    $data = filter_input(INPUT_POST, 'data', FILTER_UNSAFE_RAW);
    $route = $_SERVER['PATH_INFO'];

    switch($route) {
      case '/getGenres':
        $dropdownObject = new Genres;

        foreach($dropdownObject->getUserGenres($data) as $row){
          $options[] = $row->name;
          $id[] = $row->id;
        }
        print json_encode(array('options' => $options, 'id' => $id));
        break;
    }
  }
}
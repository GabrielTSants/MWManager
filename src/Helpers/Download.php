<?php

namespace MWManager\Helpers;

use MWManager\APIS\OMDB;
use MWManager\Controller\InterfaceRequisition;
use MWManager\Model\User;
use MWManager\Model\Item;

class Download implements InterfaceRequisition
{
  private $user;
  private $item;
  
  public function __construct()
  {
    $this->user = new User();
    $this->item = new Item($_POST['target']);
  }

  public function process()
  {
    file_put_contents('/tmp/text.txt', 'id:: '.$_POST['id']);
    switch($_POST['target']){
      case 'movies':
        $api = new OMDB($this->user->getAPI('omdb'));
        file_put_contents('/tmp/text.txt', serialize($this->item->getItem($_POST['id'])));
        //$this->item->save();
        break;
    }
  }
}
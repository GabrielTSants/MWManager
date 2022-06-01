<?php

namespace MWManager\Controller;

use MWManager\Model\Items;

class CompleteItem implements InterfaceRequisition
{
  private $item;
  private $itemId;
  private $userId;
  private $completed_at;

  public function __construct()
  {
    $this->item = new Items();
    $this->itemId = '\''.$_POST['itemId'].'\'';
    $this->userId = '\''.$_SESSION['userId'].'\'';
    $this->completed_at = '\''.date('Y-m-d H:i:s').'\'';
  }

  public function process()
  {
      $completed = $this->item->getItem($_POST['itemId']);

      $this->item->update(['completed_at' => ( empty($completed->completed_at) ? $this->completed_at : '\'\'' )], ['fk_user' => $this->userId, 'id' => $this->itemId]);
  }
}
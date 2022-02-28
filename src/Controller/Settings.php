<?php

namespace MWManager\Controller;

use MWManager\Helpers\View;
use MWManager\Model\User;

class Settings implements InterfaceRequisition
{
  private $user;
  use View;

  public function __construct()
  {
    $this->user = new User;
  }

  public function process()
  {
    $title = 'Settings';
    $pp = reset($this->user->getUserInfo($_SESSION['username'], 'picture'));
    $this->render('user/settings.php', compact('title', 'pp'));
  }
}
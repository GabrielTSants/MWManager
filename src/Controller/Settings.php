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
    $pp = $this->user->getUserInfo($_SESSION['username'], 'picture');
    $api_omdb = $this->user->getAPI('omdb');
    $this->render('user/settings.php', compact('title', 'pp', 'api_omdb'));
  }
}
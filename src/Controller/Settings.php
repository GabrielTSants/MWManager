<?php

namespace MWManager\Controller;

use MWManager\Helpers\View;
use MWManager\Model\{User, Category};

class Settings implements InterfaceRequisition
{
  private $user;
  private $categoriesList;
  use View;

  public function __construct()
  {
    $this->user = new User;
    $this->categoriesList = new Category;
  }

  public function process()
  {
    if (isset($_POST['save'])){
      var_dump($_POST);
      return;
    }
    
    $title = 'Settings';
    $pp = $this->user->getUserInfo($_SESSION['username'], 'picture');
    $categories = $this->categoriesList->getUserCategory();
    $api_omdb = $this->user->getAPI('omdb');
    $this->render('user/settings.php', compact('title', 'pp', 'api_omdb', 'categories'));
  }
}
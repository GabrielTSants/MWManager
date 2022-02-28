<?php

namespace MWManager\Controller;

use MWManager\Helpers\View;
use MWManager\Model\Category;

class Menu implements InterfaceRequisition
{
  use View;
  public function process()
  {
    $title = 'MWManager';
    $categories = new Category;
    $listCategories = $categories->getCategory($_SESSION['username']);
    $this->render('menu/index.php', compact('title', 'listCategories'));
  }
}
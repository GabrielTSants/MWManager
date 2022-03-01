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
    $listCategories = $categories->getUserCategory();
    $this->render('menu/index.php', compact('title', 'listCategories'));
  }
}
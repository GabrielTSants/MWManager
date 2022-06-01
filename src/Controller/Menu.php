<?php

namespace MWManager\Controller;

use MWManager\Helpers\View;
use MWManager\Model\{Category, Items};

class Menu implements InterfaceRequisition
{
  use View;
  public function process()
  {
    $title = 'MWManager';
    $categories = new Category;
    $items = new Items();

    $listCategories = $categories->getUserCategory();
    $completedItems = $items->completedItems();
    $this->render('menu/index.php', compact('title', 'listCategories', 'completedItems'));
  }
}
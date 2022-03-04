<?php

namespace MWManager\Controller;

use MWManager\Helpers\View;
use MWManager\Model\Category;

class NewItem implements InterfaceRequisition
{
  use View;
  private $category;

  public function __construct()
  {
    $this->category = new Category;
  }

  public function process()
  {
    if (isset($_POST['save']) && !empty($_POST['name']) && !empty($_POST['categoryList']) && !empty($_POST['genreList'])){ 

      return;
    }

    $title = 'New item';
    $categories = $this->category->getNewCategory();
    $this->render('menu/new-item.php', compact('title', 'categories'));
  }
}
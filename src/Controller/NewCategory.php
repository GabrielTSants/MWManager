<?php

namespace MWManager\Controller;

use MWManager\Helpers\View;
use MWManager\Model\Category;

class NewCategory implements InterfaceRequisition
{
  use View;
  private $category;

  public function __construct()
  {
    $this->category = new Category;
  }

  public function process()
  {
    $title = 'New Category';
    $categories = $this->category->getNewCategory($_SESSION['userId']);
    return $this->render('menu/new-category.php', compact('title', 'categories'));
  }
}
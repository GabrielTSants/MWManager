<?php

namespace MWManager\Controller;

use MWManager\Helpers\View;
use MWManager\Model\Category;
use MWManager\Model\UserCategory;

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
    if (isset($_POST['save']) && !empty($_POST['categoryList'])){ 
      $category = new UserCategory();
      $category->save(['fk_category' => $_POST['categoryList'], 'fk_user' => $_SESSION['userId']]);
      header('Location: /');
      return;
    }

    $title = 'New Category';
    $categories = $this->category->getNewCategory();
    return $this->render('menu/new-category.php', compact('title', 'categories'));
  }
}
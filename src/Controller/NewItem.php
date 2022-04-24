<?php

namespace MWManager\Controller;

use MWManager\Helpers\View;
use MWManager\Model\Category;
use MWManager\Model\Item;

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
      $item = new Item($_POST['categoryList']);
      $item->save(['name' => $_POST['name'], 'fk_genre' => $_POST['genreList'], 'fk_user' => $_POST['userId']]);
      header('Location: /'.strtolower($_POST['categoryList']));
      return;
    }

    $title = 'New item';
    $categories = $this->category->getUserCategory();
    $this->render('menu/new-item.php', compact('title', 'categories'));
  }
}
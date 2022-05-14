<?php

namespace MWManager\Controller;

use MWManager\Helpers\View;
use MWManager\Model\Category;
use MWManager\Model\Items;

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
      $item = new Items();
      $item_type = strtolower($_POST['categoryList']);
      $itemName = rtrim($_POST['name']);
      $item->save(['name' => $itemName, 'fk_genre' => $_POST['genreList'], 'item_type' => $item_type, 'fk_user' => $_SESSION['userId']]);
      header('Location: /'.strtolower($_POST['categoryList']));
      return;
    }

    $title = 'New item';
    $categories = $this->category->getUserCategory();
    $this->render('menu/new-item.php', compact('title', 'categories'));
  }
}
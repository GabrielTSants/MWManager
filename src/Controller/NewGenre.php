<?php

namespace MWManager\Controller;

use MWManager\Helpers\View;
use MWManager\Model\{Category, Genres};
use MWManager\Controller\InterfaceRequisition;

class NewGenre implements InterfaceRequisition
{
  use View;
  private $category;

  public function __construct()
  {
    $this->category = new Category;
  }

  public function process()
  {
    if (isset($_POST['save']) && !empty($_POST['genre']) && !empty($_POST['categoryList'])){
      $genre = new Genres();
      $categoryList = $_POST['categoryList'];
      $genreName = rtrim($_POST['genre']);

      $genre->saveUserGenre($genreName, $categoryList);

      header('Location: /menu');
      return;
    }

    $title = 'New Genre';
    $categories = $this->category->getUserCategory();
    $this->render('menu/new-genre.php', compact('title', 'categories'));
  }
}
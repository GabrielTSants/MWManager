<?php

namespace MWManager\Controller;

use MWManager\APIS\OMDB;
use MWManager\Helpers\View;
use MWManager\Model\Category;
use MWManager\Model\User;

class Movies implements InterfaceRequisition
{
    use View;
    private $omdb;
    private $user;
    private $movies;

    public function __construct()
    {
      $this->user = new User;
      $this->movies = new Category;
      $apiKey = $this->user->getAPI($_SESSION['username'], 'omdb');
      if (!empty($apiKey)) $this->omdb = new OMDB($apiKey);
    }

    public function process()
    {
      $listMovies = $this->movies->getCategoryItems($_SESSION['username'], 'movies');
      $this->render('/menu/movies.php', compact('title', 'listMovies'));
    }
}
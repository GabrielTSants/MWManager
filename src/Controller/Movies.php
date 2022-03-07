<?php

namespace MWManager\Controller;

use MWManager\APIS\OMDB;
use MWManager\Helpers\View;
use MWManager\Model\Item;
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
      $this->movies = new Item('movies');
      $apiKey = $this->user->getAPI('omdb');
    }

    public function process()
    {
      $listMovies = $this->movies->getCategoryItems('movies');
      $this->render('/menu/movies.php', compact('title', 'listMovies'));
    }
}
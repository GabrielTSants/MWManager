<?php

namespace MWManager\Controller;

use MWManager\Helpers\View;
use MWManager\Model\Items;
use MWManager\Model\User;

class Item implements InterfaceRequisition
{
    use View;
    private $omdb;
    private $user;
    private $items;

    public function __construct()
    {
      $this->user = new User;
      $this->items = new Items;
      $apiKey = $this->user->getAPI('omdb');
    }

    public function process()
    {
      $title = ucfirst(substr($_SERVER['PATH_INFO'], 1));
      $listItems = $this->items->getCategoryItems();
      $this->render('/menu/items.php', compact('title', 'listItems'));
    }
}
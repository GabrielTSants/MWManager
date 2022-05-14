<?php

use MWManager\Controller\{Login, Logout, Menu, Item, NewCategory, NewGenre, NewItem, Settings};
use MWManager\Helpers\{Download, Dropdown};

return [
        '/login'        => Login::class,
        '/logout'       => Logout::class,
        '/menu'         => Menu::class,
        '/movies'       => Item::class,
        '/series'       => Item::class,
        '/books'        => Item::class,
        '/settings'     => Settings::class,
        '/new-item'     => NewItem::class,
        '/new-genre'    => NewGenre::class,
        '/new-category' => NewCategory::class,
        '/getGenres'    => Dropdown::class,
        '/downloadInfo' => Download::class
];
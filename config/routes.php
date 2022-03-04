<?php

use MWManager\Controller\{Login, Logout, Menu, Movies, NewCategory, NewItem, Settings};
use MWManager\Helpers\Dropdown;

return [
        '/login' => Login::class,
        '/logout' => Logout::class,
        '' => Menu::class,
        '/movies' => Movies::class,
        '/settings' => Settings::class,
        '/new-item' => NewItem::class,
        '/new-category' => NewCategory::class,
        '/getGenres' => Dropdown::class
];
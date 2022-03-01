<?php

use MWManager\Controller\{Login, Logout, Menu, Movies, NewCategory, Settings};

return [
        '/login' => Login::class,
        '/logout' => Logout::class,
        '' => Menu::class,
        '/movies' => Movies::class,
        '/settings' => Settings::class,
        '/new-category' => NewCategory::class
];
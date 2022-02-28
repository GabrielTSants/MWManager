<?php

use MWManager\Controller\{Login, Logout, Menu, Movies, Settings};

return [
        '/login' => Login::class,
        '/logout' => Logout::class,
        '' => Menu::class,
        '/movies' => Movies::class,
        '/settings' => Settings::class
];
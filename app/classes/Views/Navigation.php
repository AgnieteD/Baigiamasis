<?php

namespace App\Views;

use App\App;
use Core\Router;
use Core\View;

class Navigation extends View
{
    public function __construct()
    {
        $nav = [
            [
                'href' => Router::getUrl('index'),
                'class' => 'active-left',
                'title' => 'Titulinis',
            ],
        ];

        if (App::$session->getUser()) {
            $nav[] = ['href' => Router::getUrl('feedback'), 'class' => 'nav-left', 'title' => 'Atsiliepimai'];
            $nav[] = ['href' => Router::getUrl('logout'), 'class' => 'nav-right', 'title' => 'Atsijungti'];
        } else {
            $nav[] = ['href' => Router::getUrl('feedback'), 'class' => 'nav-left', 'title' => 'Atsiliepimai'];
            $nav[] = ['href' => Router::getUrl('login'), 'class' => 'nav-right', 'title' => 'Prisijungti'];
            $nav[] = ['href' => Router::getUrl('register'), 'class' => 'nav-right', 'title' => 'Registruotis'];
        }

        parent::__construct($nav);
    }

    public function render(string $template_path = ROOT . '/app/templates/partials/nav.tpl.php'): string
    {
        return parent::render($template_path);
    }
}
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
                'class' => 'active',
                'title' => 'Titulinis',
            ],
        ];
        if (App::$session->getUser()) {
            $nav[] = ['href' => Router::getUrl('logout'), 'title' => 'Atsijungti'];
        } else {
            $nav[] = ['href' => Router::getUrl('register'), 'title' => 'Registruotis'];
            $nav[] = ['href' => Router::getUrl('login'), 'title' => 'Prisijungti'];
        }

        parent::__construct($nav);
    }

    public function render(string $template_path = ROOT . '/app/templates/partials/nav.tpl.php'): string
    {
        return parent::render($template_path);
    }
}
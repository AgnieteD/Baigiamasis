<?php

namespace App\Controllers\Auth;

use App\Abstracts\Controller;
use App\App;
use App\Users\User;
use App\Views\Forms\RegisterForm;
use Core\Router;
use Core\Views\Content;
use Exception;

class RegisterController extends Controller
{
    /**
     * This method builds or sets
     * current $page content
     * renders it and returns HTML
     *
     * So if we have ex.: ProductsController,
     * it can have methods responsible for
     * index() (main page, usualy a list),
     * view() (preview single),
     * create() (form for creating),
     * edit() (form for editing)
     * delete()
     *
     * These methods can then be called on each page accordingly, ex.:
     * add.php:
     * $controller = new PixelsController();
     * print $controller->add();
     *
     *
     * my.php:
     * $controller = new ProductsController();
     * print $controller->my();
     *
     * @return string|null
     * @throws Exception
     */
    function index(): ?string
    {
        $form = new RegisterForm();

        if ($form->isSubmitted()) {
            if ($form->validate()) {

                $user = new User($form->getSubmitData());

                App::$db->insertRow('users', $user->_getData());

                header('Location:' . Router::getUrl('login'));
                exit;
            } else {
                $message = 'Registracija nepavyko';
            }
        }

        $content = new Content(['form' => $form->render(), 'message' => $message ?? null]);

        $this->page->setTitle('Register');
        $this->page->setContent($content->render('register.tpl.php'));

        return $this->page->render();
    }
}
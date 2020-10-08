<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\App;
use App\Feedback\Feedback;
use App\Views\Forms\FeedbackForm;
use App\Views\Tables\FeedbackTable;
use Core\Views\Content;
use Exception;

class FeedbackController extends Controller
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
        $form = new FeedbackForm();

        if ($form->isSubmitted()) {
            if ($form->validate()) {
                $feedback = new Feedback($form->getSubmitData());

                $user = App::$db->getRowsWhere('users', ['email' => App::$session->getUser()['email']]);
                foreach ($user as $user_key => $user_value) {
                    $user_id = $user_key;
                }
                $feedback->setId($user_id);

                date_default_timezone_set("Europe/Vilnius");
                $feedback->setDate(date('Y-m-d H:i:s'));

                App::$db->insertRow('feedback', $feedback->_getData());
            }
        }

        $table = new FeedbackTable();
        $content = new Content(['table' => $table->render() ?? null, 'form' => $form->render() ?? null]);
        $this->page->setTitle('Atsiliepimai');
        $this->page->setContent($content->render('feedback.tpl.php'));

        return $this->page->render();
    }
}
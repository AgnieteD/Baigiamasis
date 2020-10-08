<?php

namespace App\Views\Tables;

use App\App;
use Core\Abstracts\Views\Table;

class FeedbackTable extends Table
{
    public function __construct()
    {
        $data = App::$db->getRowsWhere('feedback', []);

        foreach ($data as &$feedback) {
            $feedback['name'] = App::$db->getRowById('users', $feedback['id'])['username'];
            unset($feedback['id']);
        }

        $table_array = [
            'headers' => [
                'Komentaras',
                'Data',
                'Vardas',
            ],
            'rows' =>
                $data,
        ];

        parent::__construct($table_array);
    }
}
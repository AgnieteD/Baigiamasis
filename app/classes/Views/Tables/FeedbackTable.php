<?php

namespace App\Views\Tables;

use App\App;
use Core\Abstracts\Views\Table;

class FeedbackTable extends Table
{
    public function __construct()
    {
        $data = App::$db->getRowsWhere('feedback', []);

        $table_array = [
            'headers' => [
                'ID',
                'Komentaras',
                'Data',
            ],
            'rows' =>
                $data,
        ];

        parent::__construct($table_array);
    }
}
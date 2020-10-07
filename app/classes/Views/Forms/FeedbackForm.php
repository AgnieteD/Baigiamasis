<?php

namespace App\Views\Forms;

use Core\Views\Form;

class FeedbackForm extends Form
{
    public function __construct()
    {
        $form_array = [
            'attr' =>
                [
                    'method' => 'POST',
                ],
            'fields' =>
                [
                    'comment' => [
                        'type' => 'textarea',
                        'validators' => [
                            'validate_field_not_empty',
                            'validate_max_500_length',
                        ],
                        'extra' =>
                            [
                                'attr' =>
                                    [
                                        'rows' => 4,
                                        'cols' => 100,
                                        'placeholder' => 'Jūsų atsiliepimas',
                                    ],
                            ],
                    ],
                ],
            'buttons' =>
                [
                    'save' =>
                        [
                            'title' => 'Komentuoti',
                        ],
                ],
            'validators' => [
            ],
        ];

        parent::__construct($form_array);
    }
}

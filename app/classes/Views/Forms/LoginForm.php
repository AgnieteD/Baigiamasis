<?php

namespace App\Views\Forms;

use Core\Views\Form;

class LoginForm extends Form
{
    public function __construct()
    {
        $form_array = [
            'attr' => [
                'method' => 'POST',
            ],
            'fields' => [
                'email' => [
                    'label' => 'El. paštas',
                    'type' => 'text',
                    'filter' => FILTER_SANITIZE_EMAIL,
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_email',
                        'validate_email_db',
                    ],
                    'extra' =>
                        [
                            'attr' =>
                                [
                                    'placeholder' => 'Jūsų@paštas.lt',
                                ],
                        ],
                ],
                'password' => [
                    'label' => 'Slaptažodis',
                    'type' => 'password',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' =>
                        [
                            'attr' =>
                                [
                                    'placeholder' => 'Jūsų slaptažodis',
                                ],
                        ],
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Prisijungti',
                    'type' => 'submit',
                ],
            ],
            'validators' => [
                'validate_login'
            ]
        ];

        parent::__construct($form_array);
    }
}
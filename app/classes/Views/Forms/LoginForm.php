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
                'username' => [
                    'label' => 'User Name',
                    'type' => 'text',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' =>
                        [
                            'attr' =>
                                [
                                    'placeholder' => 'Enter Username',
                                ],
                        ],
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' =>
                        [
                            'attr' =>
                                [
                                    'placeholder' => 'Enter Password',
                                ],
                        ],
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Login',
                    'type' => 'submit',
                    'value' => 'submit',
                    'extra' =>
                        [
                            'attr' =>
                                [
                                    'class' => 'gr-button',
                                ],
                        ],
                ],
            ],
            'validators' => [
                'validate_login'
            ]
        ];

        parent::__construct($form_array);
    }
}
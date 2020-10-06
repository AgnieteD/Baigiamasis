<?php

namespace App\Views\Forms;

use Core\Views\Form;

class RegisterForm extends Form
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
                    'username' => [
                        'label' => 'User Name',
                        'type' => 'text',
                        'validators' => [
                            'validate_field_not_empty',
                            'validate_user_unique',
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
                                        'placeholder' => 'Password',
                                    ],
                            ],
                    ],
                    'password_repeat' => [
                        'label' => 'Repeat Password',
                        'type' => 'password',
                        'validators' => [
                            'validate_field_not_empty',
                        ],
                        'extra' =>
                            [
                                'attr' =>
                                    [
                                        'placeholder' => 'Repeat Password',
                                    ],
                            ],
                    ],
                ],
            'buttons' =>
                [
                    'save' =>
                        [
                            'title' => 'Register',
                            'extra' =>
                                [
                                    'attr' =>
                                        [
                                            'class' => 'red-button',
                                        ],
                                ],
                        ],
                ],
            'validators' => [
//                'validate_fields_match' => [
//                    'fields' => [
//                        'password',
//                        'password_repeat',
//                    ],
//                    'error' => 'Laukeliai privalo sutapti',
//                ],
            ],
        ];

        parent::__construct($form_array);
    }
}
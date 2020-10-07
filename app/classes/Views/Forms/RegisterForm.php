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
                        'label' => 'Vardas',
                        'type' => 'text',
                        'validators' => [
                            'validate_field_not_empty',
                            'validate_max_length_no_int',
                        ],
                        'extra' =>
                            [
                                'attr' =>
                                    [
                                        'placeholder' => 'Jūsų vardas',
                                    ],
                            ],
                    ],
                    'lastname' => [
                        'label' => 'Pavardė',
                        'type' => 'text',
                        'validators' => [
                            'validate_field_not_empty',
                            'validate_max_length_no_int',
                        ],
                        'extra' =>
                            [
                                'attr' =>
                                    [
                                        'placeholder' => 'Jūsų pavardė',
                                    ],
                            ],
                    ],
                    'email' => [
                        'label' => 'El. paštas',
                        'type' => 'text',
                        'filter' => FILTER_SANITIZE_EMAIL,
                        'validators' => [
                            'validate_field_not_empty',
                            'validate_email',
                            'validate_user_unique',
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
                    'phone' => [
                        'label' => 'Telefono Nr.',
                        'type' => 'tel',
                        'validators' => [
                        ],
                        'extra' =>
                            [
                                'attr' =>
                                    [
                                        'placeholder' => 'Jūsų telefono nr.',
                                    ],
                            ],
                    ],
                    'address' => [
                        'label' => 'Adresas',
                        'type' => 'address',
                        'validators' => [
                        ],
                        'extra' =>
                            [
                                'attr' =>
                                    [
                                        'placeholder' => 'Jūsų adresas',
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
            ],
        ];

        parent::__construct($form_array);
    }
}
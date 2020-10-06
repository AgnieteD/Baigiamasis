<?php

use App\App;

/**
 * Validates unique users
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_user_unique(string $field_value, array &$field): bool
{
    if (App::$db->getRowsWhere('users', ['username' => $field_value])) {
        $field['error'] = 'Toks useris jau egzistuoja';
        return false;
    }
    return true;
}

/**
 * Validates login
 *
 * @param array $form_values
 * @param array $form
 * @return bool
 */
function validate_login(array $form_values, array &$form): bool
{
    if (!App::$session->login($form_values['username'], $form_values['password'])) {
        $form['error'] = 'Klaidingai įvesta';
        return false;
    }

    return true;
}
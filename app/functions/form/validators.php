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
    if (App::$db->getRowsWhere('users', ['email' => $field_value])) {
        $field['error'] = 'Toks vartotojas jau egzistuoja';
        return false;
    }
    return true;
}

/**
 * Validates if email is in db
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_email_db(string $field_value, array &$field): bool
{
    if (!App::$db->getRowsWhere('users', ['email' => $field_value])) {
        $field['error'] = 'Tokio vartotojo nėra';
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
    if (!App::$session->login($form_values['email'], $form_values['password'])) {
        $form['error'] = 'Įvestas neteisingas slaptažodis';
        return false;
    }

    return true;
}

/**
 * Validates if field has no integers and max 40 symbol length
 *
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_max_length_no_int($field_value, &$field)
{
    if (strlen($field_value) > 40) {
        $field['error'] = 'Simbolių skaičius negali viršyti 40';
        return false;
    } else if (strpbrk($field_value, '1234567890') !== FALSE) {
        $field['error'] = 'Laukelyje negali būti skaičių';
        return false;
    }

    return true;
}

/**
 * Validates max 400 symbol length
 *
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_max_500_length($field_value, &$field)
{
    if (strlen($field_value) > 500) {
        $field['error'] = 'Simbolių skaičius negali viršyti 400';
        return false;
    }

    return true;
}
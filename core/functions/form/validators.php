<?php

/**
 * Validates if field is not empty
 *
 * @param string $field_value
 * @param array $field
 * @return bool|null
 */
function validate_field_not_empty(string $field_value, array &$field): ?bool
{
    if ($field_value === '') {
        $field['error'] = 'Laukelis neužpildytas';
        return false;
    } else {
        return true;
    }
}

/**
 * Validates if field is an e-mail
 *
 * @param string $field_value
 * @param array $field
 * @return bool|null
 */
function validate_email(string $field_value, array &$field): ?bool
{
    if (!filter_var($field_value, FILTER_VALIDATE_EMAIL)) {
        $field['error'] = 'El. pašto adrese yra klaida';
        return false;
    } else {
        return true;
    }
}
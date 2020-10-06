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
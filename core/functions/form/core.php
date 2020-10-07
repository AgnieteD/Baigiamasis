<?php

/**
 * Sanitizing $_POST request by form fields
 *
 * @param array $fields
 * @return array
 */
function sanitize_form_input_values(array $fields): array
{
    $filter_params = [];

    foreach ($fields['fields'] as $field_key => $field) {
        $filter_params[$field_key] = $field['filter'] ?? FILTER_SANITIZE_SPECIAL_CHARS;
    }

    return filter_input_array(INPUT_POST, $filter_params);
}
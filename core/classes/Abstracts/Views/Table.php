<?php

namespace Core\Abstracts\Views;

use Core\View;

abstract class Table extends View
{
    public function __construct(array $table = [])
    {
        $this->data = $table;
    }

    public function render(string $template_path = ROOT . '/core/templates/table.tpl.php'): string
    {
        return parent::render($template_path);
    }
}
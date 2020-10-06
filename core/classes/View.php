<?php

namespace Core;

use Exception;

class View
{
    protected $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Renders array of $this->>data into template file
     *
     * @param string $template_path
     * @return string HTML
     * @throws Exception
     */
    public function render(string $template_path): string
    {
        if (!file_exists($template_path)) {
            throw (new Exception("Toks template'as neegzistuoja"));
        }

        $data = $this->data;

        ob_start();

        require $template_path;

        return ob_get_clean();
    }
}
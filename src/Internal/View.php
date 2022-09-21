<?php

namespace Ramaadi\Karyawanapp\Internal;

use RuntimeException;

class View
{
    /**
     * Set data from controller: $view->data['variable'] = 'value';
     * @var array
     */
    private array $data = [];
    private string $tempateFile = "";


    public function from($file): View
    {
        $this->tempateFile = "{$_SERVER['DOCUMENT_ROOT']}/src/Views/{$file}.php";

        return $this;
    }

    public function with($data): View
    {
        $this->data = $data;
        return $this;
    }

    public function render()
    {
        $template = $this->tempateFile;

        if (!is_file($template)) {
            throw new RuntimeException('View not found: ' . $template);
        }

        $result = function ($file, $data = array()) {
            ob_start();

            try {
                include $file;
            } catch (\Exception $e) {
                ob_end_clean();
                throw $e;
            }
            return ob_get_clean();
        };

        // call the closure
        return $result($template, new ViewData($this->data));
    }
}
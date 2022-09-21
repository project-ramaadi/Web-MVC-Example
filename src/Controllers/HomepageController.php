<?php

namespace Ramaadi\Karyawanapp\Controllers;

use Exception;
use Ramaadi\Karyawanapp\Internal\Controller;

class HomepageController extends Controller
{
    /**
     * @throws Exception
     */
    public function index(): string
    {
        return $this
            ->view("welcome")
            ->render();
    }

    public function debugSession()
    {

        die("<pre>" . json_encode($_SESSION, JSON_PRETTY_PRINT) . "</pre>");
    }
}
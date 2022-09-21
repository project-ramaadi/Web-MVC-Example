<?php

namespace Ramaadi\Karyawanapp\Internal;

use Exception;

class ViewData
{
    private array $data;

    public function url(string $path): string
    {
        $isHttps = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http');
        return "{$isHttps}://{$_SERVER['HTTP_HOST']}/{$path}";
    }

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function get($key)
    {
        return $this->data[$key] ?? null;
    }

    public function sessionFlash($key)
    {
        return SessionFlashStorage::flash($key);
    }

    public function errors($key)
    {
        return SessionFlashStorage::errors($key);
    }

    /**
     * @throws Exception
     */
    public function component($path, $data = []): bool|string
    {
        return (new View())
            ->from("components/{$path}")
            ->with($data)
            ->render();
    }
}
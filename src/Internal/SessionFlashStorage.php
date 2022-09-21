<?php

namespace Ramaadi\Karyawanapp\Internal;

class SessionFlashStorage
{
    private static array $errors = [];
    private static $flash = [];

    public static function hydrate(
        mixed $errors,
        mixed $flash
    ): void
    {
        self::$errors = $errors;
        self::$flash = $flash;

        $_SESSION[Enums::FLASH_SESSION_NAME] = [];
        $_SESSION[Enums::ERRORS_SESSION_NAME] = [];
    }


    public static function addFlash($key, $data)
    {
        $_SESSION[Enums::FLASH_SESSION_NAME][$key] = $data;
    }

    public static function addErrors($key, $data)
    {
        $_SESSION[Enums::ERRORS_SESSION_NAME][$key] = $data;
    }

    public static function errors($key)
    {
        return self::$errors[$key] ?? null;
    }

    public static function flash($key)
    {
        return self::$flash[$key] ?? null;
    }
}
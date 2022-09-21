<?php

namespace Ramaadi\Karyawanapp\Internal;

class ModelIDCounter
{
    public static function keyCounterExist(string $modelName): bool
    {
        if (!isset($_SESSION[Enums::KEYCOUNTER_NAME] [$modelName])) return false;

        return true;
    }

    public static function getKeyForModel(string $modelName): int
    {
        if (!self::keyCounterExist($modelName)) {
            self::setKeyForModel($modelName, 1);
            return 1;
        }

        return $_SESSION[Enums::KEYCOUNTER_NAME] [$modelName] + 1;
    }

    public static function setKeyForModel(string $modelName, int $key): void
    {
        $_SESSION[Enums::KEYCOUNTER_NAME] [$modelName] = $key;
    }

    public static function incrementKeyForModel(string $modelName)
    {
        self::setKeyForModel(
            $modelName,
            self::getKeyForModel($modelName)
        );
    }
}
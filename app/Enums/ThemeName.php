<?php
namespace App\Enums;

use App\Models\ThemeItem as ThemeNameModel;

class ThemeName
{
    protected static $values = null;

    public static function getValues()
    {
        if (self::$values === null) {
            self::$values = ThemeNameModel::pluck('name', 'name')->toArray();
        }

        return self::$values;
    }

    public static function __callStatic($name, $arguments)
    {
        $values = self::getValues();

        if (isset($values[$name])) {
            return $values[$name];
        }

        throw new \Exception("Undefined constant {$name}");
    }
}
<?php

namespace App\Http\Requests;

class Constants
{
    public static $THIS_FIELD_REQUIRED_MESSAGE = "Это поле обязательно для заполнения!";

    public static function min_length(int $val)
    {
        return "Минимальная длина для поля: " . $val;
    }

    public static function max_length(int $val)
    {
        return "Максимальная длина для поля: " . $val;
    }

    public static function unique()
    {
        return "Значение поля должно быть уникальным";
    }
}

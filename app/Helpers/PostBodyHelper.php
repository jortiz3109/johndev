<?php


namespace App\Helpers;


use Illuminate\Support\Str;

class PostBodyHelper
{
    private const SUMMARY_DELIMITER = '=====';

    public static function summary(string $text): string
    {
        $text = strip_tags($text);

        return Str::contains($text, self::SUMMARY_DELIMITER)
            ? Str::substr($text, 0, strpos($text, self::SUMMARY_DELIMITER))
            : Str::substr($text, 0, strpos($text, PHP_EOL));
    }
}

<?php

namespace App\Helpers;

use HtmlSanitizer\Sanitizer;
use Illuminate\Support\Facades\App;

class PostBodyHelper
{
    public static function prepare(string $body): string
    {
        $body = self::sanitize($body);
        $body = str_replace('<pre>', '<pre class="has-code">', $body);

        return $body;
    }

    public static function sanitize(string $body): string
    {
        return App::make(Sanitizer::class)->sanitize($body);
    }
}
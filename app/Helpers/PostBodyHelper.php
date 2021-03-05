<?php

namespace App\Helpers;

use HtmlSanitizer\Sanitizer;
use Illuminate\Support\Facades\App;

class PostBodyHelper
{
    public static function prepare(string $body): string
    {
        return App::make(Sanitizer::class)->sanitize($body);
    }
}

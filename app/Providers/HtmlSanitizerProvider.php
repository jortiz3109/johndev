<?php

namespace App\Providers;

use HtmlSanitizer\Sanitizer;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;

class HtmlSanitizerProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(Sanitizer::class, function($app, $params) {
            $extensions = Arr::get($params, 'extensions', config('html-sanitizer.extensions'));
            $tags = Arr::get($params, 'tags', config('html-sanitizer.tags'));

            return Sanitizer::create(compact('extensions', 'tags'));
        });
    }
}

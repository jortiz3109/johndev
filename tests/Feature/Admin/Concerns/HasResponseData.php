<?php


namespace Tests\Feature\Admin\Concerns;


use Illuminate\Support\Arr;
use Illuminate\Testing\TestResponse;

trait HasResponseData
{
    protected function getDataItem(TestResponse $response, string $key)
    {
        return Arr::get($response->original->gatherData(), $key);
    }
}

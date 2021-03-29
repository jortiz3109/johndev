<?php


namespace Tests\Feature\Admin\Authors\Concerns;


use Illuminate\Support\Str;

trait HasValidationProviders
{
    public function validationDataProvider(): array
    {
        return [
            'Test name rule required' => ['name', ''],
            'Test name rule min' => ['name', 'abc'],
            'Test name rule max' => ['name', Str::random(201)],
            'Test email rule required' => ['email', ''],
            'Test email rule email' => ['email', 'not and email'],
            'Test password rule required' => ['password', ''],
            'Test password rule min' => ['password', 'pass'],
            'Test password rule confirmed' => ['password', 'pass'],
            'Test about rule required' => ['about', ''],
            'Test about rule max' => ['about', Str::random(501)],
        ];
    }

    protected function data(): array
    {
        return [
            'name' => 'Test author',
            'email' => 'me@johndev.co',
            'password' => 'password',
            'password_confirmation' => 'password',
            'about' => 'John dev is a lead developer at Evertec Medellin'
        ];
    }
}

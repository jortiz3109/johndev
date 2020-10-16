<?php

namespace Tests\Feature\Admin\Concerns;


use App\Models\User;

trait HasShowTests
{
    public function testItReturnTheCorrectView()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get($this->route());
        $response->assertViewIs($this->viewName());
    }
}

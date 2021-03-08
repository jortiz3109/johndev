<?php

namespace Tests\Feature\Admin\Authors\Concerns;

use App\Models\User;

trait HasUser
{
    protected function user(): User
    {
        return User::factory()->create();
    }
}

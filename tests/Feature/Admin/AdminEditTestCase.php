<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Admin\Concerns\HasAuthorizationTests;
use Tests\Feature\Admin\Concerns\HasEditTests;
use Tests\Feature\Admin\Concerns\HasResponseTests;
use Tests\TestCase;

abstract class AdminEditTestCase extends TestCase
{
    use RefreshDatabase;
    use HasResponseTests;
    use HasAuthorizationTests;
    use HasEditTests;

    abstract protected function model(): Model;

    abstract protected function modelName(): string;

    abstract protected function viewName(): string;

    abstract protected function user(): User;

    abstract protected function route(): string;

    abstract public function fieldsProvider(): array;
}

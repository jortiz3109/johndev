<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Admin\Concerns\HasAuthorizationTests;
use Tests\Feature\Admin\Concerns\HasIndexTests;
use Tests\Feature\Admin\Concerns\HasResponseData;
use Tests\Feature\Admin\Concerns\HasResponseTests;
use Tests\TestCase;

abstract class AdminIndexTestCase extends TestCase
{
    use RefreshDatabase;
    use HasAuthorizationTests;
    use HasResponseTests;
    use HasIndexTests;
    use HasResponseData;

    abstract protected function models();

    abstract protected function collectionName(): string;

    abstract protected function viewName(): string;

    abstract protected function user(): User;

    abstract protected function route(): string;

    abstract public function fieldsProvider(): array;
}

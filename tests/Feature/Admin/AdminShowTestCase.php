<?php


namespace Tests\Feature\Admin;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Admin\Concerns\HasAuthorizationTests;
use Tests\Feature\Admin\Concerns\HasResponseTests;
use Tests\TestCase;

abstract class AdminShowTestCase extends TestCase
{
    use HasAuthorizationTests;
    use HasResponseTests;
    use RefreshDatabase;

    abstract protected function model(): Model;

    abstract protected function modelName(): string;

    abstract protected function viewName(): string;

    abstract protected function user(): User;

    abstract protected function route(): string;
}

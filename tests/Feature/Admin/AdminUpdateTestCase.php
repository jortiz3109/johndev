<?php


namespace Tests\Feature\Admin;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Admin\Concerns\HasAuthorizationTests;
use Tests\Feature\Admin\Concerns\HasValidationTests;
use Tests\Feature\Admin\Posts\Concerns\HasValidationProviders;
use Tests\TestCase;

abstract class AdminUpdateTestCase extends TestCase
{
    use RefreshDatabase;
    use HasValidationTests;
    use HasAuthorizationTests;
    use WithFaker;
    use HasValidationProviders;

    protected string $method = 'put';
    protected Model $model;

    abstract protected function model(): Model;

    abstract protected function modelName(): string;

    abstract protected function user(): User;

    abstract protected function route(): string;
}

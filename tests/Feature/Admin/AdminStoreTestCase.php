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

abstract class AdminStoreTestCase extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    use HasAuthorizationTests;
    use HasValidationTests;
    use HasValidationProviders;

    protected string $method = 'post';

    abstract protected function model(): Model;

    abstract protected function modelName(): string;

    abstract protected function user(): User;

    abstract protected function route(): string;
}

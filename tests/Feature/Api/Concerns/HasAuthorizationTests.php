<?php

namespace Tests\Feature\Api\Concerns;

trait HasAuthorizationTests
{
    public function testAGuestUserCannotAccessToTheRoute()
    {
        $route = $this->route();
        $response = $this->json($this->method, $route);
        $response->assertUnauthorized();
    }
}

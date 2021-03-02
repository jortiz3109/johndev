<?php

namespace Tests\Feature\Admin\Concerns;

use App\Models\User;

trait HasValidationTests
{
    /**
     * @dataProvider validationDataProvider
     * @param string $field
     * @param string $value
     */
    public function testItValidatesData(string $field, string $value)
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->{$this->method}($this->route(), [
            $field => $value
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors($field);
    }
}

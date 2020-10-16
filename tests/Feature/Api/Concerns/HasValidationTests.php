<?php


namespace Tests\Feature\Api\Concerns;


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

        $response = $this->actingAs($user, 'api')->json($this->method, $this->route(), [
            $field => $value
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors($field);
    }
}

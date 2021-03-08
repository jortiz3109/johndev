<?php

namespace Tests\Feature\Admin\Concerns;

use Illuminate\Pagination\AbstractPaginator;

trait HasIndexTests
{
    public function testItHasACollection()
    {
        $user = $this->user();
        $response = $this->actingAs($user)->get($this->route());

        $response->assertViewHas($this->collectionName());
    }

    public function testItHasAPaginator()
    {
        $user = $this->user();
        $response = $this->actingAs($user)->get($this->route());

        $collection = $this->getDataItem($response, $this->collectionName());

        $this->assertInstanceOf(AbstractPaginator::class, $collection);
    }
}

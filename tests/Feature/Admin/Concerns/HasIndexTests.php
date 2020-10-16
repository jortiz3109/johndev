<?php

namespace Tests\Feature\Admin\Concerns;

use Illuminate\Pagination\AbstractPaginator;

trait HasIndexTests
{
    public function testItHasACollection()
    {
        $response = $this->get(route($this->route()));

        $response->assertViewHas($this->collection());
    }

    public function testItHasAPaginator()
    {
        $response = $this->get(route($this->route()));

        $collection = $this->getDataItem($response, $this->collection());

        $this->assertInstanceOf(AbstractPaginator::class, $collection);
    }

    public function testItHasACollectionOfCorrectModels()
    {
        $modelName = $this->model();
        $modelName::factory()->create();

        $response = $this->get(route($this->route()));
        $collection = $this->getDataItem($response, $this->collection());

        $this->assertInstanceOf($this->model(), $collection->first());
    }
}

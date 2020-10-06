<?php


namespace Tests\Feature\Admin\Concerns;


use Illuminate\Pagination\AbstractPaginator;

trait HasIndex
{
    public function testItReturnTheCorrectView()
    {
        $this->get(route($this->routeName()))->assertViewIs($this->viewName());
    }

    public function testItHasACollection()
    {
        $response = $this->get(route($this->routeName()));

        $response->assertViewHas($this->collectionName());
    }

    public function testItHasAPaginator()
    {
        $response = $this->get(route($this->routeName()));

        $collection = $this->getDataItem($response, $this->collectionName());

        $this->assertInstanceOf(AbstractPaginator::class, $collection);
    }

    public function testItHasACollectionOfCorrectModels()
    {
        $modelName = $this->modelName();
        $modelName::factory()->create();

        $response = $this->get(route($this->routeName()));
        $collection = $this->getDataItem($response, $this->collectionName());

        $this->assertInstanceOf($this->modelName(), $collection->first());
    }
}

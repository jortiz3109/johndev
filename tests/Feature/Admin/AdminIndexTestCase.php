<?php

namespace Tests\Feature\Admin;

use Tests\AdminTestCase;
use Tests\Feature\Admin\Concerns\HasIndex;

abstract class AdminIndexTestCase extends AdminTestCase
{
    use HasIndex;

    protected function viewName(): string
    {
        return static::VIEW_NAME;
    }

    protected function collectionName(): string
    {
        return static::COLLECTION_NAME;
    }

    protected function modelName(): string
    {
        return static::MODEL_NAME;
    }
}

<?php


namespace Tests\Feature\Admin\Authors;

use Tests\Feature\Admin\AdminStoreTestCase;
use Tests\Feature\Admin\Authors\Concerns\HasAuthor;
use Tests\Feature\Admin\Authors\Concerns\HasUser;
use Tests\Feature\Admin\Authors\Concerns\HasValidationProviders;

class StoreTest extends AdminStoreTestCase
{
    use HasAuthor;
    use HasUser;
    use HasValidationProviders;

    protected function route(): string
    {
        return route('admin.authors.store');
    }
}

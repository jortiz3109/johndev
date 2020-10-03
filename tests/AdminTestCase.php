<?php

namespace Tests;

use Tests\Feature\Admin\Concerns\HasResponseData;

abstract class AdminTestCase extends TestCase
{
    use HasResponseData;
}

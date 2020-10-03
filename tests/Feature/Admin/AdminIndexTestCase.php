<?php

namespace Tests\Feature\Admin;

use Tests\AdminTestCase;
use Tests\Feature\Admin\Concerns\HasIndex;

abstract class AdminIndexTestCase extends AdminTestCase
{
    use HasIndex;

    protected abstract function route(): string;

    protected abstract function view(): string;

    protected abstract function collection(): string;

    protected abstract function model(): string;
}

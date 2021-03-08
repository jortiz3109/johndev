<?php

namespace App\View\ViewModels\Admin\Authors;

use App\Models\Author;
use App\View\ViewModels\ViewModel;

class CreateViewModel extends ViewModel
{
    public function __construct()
    {
        parent::__construct(new Author());
    }

    protected function action(): string
    {
        return route('admin.authors.store');
    }

    protected function backRoute(): string
    {
        return route('admin.authors.index');
    }

    protected function title(): string
    {
        return trans('authors.titles.create');
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'author' => $this->model(),
        ]);
    }
}

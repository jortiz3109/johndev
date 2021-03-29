<?php

namespace App\View\ViewModels\Admin\Authors;

use App\View\ViewModels\ViewModel;

class EditViewModel extends ViewModel
{

    public function action(): string
    {
        return route('admin.authors.update', $this->model);
    }

    public function backRoute(): string
    {
        return route('admin.authors.show', $this->model);
    }

    public function title(): string
    {
        return trans('authors.titles.edit');
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'author' => $this->model(),
        ]);
    }
}

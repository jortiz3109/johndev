<?php

namespace App\View\ViewModels\Admin\Posts;

use App\View\ViewModels\ViewModel;

class EditViewModel extends ViewModel
{

    public function action(): string
    {
        return route('admin.posts.update', $this->model);
    }

    public function backRoute(): string
    {
        return route('admin.posts.show', $this->model);
    }

    public function title(): string
    {
        return trans('posts.titles.edit');
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'post' => $this->model(),
        ]);
    }
}

<?php

namespace App\View\ViewModels\Admin\Posts;

use App\Models\Post;
use App\View\ViewModels\ViewModel;

class CreateViewModel extends ViewModel
{
    public function __construct()
    {
        parent::__construct(new Post());
    }

    public function action(): string
    {
        return route('admin.posts.store');
    }

    public function backRoute(): string
    {
        return route('admin.posts.index');
    }

    public function title(): string
    {
        return trans('posts.titles.create');
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'post' => $this->model(),
        ]);
    }
}

<?php

namespace App\View\ViewModels;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;

abstract class ViewModel implements Arrayable
{
    protected Model $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function toArray(): array
    {
        return [
            'routes' => $this->routes(),
            'texts' => $this->texts(),
        ];
    }

    protected function routes(): array
    {
        return [
            'action' => $this->action(),
            'back' => $this->backRoute(),
        ];
    }

    protected function texts(): array
    {
        return [
            'title' => $this->title(),
            'back' => $this->backText(),
            'save' => $this->saveButton(),
        ];
    }

    protected function backText(): string
    {
        return trans('common.actions.back');
    }

    protected function saveButton(): string
    {
        return trans('common.actions.save');
    }

    protected function model(): Model
    {
        return $this->model;
    }

    abstract protected function action(): string;

    abstract protected function backRoute(): string;

    abstract protected function title(): string;
}

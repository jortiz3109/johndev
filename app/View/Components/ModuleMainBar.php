<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModuleMainBar extends Component
{
    public $title;

    /**
     * Create a new component instance.
     *
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.module-main-bar');
    }
}

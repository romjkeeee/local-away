<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreateButton extends Component
{
    public $title;
    public $route;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $route
     */
    public function __construct($title, $route)
    {
        $this->title = $title;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.create-button');
    }
}

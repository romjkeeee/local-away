<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ImageColumn extends Component
{
    public $image;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($image)
    {
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.image-column');
    }
}

<?php

namespace App\View\Components;

use App\SizingCategory;
use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Support\Collection;


class SizingCategorySelectStore extends Component
{
    public $sizing_category;

    /**
     * Create a new component instance.
     *
     * @param $sizing_category
     */
    public function __construct()
    {
        $sizing_category = SizingCategory::all()->pluck('title', 'id');
        $this->sizing_category = $sizing_category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.sizing-category-select-store');
    }
}

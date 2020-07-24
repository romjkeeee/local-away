<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ActionButtons extends Component
{
    public $show;
    public $edit;
    public $id;

    /**
     * Create a new component instance.
     *
     * @param $edit
     * @param $show
     * @param null $id
     */
    public function __construct($edit, $show, $id = null)
    {
        $this->edit = $edit;
        $this->show = $show;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.action-buttons');
    }
}

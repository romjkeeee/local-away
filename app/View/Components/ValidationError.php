<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class ValidationError extends Component
{
    public $errors;

    /**
     * Create a new component instance.
     *
     * @param $errors
     */
    public function __construct($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.validation-error');
    }
}

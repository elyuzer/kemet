<?php

namespace App\View\Components\w3\content;

use Illuminate\View\Component;

class auth-status extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.w3.content.auth-status');
    }
}

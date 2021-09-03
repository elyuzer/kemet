<?php

namespace App\View\Components\w3\content;

use Illuminate\View\Component;

class notification extends Component
{
    public $color;
    public $border;
    public $message;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color, $border, $message)
    {
        $this->color = $color;
        $this->border = $border;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.w3.content.notification');
    }
}

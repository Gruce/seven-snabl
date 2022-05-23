<?php

namespace App\View\Components\ui;

use Illuminate\View\Component;

class Card extends Component
{

    public $default;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->default = 'rounded-2xl py-4 px-4';

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ui.card');
    }
}

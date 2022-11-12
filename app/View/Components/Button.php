<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     * @param  string  $class
     * @param  string  $text
     * @return void
     */
    public $class;
    public $text;
    public $flag;
    public function __construct($class, $text,$flag="")
    {
        $this->text=$text;
        $this->class=$class;
        $this->flag=$flag;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}

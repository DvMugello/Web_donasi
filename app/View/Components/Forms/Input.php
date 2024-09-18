<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $id;
    public $type;
    public $class;
    public $placeholder;
    public $attribute;
    public $value;
    public function __construct($name, $type = 'text', $class = '', $placeholder = 'Type here', $attribute = '', $value = '')
    {
        $this->name = $name;
        $this->id = $name;
        $this->type = $type;
        $this->class = $class;
        $this->placeholder = $placeholder;
        $this->attribute = $attribute;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input');
    }
}

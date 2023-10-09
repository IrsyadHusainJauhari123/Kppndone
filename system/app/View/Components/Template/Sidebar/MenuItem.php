<?php

namespace App\View\Components\Template\Sidebar;

use Closure;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuItem extends Component
{
    /**
     * Create a new component instance.
     */
    public $url;
    public $class;
    public $label;

    public function __construct($url = null, $class = null, $label = null)
    {
        if (!$url) throw new Exception("Component Menu Item Memerlukan URL");
        $this->label = $label;
        $this->class = $class;
        $this->url = is_string($url) ? url($url) : "";
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.template.sidebar.menu-item');
    }
}

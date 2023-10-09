<?php

namespace App\View\Components\Template;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     */
    public $url;
    public $icon;
    public $title;
    public $active;
    public function __construct($url, $title, $icon)
    {
        $this->url = $url;
        $this->icon = $icon;
        $this->title = $title;
        $this->active = $this->checkActive();
    }


    public function checkActive()
    {
        $state = true;
        $url = $this->url;
        $arr_url = explode('/', $url);
        foreach ($arr_url as $key => $value) {
            $segment = request()->segment($key + 1);
            if ($segment != $value) $state = false;
        }
        return $state;
    }

    public function render(): View|Closure|string
    {
        return view('components.template.header');
    }
}

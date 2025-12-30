<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class paketMember extends Component
{
    /**
     * Create a new component instance.
     */

    public $paket;

    public function __construct($paket)
    {
        $this->paket = $paket;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.paket-member');
    }
}

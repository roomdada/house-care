<?php

namespace App\View\Components;

use App\Domain\Service\Domaine;
use Illuminate\View\Component;

class MyFooter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $category;
    public function __construct()
    {
        $this->category = Domaine::orderByDesc('created_at')->take(8)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.my-footer');
    }
}

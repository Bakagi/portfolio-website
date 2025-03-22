<?php



namespace App\View\Components\layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    
    public array $navigationItems = [];

    public function __construct()
    {
        $this->navigationItems = [
            [
                'label' => 'About',
                'href' => '#about',
            ],
            [
                'label' => 'Projects',
                'href' => '#portfolio',
            ],
            [
                'label' => 'training',
                'href' => '#training',
            ],
            [
                'label' => 'Contact',
                'href' => '#contact',
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.navbar');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Area;
use Livewire\Component;
use Livewire\WithPagination;
class AreaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $areas = Area::orderBy('created_at', 'desc')->paginate(6);
        return view('livewire.area-component', compact('areas'));
    }
}

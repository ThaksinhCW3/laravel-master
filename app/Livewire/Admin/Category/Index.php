<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $categories = Category::orderBy('id','DESC')->paginate(10); // Fix: variable name is $categories
        return view('livewire.admin.category.index', ['categories' => $categories]); // Fix: pass $categories
    }
}


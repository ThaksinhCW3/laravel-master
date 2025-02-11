<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $Product = Product::orderBy('id','DESC')->paginate(10); // Fix: variable name is $categories
        return view('livewire.admin.product.index', ['products' => $Product]); // Fix: pass $categories
    }
}


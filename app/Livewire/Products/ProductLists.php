<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Session;
use Livewire\WithPagination;

class ProductLists extends Component
{
    use WithPagination;

    public $p = '';


    public function render()
    {

        $products = Product::orderByDesc('id')->get();

        return view('products.index', ['products' => $products]);
    }
}

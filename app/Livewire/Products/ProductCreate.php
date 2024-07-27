<?php

namespace App\Livewire\Products;

use Livewire\Attributes\Layout;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Livewire\Component;


class ProductCreate extends Component
{

    public $p = '';
    // public $price = '';

    // public $cost = '';

    // public $description = '';

    // public $dimensions = '';

    // public $weight = '';
    // public $category_id = '';




    public function render(): View
    {
        $categories = Category::all();
        return view('livewire.products.product-create', ['categories' => $categories]);

    }


    public function create()
    {

    }
}

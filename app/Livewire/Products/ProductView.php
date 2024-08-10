<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;

#[Title('Chi tiết sản phẩm')]
class ProductView extends Component
{

    public $category_id = '';
    public $product;

    public function mount($id)
    {
        $this->product = Product::with('stocks.shelf')->findOrFail($id);
    }
    public function render()
    {
        return view('livewire.products.product-view');
    }
}

<?php

namespace App\Livewire\Products;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Session;
use Livewire\WithPagination;

class ProductLists extends Component
{
    use WithPagination;

    public $q;
    public $categories;
    public $products;
    public $category_id = 'all';
    public $orderBy = 'id';
    public $sortBy = 'desc';



    public function updatedQ()
    {
        $this->q = trim($this->q);
        $this->products = Product::where('name', 'like', "%" . $this->q . "%")->orderBy('id', 'desc')->get();
    }

    public function updatedCategoryId()
    {
        $this->category_id = trim($this->category_id);

    }
    public function updatedSortBy()
    {
        $this->sortBy = trim($this->sortBy);

    }

    public function updatedOrderBy()
    {
        $this->orderBy = trim($this->orderBy);

    }

    public function mount()
    {
        $this->categories = Category::select('id', 'name')->orderBy('id', 'desc')->get();
        $this->products = Product::with('stocks.shelf')->where('name', 'like', "%" . $this->q . "%")->orderBy('id', 'desc')->get();
    }

    public function applyFilter()
    {
        if ($this->category_id === 'all' && $this->orderBy == 'id' && $this->sortBy == 'desc') {
            $this->products = Product::orderBy($this->orderBy, $this->sortBy)->get();
        } elseif ($this->category_id === 'all' && $this->orderBy === 'name' && $this->sortBy == 'desc') {
            $this->products = Product::orderBy($this->orderBy, $this->sortBy)->get();
        } elseif (!$this->category_id === 'all' && $this->orderBy === 'name' && $this->sortBy == 'desc') {
            $this->products = Product::where('category_id', $this->category_id)->orderBy($this->orderBy, $this->sortBy)->get();
        } elseif (!$this->category_id === 'all' && $this->orderBy === 'price') {
            $this->products = Product::where('category_id', $this->category_id)->orderBy('price', 'asc')->get();
        } elseif ($this->category_id === 'all' && $this->orderBy === 'price') {
            $this->products = Product::orderBy('price', 'desc')->get();
        } elseif ($this->category_id === 'all' && $this->sortBy === 'desc' && $this->orderBy === 'price') {
            $this->products = Product::orderBy('price', 'desc')->get();
        } elseif (!$this->category_id === 'all' && $this->sortBy === 'asc') {
            $this->products = Product::where('category_id', $this->category_id)->orderBy('price', 'asc')->get();
        } elseif ($this->category_id === 'all' && $this->sortBy === 'asc') {
            $this->products = Product::orderBy('name', 'asc')->get();
        } else {
            $this->products = Product::where('category_id', $this->category_id)->orderBy($this->orderBy, $this->sortBy)->get();
        }
    }



    public function render()
    {
        return view(
            'livewire.products.product-lists',
        );
    }

}

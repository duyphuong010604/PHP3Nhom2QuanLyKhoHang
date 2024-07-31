<?php

namespace App\Livewire\Products;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Shelf;
use Livewire\Attributes\Session;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

#[Title('Danh sách sản phẩm')]
class ProductLists extends Component
{
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;

    public $q = null;
    public $categories = [];
    public $products = [];
    public $category_id = 'all';
    public $orderBy = 'id';
    public $confirmingProjectDeletion = false;
    public $projectIdToDelete = false;

    public function updatedQ()
    {
        $this->q = trim($this->q);
        $this->resetPage();
        $this->loadProducts();
    }

    public function mount()
    {
        $this->categories = Category::select('id', 'name')->orderBy('id', 'desc')->get();
        $this->loadProducts();
    }

    public function loadProducts()
    {

        $query = Product::with('stocks.shelf');
        if ($this->q === null) {
            $query
                ->orderBy($this->orderBy, 'desc');

        } else {
            $query
                ->where('name', 'like', "%" . $this->q . "%")
                ->orderBy($this->orderBy, 'desc');
        }
        $this->products = $query->get();
        return $this->products;
    }


    public function applyFilter()
    {

        $query = Product::query();

        if ($this->category_id !== 'all') {
            $query->where('category_id', $this->category_id);
        }

        if ($this->orderBy === 'price') {
            $sortOrder = 'desc';
            $query->orderBy('price', $sortOrder);
        } else {
            $sortOrder = 'asc';
            $query->orderBy('price', $sortOrder);
        }

        $this->products = $query->get();
    }

    public function render()
    {
        return view(
            'livewire.products.product-lists',
            [
                'products' => $this->products,
            ]
        );
    }
    public function confirmProjectDeletion($projectId)
    {
        $this->confirmingProjectDeletion = true;
        $this->projectIdToDelete = $projectId;
    }

    public function deleteProject()
    {
        $stock = Stock::where('product_id', $this->projectIdToDelete)->get();
        if (count($stock) > 0) {
            $this->showAlert('error', 'Xóa thất bại!');
        } else {
            $this->showAlert('success', 'Xóa sản phẩm thành công!');
            Product::find($this->projectIdToDelete)->delete();
            $this->products = Product::all(); // Cập nhật danh sách dự án
            $this->confirmingProjectDeletion = false;
            $this->projectIdToDelete = null;
        }
    }
    public $productId = [];
    public $selectAll = false;
    public $showDeleteButton = false;
    public function checkAll()
    {
        if ($this->selectAll) {
            $this->productId = Product::pluck('id')->toArray();
        } else {
            $this->productId = [];
        }
        $this->updateDeleteButton();
    }
    public function updateDeleteButton()
    {
        $this->showDeleteButton = count($this->productId) > 0;
    }
    public $productStock = true;
    public function deleteSelected()
    {
        $this->productStock = Stock::select('product_id')->pluck('product_id')->toArray();
        // láy chung
        $commonElements = array_intersect($this->productStock, $this->productId);
        //lấy riêng
        $productIdDelete = array_diff($this->productId, $this->productStock);
        if (count($commonElements) > 0) {
            $this->showAlert('error', 'Xóa thất bại!', 'Do có sản phẩm đang chờ xử lý.');
        } else {
            foreach ($productIdDelete as $item) {
                Product::find($item)->delete();
                $this->products = Product::all(); // Cập nhật danh sách dự án
            }
            $this->showAlert('success', 'Xóa sản phẩm thành công!');
            $this->selectAll = false;
            $this->showDeleteButton = false;
            $this->productId = [];
        }
    }


    public function showAlert($status, $message, $text = '')
    {
        $this->alert($status, $message, [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => false,
            'text' => $text,
        ]);
    }

}

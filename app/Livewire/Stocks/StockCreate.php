<?php

namespace App\Livewire\Stocks;

use App\Models\Product;
use Livewire\Component;
use App\Repositories\Stocks\StocksRepository;
use App\Models\Shelf;
use App\Models\Stock;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class StockCreate extends Component
{

    use LivewireAlert;

    protected $stocksRepository;

    public $product_id = '';

    public $shelf_id = '';

    public $quantity = '';

    public $section = '';

    public $status = '';

    public $stock;

    public $products;

    public $sheves;
    public function rules()
    {
        return [
            'product_id' => 'required',
            'shelf_id' => 'required',
            'quantity' => 'required|numeric|min:1',
            'section' => 'required',
            'status' => 'required'
        ];
    }
    public function mount(StocksRepository $stocksRepository)
    {
        $this->stocksRepository = $stocksRepository;
        $this->stock = Stock::with(['shelf', 'product'])->get();
        $this->products = Product::all();
        $this->sheves = Shelf::all();
        // dd($this->stock);
    }




    public function render()
    {
       
        return view('livewire.stocks.stock-create');
    }




    public function addStock()
    {
        $validated = $this->validate();

        $stocks = Stock::create([
            'product_id' => $this->product_id,
            'shelf_id' => $this->shelf_id,
            'quantity' => $this->quantity,
            'section' => $this->section,
            'status' => $this->status
        ]);

        if ($stocks) {
            $this->alert('success', 'Thêm sản phẩm mới thành công!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
            $this->reset([
                "product_id",
                "shelf_id",
                "quantity",
                "section",
                "status",
            ]);
        }
    }

    public function messages()
    {
        return [
            'product_id.required' => 'Vui lòng chọn loại sản phẩm.',
            'shelf_id.required' => 'Vui lòng chọn kệ hàng.',
            'quantity.required' => 'Vui lòng nhập số lượng.',
            'quantity.numeric' => 'Số lượng phải là một số.',
            'quantity.min' => 'Số lượng phải lớn hơn 0.',
            'section.required' => 'Vui lòng chọn phân khu.',
            'status.required' => 'Vui lòng chọn trạng thái.'
        ];
    }
}

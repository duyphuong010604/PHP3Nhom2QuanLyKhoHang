<?php

namespace App\Livewire\Stocks;

use Livewire\Component;
use App\Repositories\Stocks\StocksRepository;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class StockUpdate extends Component{
    
    use LivewireAlert;


    public $product_id = '';

    public $shelf_id = '';

    public $quantity = '';

    public $section = '';

    public $status = '';

    public $stock;


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
    
    protected $stocksRepository;

    public function mount(StocksRepository $stocksRepository)
    {
        $this->stocksRepository = $stocksRepository;
    }

    public function render()
    {
        return view('livewire.stocks.stock-update');
    }
}
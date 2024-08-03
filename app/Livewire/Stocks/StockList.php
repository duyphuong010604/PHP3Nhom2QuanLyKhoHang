<?php

namespace App\Livewire\Stocks;

use Livewire\Component;
use App\Repositories\Stocks\StocksRepository;

class StockList extends Component
{

    public $stocks;

    public $totalQuantity;

    public $productId;


    protected $stocksRepository;

    public function mount(StocksRepository $stocksRepository)
    {
        $this->stocksRepository = $stocksRepository;
        $this->stocks = $this->stocksRepository->getAll();
        // dd($this->stocks);
        
    }

    public function render()
    {
        return view('livewire.stocks.stock-list');
    }
}

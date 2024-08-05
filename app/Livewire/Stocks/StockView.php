<?php

namespace App\Livewire\Stocks;

use Livewire\Component;
use App\Repositories\Stocks\StocksRepository;

class StockView extends Component{
    
    protected $stocksRepository;

    public $stocks;

    public $id;

    public $collection;

   public function mount(StocksRepository $stocksRepository, $id)
    {
        $this->stocksRepository = $stocksRepository;
        $this->id = $id;
        $this->stocks = $this->stocksRepository->getOne($id);
        // dd($this->stocks);
    }


 
    public function render()
    {
        return view('livewire.stocks.stock-view');
    }
}
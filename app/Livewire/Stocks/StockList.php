<?php

namespace App\Livewire\Stocks;

use Livewire\Component;
use App\Repositories\Stocks\StocksRepository;
use App\Models\Shelf;

class StockList extends Component
{
    public $q= null;

    public $stocks;

    public $shelf;

    public $shelf_id = 'all';
    public $orderBy = 'id';
    public $sortBy = 'desc';

    public $totalQuantity;

    public $productId;


    protected $stocksRepository;

    public function mount(StocksRepository $stocksRepository)
    {
        $this->stocksRepository = $stocksRepository;
        $this->stocks = $this->stocksRepository->getAll();
        $this->shelf = Shelf::select('id', 'name')->orderBy('id', 'asc')->get();
        // dd($this->stocks);
        
    }

    public function applyFilter()
    {
        $query = Shelf::with('stocks');
        // dd($this->shelf_id);
        if ($this->shelf_id !== 'all') {
            $query->where('id', $this->shelf_id);
        }
        // if ($this->orderBy === 'name') {
        //     $sortOrder = 'asc';
        //     $query->orderBy('name', $sortOrder);
        // }

        // dd($query); 

        return $this->stocks = $query;
    }

    public function render()
    {
        return view('livewire.stocks.stock-list');
    }
}

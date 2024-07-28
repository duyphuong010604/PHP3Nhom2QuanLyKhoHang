<?php

namespace App\Livewire\Stocks;

use Livewire\Component;
use App\Repositories\Stocks\StockRepository;

class StockList extends Component
{

    protected $stocksRepository;

    public function __construct(StockRepository $stockRepository)
    {
        $this->stocksRepository = $stockRepository;
    }

    public function render()
    {
        $stocks = $this->stocksRepository->getAll();

        return view('stocks.index', [
            'stocks' => $stocks,
        ]);
    }
}

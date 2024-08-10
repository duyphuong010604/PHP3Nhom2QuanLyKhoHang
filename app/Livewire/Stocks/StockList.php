<?php

namespace App\Livewire\Stocks;

use Livewire\Component;
use App\Repositories\Stocks\StocksRepository;
use App\Models\Shelf;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('Danh sách tồn kho')]
class StockList extends Component
{
    use WithPagination;
    public $q = null;

    protected $sheves;

    public $shelf;

    public $shelf_id = 'all';
    public $orderBy = 'id';
    public $sortBy = 'desc';

    public $totalQuantity;

    public $productId;

    public $search = null;


    public function updatedSearch()
    {
        $this->search = trim($this->search);
    }
    public function loadShelf()
    {
        $shelves = Shelf::with([
            'stocks',
            'inboundShipments.inboundShipmentDetails',
            'outboundShipments.outboundShipmentDetails'
        ])
            ->when($this->search, function ($query) {
                return $query->where('name', 'like', "%" . $this->search . "%");
            })
            ->orderBy('id', 'asc')
            ->paginate(4);

        $shelves->getCollection()->transform(function ($shelf) {
            $totalStockQuantity = $shelf->stocks->sum('quantity');
    
            $shelf->total_quantity = $totalStockQuantity;
            
            return $shelf;
        });

        return $shelves;

    }

    public function boot()
    {
        $this->sheves = $this->loadShelf();
    }

    public function render()
    {
        return view('livewire.stocks.stock-list');
    }
}

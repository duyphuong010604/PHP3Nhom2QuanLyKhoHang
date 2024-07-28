<?php

namespace App\Repositories\Stocks;

use App\Models\Stock;

class StockRepository {
    

    public function getAll(){
        return Stock::all();
    }
}
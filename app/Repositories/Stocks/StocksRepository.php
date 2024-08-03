<?php

namespace App\Repositories\Stocks;

use App\Models\Shelf;
use App\Models\Stock;

class StocksRepository
{


    public function getAll()
    {
        return Shelf::with('stocks')->get();
    }

    public function getOne($id)
    {
        $shelf = Shelf::with(['stocks.product'])->find($id);
        $products = $shelf->stocks->map(function ($stock) {
            return $stock->product;
        });

        $result = [
            'shelf' => $shelf,
            'products' => $products
        ];
        return $result;
    }

    public function createNew(array $data){
        return Stock::create($data);
    }
}
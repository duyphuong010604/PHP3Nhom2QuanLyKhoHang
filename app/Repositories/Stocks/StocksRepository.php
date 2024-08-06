<?php

namespace App\Repositories\Stocks;

use App\Models\Shelf;
use App\Models\Stock;
use App\Models\Product;

class StocksRepository
{


    public function getAll()
    {
        $shelves = Shelf::with([
            'stocks',
            'inboundShipments.inboundShipmentDetails'
        ])->get();
        
        $results = $shelves->map(function ($shelf) {
            $stockQuantity = $shelf->stocks->sum('quantity');
            $inboundQuantity = $shelf->inboundShipments->flatMap(function ($shipment) {
                return $shipment->inboundShipmentDetails;
            })->sum('quantity');
            $totalQuantity = $stockQuantity + $inboundQuantity;
        
            return [
                'shelf_id' => $shelf->id,
                'shelf_name' => $shelf->name,
                'shelf_section' => $shelf->section,
                'stock_quantity' => $stockQuantity,
                'inbound_quantity' => $inboundQuantity,
                'total_quantity' => $totalQuantity,
            ];
        });
        
        return $results;

    }

    public function getOne($id)
    {
        $shelf = Shelf::with([
            'inboundShipments.inboundShipmentDetails.product',
            'outboundShipments.outboundShipmentDetails.product',
            'stocks.product'
        ])->findOrFail($id);
    
        $transactions = [];
        $transactions_out =[];
    

        foreach ($shelf->inboundShipments as $inboundShipment) {
            foreach ($inboundShipment->inboundShipmentDetails as $detail) {
                $transactions[] = [
                    'shelf_name' => $shelf->name,
                    'shelf_section' => $shelf->section,
                    'product_name' => $detail->product->name,
                    'transaction_type' => 'Inbound',
                    'quantity' => $detail->quantity,
                    'inbound_id' => $inboundShipment->id,
                    'transaction_date' => $inboundShipment->created_at,
                    'stock_quantity' => $shelf->stocks->where('product_id', $detail->product_id)->sum('quantity')
                ];
            }
        }
        foreach ($shelf->outboundShipments as $outboundShipment) {
            foreach ($outboundShipment->outboundShipmentDetails as $detail) {
                $transactions_out[] = [
                    'shelf_name' => $shelf->name,
                    'shelf_section' => $shelf->section,
                    'product_name' => $detail->product->name,
                    'transaction_type' => 'Outbound',
                    'quantity' => $detail->quantity,
                    'outbound_id' => $detail->id,
                    'transaction_date' => $outboundShipment->created_at,
                    'stock_quantity' => $shelf->stocks->where('product_id', $detail->product_id)->sum('quantity')
                ];
            }
        }
    

    
        return [
            'shelf' => $shelf,
            'transactions' => $transactions,
            'transactions_out' => $transactions_out
        ];
    }

    public function createNew(array $data)
    {
        return Stock::create($data);
    }
}
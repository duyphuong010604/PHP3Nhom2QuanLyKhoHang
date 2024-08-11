<?php

namespace App\Livewire\Stocks;

use Livewire\Component;
use App\Models\Shelf;


class StockView extends Component
{


    protected $shelf;

    protected $transactions;
    protected $transactions_out;
    public $id;

    public $shelf_id = 'all';
    public $orderBy = 'id';
    public $sortBy = 'desc';

    public $search = null;


    public function updatedSearch()
    {
        $this->search = trim($this->search);
    }
    public function loadShelf($id)
    {
        $shelf = Shelf::with([
            'inboundShipments.inboundShipmentDetails.product',
            'outboundShipments.outboundShipmentDetails.product',
            'stocks.product'
        ])->findOrFail($id);

        $transactions = [];
        $transactions_out = []; // Khởi tạo mảng này để tránh lỗi
        $productOutboundQuantities = [];

        // Lọc các lô hàng xuất theo ID giảm dần
        $outboundShipments = $shelf->outboundShipments->sortByDesc('id');

        // Tạo một mảng để lưu trữ số lượng xuất cho mỗi sản phẩm
        foreach ($outboundShipments as $outboundShipment) {
            foreach ($outboundShipment->outboundShipmentDetails as $detail) {
                if (!isset($productOutboundQuantities[$detail->product_id])) {
                    $productOutboundQuantities[$detail->product_id] = 0;
                }
                $productOutboundQuantities[$detail->product_id] += $detail->quantity;
            }
        }

        // Lọc các lô hàng nhập theo ID giảm dần
        $inboundShipments = $shelf->inboundShipments->sortByDesc('id');

        // Thêm các giao dịch nhập và số lượng xuất kho
        foreach ($inboundShipments as $inboundShipment) {
            foreach ($inboundShipment->inboundShipmentDetails as $detail) {
                $productId = $detail->product_id;
                $inboundQuantity = $detail->quantity;
                $stockQuantity = $shelf->stocks->where('product_id', $productId)->sum('quantity');
                $outboundQuantity = $productOutboundQuantities[$productId] ?? 0;
                $transactions[] = [
                    'shelf_name' => $shelf->name,
                    'shelf_section' => $shelf->section,
                    'product_name' => $detail->product->name,
                    'product_id' => $detail->product->id,
                    'transaction_type' => 'Inbound',
                    'quantity' => $inboundQuantity,
                    'inbound_id' => $inboundShipment->id,
                    'transaction_date' => $inboundShipment->created_at,
                    'stock_quantity' => $stockQuantity,
                    'outbound_quantity' => $outboundQuantity,
                    'total_quantity' => $stockQuantity + $inboundQuantity - $outboundQuantity
                ];
            }
        }

        if (empty($transactions)) {
            $transactions[] = [
                'shelf_name' => $shelf->name,
                'shelf_section' => $shelf->section,
                'product_name' => '',
                'product_id' => '',
                'transaction_type' => 'Inbound',
                'quantity' => 0,
                'inbound_id' => '',
                'transaction_date' => '',
                'stock_quantity' => 0,
                'outbound_quantity' => 0,
                'total_quantity' => 0
            ];
        }

        foreach ($outboundShipments as $outboundShipment) {
            foreach ($outboundShipment->outboundShipmentDetails as $detail) {
                $productId = $detail->product_id;
                $outboundQuantity = $detail->quantity;

                $transactions_out[] = [
                    'shelf_name' => $shelf->name,
                    'shelf_section' => $shelf->section,
                    'product_name' => $detail->product->name,
                    'transaction_type' => 'Outbound',
                    'quantity' => $outboundQuantity,
                    'outbound_id' => $outboundShipment->id,
                    'transaction_date' => $outboundShipment->created_at,
                ];
            }
        }

        if (empty($transactions_out)) {
            $transactions_out[] = [
                'shelf_name' => $shelf->name,
                'shelf_section' => $shelf->section,
                'product_name' => '',
                'transaction_type' => 'Outbound',
                'quantity' => 0,
                'outbound_id' => '',
                'transaction_date' => ''
            ];
        }

        return [
            'transactions' => $transactions,
            'transactions_out' => $transactions_out
        ];
    }

    public function mount($id)
    {
        $this->id = $id;
        $shelfData = $this->loadShelf($id);
        $this->transactions = $shelfData['transactions'];
        $this->transactions_out = $shelfData['transactions_out'];
    }



    public function render()
    {
        return view('livewire.stocks.stock-view');
    }
}
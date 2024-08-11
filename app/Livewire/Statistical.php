<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Customer;
use App\Models\InboundShipment;
use App\Models\InboundShipmentDetails;
use App\Models\OutboundShipment;
use App\Models\OutboundShipmentDetails;
use App\Models\Product;
use App\Models\Shelf;
use App\Models\Stock;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Livewire\Attributes\On;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

class Statistical extends Component
{
    public $countTable = [];
    public $sumQuantityTable = [];
    public $currentDateTime;
    public $week;
    public $selectWeek;
    protected $weekNow;
    protected $yearNow;
    protected $chart1;
    public $statisticalInbound;
    protected $dataInbound = [];
    public $dateIn;
    public $countIn;
    public $sumIn;

    protected $dataOutbound = [];
    public $dateOut;
    public $countOut;
    public $sumOut;

    public $loinhuan;
    public $stockPrice;
    public $sumTotalPriceIn;
    public $sumTotalPriceOut;
    public function boot()
    {

        $this->weekNow = InboundShipment::select(DB::raw('MAX(WEEK(created_at, 1)) AS max_week'))
            ->first();
        $this->yearNow = InboundShipment::selectRaw('MAX(YEAR(created_at)) AS max_year')->first();

        $this->currentDateTime = date('Y-m-d H:i:s');
        $this->statisticalInbound = $this->statisticalDate(InboundShipment::query(), $this->weekNow->max_week, $this->yearNow->max_year);

        $this->countTable = [
            'products' => $this->dem(Product::all()),
            'customers' => $this->dem(Customer::all()),
            'outbound' => $this->dem(OutboundShipment::all()),
            'inbound' => $this->dem(InboundShipment::all()),
            'shelf' => $this->dem(Shelf::all()),
            'supplier' => $this->dem(Supplier::all()),
            'category' => $this->dem(Category::all()),
        ];

        $this->sumQuantityTable = [
            'stock' => $this->sumQuantity(Stock::all()),
            'outbound' => $this->sumQuantity(OutboundShipmentDetails::all()),
            'inbound' => $this->sumQuantity(InboundShipmentDetails::all()),
        ];

        $this->week = ($this->week_date(InboundShipment::query()));


        //bieudo
        $this->dataInbound = $this->loadDate(InboundShipment::query());
        foreach ($this->dataInbound as $value) {
            $this->dateIn[] = $value->day;
            $this->countIn[] = $value->total_orders;
            $this->sumIn[] = $value->total_amount;
        }


        $this->dataOutbound = $this->loadDate(OutboundShipment::query());
        foreach ($this->dataOutbound as $value) {
            $this->dateOut[] = $value->day;
            $this->countOut[] = $value->total_orders;
            $this->sumOut[] = $value->total_amount;
        }

        $this->loinhuan = $this->sumTotalAmount(OutboundShipment::query()) - $this->sumTotalAmount(InboundShipment::query());
        $this->sumTotalPriceIn = $this->sumTotalAmount(InboundShipment::query());
        $this->sumTotalPriceOut = $this->sumTotalAmount(OutboundShipment::query());
        $this->stockPrice = $this->calculateTotalValue();

    }


    public function render()
    {

        $this->week = $this->week_date(InboundShipment::query());
        return view('livewire.statistical');
    }

    public function dem($table)
    {
        $query = $table->count('id');
        return $query;
    }

    public function sumQuantity($table)
    {
        $query = $table->sum('quantity');
        return $query;
    }

    public function sumTotalAmount($table)
    {
        $query = $table->sum('totalAmount');
        return $query;
    }

    public function calculateTotalValue()
    {
        $totalValue = DB::table('stocks')
            ->join('products', 'stocks.product_id', '=', 'products.id')
            ->where('stocks.quantity', '>', 0)
            ->sum(DB::raw('stocks.quantity * products.price'));

        return $totalValue;
    }


    public function statisticalDate($table, $week, $year)
    {
        $query = $table->select(
            DB::raw('DATE(created_at) AS day'),
            DB::raw('COUNT(*) AS total_orders'),
            DB::raw('SUM(totalAmount) AS total_amount'),
            DB::raw('WEEK(created_at, 1) AS week_of_year'),
            DB::raw('MONTH(created_at) AS month'),
            DB::raw('YEAR(created_at) AS year')
        )
            ->whereRaw('YEAR(created_at) = ? AND WEEK(created_at, 1) = ?', [$year, $week])
            ->groupBy(DB::raw('DATE(created_at), WEEK(created_at, 1), MONTH(created_at), YEAR(created_at)'))
            ->orderBy(DB::raw('DATE(created_at)'))
            ->get();
        return $query;
    }


    public function week_date($table)
    {
        $query = $table->select(
            DB::raw('WEEK(created_at, 1) AS week_of_year'),
            DB::raw('YEAR(created_at) AS year')
        )
            ->groupBy(DB::raw('WEEK(created_at, 1), YEAR(created_at)'))
            ->orderBy(DB::raw('week_of_year '))
            ->get();
        return $query;
    }

    public function loadWeekNow($table)
    {
        $query = $table
            ->select(DB::raw('MAX(WEEK(created_at, 1)) AS max_week_of_year'))
            ->first();
        return $query;
    }

    public function loadYearNow($table)
    {
        $query = $table
            ->select(DB::raw('MAX(WEEK(created_at, 1)) AS max_week_of_year'))
            ->first();
        return $query;
    }

    public function loadDate($table)
    {
        $query = $table->selectRaw('DATE(created_at) AS day')
            ->selectRaw('COUNT(id) AS total_orders')
            ->selectRaw('SUM(totalAmount) AS total_amount')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('day')
            ->orderBy('day')->
            get();

        return $query;
    }


}

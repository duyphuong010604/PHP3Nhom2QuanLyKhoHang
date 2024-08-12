<?php

namespace App\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;
use App\Models\OutboundShipment;
use Livewire\Attributes\Title;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\OutboundShipmentDetails;

#[Title('Thông tin khách hàng')]

class CustomerView extends Component
{
    public $customer;

public $ttcustomer;



    public $typeExport = 'pdf';


    public function export($id,$idc)
    {

        $data = [
            'outbounds' => OutboundShipment::Where('id',$id)->orderBy('id','asc')->get(),
            'customers' => Customer::Where('id',$idc)->orderBy('id','asc')->get(), // Sử dụng mô hình và dữ liệu bạn cần xuất
            'outboundetails' => OutboundShipmentDetails::with('product')->Where('outbound_shipment_id',$id)->orderBy('id','asc')->get()
        ];


        $options = new Options();
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(view('exports.outbound-pdf', $data)->render());
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        // $this->resetPage();
        return response()->streamDownload(function () use ($dompdf) {
            echo $dompdf->output();
        }, 'outbound.pdf');
    }





    public function mount($id)
    {
        $this->getcustomer($id);


    }

    public function getcustomer($id){
        $this->customer = Customer::findOrFail($id);
    }


    public function render()
    {
        return view('livewire.customers.customer-view'
        );
    }
}

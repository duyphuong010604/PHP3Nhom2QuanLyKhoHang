<?php

namespace App\Livewire\InboundShipments;

use Livewire\Component;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\InboundShipment;
use App\Models\InboundShipmentDetails;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Shelf;
use App\Repositories\Interfaces\InboundShipmentRepositoryInterface;

use Livewire\Attributes\Validate;
class InboundShipmentCreate extends Component
{
    // newProduct
    use LivewireAlert;

    #[Validate('required', message: 'Vui lòng nhập tên sản phẩm.')]
    #[Validate('min:3', message: 'Vui lòng nhiều hơn 3 kí tự.')]
    public $nameN = '';
    #[Validate('required', message: 'Vui lòng nhập thông tin sản phẩm.')]
    public $categoryIdN = '';
    #[Validate('required', message: 'Vui lòng nhập giá nhập.')]
    #[Validate('min:100', message: 'Vui lòng nhiều hơn 100 vnđ.')]
    #[Validate('numeric', message: 'Vui lòng nhập đúng định dạng tiền tệ.')]
    #[Validate('lt:priceN', message: 'Vui lòng cho giá bán thấp hơn giá nhập.')]
    public $costN = '';
    #[Validate('required', message: 'Vui lòng nhập giá bán.')]
    #[Validate('min:100', message: 'Vui lòng nhiều hơn 100 vnđ.')]
    #[Validate('numeric', message: 'Vui lòng nhập đúng định dạng tiền tệ.')]
    #[Validate('gt:costN', message: 'Vui lòng cho giá bán cao hơn giá nhập.')]
    public $priceN = '';
    



    #[Validate('required', message: 'Vui lòng nhập mã sản phẩm.')]
    #[Validate('numeric', message: 'Vui lòng nhập đúng định dạng mã sãn phẩm.')]
    #[Validate('min:100000000000', message: 'Vui lòng nhập mã theo chuẩn ENV13.')]
    #[Validate('min:999999999999', message: 'Vui lòng nhập mã theo chuẩn ENV13.')]
    #[Validate('unique:products,sku', message: 'Mã sãn phẩm đã có.')]
    public $skumodal = '';

  
    public $searchTerm;
    public $user_id=1;
    public $categories;
    public $supplier_id;
    public $supplier_email;
    public $supplier_notes;
    public $shelf_id;
    public $totalAmount=0;
    public $remarks;
    public $subtotal;
    public $shelf_name;
    public $total;
    public $price = [];
    public $status = 'draft';
    public $product;
   
    public $productExists = false;
   


    public $quantity;
    public $unitPrice;
    public $totalPrice;
    public $created_at;
    public $shipment_number;
    public $due_date;
    public $name;
    public $shelf_notes;
public $sku;

    
public $h1;

    protected $inboundShipmentRepository;
    public $suppliers = [];
    public $shelves = [];
    public $allProducts = [];
    public $products = [];
    public $result;
    public $searchResults = [];
    public $testsku="";
    public $showSuggestion = false;
    public $scanner;
 
    public function updatedScanner(){
        $this->scanner = "";
    }
    public function updated($value)
    {
        $this->totalAmount=0;
        // Kiểm tra nếu thuộc tính quantity hoặc price thay đổi để cập nhật subtotal
        foreach ($this->products as $index => $product) {
            $this->products[$index]['totalPrice'] = $this->products[$index]['quantity'] * $this->products[$index]['price'];
            
            $this->totalAmount += $this->products[$index]['totalPrice'];
        }
    }
    public function productCodeExists($sku)
    {
        return Product::whereSku($sku)->exists();
    }
public function updatingScanner($value){
    \Log::info("value sku updated to: ".$value );
    // dd($value);
    $scanProduct = Product::where('sku',$value )->first();
    // dd($scanProduct);
        if ($scanProduct) {
            // Kiểm tra từng sản phẩm trong mảng products
            foreach ($this->products as $index => $product) {
                if ($product['sku'] === $scanProduct->sku) {
                    // Nếu SKU trùng, tăng số lượng lên 1
                   
                   
                    $this->products[$index]['quantity'] += 1;
                    $this->products[$index]['totalPrice'] = $this->products[$index]['quantity'] * $this->products[$index]['price'];
                    $this->testsku = 'Sản phẩm đã được cập nhật';
             
                    return;
                }
            }
            

            // Nếu không tìm thấy SKU trong products, thêm sản phẩm mới
            $this->products[] = [
                'product_id' => $scanProduct->id,
                'name' => $scanProduct->name,
                'quantity' => 1,
                'price' => $scanProduct->price,
                'totalPrice' => $scanProduct->price,
                'sku' => $scanProduct->sku,
                'description' => $scanProduct->description,
            ];
            $this->testsku = 'Sản phẩm đã được thêm vào danh sách';
         
        } else {
            // Nếu không tìm thấy sản phẩm
            $this->testsku = 'Không tìm thấy sản phẩm, bạn có thể thêm sản phẩm ở bên dưới';
        }
    
        // Xóa giá trị trong trường quét SKU sau khi xử lý
        $this->scanner  = "";

}
public function newProduct()
    {
        
        $validated = $this->validate();
       
        $products = Product::create([
            "name" => $this->nameN,
            "price" => $this->priceN,
            "cost" => $this->costN,
            "category_id" => $this->categoryIdN,
            'sku' => $this->skumodal,
        ]);

        if ($products) {
            $this->alert('success', 'Thêm sản phẩm mới thành công!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
            $this->reset([
                "nameN",
                "priceN",
                "costN",
                "skumodal",
                "categoryIdN",
            ]);
        }
    }
    //   public function updatingSku_scan($value)
    
    // {

    // \Log::info("value sku updated to: ".$this->sku_scan );
    //     // Kiểm tra phương thức có được gọi không
     
    
    //     // Tìm sản phẩm bằng SKU
    //     $scanProduct = Product::where('sku', )->first();
    //     if ($scanProduct) {
    //         // Kiểm tra từng sản phẩm trong mảng products
    //         foreach ($this->products as $index => $product) {
    //             if ($product['sku'] === $scanProduct->sku) {
    //                 // Nếu SKU trùng, tăng số lượng lên 1
    //                 $this->products[$index]['quantity'] += 1;
    //                 $this->products[$index]['totalPrice'] = $this->products[$index]['quantity'] * $this->products[$index]['unitPrice'];
    //                 $this->testsku = 'Sản phẩm đã được cập nhật';
    //                 return;
    //             }
    //         }
    
    //         // Nếu không tìm thấy SKU trong products, thêm sản phẩm mới
    //         $this->products[] = [
    //             'product_id' => $scanProduct->id,
    //             'quantity' => 1,
    //             'unitPrice' => $scanProduct->price,
    //             'totalPrice' => $scanProduct->price,
    //             'sku' => $scanProduct->sku,
    //             'description' => $scanProduct->description,
    //         ];
    //         $this->testsku = 'Sản phẩm đã được thêm vào danh sách';
    //     } else {
    //         // Nếu không tìm thấy sản phẩm
    //         $this->testsku = 'Không tìm thấy sản phẩm';
    //     }
    
    //     // Xóa giá trị trong trường quét SKU sau khi xử lý
    //     $this->sku_scan = '';
    // }
    

    public function updatedSearchTerm($value, $index)
    {
        $product = Product::where('name', 'like', '%' . $value . '%')->first();
        if ($product) {
            $this->products[$index]['description'] = $product->description;
            $this->products[$index]['price'] = $product->price;
        } else {
            $this->products[$index]['description'] = '';
            $this->products[$index]['price'] = 0.00;
        }
    }

    public function boot(InboundShipmentRepositoryInterface $inboundShipmentRepository)
    {
        $this->inboundShipmentRepository = $inboundShipmentRepository;
    }

    

    public function addProduct()
    {
        $this->products[] = ['product_id' => '', 'quantity' => 1, 'unitPrice' => 1, 'totalPrice' => 0,'sku' => ''];
    }
    // public function updatingSku_scan($value)
    // {
    //     $this->testsku = 'You scanned: ' . $value;
    // }

  
    public function removeProduct($index)
    {
        unset($this->products[$index]);
        $this->products = array_values($this->products);
        $this->updated($index);
        
    }


    public function updateProduct($value, $index){

    }

    
public function updatingSupplierId($value)
{
    \Log::info("Supplier ID updated to: " . $value);
    $supplier = Supplier::find($value);
    
    if ($supplier) {
        $this->supplier_email = $supplier->contactEmail;
        
    } else {
        $this->supplier_email = '';
        
    }
}
public function updateShelfId($value)
{
    \Log::info("shelf ID updated to: " . $value);
    $shelves = Shelf::find($value);
    
    if ($shelves) {
        $this->shelf_name = $shelves->name;
        
    } else {
        $this->shelf_name = '';
        
    }
}

// public function updatedProducts($value, $name)
// {
//     if (Str::contains($name, '.name')) {
//         $index = explode('.', $name)[1];
//         $this->searchProducts($value, $index);
//     }
// }
// protected $rules = [
//     'supplier_id' => 'required',
//     'shelf_id' => 'required',
//     'products' => 'required|array|min:1',
//     'products.*.nameN' => 'required|min:3',
//     'products.*.categoryIdN' => 'required',
//     'products.*.costN' => 'required|numeric|min:100|lt:products.*.priceN',
//     'products.*.priceN' => 'required|numeric|min:100|gt:products.*.costN',
// ];
public function searchProducts($term, $index)
{
    $this->searchResults = Product::where('name', 'like', '%' . $term . '%')->get()->toArray();
    $this->showSuggestion = true;
}

public function selectProduct($product, $index)
{
    $this->products[$index]['name'] = $product['name'];
    $this->products[$index]['description'] = $product['description'];
    $this->products[$index]['price'] = $product['price'];
    $this->showSuggestion = false;
}

    public function save()
    {
       
        $this->validate([
'supplier_id'=>'required',
'shelf_id'=>'required',
'products' => 'required|array|min:1',
        ],['supplier_id.required' => 'Vui lòng chọn nhà cung cấp.',
        'shelf_id.required' => 'Vui lòng chọn kệ.',
        'products.required' => 'Vui lòng thêm ít nhất một sản phẩm.',
    ]);
// dd($this->supplier_id);

        $inboundShipment = InboundShipment::create([
            'user_id' => $this->user_id,
            'supplier_id' => $this->supplier_id,
            'shelf_id' => $this->shelf_id,
            'totalAmount' => $this->totalAmount,
            'remarks' => $this->remarks,
            'status' => $this->status,
        ]);

        foreach ($this->products as $product) {
            InboundShipmentDetails::create([
                'inbound_shipment_id' => $inboundShipment->id,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
                'unitPrice' => $product['price'],
                'totalPrice' => $product['totalPrice'],
            ]);
            
            
            Stock::create([
                'shelf_id' => $this->shelf_id,
                'product_id'=>$product['product_id'],
                'quantity' => $product['quantity']

            ])
            
            ;
        }
        session()->flash('message', 'Đợt nhập hàng đã được lưu thành công!');
        $this->reset(); // Reset toàn bộ input
        $this->alert('success', 'Đợt nhập hàng đã được lưu thành công!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => 'Cancel',
            'showCancelButton' => false,
            'showConfirmButton' => false,
        ]);
      
    }



    public function updatedSku($value,$index)
    {


        
        $this->result = Product::where('sku', $value)->first();
       if ($this->result){

$this->h1 = $index;


       }
       else{
        $this->h1="";
       }
        
    }
    public function mount()
    {
        $this->categories = Category::all();
        $this->suppliers = Supplier::all();
        $this->shelves = Shelf::all();
        $this->allProducts = Product::all();
        // $this->products[] = ['product_id' => '', 'quantity' => 1, 'unitPrice' => 1, 'totalPrice' => 0,'sku'=>''];
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.inbound-shipments.inbound-shipment-create', compact('users'));
    }
}










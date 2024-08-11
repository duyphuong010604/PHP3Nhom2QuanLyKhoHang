<?php

namespace App\Livewire\Products;

use App\Http\Requests\Products\Create;
use Livewire\Attributes\Layout;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Milon\Barcode\DNS2D;

#[Title('Thêm mới sản phẩm')]
class ProductCreate extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    #[Validate('required', message: 'Vui lòng nhập tên sản phẩm.')]
    #[Validate('min:3', message: 'Vui lòng nhiều hơn 3 kí tự.')]
    public $name = '';
    #[Validate('required', message: 'Vui lòng nhập giá bán.')]
    #[Validate('min:100', message: 'Vui lòng nhiều hơn 100 vnđ.')]
    #[Validate('numeric', message: 'Vui lòng nhập đúng định dạng tiền tệ.')]
    #[Validate('gt:cost', message: 'Vui lòng cho giá bán cao hơn giá nhập.')]
    public $price = '';
    #[Validate('required', message: 'Vui lòng nhập giá nhập.')]
    #[Validate('min:100', message: 'Vui lòng nhiều hơn 100 vnđ.')]
    #[Validate('numeric', message: 'Vui lòng nhập đúng định dạng tiền tệ.')]
    #[Validate('lt:price', message: 'Vui lòng cho giá bán cao hơn giá nhập.')]
    public $cost = '';

    public $description = '';
    #[Validate('required', message: 'Vui lòng nhập thông tin sản phẩm.')]
    #[Validate('regex:/^\d+x\d+$/', message: 'Vui lòng nhập đúng định dạng.')]
    #[Validate('min:3', message: 'Vui lòng nhập hơn 3 kí tự.')]
    public $dimensions = '';
    #[Validate('required', message: 'Vui lòng nhập thông tin sản phẩm.')]
    #[Validate('numeric', message: 'Vui lòng nhập đúng định dạng.')]
    public $weight = '';
    #[Validate('required', message: 'Vui lòng nhập mã sản phẩm.')]
    #[Validate('numeric', message: 'Vui lòng nhập đúng định dạng mã sãn phẩm.')]
    #[Validate('min:100000000000', message: 'Vui lòng nhập mã theo chuẩn ENV13.')]
    #[Validate('max:9999999999999', message: 'Vui lòng nhập mã theo chuẩn ENV13.')]
    #[Validate('unique:products,sku', message: 'Mã sãn phẩm đã có.')]
    public $sku = '';
    public $imageUrl;
    #[Validate('required', message: 'Vui lòng nhập thông tin sản phẩm.')]
    public $category_id;

    public function updatingCategory_id()
    {
        Log::info('Updated category');
    }


    public function render(): View
    {
        $categories = Category::all();
        return view('livewire.products.product-create', ['categories' => $categories]);

    }

    public function create()
    {
        $validated = $this->validate();
        if ($this->imageUrl !== null) {
            $path = $this->imageUrl->store('images/products', 'public');
        } else {
            $path = null;
        }

        $products = Product::create([
            "imageUrl" => $path,
            "name" => $this->name,
            "price" => $this->price,
            "cost" => $this->cost,
            "dimensions" => $this->dimensions,
            "weight" => $this->weight,
            "category_id" => $this->category_id,
            "description" => $this->description,
            'sku' => $this->sku
        ]);

        if ($products) {
            $this->alert('success', 'Thêm sản phẩm mới thành công!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
            $this->reset([
                "imageUrl",
                "name",
                "price",
                "cost",
                "dimensions",
                "weight",
                "category_id",
                "description",
                'sku'
            ]);
        }
    }

    public function productCodeExists($sku)
    {
        return Product::whereSku($sku)->exists();
    }
}

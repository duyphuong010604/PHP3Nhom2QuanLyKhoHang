<?php

namespace App\Livewire\Products;

use App\Http\Requests\Products\Create;
use Livewire\Attributes\Layout;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;

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
    #[Validate('lt:price', message: 'Vui lòng cho giá bán thấp hơn giá nhập.')]
    public $cost = '';

    public $description = '';
    #[Validate('required', message: 'Vui lòng nhập thông tin sản phẩm.')]
    #[Validate('regex:/^\d+x\d+$/', message: 'Vui lòng nhập đúng định dạng.')]
    #[Validate('min:3', message: 'Vui lòng nhập hơn 3 kí tự.')]
    public $dimensions = '';
    #[Validate('required', message: 'Vui lòng nhập thông tin sản phẩm.')]
    #[Validate('numeric', message: 'Vui lòng nhập đúng định dạng.')]
    public $weight = '';

    public $imageUrl;
    #[Validate('required', message: 'Vui lòng nhập thông tin sản phẩm.')]
    public $category_id = '';




    public function render(): View
    {
        $categories = Category::all();
        return view('livewire.products.product-create', ['categories' => $categories]);

    }

    public function rules()
    {
        return [
            'imageUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048',
            'name' => 'required|min:3|',
            'price' => 'required|min:100|numeric|gt:cost',
            'cost' => 'required|min:100|numeric|lt:price',
            'dimensions' => 'required|min:3|regex:/^\d+x\d+$/',
            'weight' => 'required|min:3|numeric',
            'category_id' => 'required',
            'description' => 'nullable'
        ];
    }


    public function create()
    {
        $validated = $this->validate();
        // dd($validated);
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
            "description" => $this->description
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
            ]);
        }
    }
}

<?php

namespace App\Livewire\Products;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;

#[Title('Sử thông tin sản phẩm')]
class ProductUpdate extends Component
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
    #[Validate('required', message: 'Vui lòng nhập thông tin sản phẩm.')]
    public $category_id = '';
    public $imageUrl;
    #[Validate('required', message: 'Vui lòng nhập thông tin sản phẩm.')]
    public $product, $categories, $imageOld;
    public function mount($id)
    {
        $this->product = Product::findOrFail($id);
        $this->categories = Category::select('id', 'name')->orderBy('id', 'desc')->get();
        $this->name = $this->product->name;
        $this->price = $this->product->price;
        $this->cost = $this->product->cost;
        $this->weight = $this->product->weight;
        $this->dimensions = $this->product->dimensions;
        $this->imageOld = $this->product->imageUrl;
        $this->category_id = $this->product->category_id;
        $this->description = $this->product->description;
    }
    public function render()
    {
        return view('livewire.products.product-update');
    }

    public function rules()
    {
        return [
            'imageUrl' => 'nullable|max:1048',
            'name' => 'required|min:3|',
            'price' => 'required|min:100|numeric|gt:cost',
            'cost' => 'required|min:100|numeric|lt:price',
            'dimensions' => 'required|min:2|regex:/^\d+x\d+$/',
            'weight' => 'required|min:1|numeric',
            'category_id' => 'required',
            'description' => 'nullable'
        ];
    }

    public function update()
    {
        $validated = $this->validate();
        // dd($validated);
        if ($this->imageUrl == null) {
            $path = $this->imageOld;
        } else {
            $path = $this->imageUrl->store('images/products', 'public');
        }

        $this->product->update([
            "imageUrl" => $path,
            "name" => $this->name,
            "price" => $this->price,
            "cost" => $this->cost,
            "dimensions" => $this->dimensions,
            "weight" => $this->weight,
            "category_id" => $this->category_id,
            "description" => $this->description
        ]);

        $this->alert('success', 'Cập nhật thông tin thành công.', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);

    }
}

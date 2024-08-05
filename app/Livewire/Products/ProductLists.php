<?php

namespace App\Livewire\Products;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Shelf;
use Livewire\Attributes\Session;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use Livewire\Attributes\Url;
use Livewire\Attributes\Computed;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;

#[Title('Danh sách sản phẩm')]
class ProductLists extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $q = null;
    public $categories = '';

    protected $products;

    public $category_id = 'all';
    public $orderBy = 'id';
    public $sortBy = 'desc';
    public $confirmingProjectDeletion = false;
    public $projectIdToDelete = false;


    public function render()
    {
        $this->categories = Category::select('id', 'name')->orderBy('id', 'desc')->get();
        return view(
            'livewire.products.product-lists',
        );
    }
    public function updatedQ()
    {
        $this->q = trim($this->q);
        // $this->resetPage();
        log::info($this->q);
    }

    public function updatedOrderBy()
    {
        $this->resetPage();
    }
    public function updatedSortBy()
    {
        $this->resetPage();
    }
    public function updatedCategory_id()
    {
        $this->resetPage();
    }

    public function loadProducts()
    {
        $query = Product::with('stocks.shelf');
        if ($this->q === null) {
            $query
                ->orderBy('id', 'desc');
        } else {
            $query
                ->where('name', 'like', "%" . $this->q . "%")
                ->orWhere('sku', 'like', "%" . $this->q . "%")
                ->orderBy('id', 'desc');
        }
        return $query->paginate(5);

    }

    public function applyFilter()
    {
        $query = Product::with('stocks.shelf');
        if ($this->category_id !== 'all') {
            $query->where('category_id', $this->category_id);
        }
        if ($this->orderBy === 'price') {
            $sortOrder = 'desc';
            $query->orderBy('price', $sortOrder);
        } elseif ($this->orderBy === 'name') {
            $sortOrder = 'asc';
            $query->orderBy('name', $sortOrder);
        } else {
            $sortOrder = 'asc';
            $query->orderBy('price', $sortOrder);
        }

        return $this->products = $query->paginate(5);
    }

    public function boot()
    {
        $this->products = $this->loadProducts();
    }


    public function confirmProjectDeletion($projectId)
    {
        $this->confirmingProjectDeletion = true;
        $this->projectIdToDelete = $projectId;
    }

    public function deleteProject()
    {
        $stock = Stock::where('product_id', $this->projectIdToDelete)->get();
        if (count($stock) > 0) {
            $this->showAlert('error', 'Xóa thất bại!');
        } else {
            $this->showAlert('success', 'Xóa sản phẩm thành công!');
            Product::find($this->projectIdToDelete)->delete();
            $this->products = $this->loadProducts(); // Cập nhật danh sách dự án
            $this->confirmingProjectDeletion = false;
            $this->projectIdToDelete = null;
        }
    }
    public $productId = [];
    public $selectAll = false;
    public $showDeleteButton = false;



    public function updatedProductId()
    {
        log::info($this->productId);
    }
    public function checkAll()
    {
        if ($this->selectAll) {
            $this->productId = Product::pluck('id')->toArray();
        } else {
            $this->productId = [];
        }
        $this->updateDeleteButton();
    }
    public function updateDeleteButton()
    {
        $this->showDeleteButton = count($this->productId) > 0;
    }
    public $productStock = true;

    public function updatingPage($page)
    {
        Log::info('cac o da check' . $page);
    }

    public function updatedPage($page)
    {
        Log::info('dang o trang so' . $page);
    }
    public function deleteSelected()
    {

        $this->productStock = Stock::select('product_id')->pluck('product_id')->toArray();
        // láy chung
        $commonElements = array_intersect($this->productStock, $this->productId);
        //lấy riêng
        $productIdDelete = array_diff($this->productId, $this->productStock);
        if (count($commonElements) > 0) {
            $this->showAlert('error', 'Xóa thất bại!', 'Do có sản phẩm đang chờ xử lý.');
        } else {
            foreach ($productIdDelete as $item) {
                Product::find($item)->delete();
                $this->products = $this->loadProducts(); // Cập nhật danh sách dự án
            }
            $this->showAlert('success', 'Xóa sản phẩm thành công!');
            $this->selectAll = false;
            $this->showDeleteButton = false;
            $this->productId = [];
        }
    }
    public function showAlert($status, $message, $text = '')
    {
        $this->alert($status, $message, [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => false,
            'text' => $text,
        ]);
    }
    public $typeExport = 'excell';
    public function export()
    {

        if ($this->typeExport === 'pdf') {
            $data = [
                'products' => Product::all()
            ];

            $options = new Options();
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml(view('exports.products-pdf', $data)->render());
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $this->resetPage();
            return response()->streamDownload(function () use ($dompdf) {
                echo $dompdf->output();
            }, 'products.pdf');
        } elseif ($this->typeExport === 'excell') {
            $spreadsheet = new Spreadsheet();
            $products = Product::all();
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            // Thiết lập tiêu đề
            $sheet->setCellValue('A1', 'Danh sách sản phẩm');
            // Thiết lập tiêu đề cho các cột
            $sheet->setCellValue('A2', 'Ô check');
            $sheet->setCellValue('B2', 'Mã');
            $sheet->setCellValue('C2', 'Tên sản phẩm');
            $sheet->setCellValue('D2', 'Giá nhập');
            $sheet->setCellValue('E2', 'Giá bán');
            $sheet->setCellValue('F2', 'Danh mục sản phẩm');
            $sheet->setCellValue('G2', 'Kệ hàng - Số lượng');
            $sheet->setCellValue('H2', 'Ngày nhập');
            // Nạp dữ liệu sản phẩm vào bảng tính
            $row = 3;
            foreach ($products as $product) {
                $initialRow = $row; // Lưu lại hàng ban đầu
                // Tạo ô checkbox bằng danh sách thả xuống
                $validation = $sheet->getCell('A' . $row)->getDataValidation();
                $validation->setType(DataValidation::TYPE_LIST);
                $validation->setErrorStyle(DataValidation::STYLE_STOP);
                $validation->setAllowBlank(true);
                $validation->setShowInputMessage(true);
                $validation->setShowErrorMessage(true);
                $validation->setErrorTitle('Input error');
                $validation->setError('This value is not allowed.');
                $validation->setPromptTitle('Pick from list');
                $validation->setPrompt('Please pick a value from the drop-down list.');
                $validation->setFormula1('"TRUE,FALSE"');
                $sheet->setCellValue('A' . $row, 'FALSE'); // Ô check
                $sheet->setCellValue('B' . $row, $product->id);
                $sheet->setCellValue('C' . $row, $product->name);
                $sheet->setCellValue('D' . $row, $product->cost); // Giá nhập
                $sheet->setCellValue('E' . $row, $product->price); // Giá bán
                $sheet->setCellValue('F' . $row, $product->category->name); // Danh mục sản phẩm

                foreach ($product->stocks as $stockProduct) {
                    $sheet->setCellValue('G' . $row, $stockProduct->shelf->name . ' - ' . $stockProduct->quantity); // Kệ hàng - Số lượng
                    $sheet->setCellValue('H' . $row, $stockProduct->updated_at); // Ngày nhập
                    $row++;
                }

                // Nếu sản phẩm có nhiều hơn một stockProduct, hợp nhất các ô từ A đến F
                if ($row > $initialRow + 1) {
                    $sheet->mergeCells('A' . $initialRow . ':A' . ($row - 1));
                    $sheet->mergeCells('B' . $initialRow . ':B' . ($row - 1));
                    $sheet->mergeCells('C' . $initialRow . ':C' . ($row - 1));
                    $sheet->mergeCells('D' . $initialRow . ':D' . ($row - 1));
                    $sheet->mergeCells('E' . $initialRow . ':E' . ($row - 1));
                    $sheet->mergeCells('F' . $initialRow . ':F' . ($row - 1));
                }
            }

            // Tạo đối tượng Writer để ghi bảng tính
            $writer = new Xlsx($spreadsheet);
            $fileName = 'products.xlsx';
            $filePath = storage_path('app/public/' . $fileName);
            $writer->save($filePath);
            $this->resetPage();
            // Trả về file để người dùng tải về và xóa file sau khi tải xong
            return response()->download($filePath)->deleteFileAfterSend(true);
        } else {
            $data = [
                'products' => Product::all()
            ];
            $options = new Options();
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml(view('exports.products-code-pdf', $data)->render());
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $this->resetPage();
            return response()->streamDownload(function () use ($dompdf) {
                echo $dompdf->output();
            }, 'products-code.pdf');
        }
    }

    // newProduct
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
    #[Validate('min:100000000', message: 'Vui lòng nhập mã lớn hơn 1000000000.')]
    #[Validate('numeric', message: 'Vui lòng nhập đúng định dạng mã sãn phẩm.')]
    public $skuN = '';
    public function newProduct()
    {
        $validated = $this->validate();

        $products = Product::create([
            "name" => $this->nameN,
            "price" => $this->priceN,
            "cost" => $this->costN,
            "category_id" => $this->categoryIdN,
            'sku' => $this->skuN
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
                "categoryIdN",
                'skuN'
            ]);
        }
    }


}

<?php

namespace App\Livewire\Products;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use App\Models\Stock;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use Illuminate\Support\Facades\Log;


#[Title('Danh sách sản phẩm')]
class ProductLists extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $search = null;
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
    public function updatedSearch()
    {
        log::info($this->search);
        $this->search = trim($this->search);
        $this->resetPage();
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
        log::info($this->category_id);
        $this->resetPage();
    }

    public function loadProducts()
    {
        $query = Product::with('stocks.shelf');
        if (empty($this->search) || $this->search === null) {
            $query
                ->orderBy('id', 'desc');
        } else {
            $query
                ->where('name', 'like', "%" . $this->search . "%")
                ->orWhere('sku', 'like', "%" . $this->search . "%")
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
    public function updatedProductId($value, $key)
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
    public function updatingPage($page, $value)
    {
        log::info($value);
        Log::info('cac o da check' . $page);
    }
    public function updatedPage($page, $value)
    {
        log::info($value);
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
            dd($data);

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
}

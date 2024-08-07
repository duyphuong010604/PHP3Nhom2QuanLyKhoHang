    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->

        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-lg-row">
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">

                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card body-->
                            <div class="card-body p-12">

                                <div>
                                    <form wire:submit.prevent="save" id="kt_invoice_form">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column align-items-start flex-xxl-row">
                                            <!--begin::Input group-->
                                          
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4"
                                                data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                title="Enter invoice number">
                                                <span class="fs-2x fw-bolder text-gray-800">Đợt nhập #</span>

                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                          
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Top-->
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed my-10"></div>
                                        <!--end::Separator-->
                                        <!--begin::Wrapper-->
                                        <div class="mb-0">
                                            <!--begin::Row-->
                                            <div class="row gx-10 mb-5">
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Nhà cung
                                                        cấp</label>
                                                    <!--begin::Input group-->
                                                    <div class="mb-5">
                                                        <select
                                                            class="form-select form-control form-control-solid fw-bolder"
                                                            wire:model.live="supplier_id">
                                                            <option value="">Chọn nhà cung cấp</option>
                                                            @foreach($suppliers as $supplier)
                                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        @error('supplier_id') <span class="text-danger">{{ $message }}</span> @enderror

                                                    </div>

                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-5">
                                                        <input type="text" class="form-control form-control-solid"
                                                        placeholder="Email" wire:model="supplier_email" readonly>
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->

                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Đến
                                                        kệ</label>
                                                    <!--begin::Input group-->


                                                    <div class="mb-5">
                                                        <select
                                                            class="form-select form-control form-control-solid fw-bolder"
                                                            wire:model.live="shelf_id">
                                                            <option value="">Chọn kệ</option>
                                                            @foreach($shelves as $shelf)
                                                            <option value="{{ $shelf->id }}">{{ $shelf->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('shelf_id') <span class="text-danger">{{ $message }}</span> @enderror

                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->

                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-5">
                                                        <textarea name="notes" class="form-control form-control-solid"
                                                            rows="1" placeholder="Ghi chú?"
                                                            wire:model="shelf_notes"></textarea>
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                            <div class="col-lg-6">

                                                <div class="mb-5">
                                                    <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Quét
                                                        mã</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        name="scanner" wire:model.live='scanner'>

                                                    @if ($testsku)
                                                    <p>{{ $testsku }}</p>
                                                    @endif

                                                </div>

                                            </div>
                                            <!--begin::Table wrapper-->
                                            <div class="table-responsive mb-10">
                                                <!--begin::Table-->
                                                <table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700"
                                                    data-kt-element="items">

                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr
                                                            class="border-bottom fs-7 fw-bolder text-gray-700 text-uppercase">
                                                            <th class="min-w-300px w-475px">Sản phẩm</th>
                                                            <th class="min-w-100px w-100px">Số lượng</th>
                                                            <th class="min-w-150px w-150px">Giá</th>
                                                            <th class="min-w-100px w-150px text-end">Tổng</th>
                                                            <th class="min-w-75px w-75px text-end">Hành động</th>
                                                        </tr>
                                                    </thead>

                                                    <!--begin::Table body-->
                                                    <tbody class="fw-bold text-gray-600">


                                                        <tr class="border-bottom border-bottom-dashed">

                                                            @foreach($products as $index => $product)
                                                            <td class="pe-7">

                                                                <div class="mb-5">
                                                                    <input type="text"
                                                                        class="form-control form-control-solid"
                                                                        placeholder="tên sản phẩm"
                                                                        wire:model.defer.live='products.{{ $index }}.name' readonly>

                                                                </div>
                                                                <textarea name="description[]"
                                                                    class="form-control form-control-solid" rows="2"
                                                                    placeholder="Mô tả sản phẩm"
                                                                    wire:model.defer="products.{{ $index }}.description" readonly></textarea>
                                                            </td>
                                                            <td class="ps-0">
                                                                <input type="number" min=1
                                                                    class="form-control form-control-solid text-center"
                                                                    name="quantity[]" placeholder="1"
                                                                    data-kt-element="quantity"
                                                                    wire:model.defer.live="products.{{ $index }}.quantity">
                                                            </td>
                                                            <td>
                                                                <input type="number"
                                                                    class="form-control form-control-solid text-end"
                                                                    name="price" placeholder="0.00" data-kt-element="price"
                                                                    wire:model.defer="products.{{ $index }}.price" readonly>
                                                            </td>
                                                            {{-- <td class="pt-8 text-end text-nowrap">$ <span
                                                                    data-kt-element="total">{{
                                                                    number_format($product['quantity'] * $product['price'],
                                                                    2) }}</span></td> --}}
                                                                    <td>
                                                                        <input type="number"
                                                                        class="form-control form-control-solid text-end"
                                                                        name="totalPrice" placeholder="0.00" data-kt-element="totalPrice"
                                                                        wire:model.defer="products.{{ $index }}.totalPrice" readonly>
                                                                    </td>
                                                            <td class="pt-5 text-end">
                                                                <button type="button"
                                                                    class="btn btn-sm btn-icon btn-active-color-primary"
                                                                    data-kt-element="remove-item"
                                                                    wire:click.prevent="removeProduct({{ $index }})">
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                                            <rect opacity="0.5" x="7.05025" y="15.5356"
                                                                                width="12" height="2" rx="1"
                                                                                transform="rotate(-45 7.05025 15.5356)"
                                                                                fill="black"></rect>
                                                                            <rect x="8.46447" y="7.05029" width="12"
                                                                                height="2" rx="1"
                                                                                transform="rotate(45 8.46447 7.05029)"
                                                                                fill="black"></rect>
                                                                        </svg>
                                                                    </span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @error('products') <span class="text-danger">{{ $message }}</span> @enderror

                                                    </tbody>
                                                    <!--end::Table body-->
                                                    <!--begin::Table foot-->
                                                    <tfoot>
                                                        <tr
                                                            class="border-top border-top-dashed align-top fs-6 fw-bolder text-gray-700">
                                                            <th class="text-primary">
                                                                <button class="btn btn-primary" data-bs-toggle="modal"
                                                                data-bs-target="#newProductModal">
                                                                Thêm sản phẩm mới
                                                            </button>
                            
                                                            </th>
                                                            {{-- <th colspan="2" class="border-bottom border-bottom-dashed ps-0">
                                                                Tổng cộng</th>
                                                            <th class="border-bottom border-bottom-dashed text-end">$
                                                                <span data-kt-element="sub-total">{{
                                                                    number_format($subtotal, 2) }}</span>
                                                            </th> --}}
                                                            <th class="border-bottom border-bottom-dashed"></th>
                                                        </tr>
                                                        <tr class="align-top fw-bolder text-gray-700">
                                                            <th></th>
                                                            <th colspan="2" class="fs-4 ps-0">Tổng cộng</th>
                                                            <th><input type="text" wire:model='totalAmount' readonly class="form-control form-control-solid text-end"></th>
                                                            
                                                            
                                                        </tr>
                                                    </tfoot>
                                                    <!--end::Table foot-->
                                                </table>
                                            </div>
                                            <!--end::Table wrapper-->
                                            <!--begin::Item template-->
                                            <table class="table d-none" data-kt-element="item-template">
                                                <tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                                                    <td class="pe-7">
                                                        <input type="text" class="form-control form-control-solid mb-2"
                                                            name="name[]" placeholder="Tên sản phẩm">
                                                        <textarea name="description[]"
                                                            class="form-control form-control-solid" rows="2"
                                                            placeholder="Mô tả sản phẩm"></textarea>
                                                    </td>
                                                    <td class="ps-0">
                                                        <input type="number"
                                                            class="form-control form-control-solid text-center"
                                                            name="quantity[]" placeholder="1" data-kt-element="quantity">
                                                    </td>
                                                    <td>
                                                        <input type="number"
                                                            class="form-control form-control-solid text-end" name="price[]"
                                                            placeholder="0.00" data-kt-element="price">
                                                    </td>
                                                    <td class="pt-8 text-end text-nowrap">$
                                                        <span data-kt-element="total">0.00</span>
                                                    </td>
                                                    <td class="pt-5 text-end">
                                                        <button type="button"
                                                            class="btn btn-sm btn-icon btn-active-color-primary"
                                                            data-kt-element="remove-item">
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="7.05025" y="15.5356" width="12"
                                                                        height="2" rx="1"
                                                                        transform="rotate(-45 7.05025 15.5356)"
                                                                        fill="black"></rect>
                                                                    <rect x="8.46447" y="7.05029" width="12" height="2"
                                                                        rx="1" transform="rotate(45 8.46447 7.05029)"
                                                                        fill="black"></rect>
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!--end::Item template-->
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tạo đợt nhập</button>
                                        <!--end::Wrapper-->
                                    </form>

                                </div>




                                <!--end::Form-->
                            </div>

                            <!--end::Card body-->
                            {{-- Modal newProduct --}}
            <div wire:ignore.self class="modal fade" id="newProductModal" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Thêm sản phẩm mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form">
                            <!--begin::Modal body-->
                            <div class="modal-body py-10 px-lg-17">
                                <!--begin::Scroll-->
                                <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll"
                                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_modal_new_address_header"
                                    data-kt-scroll-wrappers="#kt_modal_new_address_scroll"
                                    data-kt-scroll-offset="300px">
                                    <!--begin::Input group-->
                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Tên sản phẩm</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Tên sản phẩm..." name="name"
                                                wire:model='nameN' />
                                            <!--end::Input-->
                                            @error('nameN')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 fv-row">
                                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
<span class="required">Loại sản phẩm</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                    data-bs-toggle="tooltip" title=""></i>

                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Select-->
                                            <select name="categoryIdN" data-placeholder="Chọn loại sản phẩm..."
                                                wire:model.change='categoryIdN'
                                                class="form-select form-select-solid">
                                                <option value="">Chọn loại sản phẩm...</option>
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('categoryIdN')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-12 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Mã hàng hóa</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Mã hàng hóa" name="skumodal" wire:model='skumodal' />
                                            @error('skumodal')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Giá nhập</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Giá nhập..." name="cost" wire:model='costN' />
                                            @error('costN')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Giá bán</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid"
placeholder="Giá bán..." name="price" wire:model='priceN' />
                                            @error('priceN')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Scroll-->
                            </div>
                            <!--end::Modal body-->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Hủy</button>
                                <button type="button" class="btn btn-primary" wire:click='newProduct'>Thêm
                                    mới</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                        </div>
                    </div>
                    <!--end::Card-->
                    <!--end::Content-->
                    <!--begin::Sidebar-->

                    <!--end::Sidebar-->
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>


    <script>
        $(document).keypress(
    function(event){
        if (event.which == '13') {
        event.preventDefault();
        }
    });
    </script>




    <script>
        document.addEventListener('alpine:init', () => {
                Alpine.data('wheelListenerComponent', () => ({
                    init() {
                        this.addPassiveWheelListeners();
                    },
                    addPassiveWheelListeners() {
                        // Function to add passive listeners to all elements
                        const addListenersToElements = (elements) => {
                            elements.forEach(element => {
                                element.addEventListener('wheel', this.passiveEventHandler, { passive: true });
                            });
                        };

                        // Initial setup for existing elements
                        addListenersToElements(document.querySelectorAll('*'));

                        // MutationObserver to handle dynamic content
                        const observer = new MutationObserver(mutationsList => {
                            for (const mutation of mutationsList) {
                                if (mutation.type === 'childList') {
                                    addListenersToElements(mutation.addedNodes);
                                }
                            }
                        });

                        observer.observe(document.body, { childList: true, subtree: true });
                    },
                    passiveEventHandler(event) {
                    
                    }
                }));
            });
    </script>
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
                                            <span class="fs-2x fw-bolder text-gray-800">Đợt xuất #</span>

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
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Khách hàng</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <select
                                                        class="form-select form-control form-control-solid fw-bolder"
                                                        wire:model.live="customer_id">
                                                        <option value="">Chọn khách hàng</option>
                                                        @foreach($customers as $supplier)
                                                        <option value="{{ $supplier->id }}">{{ $supplier->phone }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('customer_id') <span class="text-danger">{{ $message }}</span> @enderror

                                                </div>

                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid"
                                                        placeholder="Email" wire:model="customer_email" readonly>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->

                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Từ
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
                                                                @error('products.' . $index . '.quantity')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
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
                                    <button type="submit" class="btn btn-primary">Tạo đợt xuất</button>
                                    <!--end::Wrapper-->
                                </form>

                            </div>




                            <!--end::Form-->
                        </div>

                        <!--end::Card body-->
        
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
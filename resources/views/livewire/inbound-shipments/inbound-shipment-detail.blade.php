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
                                <form id="kt_invoice_form">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column align-items-start flex-xxl-row">
                                        <!--begin::Input group-->
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Enter invoice number">
                                            <span class="fs-2x fw-bolder text-gray-800">Đợt nhập #{{ $inboundShipment->id }}</span>
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
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Nhà cung cấp</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <select class="form-select form-control form-control-solid fw-bolder" readonly>
                                                        <option value="{{ $inboundShipment->supplier->id }}">{{ $inboundShipment->supplier->name }}</option>
                                                    </select>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" placeholder="Email" value="{{ $inboundShipment->supplier->contactEmail }}" readonly>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Đến kệ</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <select class="form-select form-control form-control-solid fw-bolder" readonly>
                                                        <option value="{{ $inboundShipment->shelf->id }}">{{ $inboundShipment->shelf->name }}</option>
                                                    </select>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <textarea name="notes" class="form-control form-control-solid" rows="1" placeholder="Ghi chú?" readonly>{{ $inboundShipment->remarks }}</textarea>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                       
                                        <!--begin::Table wrapper-->
                                        <div class="table-responsive mb-10">
                                            <!--begin::Table-->
                                            <table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700" data-kt-element="items">
                                                <!--begin::Table head-->
                                                <thead>
                                                    <tr class="border-bottom fs-7 fw-bolder text-gray-700 text-uppercase">
                                                        <th class="min-w-300px w-475px">Sản phẩm</th>
                                                        <th class="min-w-100px w-100px">Số lượng</th>
                                                        <th class="min-w-150px w-150px">Giá</th>
                                                        <th class="min-w-100px w-150px text-end">Tổng</th>
                                                    </tr>
                                                </thead>
                                                <!--begin::Table body-->
                                                <tbody class="fw-bold text-gray-600">
                                                    @foreach($inboundShipmentDetails as $detail)
                                                    <tr class="border-bottom border-bottom-dashed">
                                                        <td class="pe-7">
                                                            <div class="mb-5">
                                                                <input type="text" class="form-control form-control-solid" placeholder="Tên sản phẩm" value="{{ $detail->product->name }}" readonly>
                                                            </div>
                                                            <textarea name="description[]" class="form-control form-control-solid" rows="2" placeholder="Mô tả sản phẩm" readonly>{{ $detail->product->description }}</textarea>
                                                        </td>
                                                        <td class="ps-0">
                                                            <input type="number" min=1 class="form-control form-control-solid text-center" placeholder="1" value="{{ $detail->quantity }}" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control form-control-solid text-end" placeholder="0.00" value="{{ $detail->unitPrice }}" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control form-control-solid text-end" placeholder="0.00" value="{{ $detail->totalPrice }}" readonly>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <!--end::Table body-->
                                                <!--begin::Table foot-->
                                                <tfoot>
                                                    <tr class="border-top border-top-dashed align-top fs-6 fw-bolder text-gray-700">
                                                        <th class="text-primary"></th>
                                                        <th class="border-bottom border-bottom-dashed"></th>
                                                    </tr>
                                                    <tr class="align-top fw-bolder text-gray-700">
                                                        <th></th>
                                                        <th colspan="2" class="fs-4 ps-0">Tổng cộng</th>
                                                        <th><input type="text" value="{{ $inboundShipment->totalAmount }}" readonly class="form-control form-control-solid text-end"></th>
                                                    </tr>
                                                </tfoot>
                                                <!--end::Table foot-->
                                            </table>
                                        </div>
                                        <!--end::Table wrapper-->
                                    </div>
                                    <!--end::Wrapper-->
                                </form>
                                

                            </div>




                            <!--end::Form-->
                        </div>

                        <!--end::Card body-->
                        {{-- Modal newProduct --}}
       
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
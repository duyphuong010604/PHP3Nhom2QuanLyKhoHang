{{-- @foreach ($stock as $item )
    @dd($item->shelf->section)
@endforeach --}}

<div>
    <section>
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Toolbar-->
            {{-- Tootbar --}}
            <div class="toolbar" id="kt_toolbar">
                <!--begin::Container-->
                <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                    <!--begin::Page title-->
                    <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                        data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                        class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                        <!--begin::Title-->
                        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Thêm hàng tồn kho
                        </h1>
                        <!--end::Title-->
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start mx-4"></span>
                        <!--end::Separator-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-muted text-hover-primary"></a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-200 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-dark"></li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                </div>
                <!--end::Container-->
            </div>
            {{-- End tootbar --}}
            <!--end::Toolbar-->
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl">
                    <div class="row gy-5 g-xl-8">
                        <div class="col-xl-12">
                            <div class="card card-xl-stretch mb-xl-8">
                                <form class="form" action="#" id="kt_modal_new_address_form"
                                    wire:submit.prevent='addStock'>
                                    <!--begin::Modal header-->
                                    <div class="modal-header" id="kt_modal_new_address_header">
                                        <!--begin::Modal title-->
                                        <h2>Thêm hàng</h2>
                                        <!--end::Modal title-->
                                    </div>
                                    <!--end::Modal header-->
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
                                                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                                        <span class="required">Loại sản phẩm</span>
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                            data-bs-toggle="tooltip"
                                                            title="Your payment statements may very based on selected country"></i>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Select-->
                                                    <select name="product_id" data-placeholder="Chọn kệ hàng..."
                                                        wire:model='product_id' class="form-select form-select-solid">
                                                        <option value="">Chọn loại sản phẩm...</option>
                                                        @foreach ($stock as $item)
                                                            <option value="{{ $item->product->id }}">{{ $item->product->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    @error('product_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 fv-row">
                                                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                                        <span class="required">Kệ hàng hóa</span>
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                            data-bs-toggle="tooltip"
                                                            title="Your payment statements may very based on selected country"></i>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Select-->
                                                    <select name="shelf_id" data-placeholder="Chọn kệ hàng..."
                                                        wire:model='shelf_id' class="form-select form-select-solid">
                                                        <option value="">Chọn kệ hàng...</option>
                                                        @foreach ($stock as $item)
                                                            <option value="{{ $item->shelf->id }}">{{ $item->shelf->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    @error('shelf_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                                        <span class="required">Phân khu</span>
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                            data-bs-toggle="tooltip"
                                                            title="Your payment statements may very based on selected country"></i>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Select-->
                                                    <select name="section" data-placeholder="Chọn phân khu..."
                                                        class="form-select form-select-solid" wire:model='section'>
                                                        <option value="">Chọn phân khu...</option>
                                                        @foreach ($stock as $item)
                                                            <option value="{{ $item->shelf->section }}">{{ $item->shelf->section }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('section')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 fv-row">
                                                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                                        <span class="required">Trạng thái</span>
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                            data-bs-toggle="tooltip"
                                                            title="Your payment statements may very based on selected country"></i>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Select-->
                                                    <select name="status" data-placeholder="Chọn trạng thái..."
                                                        class="form-select form-select-solid" wire:model='status'>
                                                        <option value="">Chọn trạng thái...</option>
                                                        <option value="1">Còn sử dụng</option>
                                                        <option value="0">Không sử dụng</option>
                                                    </select>
                                                    @error('status')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-5 fv-row">
                                                <!--begin::Label-->

                                                <!--end::Select-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-5 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-5 fw-bold mb-2">Số lượng tồn</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder="Số lượng..."
                                                    name="Số lượng" wire:model='quantity' />
                                                <!--end::Input-->
                                                @error('quantity')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <!--end::Input group-->


                                        </div>
                                        <!--end::Scroll-->
                                    </div>
                                    <!--end::Modal body-->
                                    <!--begin::Modal footer-->
                                    <div class="modal-footer flex-center">
                                        <!--begin::Button-->
                                        <button type="reset" id="kt_modal_new_address_cancel"
                                            class="btn btn-light me-3">Reset</button>
                                        <!--end::Button-->
                                        <!--begin::Button-->
                                        <button type="submit" id="kt_modal_new_address_submit"
                                            class="btn btn-primary">
                                            <span class="indicator-label">Xác nhận</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                    <!--end::Modal footer-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Container-->
            </div>
            <!--end::Post-->
        </div>
    </section>
</div>

@extends('layouts.master')

@section('contents')
    {{-- Tootbar --}}
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Thêm mới sản phẩm
                </h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Danh sách sản
                            phẩm</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Thêm mới sản phẩm</li>
                    <!--end::Item-->
                </ul>
                <!--end::Separator-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    {{-- End tootbar --}}
    <div class="row gy-5 g-xl-8">
        <div class="col-xl-12">
            <div class="card card-xl-stretch mb-xl-8">
                <form class="form" action="#" id="kt_modal_new_address_form">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_new_address_header">
                        <!--begin::Modal title-->
                        <h2>Thêm tên sản phẩm</h2>
                        <!--end::Modal title-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_new_address_header"
                            data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-md-12 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-bold mb-2">Tên sản phẩm</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                        name="Tên sản phẩm" />
                                    <!--end::Input-->
                                </div>

                                <div class="col-md-6 fv-row">
                                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                        <span class="required">Loại sản phẩm</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Your payment statements may very based on selected country"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Select-->
                                    <select name="country" data-control="select2" data-dropdown-parent=""
                                        data-placeholder="Chọn loại sản phẩm..." class="form-select form-select-solid">
                                        <option value="">Chọn loại sản phẩm...</option>
                                        <option value="AF">Iphone</option>
                                        <option value="AX">Samsung</option>
                                        <option value="AL">Oppo</option>
                                    </select>
                                </div>

                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                        <span class="required">Phân khu</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Your payment statements may very based on selected country"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Select-->
                                    <select name="zone" data-control="select2" data-dropdown-parent=""
                                        data-placeholder="Chọn phân khu..." class="form-select form-select-solid">
                                        <option value="">Chọn phân khu...</option>
                                        <option value="AF">Phân khu A</option>
                                        <option value="AX">Phân khu B</option>
                                        <option value="AL">Phân khu C</option>
                                    </select>
                                </div>

                                <div class="col-md-6 fv-row">
                                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                        <span class="required">Trạng thái</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Your payment statements may very based on selected country"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Select-->
                                    <select name="zone" data-control="select2" data-dropdown-parent=""
                                        data-placeholder="Chọn trạng thái..." class="form-select form-select-solid">
                                        <option value="">Chọn trạng thái...</option>
                                        <option value="AF">Còn sử dụng</option>
                                        <option value="AX">Không sử dụng</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-bold mb-2">Giá nhập</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Giá nhập..." name="Tên sản phẩm" />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_new_address_cancel" class="btn btn-light me-3">Reset</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                            <span class="indicator-label">Thêm mới</span>
                            <span class="indicator-progress">Vui lòng chờ...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
            </div>

        </div>
    </div>
@endsection

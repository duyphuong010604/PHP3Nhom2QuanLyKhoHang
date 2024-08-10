@extends('layouts.master')
@section('contents')
<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
                Khách hàng
            </h1>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Danh sách khách hàng</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-dark">Sửa thông tin khách hàng</li>
            </ul>
        </div>
    </div>
</div>
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="row gy-5 g-xl-8">
            <div class="col-xl-12">
                <div class="card card-xl-stretch mb-xl-8">
                    <form class="form" action="#" id="kt_modal_new_address_form">
                        <div class="modal-header" id="kt_modal_new_address_header">
                            <h2>Sửa thông tin khách hàng</h2>
                        </div>
                        <div class="modal-body py-10 px-lg-17">
                            <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_modal_new_address_header"
                                data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                                <div class="row mb-5">
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-bold mb-2">Tên khách hàng</label>
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="Tên sản phẩm" />
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-bold mb-2">Email</label>
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="Email" />
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-bold mb-2">SĐT</label>
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="SĐT" />
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-bold mb-2">Địa chỉ</label>
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="Địa chỉ" />
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-bold mb-2">Đối tác</label>
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="Địa chỉ" />
                                    </div>
                                </div>
                                <div class="d-flex flex-column mb-5 fv-row">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer flex-center">
                            <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                                <span class="indicator-label">Sửa</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

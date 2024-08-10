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
                <li class="breadcrumb-item text-dark">Thêm mới khách hàng</li>
            </ul>
        </div>
    </div>
</div>
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="row gy-5 g-xl-8">
            <div class="col-xl-12">
                <div class="card card-xl-stretch mb-xl-8">
                <form class="form" wire:submit='create'>
    <!--begin::Modal header-->
    <div class="modal-header">
        <!--begin::Modal title-->
        <h2>Thêm mới khách hàng</h2>
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
            <div class="row mb-6">
                <div class="col-md-12 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Tên khách hàng</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="Tên khách hàng..."
                           name="name" wire:model='name' id="name"/>
                    <!--end::Input-->

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Email</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="email" class="form-control form-control-solid" placeholder="Email..."
                           name="email" wire:model='email' />
                    <!--end::Input-->

                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Số điện thoại</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="Số điện thoại..."
                           name="phone" wire:model='phone' />
                    <!--end::Input-->

                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Địa chỉ</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="Địa chỉ..."
                           name="address" wire:model='address' />
                    <!--end::Input-->

                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Đối tượng</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="Đối tượng..."
                           name="object" wire:model='object' />
                    <!--end::Input-->

                    @error('object')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
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
            <span class="indicator-label">Thêm mới</span>
            <span class="indicator-progress">Vui lòng chờ...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
        <!--end::Button-->
    </div>
    <!--end::Modal footer-->
</form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

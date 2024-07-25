@extends('layouts.master')

@section('contents')

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
                            <!--begin::Form-->
                            <form action="" id="kt_invoice_form">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-start flex-xxl-row">
                                    <!--begin::Input group-->
                                    <div class="d-flex align-items-center flex-equal fw-row me-4 order-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="" data-bs-original-title="Specify invoice date">
                                        <!--begin::Date-->
                                        <div class="fs-6 fw-bolder text-gray-700 text-nowrap">Ngày tạo:</div>
                                        <!--end::Date-->
                                        <!--begin::Input-->
                                        <div class="position-relative d-flex align-items-center w-150px">
                                            <!--begin::Datepicker-->
                                            <input class="form-control form-control-white fw-bolder pe-5 flatpickr-input" placeholder="Chọn thời gian" name="invoice_date" type="text" readonly="readonly">
                                            <!--end::Datepicker-->
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-2 position-absolute ms-4 end-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4" data-bs-toggle="tooltip" data-bs-trigger="hover" title="" data-bs-original-title="Enter invoice number">
                                        <span class="fs-2x fw-bolder text-gray-800">Đợt nhập #</span>
                                        <input type="text" class="form-control form-control-flush fw-bolder text-muted fs-3 w-125px" value="2021001" placehoder="...">
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex align-items-center justify-content-end flex-equal order-3 fw-row" data-bs-toggle="tooltip" data-bs-trigger="hover" title="" data-bs-original-title="Specify invoice due date">
                                        <!--begin::Date-->
                                        <div class="fs-6 fw-bolder text-gray-700 text-nowrap">Ngày nhập hàng:</div>
                                        <!--end::Date-->
                                        <!--begin::Input-->
                                        <div class="position-relative d-flex align-items-center w-150px">
                                            <!--begin::Datepicker-->
                                            <input class="form-control form-control-white fw-bolder pe-5 flatpickr-input" placeholder="Chọn ngày" name="invoice_due_date" type="text" readonly="readonly">
                                            <!--end::Datepicker-->
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-2 position-absolute end-0 ms-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"></path>
                                            </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                        </div>
                                        <!--end::Input-->
                                    </div>
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
                                                <input type="text" class="form-control form-control-solid" placeholder="Tên nhà cung cấp">
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-5">
                                                <input type="text" class="form-control form-control-solid" placeholder="Email nhà cung cấp">
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-5">
                                                <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Ghi chú từ nhà cung cấp?"></textarea>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Đến kho</label>
                                            <!--begin::Input group-->
                                            <div class="mb-5">
                                                <input type="text" class="form-control form-control-solid" placeholder="Tên kho">
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-5">
                                                <input type="text" class="form-control form-control-solid" placeholder="Tên hàng">
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-5">
                                                <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Ghi chú?"></textarea>
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
                                                    <th class="min-w-150px w-150px">Thành tiền</th>
                                                    <th class="min-w-50px w-50px"></th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                <tr class="fw-bolder text-gray-600">
                                                    <!--begin::Product Name-->
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Product Image-->
                                                            <div class="symbol symbol-50px me-5">
                                                                <img src="{{ asset('assets/media/avatars/150-2.jpg') }}" alt="image">
                                                            </div>
                                                            <!--end::Product Image-->
                                                            <!--begin::Product Info-->
                                                            <div class="d-flex flex-column">
                                                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Product name 1</a>
                                                                <span class="text-gray-400 fw-bold">Brand name 1</span>
                                                            </div>
                                                            <!--end::Product Info-->
                                                        </div>
                                                    </td>
                                                    <!--end::Product Name-->
                                                    <!--begin::Quantity-->
                                                    <td>
                                                        <input type="number" class="form-control form-control-solid text-center" value="1" min="1">
                                                    </td>
                                                    <!--end::Quantity-->
                                                    <!--begin::Unit Price-->
                                                    <td>
                                                        <input type="text" class="form-control form-control-solid text-center" value="1000">
                                                    </td>
                                                    <!--end::Unit Price-->
                                                    <!--begin::Total Price-->
                                                    <td>
                                                        <input type="text" class="form-control form-control-solid text-center" value="1000">
                                                    </td>
                                                    <!--end::Total Price-->
                                                    <!--begin::Actions-->
                                                    <td>
                                                        <a href="#" class="btn btn-icon btn-light btn-sm" data-kt-element="delete">
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                            <span class="svg-icon svg-icon-2 svg-icon-danger">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M12 21C6.73593 21 3 17.2641 3 12C3 6.73593 6.73593 3 12 3C17.2641 3 21 6.73593 21 12C21 17.2641 17.2641 21 12 21ZM12 4.5C7.64214 4.5 4.5 7.64214 4.5 12C4.5 16.3579 7.64214 19.5 12 19.5C16.3579 19.5 19.5 16.3579 19.5 12C19.5 7.64214 16.3579 4.5 12 4.5ZM12 6.5C12.4142 6.5 12.75 6.83579 12.75 7.25V12.25H17.75C18.1642 12.25 18.5 12.5858 18.5 13V13.5C18.5 13.9142 18.1642 14.25 17.75 14.25H12.75V19.25C12.75 19.6642 12.4142 20 12 20C11.5858 20 11.25 19.6642 11.25 19.25V14.25H6.25C5.83579 14.25 5.5 13.9142 5.5 13V12.5C5.5 12.0858 5.83579 11.75 6.25 11.75H11.25V7.25C11.25 6.83579 11.5858 6.5 12 6.5Z" fill="black"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                    </td>
                                                    <!--end::Actions-->
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-6 mb-5 mb-lg-0">
                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Thông tin khác</label>
                                            <!--begin::Input group-->
                                            <textarea name="additional_info" class="form-control form-control-solid" rows="4" placeholder="Nhập thông tin bổ sung..."></textarea>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed my-10"></div>
                                    <!--end::Separator-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-light me-3">Hủy</button>
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Wrapper-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content-->
                <!--begin::Sidebar-->
                <div class="d-none d-lg-block w-400px">
                    <div class="card">
                        <!--begin::Card body-->
                        <div class="card-body p-10">
                            <!--begin::Info-->
                            <div class="d-flex flex-column text-gray-700">
                                <span class="fs-6 fw-bolder mb-1">Company</span>
                                <span class="fs-6 fw-bold text-gray-600">ABCD Inc.</span>
                            </div>
                            <!--end::Info-->
                            <!--begin::Info-->
                            <div class="d-flex flex-column text-gray-700 mt-7">
                                <span class="fs-6 fw-bolder mb-1">Contact</span>
                                <span class="fs-6 fw-bold text-gray-600">John Doe</span>
                                <span class="fs-6 fw-bold text-gray-600">123-456-7890</span>
                                <span class="fs-6 fw-bold text-gray-600">info@abcd.com</span>
                            </div>
                            <!--end::Info-->
                            <!--begin::Info-->
                            <div class="d-flex flex-column text-gray-700 mt-7">
                                <span class="fs-6 fw-bolder mb-1">Address</span>
                                <span class="fs-6 fw-bold text-gray-600">1234 Elm Street</span>
                                <span class="fs-6 fw-bold text-gray-600">Some City, ST 12345</span>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
                <!--end::Sidebar-->
            </div>
            <!--end::Layout-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

@endsection

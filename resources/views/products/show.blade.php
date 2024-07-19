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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Sản phẩm
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
                    <li class="breadcrumb-item text-dark">Chi tiết sản phẩm</li>
                    <!--end::Item-->
                </ul>
                <!--end::Separator-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    {{-- End tootbar --}}
    <div class="card card-flush pt-3 mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2 class="fw-bolder">Chi tiết sản phẩm</h2>
                <h4 class="text-danger mx-4">#2456</h4>
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <a href="../../demo1/dist/apps/subscriptions/add.html" class="btn btn-light-primary">Chỉnh sửa thông
                    tin</a>
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-3">
            <!--begin::Section-->
            <div class="mb-10">
                <!--begin::Title-->
                <h5 class="mb-4">Thông tin chi tiết:</h5>
                <!--end::Title-->
                <!--begin::Details-->
                <div class="d-flex flex-wrap py-5">
                    <!--begin::Row-->
                    <div class="flex-equal me-5">
                        <!--begin::Details-->
                        <table class="table fs-6 fw-bold gs-0 gy-2 gx-2 m-0">
                            <!--begin::Row-->
                            <tbody>
                                <tr>
                                    <td class="text-gray-400 min-w-175px w-175px">Tên sản phẩm:</td>
                                    <td class="text-gray-800 min-w-200px">
                                        <a href="../../demo1/dist/pages/apps/customers/view.html"
                                            class="text-gray-800 text-hover-primary">Dầu gội đầu</a>
                                    </td>
                                </tr>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <tr>
                                    <td class="text-gray-400">Danh mục sản phẩm:</td>
                                    <td class="text-gray-800">Dầu gội</td>
                                </tr>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <tr>
                                    <td class="text-gray-400">Gía nhập:</td>
                                    <td class="text-gray-800">10.050 vnđ
                                    </td>
                                </tr>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <tr>
                                    <td class="text-gray-400">Gía bán:</td>
                                    <td class="text-gray-800">20.900 vnđ</td>
                                </tr>
                                <!--end::Row-->
                            </tbody>
                        </table>
                        <!--end::Details-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="flex-equal">
                        <!--begin::Details-->
                        <table class="table fs-6 fw-bold gs-0 gy-2 gx-2 m-0">
                            <!--begin::Row-->
                            <tbody>
                                <tr>
                                    <td class="text-gray-400 min-w-175px w-175px">Kệ hàng:</td>
                                    <td class="text-gray-800 min-w-200px">
                                        <a href="#" class="text-gray-800 text-hover-primary">Kệ ADC</a>
                                    </td>
                                </tr>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <tr>
                                    <td class="text-gray-400">Ngày tạo:</td>
                                    <td class="text-gray-800">21/06/2023</td>
                                </tr>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <tr>
                                    <td class="text-gray-400">Nhà cung cấp:</td>
                                    <td class="text-gray-800">Annually</td>
                                </tr>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <tr>
                                    <td class="text-gray-400">Mô tả:</td>
                                    <td class="text-gray-800">USD - US Dollar</td>
                                </tr>
                                <!--end::Row-->
                            </tbody>
                        </table>
                        <!--end::Details-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Section-->
            <!--begin::Section-->
            <div class="mb-0">
                <!--begin::Title-->
                <h5 class="mb-4">Tồn kho:</h5>
                <!--end::Title-->
                <!--begin::Product table-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-4 mb-0">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr
                                class="border-bottom border-gray-200 text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-150px">Kho hàng</th>
                                <th class="min-w-125px">Mã kho hàng</th>
                                <th class="min-w-125px">Số lượng</th>
                                <th class="min-w-125px">Tổng</th>
                                <th class="text-end min-w-70px">Tùy chọn</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-800">
                            <tr>
                                <td>
                                    <label class="w-150px">Basic Bundle</label>
                                    <div class="fw-normal text-gray-600">Basic yearly bundle</div>
                                </td>
                                <td>
                                    <span class="badge badge-light-danger">sub_4567_8765</span>
                                </td>
                                <td>1</td>
                                <td>$149.99 / Year</td>
                                <td class="text-end">
                                    <!--begin::Action-->
                                    <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                    fill="black"></path>
                                                <path opacity="0.3"
                                                    d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                    fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-6 w-200px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Pause Subscription</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-subscriptions-view-action="delete">Edit Subscription</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link text-danger px-3"
                                                data-kt-subscriptions-view-action="edit">Cancel Subscription</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                    <!--end::Action-->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="w-150px">Pro Bundle</label>
                                    <div class="fw-normal text-gray-400">Basic yearly bundle</div>
                                </td>
                                <td>
                                    <span class="badge badge-light-danger">sub_4567_3433</span>
                                </td>
                                <td>5</td>
                                <td>$949.99 / Year</td>
                                <td class="text-end">
                                    <!--begin::Action-->
                                    <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                    fill="black"></path>
                                                <path opacity="0.3"
                                                    d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                    fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-6 w-200px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Pause Subscription</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-subscriptions-view-action="delete">Edit Subscription</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link text-danger px-3"
                                                data-kt-subscriptions-view-action="edit">Cancel Subscription</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                    <!--end::Action-->
                                </td>
                            </tr>
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Product table-->
            </div>
            <!--end::Section-->
        </div>
        <!--end::Card body-->
    </div>
@endsection

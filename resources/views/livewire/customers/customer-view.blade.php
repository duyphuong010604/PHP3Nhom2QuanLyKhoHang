<section>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Thông tin khách hàng</h1>
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Khách hàng</li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-dark">Thông tin chi tiết khách hàng</li>
                </ul>
            </div>
            <div class="d-flex align-items-center py-1">
                <div class="me-4">
                </div>
            </div>
        </div>
    </div>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                    <div class="card mb-5 mb-xl-8">
                        <div class="card-body pt-15">
                            <div class="d-flex flex-center flex-column mb-5">
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    <img src="assets/media/avatars/150-26.jpg" alt="image" />
                                </div>
                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{ $customer->name }}</a>
                                <div class="fs-5 fw-bold text-muted mb-6">{{ $customer->object }}
                                    
                                </div>
                                <div class="d-flex flex-wrap flex-center">

                                </div>
                            </div>
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                    href="#kt_customer_view_details" role="button" aria-expanded="false"
                                    aria-controls="kt_customer_view_details">Chi tiết
                                    <span class="ms-2 rotate-180">
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                    </span>
                                </div>
                                <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit customer details">
                                    <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_update_customer">Sửa</a>
                                </span>
                            </div>
                            <div class="separator separator-dashed my-3"></div>
                            <div id="kt_customer_view_details" class="collapse show">
                                <div class="py-5 fs-6">
                                    <div class="fw-bolder mt-5">SĐT</div>
                                    <div class="text-gray-600">{{ $customer->phone }}</div>
                                    <div class="fw-bolder mt-5"> Email</div>
                                    <div class="text-gray-600">
                                        <a href="#" class="text-gray-600 text-hover-primary">{{ $customer->email }}</a>
                                    </div>

                                    <div class="fw-bolder mt-5">Địa chỉ</div>
                                    <div class="text-gray-600">{{ $customer->address }}</div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-lg-row-fluid ms-lg-15">
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                href="#kt_customer_view_overview_tab">Tổng quan</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Lịch sử xuất nhập</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <table class="table align-middle table-row-dashed gy-5"
                                        id="kt_table_customers_payment">
                                        <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                            <tr class="text-start text-muted text-uppercase gs-0">
                                                <th class="min-w-100px">Mã xuất nhập</th>
                                                <th>Trạng thái</th>
                                                <th>Tổng tiền</th>
                                                <th class="min-w-100px">Thời gian</th>
                                                <th class="text-end min-w-100px pe-4">Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fs-6 fw-bold text-gray-600">
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary mb-1">D01</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light-success">Thành công</span>
                                                </td>
                                                <td>375.000</td>
                                                <td>20/07/2024</td>
                                                <td class="pe-0 text-end">
                                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-end">Chọn
                                                        <span class="svg-icon svg-icon-5 m-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span></a>
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                        data-kt-menu="true">
                                                        <div class="menu-item px-3">
                                                            <a href="../../demo1/dist/apps/customers/view.html"
                                                                class="menu-link px-3">Xem</a>
                                                        </div>
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"
                                                                data-kt-customer-table-filter="delete_row">Xóa</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary mb-1">D02</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light-success">Thành công</span>
                                                </td>
                                                <td>129.000</td>
                                                <td>19/07/2024</td>
                                                <td class="pe-0 text-end">
                                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-end">Chọn
                                                        <span class="svg-icon svg-icon-5 m-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span></a>
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                        data-kt-menu="true">
                                                        <div class="menu-item px-3">
                                                            <a href="../../demo1/dist/apps/customers/view.html"
                                                                class="menu-link px-3">Xem</a>
                                                        </div>
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"
                                                                data-kt-customer-table-filter="delete_row">Xóa</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card pt-2 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Hóa đơn</h2>
                                    </div>
                                    <div class="card-toolbar m-0">
                                        <ul class="nav nav-stretch fs-5 fw-bold nav-line-tabs nav-line-tabs-2x border-transparent"
                                            role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a id="kt_referrals_year_tab"
                                                    class="nav-link text-active-primary active" data-bs-toggle="tab"
                                                    role="tab" href="#kt_customer_details_invoices_1">Hiện tại</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a id="kt_referrals_2019_tab" class="nav-link text-active-primary ms-3"
                                                    data-bs-toggle="tab" role="tab"
                                                    href="#kt_customer_details_invoices_2">2020</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div id="kt_referred_users_tab_content" class="tab-content">
                                        <div id="kt_customer_details_invoices_1" class="py-0 tab-pane fade show active"
                                            role="tabpanel">
                                            <table id="kt_customer_details_invoices_table_1"
                                                class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
                                                <thead
                                                    class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
                                                    <tr class="text-start text-muted gs-0">
                                                        <th class="min-w-100px">Mã hóa đơn</th>
                                                        <th class="min-w-100px">Tổng tiền</th>
                                                        <th class="min-w-100px">Trạng thái</th>
                                                        <th class="min-w-125px">Thời gian</th>
                                                        <th class="min-w-100px text-end pe-7">Xuất hóa đơn</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="fs-6 fw-bold text-gray-600">
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-600 text-hover-primary">D05</a>
                                                        </td>
                                                        <td class="text-success">520.000</td>
                                                        <td>
                                                            <span class="badge badge-light-danger">Không thành
                                                                công</span>
                                                        </td>
                                                        <td>20/07/2024</td>
                                                        <td class="text-end">
                                                            <button
                                                                class="btn btn-sm btn-light btn-active-light-primary">Tải
                                                                xuống</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-600 text-hover-primary">D06</a>
                                                        </td>
                                                        <td class="text-danger">560.000</td>
                                                        <td>
                                                            <span class="badge badge-light-success">Thành công</span>
                                                        </td>
                                                        <td>19/07/2024</td>
                                                        <td class="text-end">
                                                            <button
                                                                class="btn btn-sm btn-light btn-active-light-primary">Tải
                                                                xuống</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div id="kt_customer_details_invoices_2" class="py-0 tab-pane fade"
                                            role="tabpanel">
                                            <table id="kt_customer_details_invoices_table_2"
                                                class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
                                                <thead
                                                    class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
                                                    <tr class="text-start text-muted gs-0">
                                                        <th class="min-w-100px">Mã hóa đơn</th>
                                                        <th class="min-w-100px">Tổng tiền</th>
                                                        <th class="min-w-100px">Trạng thái</th>
                                                        <th class="min-w-125px">Thời gian</th>
                                                        <th class="min-w-100px text-end pe-7">Xuất hóa đơn</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</section>

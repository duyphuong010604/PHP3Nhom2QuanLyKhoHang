<div>
    {{-- Tootbar --}}
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Thống kê
                </h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('trang-chu.index') }}" class="text-muted text-hover-primary">Trang chủ</a>
                    </li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <div class="row gy-5 g-xl-8">
        <div class="col-xl-12">
            <!--begin::List Widget 4-->
            <div class="card card-xl-stretch mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h2 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder text-dark">Lợi nhuận</span>
                        <span class="text-muted mt-1 fw-bold fs-7"></span>
                    </h2>
                </div>
                <div class="card-body ">
                    <div class="fs-2hx fw-bolder text-danger">
                        {{ number_format($loinhuan) > 0 ? number_format($loinhuan) : '0' }} VNĐ</div>
                    <div class="fs-4 fw-bold text-gray-400 mb-7">Tổng tiền xuất - nhập</div>
                    <div class="fs-6 d-flex justify-content-between mb-4">
                        <div class="fw-bold">Tổng tiền hàng tồn kho</div>
                        <div class="d-flex fw-bolder">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr007.svg-->
                            <span class="svg-icon svg-icon-3 me-1 svg-icon-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M13.4 10L5.3 18.1C4.9 18.5 4.9 19.1 5.3 19.5C5.7 19.9 6.29999 19.9 6.69999 19.5L14.8 11.4L13.4 10Z"
                                        fill="black"></path>
                                    <path opacity="0.3" d="M19.8 16.3L8.5 5H18.8C19.4 5 19.8 5.4 19.8 6V16.3Z"
                                        fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->{{ $stockPrice }} VNĐ
                        </div>
                    </div>
                    <div class="separator separator-dashed"></div>
                    <div class="fs-6 d-flex justify-content-between my-4">
                        <div class="fw-bold">Tổng tiền hàng nhập kho</div>
                        <div class="d-flex fw-bolder">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr006.svg-->
                            <span class="svg-icon svg-icon-3 me-1 svg-icon-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M13.4 14.8L5.3 6.69999C4.9 6.29999 4.9 5.7 5.3 5.3C5.7 4.9 6.29999 4.9 6.69999 5.3L14.8 13.4L13.4 14.8Z"
                                        fill="black"></path>
                                    <path opacity="0.3" d="M19.8 8.5L8.5 19.8H18.8C19.4 19.8 19.8 19.4 19.8 18.8V8.5Z"
                                        fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->{{ $sumTotalPriceIn }} VNĐ
                        </div>
                    </div>
                    <div class="separator separator-dashed"></div>
                    <div class="fs-6 d-flex justify-content-between mt-4">
                        <div class="fw-bold">Tổng tiền hàng xuất kho</div>
                        <div class="d-flex fw-bolder">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr007.svg-->
                            <span class="svg-icon svg-icon-3 me-1 svg-icon-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M13.4 10L5.3 18.1C4.9 18.5 4.9 19.1 5.3 19.5C5.7 19.9 6.29999 19.9 6.69999 19.5L14.8 11.4L13.4 10Z"
                                        fill="black"></path>
                                    <path opacity="0.3" d="M19.8 16.3L8.5 5H18.8C19.4 5 19.8 5.4 19.8 6V16.3Z"
                                        fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->{{ $sumTotalPriceOut }} VNĐ
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row gy-5 g-xl-8">
        <div class="col-xl-12">
            <!--begin::List Widget 4-->
            <div class="card card-xl-stretch mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder text-dark">Biểu đồ thống kê nhập xuất</span>
                        <span class="text-muted mt-1 fw-bold fs-7"></span>
                    </h3>
                </div>
                <div class="card-body pt-5">

                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row gy-5 g-xl-8">
        <div class="col-xl-12">
            <!--begin::List Widget 4-->
            <div class="card card-xl-stretch mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder text-dark">Thống kê </span>
                        <span class="text-muted mt-1 fw-bold fs-7"></span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-5">
                    <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label">
                                <img src="{{ asset('storage/images/products/product.png') }}"
                                    class="h-50 align-self-center" alt="">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng số
                                    lượng sản phẩm</a>
                                <span class="text-muted fw-bold d-block fs-7"></span>
                            </div>
                            <span class="badge badge-light fw-bolder my-2">{{ $countTable['products'] }}</span>
                        </div>
                        <!--end::Section-->
                    </div>
                    <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label">
                                <img src="{{ asset('storage/images/customer.jpg') }}" class="h-50 align-self-center"
                                    alt="">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng các
                                    khách hàng</a>
                                <span class="text-muted fw-bold d-block fs-7"></span>
                            </div>
                            <span class="badge badge-light fw-bolder my-2">{{ $countTable['customers'] }}</span>
                        </div>
                        <!--end::Section-->
                    </div>
                    <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label">
                                <img src="{{ asset('assets/media/logos/category.png') }}"
                                    class="h-50 align-self-center" alt="">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng số
                                    danh mục sản phẩm</a>
                                <span class="text-muted fw-bold d-block fs-7"></span>
                            </div>
                            <span class="badge badge-primary fw-bolder my-2">{{ $countTable['category'] }}</span>
                        </div>
                        <!--end::Section-->
                    </div>
                    <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label">
                                <img src="{{ asset('assets/media/logos/inbound.webp') }}"
                                    class="h-50 align-self-center" alt="">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng hóa
                                    đơn
                                    nhập</a>
                                <span class="text-muted fw-bold d-block fs-7"></span>
                            </div>
                            <span class="badge badge-light fw-bolder my-2">{{ $countTable['inbound'] }}</span>
                        </div>
                        <!--end::Section-->
                    </div>
                    <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label">
                                <img src="{{ asset('assets/media/logos/outbound.png') }}"
                                    class="h-50 align-self-center" alt="">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng hóa
                                    đơn
                                    xuất</a>
                                <span class="text-muted fw-bold d-block fs-7"></span>
                            </div>
                            <span class="badge badge-light fw-bolder my-2">{{ $countTable['outbound'] }}</span>
                        </div>
                        <!--end::Section-->
                    </div>
                    <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label">
                                <img src="{{ asset('assets/media/logos/doi-tac.jpg') }}"
                                    class="h-50 align-self-center" alt="">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng số
                                    nhà cung cấp</a>
                                <span class="text-muted fw-bold d-block fs-7"></span>
                            </div>
                            <span class="badge badge-light fw-bolder my-2">{{ $countTable['supplier'] }}</span>
                        </div>
                        <!--end::Section-->

                    </div>
                    <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label">
                                <img src="{{ asset('assets/media/logos/ke-hang.jpg') }}"
                                    class="h-50 align-self-center" alt="">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng số
                                    kệ hàng</a>
                                <span class="text-muted fw-bold d-block fs-7"></span>
                            </div>
                            <span class="badge badge-primary fw-bolder my-2">{{ $countTable['shelf'] }}</span>
                        </div>
                        <!--end::Section-->
                    </div>
                    <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label">
                                <img src="{{ asset('assets/media/logos/green_plus.png') }}"
                                    class="h-50 align-self-center" alt="">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng số
                                    lượng các sản phẩm hiện đang tồn kho</a>
                                <span class="text-muted fw-bold d-block fs-7"></span>
                            </div>
                            <span class="badge badge-success fw-bolder my-2">{{ $sumQuantityTable['stock'] }}</span>
                        </div>
                        <!--end::Section-->

                    </div>
                    <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label">
                                <img src="{{ asset('assets/media/logos/green_plus.png') }}"
                                    class="h-50 align-self-center" alt="">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng số
                                    lượng các sản phẩm nhập</a>
                                <span class="text-muted fw-bold d-block fs-7"></span>
                            </div>
                            <span class="badge badge-success fw-bolder my-2">{{ $sumQuantityTable['inbound'] }}</span>
                        </div>
                        <!--end::Section-->

                    </div>
                    <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label">
                                <img src="{{ asset('assets/media/logos/green_plus.png') }}"
                                    class="h-50 align-self-center" alt="">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng số
                                    lượng các sản phẩm xuất</a>
                                <span class="text-muted fw-bold d-block fs-7"></span>
                            </div>
                            <span
                                class="badge badge-success fw-bolder my-2">{{ $sumQuantityTable['outbound'] }}</span>
                        </div>
                        <!--end::Section-->

                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 4-->
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var xdateIn = @json($dateIn);
    var ycountIn = @json($countIn);
    var sumIn = @json($sumIn);

    var xdateOut = @json($dateOut);
    var ycountOut = @json($countOut);
    var sumOut = @json($sumOut);
</script>
<script>
    const ctx = document.getElementById('myChart');

    const details = xdateOut;

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: xdateIn,
            datasets: [{
                    label: 'Nhập hàng',
                    data: ycountIn,
                    borderWidth: 1,
                    backgroundColor: '#9BEC00',
                },
                {
                    label: 'Xuất hàng',
                    data: ycountOut,
                    borderWidth: 1,
                    backgroundColor: '#36C2CE',
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Số đơn hàng'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: '7 ngày gần nhất'
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        footer: (tooltipItems) => {
                            let total = 0;
                            tooltipItems.forEach(function(tooltipItem) {
                                total += tooltipItem.raw;
                            });
                            return 'Tổng số đơn: ' + total;
                        },
                        afterFooter: (tooltipItems) => {
                            const index = tooltipItems[0].dataIndex;
                            return details[index] + ' - Tổng tiền nhập: ' + sumIn[index] +
                                ' - Tổng tiền xuất: ' + sumOut[index];
                        },
                    }
                }
            }
        }
    });
</script>

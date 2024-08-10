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
                                <img src="{{ asset('assets/media/logos/category.png') }}" class="h-50 align-self-center"
                                    alt="">
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
                                <img src="{{ asset('assets/media/logos/inbound.webp') }}" class="h-50 align-self-center"
                                    alt="">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng hóa đơn
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
                                <img src="{{ asset('assets/media/logos/outbound.png') }}" class="h-50 align-self-center"
                                    alt="">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng hóa đơn
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
                                <img src="{{ asset('assets/media/logos/doi-tac.jpg') }}" class="h-50 align-self-center"
                                    alt="">
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
                                <img src="{{ asset('assets/media/logos/ke-hang.jpg') }}" class="h-50 align-self-center"
                                    alt="">
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
                    {{-- <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 row me-2">

                                <div class="mb-3 col-3">
                                    <label for="" class="form-label">Đang chọn tuần thứ:
                                        {{ $selectWeek ?? 'Hiện tại' }}
                                    </label>
                                    <select class="form-select form-select-lg" wire:model.change='selectWeek'>
                                        <option selected disabled>Hiện tại</option>
                                        @foreach ($week as $item)
                                            <option value="{{ $item->week_of_year }}">Tuần
                                                {{ $item->week_of_year }}
                                                năm {{ $item->year }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="text-muted fw-bold d-block fs-7"></span>
                            </div>
                        </div>
                        <!--end::Section-->
                    </div> --}}

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
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder text-dark">Tổng tiền nhập xuất</span>
                        <span class="text-muted mt-1 fw-bold fs-7"></span>
                    </h3>
                </div>
                <div class="card-body pt-5">

                </div>
            </div>
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

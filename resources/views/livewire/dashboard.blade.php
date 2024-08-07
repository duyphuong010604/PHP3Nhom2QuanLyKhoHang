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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Trang chủ
                </h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary"></a>
                    </li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    {{-- End tootbar --}}
    <div class="row gy-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::List Widget 3-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title fw-bolder text-dark">Danh sách nhập hàng hóa</h3>
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000">
                                        </rect>
                                        <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                            opacity="0.3"></rect>
                                        <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                            opacity="0.3"></rect>
                                        <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                            opacity="0.3"></rect>
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--begin::Menu 3-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                            data-kt-menu="true">
                            <!--begin::Heading-->
                            <div class="menu-item px-3">
                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                    Nhập hàng hóa</div>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{ route('nhap-hang.index') }}" class="menu-link px-3">Danh sách</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{ route('nhap-hang.create') }}" class="menu-link px-3">Thêm mới</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu 3-->
                        <!--end::Menu-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-2 position-relative">
                    <!--begin::Item-->
                    @foreach ($this->inbounds as $item)
                        <div class="d-flex align-items-center mb-8">
                            <!--begin::Bullet-->
                            <span class="bullet bullet-vertical h-40px bg-success"></span>
                            <!--end::Bullet-->
                            <!--begin::Description-->
                            <div class="flex-grow-1 ms-2">
                                <a href="{{ route('nhap-hang.show', $item->id) }}"
                                    class="text-gray-800 text-hover-primary fw-bolder fs-6">Nhập hàng
                                    hóa
                                    #{{ $item->id }}</a>
                                <span class="text-muted fw-bold d-block">{{ $item->formatted_created_at }}</span>
                            </div>
                            <!--end::Description-->
                            <div class="flex-grow-1 align-items-end d-flex flex-column flex-grow-1">
                                <div class="badge badge-light-primary fs-8 fw-bolder">
                                    {{ number_format($item->totalAmount) }} VNĐ
                                </div>
                                <p
                                    class="fs-8 d-block  {{ $item->status === 'active' ? 'text-success' : 'text-muted' }}">
                                    {{ $item->status === 'active' ? 'Đã xử lý' : 'Nháp' }}
                                </p>
                            </div>
                        </div>
                        <!--end:Item-->
                    @endforeach
                    <a href="{{route('nhap-hang.index')}}" class="fw-bolder position-absolute bottom-0 start-0 ms-10 mb-4">
                        Xem thêm
                    </a>
                </div>
                <!--end::Body-->
            </div>
            <!--end:List Widget 3-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-8">
            <!--begin::Tables Widget 9-->
            <div class="card card-xl-stretch mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Danh sách sản phẩm</span>
                        <span class="text-muted mt-1 fw-bold fs-7"></span>
                    </h3>
                    <div class="card-toolbar" 
                        title="" data-bs-original-title="Nhấn thêm mới sản phẩm">
                        <a href="{{{route('san-pham.create')}}}" class="btn btn-sm btn-light btn-active-primary" 
                            >
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                        rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                        fill="black"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Thêm mới</a>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bolder text-muted">
                                   
                                    <th class="min-w-150px">Tên sản phẩm</th>
                                    <th>Danh mục</th>
                                    <th class="min-w-120px">Kệ hàng - Số lượng</th>
                                    <th class="min-w-100px text-end">Tùy chọn</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-45px me-5">
                                                    @if ($item->imageUrl)
                                                        <img src="{{ asset('storage/' . $item->imageUrl) }}"
                                                            alt="">
                                                    @else
                                                        <img src="{{ asset('storage/images/products/product.png') }}"
                                                            alt="">
                                                    @endif

                                                </div>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#"
                                                        class="text-dark fw-bolder text-hover-primary fs-6">{{ $item->name }}</a>
                                                    <span class="text-muted fw-bold text-muted d-block fs-7">Mã:
                                                        #{{ $item->sku }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#"
                                                class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $item->category->name }}</a>
                                        </td>
                                        <td class="text-end">
                                            @foreach ($item->stocks as $st)
                                                <div class="d-flex flex-column w-100 me-2">
                                                    <div class="d-flex flex-stack mb-2 fw-bold">
                                                        {{ $st->shelf->name }}
                                                    </div>
                                                    <div class="d-flex flex-stack mb-2">
                                                        <span class="text-muted me-2 fs-7 fw-bold">{{ $st->quantity }}
                                                            có sẵn</span>
                                                    </div>
                                                    <div class="progress h-6px w-100">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: {{ $st->quantity }}%" aria-valuenow="50"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                <a href="{{ route('san-pham.show', $item->id) }}"
                                                    role="button
                                                    class="btn
                                                    btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
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
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                               
                            </tbody>
                            
                            <!--end::Table body-->
                        </table>
                        <tfoot>
                            <a href="{{route('san-pham.index')}}" class="fw-bolder">
                                Xem thêm
                            </a>
                        </tfoot>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
            </div>
            <!--end::Tables Widget 9-->
        </div>
        <!--end::Col-->
    </div>
    <div class="row gy-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::List Widget 2-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title fw-bolder text-dark">Danh sách đối tác</h3>
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="5" y="5" width="5" height="5" rx="1"
                                            fill="#000000">
                                        </rect>
                                        <rect x="14" y="5" width="5" height="5" rx="1"
                                            fill="#000000" opacity="0.3"></rect>
                                        <rect x="5" y="14" width="5" height="5" rx="1"
                                            fill="#000000" opacity="0.3"></rect>
                                        <rect x="14" y="14" width="5" height="5" rx="1"
                                            fill="#000000" opacity="0.3"></rect>
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--begin::Menu 2-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px"
                            data-kt-menu="true" style="">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Danh sách khách hàng</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Thêm mới</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu 2-->
                        <!--end::Menu-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-2">
                    <!--begin::Item-->
                    @foreach ($customers as $item)
                    <div class="d-flex align-items-center mb-7">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px me-5">
                            <img src="{{ asset('storage/images/customer.jpg') }}" class="" alt="">
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Text-->
                        <div class="flex-grow-1">
                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$item->name}}</a>
                            <span class="text-muted d-block fw-bold">Đối tượng: {{$item->object}}</span>
                        </div>
                        <!--end::Text-->
                    </div>
                    @endforeach
                    <!--end::Item-->
                    <a href="{{route('doi-tac.index')}}" class="fw-bolder position-absolute bottom-0 start-0 ms-10 mb-4">
                        Xem thêm
                    </a>
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 2-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::List Widget 6-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title fw-bolder text-dark">Xuất hàng hóa</h3>
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="5" y="5" width="5" height="5" rx="1"
                                            fill="#000000">
                                        </rect>
                                        <rect x="14" y="5" width="5" height="5" rx="1"
                                            fill="#000000" opacity="0.3"></rect>
                                        <rect x="5" y="14" width="5" height="5" rx="1"
                                            fill="#000000" opacity="0.3"></rect>
                                        <rect x="14" y="14" width="5" height="5" rx="1"
                                            fill="#000000" opacity="0.3"></rect>
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--begin::Menu 3-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                            data-kt-menu="true" style="">
                            <!--begin::Heading-->
                            <div class="menu-item px-3">
                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                    Xuất hàng hóa</div>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{route('xuat-hang.index')}}" class="menu-link px-3">Danh sách xuất</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{{route('xuat-hang.create')}}}" class="menu-link flex-stack px-3">Thêm mới
                                </a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu 3-->
                        <!--end::Menu-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0">
                    @foreach ($outbounds as $item)
                         <!--begin::Item-->
                    <div class="d-flex align-items-center bg-light-success rounded p-5 mb-7">
                        <!--begin::Icon-->
                        <span class="svg-icon svg-icon-success me-5">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3"
                                        d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                        fill="black"></path>
                                    <path
                                        d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                        fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <!--end::Icon-->
                        <!--begin::Title-->
                        <div class="flex-grow-1 me-2">
                            <a href="{{ route('xuat-hang.show', $item->id) }}"
                                class="fw-bolder text-gray-800 text-hover-primary fs-6">Xuất hàng hóa
                                #{{$item->id}}</a>
                            <span class="text-muted fw-bold d-block">{{$item->formatted_created_at}}</span>
                        </div>
                        <!--end::Title-->
                        <!--begin::Lable-->
                        <span class="fw-bolder text-success py-1">{{number_format($item->totalAmount)}} VNĐ</span>
                        <!--end::Lable-->
                    </div>
                    <!--end::Item-->
                    @endforeach
                    <a href="{{route('xuat-hang.index')}}" class="fw-bolder position-absolute bottom-0 start-0 ms-10 mb-4">
                        Xem thêm
                    </a>
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 6-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::List Widget 4-->
            <div class="card card-xl-stretch mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder text-dark">Số lượng các đối tượng</span>
                        <span class="text-muted mt-1 fw-bold fs-7"></span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-5">
                    <!--begin::Item-->
                    <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label">
                                <img src="{{ asset('storage/images/products/product.png') }}" class="h-50 align-self-center"
                                    alt="">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng số lượng sản phẩm</a>
                                <span class="text-muted fw-bold d-block fs-7"></span>
                            </div>
                            <span class="badge badge-light fw-bolder my-2">{{$countTable['products']}}</span>
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
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
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng các khách hàng</a>
                                <span class="text-muted fw-bold d-block fs-7"></span>
                            </div>
                            <span class="badge badge-light fw-bolder my-2">{{$countTable['customers']}}</span>
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label">
                                <img src="{{asset('assets/media/logos/inbound.webp')}}" class="h-50 align-self-center"
                                    alt="">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng hóa đơn nhập</a>
                                <span class="text-muted fw-bold d-block fs-7"></span>
                            </div>
                            <span class="badge badge-light fw-bolder my-2">{{$countTable['inbound']}}</span>
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label">
                                <img src="{{asset('assets/media/logos/outbound.png')}}" class="h-50 align-self-center"
                                    alt="">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng hóa đơn xuất</a>
                                <span class="text-muted fw-bold d-block fs-7"></span>
                            </div>
                            <span class="badge badge-light fw-bolder my-2">{{$countTable['outbound']}}</span>
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Item-->
                    <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label">
                                <img src="{{asset('assets/media/logos/green_plus.png')}}" class="h-50 align-self-center"
                                    alt="">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng số lượng các sản phẩm hiện đang tồn kho</a>
                                <span class="text-muted fw-bold d-block fs-7"></span>
                            </div>
                            <span class="badge badge-success fw-bolder my-2">{{$sumQuantityTable['stock']}}</span>
                        </div>
                        <!--end::Section-->
                       
                    </div>
                    <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label">
                                <img src="{{asset('assets/media/logos/green_plus.png')}}" class="h-50 align-self-center"
                                    alt="">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng số lượng các sản phẩm nhập</a>
                                <span class="text-muted fw-bold d-block fs-7"></span>
                            </div>
                            <span class="badge badge-success fw-bolder my-2">{{$sumQuantityTable['inbound']}}</span>
                        </div>
                        <!--end::Section-->
                       
                    </div>

                    <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label">
                                <img src="{{asset('assets/media/logos/green_plus.png')}}" class="h-50 align-self-center"
                                    alt="">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Tổng số lượng các sản phẩm xuất</a>
                                <span class="text-muted fw-bold d-block fs-7"></span>
                            </div>
                            <span class="badge badge-success fw-bolder my-2">{{$sumQuantityTable['outbound']}}</span>
                        </div>
                        <!--end::Section-->
                       
                    </div>

                    <a href="{{route('thong-ke.index')}}" class="fw-bolder position-absolute bottom-0 start-0 ms-10 mb-4">
                        Thống kê chi tiết
                    </a>
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 4-->
        </div>
        <!--end::Col-->
    </div>
</div>

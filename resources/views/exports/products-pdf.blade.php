<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../">

    <title></title>
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->


    <!--end::Global Stylesheets Bundle-->

</head>
<style>
    body {
        font-family: 'DejaVu Sans', sans-serif;
    }

    .container {
        width: 100%;
        margin: 0 auto;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border: 1px solid #dee2e6;
        text-align: left;
    }

    .table th {
        background-color: #f8f9fa;
    }

    .badge {
        display: inline-block;
        padding: 0.25em 0.4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25rem;
    }

    .badge-light-success {
        background-color: #d4edda;
        color: #155724;
    }

    .badge-light-primary {
        background-color: #cce5ff;
        color: #004085;
    }

    .badge-secondary {
        background-color: #e2e3e5;
        color: #383d41;
    }
</style>
</head>

<body>
    <div class="container">
        <h2 class="mb-5">Danh sách sản phẩm</h2>
        <div class="table-responsive">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Mã</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Gía nhập</th>
                        <th scope="col">Gía bán</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Kệ hàng - Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr class="odd">
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <div class="text-gray-800 text-hover-primary mb-1">
                                    {{ $item->id }}
                                </div>
                            </td>
                            <td>
                                <div class="text-gray-800 text-hover-primary mb-1">
                                    {{ $item->name }}
                                </div>
                            </td>
                            <td>
                                <div class="badge badge-light-success">
                                    {{ number_format($item->cost) }} vnđ
                                </div>
                            </td>
                            <td>
                                <div class="badge badge-light-primary">
                                    {{ number_format($item->price) }} vnđ
                                </div>
                            </td>
                            <td>{{ $item->category->name }}</td>
                            <td>
                                @if ($item->stocks)
                                    @foreach ($item->stocks as $stockProduct)
                                        <p class="badge badge-secondary">
                                            Kệ {{ $stockProduct->shelf->name }}: {{ $stockProduct->quantity }}
                                        </p>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

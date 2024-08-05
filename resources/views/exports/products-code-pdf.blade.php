<!DOCTYPE html>
<html lang="vi">

<head>
    <base href="../">
    <title>Danh Sách Sản Phẩm</title>
    <meta name="description" content="Danh sách sản phẩm với mã code và mã QR" />
    <meta name="keywords" content="sản phẩm, mã code, mã QR, danh mục, giá bán, giá nhập" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Danh Sách Sản Phẩm" />
    <meta property="og:url" content="https://yourwebsite.com/danhsachsanpham" />
    <meta property="og:site_name" content="YourWebsite" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->



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
        font-weight: 600;
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
        font-weight: 500;
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

<body>
    <div class="container">
        <h2 class="mb-5">Danh Sách Sản Phẩm</h2>
        <div class="table-responsive">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Mã</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Giá Nhập</th>
                        <th scope="col">Giá Bán</th>
                        <th scope="col">Danh Mục</th>
                        <th scope="col">Mã Code</th>

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
                                    {{ number_format($item->cost) }} VND
                                </div>
                            </td>
                            <td>
                                <div class="badge badge-light-primary">
                                    {{ number_format($item->price) }} VND
                                </div>
                            </td>
                            <td>{{ $item->category->name }}</td>
                            <td>
                                <p class="mb-6">
                                    {!! DNS1D::getBarcodeHTML("$item->sku", 'C39+') !!}
                                </p>
                                <p class="mt-6">
                                    {!! DNS2D::getBarcodeHTML("$item->sku", 'QRCODE') !!}
                                </p>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

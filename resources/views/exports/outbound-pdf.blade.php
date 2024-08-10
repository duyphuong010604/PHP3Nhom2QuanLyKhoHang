<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hóa đơn xuất hàng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 14px;
            background-color: #f8f9fa;
            color: #495057;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #007bff;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 12px;
            vertical-align: middle;
            border: 1px solid #dee2e6;
            text-align: center;
        }

        .table th {
            background-color: #6c757d;
            color: #fff;
        }

        .table td {
            background-color: #e9ecef;
        }

        .badge {
            display: inline-block;
            padding: 0.5em 0.75em;
            font-size: 85%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.375rem;
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
        <h2 class="mb-5">Hóa đơn xuất hàng</h2>
        <div class="table-responsive">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th scope="col">Mã hóa đơn</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Tên kệ hàng</th>
                        <th scope="col">Thời gian xuất</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($outbounds as $outbound)
                    <tr class="odd">
                        <td>
                            <div class="text-gray-800 text-hover-primary mb-1">
                                {{ $outbound->id }}
                            </div>
                        </td>
                        <td>
                            <div class="text-gray-800 text-hover-primary mb-1">
                                {{ number_format($outbound->totalAmount) }}
                            </div>
                        </td>
                        <td>
                            <div class="badge badge-light-success">
                                {{ $outbound->shelf->name }}
                            </div>
                        </td>
                        <td>
                            <div class="badge badge-light-primary">
                                {{ $outbound->created_at }}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

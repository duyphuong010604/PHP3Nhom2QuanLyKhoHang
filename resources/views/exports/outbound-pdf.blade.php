<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hóa đơn</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            background-color: #f4f4f5;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .invoice-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border: 10px solid #d9534f;
            page-break-after: always;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .invoice-header h1 {
            font-size: 24px;
            font-weight: 700;
            color: #d9534f;
        }

        .invoice-header .company-details {
            text-align: right;
        }

        .invoice-header .company-details h2 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
        }

        .invoice-header .company-details p {
            margin: 0;
            font-size: 14px;
        }

        .customer-details {
            margin-bottom: 20px;
        }

        .customer-details h3 {
            font-size: 18px;
            font-weight: 700;
            color: #d9534f;
        }

        .customer-details p {
            margin: 5px 0;
            font-size: 14px;
        }

        .invoice-details {
            text-align: right;
            font-size: 14px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            page-break-inside: avoid;
        }

        .invoice-table th, .invoice-table td {
            padding: 10px;
            border: 1px solid #dee2e6;
            text-align: center;
        }

        .invoice-table th {
            background-color: #d9534f;
            color: #ffffff;
            font-weight: 700;
        }

        .invoice-table tfoot td {
            font-weight: 700;
        }

        .total {
            font-size: 20px;
            font-weight: 700;
            color: #d9534f;
            text-align: right;
        }

        .payment-details, .contact-details {
            font-size: 14px;
            margin-bottom: 20px; /* Increased margin-bottom */
        }

        .payment-details h4, .contact-details h4 {
            font-size: 16px;
            font-weight: 700;
            color: #d9534f;
            margin-bottom: 5px;
        }

        .contact-details {
            text-align: center;
            page-break-inside: avoid;
        }
    </style>
</head>

<body>

    <div class="invoice-container">
        <div class="invoice-header">
            <h1>HÓA ĐƠN XUẤT HÀNG</h1>
            <div class="company-details">
                <h2>Công ty WARE HOUSE</h2>
                @foreach ($outbounds as $outbound)
                <p>Hóa đơn #{{ $outbound->id }}</p>
                <p>Ngày  {{ $outbound->created_at }}</p>
                    @endforeach

            </div>
        </div>

        <div class="customer-details">
            <h3>Thông tin khách hàng</h3>
            @foreach ($customers as $customer )
<p> Tên: {{$customer->name}}</p>
<p> SĐT: {{$customer->email}}</p>
<p> Email: {{$customer->phone}}</p>
            @endforeach
        </div>

        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($outboundetails as $outboundetail)
                    <tr class="odd">
                        <td>
                            <div class="text-gray-800 text-hover-primary mb-1">
                            {{ $outboundetail->product->name }}
                            </div>
                        </td>
                        <td>
                            <div class="text-gray-800 text-hover-primary mb-1">
                                {{ number_format($outboundetail->unitPrice) }}
                            </div>
                        </td>
                        <td>
                            <div class="badge badge-light-success">
{{ $outboundetail->quantity }}
                            </div>
                        </td>
                        <td>
                            <div class="badge badge-light-primary">
                            {{ $outboundetail->totalPrice }}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Mã hóa đơn</th>
                    <th>Thành tiền</th>
                    <th>Thời gian xuất</th>
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
                            <div class="badge badge-light-primary">
                                {{ $outbound->created_at }}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="contact-details">
            <h4>Thông tin liên hệ</h4>
            <p>warehouse@gmail.com</p>
            <p>C106 Khu dân cư hoàn quân, Thành phố Cần thơ</p>
            <p>+84 0343456789</p>
        </div>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('assets/css./style.bundle.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css./style.bundle.css.map') }}" rel="stylesheet">
    <link href="{{ asset('assets/css./style.bundle.js') }}" rel="stylesheet">
    <link href="{{ asset('assets/css./style.bundle.js.map') }}" rel="stylesheet">
    <link href="{{ asset('assets/css./style.bundle.rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css./style.dark.bundle.css.map') }}" rel="stylesheet">
    <link href="{{ asset('assets/css./style.dark.bundle.js') }}" rel="stylesheet">
    <link href="{{ asset('assets/css./style.dark.bundle.js.map') }}" rel="stylesheet">
    <link href="{{ asset('assets/css./style.dark.bundle.rtl.css') }}" rel="stylesheet">
</head>

<body>
    @section('addcustomer')
        @extends('customers.create')
    @endsection
</body>

</html>

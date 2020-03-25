<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    @yield('style')
</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">


    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">


            <div class="container-fluid">

                <div class="row">
                    @yield('content')

                </div>
            </div>

        </div>

    </div>

</div>



<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset("/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset('/js/sb-admin-2.min.js') }}"></script>
@yield('script')
</body>
</html>

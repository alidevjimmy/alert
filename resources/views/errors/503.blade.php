@extends('admin.app')
@section('title') صفحه 503 @endsection
@section('content')
    <div class="container-fluid">

        <!-- 404 Error Text -->
        <div class="text-center">
            <div class="error mx-auto" data-text="503">503</div>
            <p class="lead text-gray-800 mb-5">خطا در برقراری ارتباط با سرور</p>
            <a href="{{ route('admin.index') }}">&larr;بازگشت به صفحه اصلی</a>
        </div>

    </div>
@endsection

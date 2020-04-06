@extends('admin.app')
@section('title') اضافه کردن نوتیفیکیشن @endsection
@section('script')
<script src="{{ asset('/js/jquery.datetimepicker.full.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(() => {
        $('#datetimepicker').datetimepicker({theme:'dark'});
    }) 
</script>
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/jquery.datetimepicker.css') }}" />
@endsection
@section('content')
    <form style="margin: auto" class="col-md-6" action="{{ route('admin.notifications.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">عنوان نوتیفیکیشن :</label>
            <input type="text" value="{{ old('title') }}" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                   aria-describedby="emailHelp" placeholder="عنوان نوتیفیکیشن را وارد کنید ...">
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <label for="link">لینک نوتیفیکیشن :</label>
            <input type="text" value="{{ old('link') }}" name="link" class="form-control @error('link') is-invalid @enderror" id="link"
                   aria-describedby="emailHelp" placeholder="لینک نوتیفیکیشن را وارد کنید ...">
            @error('link')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <label for="body">متن نوتیفیکیشن :</label>
            <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="body"
                       placeholder="متن نوتیفیکیشن را وارد کنید ...">{{ old('body') }}</textarea>
            @error('body')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <label for="sendDate">زمان ارسال نوتیفیکیشن :</label>
            <input type="text" value="{{ old('sendDate') }}" name="sendDate" class="form-control @error('sendDate') is-invalid @enderror" id="datetimepicker"
                   placeholder="زمان ارسال نوتیفیکیشن را وارد کنید ...">
            @error('sendDate')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            الان : {{ \Carbon\Carbon::now() }}
        </div>

        <button type="submit" class="btn btn-primary">ثبت</button>
    </form>
@endsection

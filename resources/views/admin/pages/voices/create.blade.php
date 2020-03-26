@extends('admin.app')
@section('title') اضافه کردن آلارم @endsection
@section('content')
    <form style="margin: auto" class="col-md-6" action="{{ route('admin.voices.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group">
            <label for="name">نام آلارم :</label>
            <input type="text" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                   aria-describedby="emailHelp" placeholder="نام آلارم را وارد کنید ...">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>فیلد نام آلارم را پر کنید</strong>
            </span>
            @enderror
            <br>
            <label for="voice">فایل آلارم :</label>
            <input name="voice" value="{{ old('voice') }}" type="file" class="form-control-file @error('voice') is-invalid @enderror" id="voice">
            @error('voice')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">ثبت</button>
    </form>
@endsection

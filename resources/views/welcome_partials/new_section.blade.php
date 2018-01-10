@extends('layouts.welcome')
@section('content')
    <div class="text-center py-3">
        <img src="welcome_images/5col.png" id="section-img">
    </div>
    <hr>
    <form class="row p-4" action="{{url('/welcome_sections')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group col-md-4">
            <label for="section-type"> نوع بخش </label>
            <select class="form-control" id="section-type" name="type">
                <option value="5col">5 ستونه</option>
                <option value="slider">اسلایدر</option>
                <option value="blog">بلاگ</option>
                <option value="image">عکس چهارتایی</option>
                <option value="image_cadr">عکس چهارتایی با کادر</option>
                <option value="download">دانلود فایل 4 ستونه</option>
                <option value="product">محصول چهارتایی</option>
                <option value="link">لینک چهارتایی</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="id">عنوان</label>
            <input type="text" class="form-control" id="id" name="id">
        </div>
        <div class="form-group col-md-4">
            <label for="id">آیدی (لاتین)</label>
            <input type="text" class="form-control" id="id" name="id" lang="en" dir="ltr">
        </div>

    </form>
@endsection

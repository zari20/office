@extends('layouts.welcome')
@section('content')
    <form class="row p-4" action="index.html" method="post">
        <div class="form-group col-md-4">
            <label for="type"> نوع بخش </label>
            <select class="form-control" id="type" name="type">
                <option value="5col">5 ستونه</option>
                <option value="slider">اسلایدر</option>
                <option value="blog">بلاگ</option>
                <option value="image">عکس چهارتایی</option>
                <option value="image_cadr">عکس چهارتایی با کادر</option>
                <option value="download">دانلود فایل 4 ستونه</option>
                <option value="product">محصول چهارتایی</option>
                <option>لینک چهارتایی</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="id">آیدی</label>
            <input type="text" class="form-control" id="id" name="id">
        </div>
        <div class="form-group col-md-4">
            <label for="id">عنوان</label>
            <input type="text" class="form-control" id="id" name="id">
        </div>
    </form>
@endsection

<div class="row">
    @foreach ($section->fragments() as $key => $product)
        <div class="col-xl-3 col-lg-3 col-md-6 col-xs-12 shop">
            <div class="card h-100">
                <a href="#">
                    <img class="card-img-top" src="welcome/{{$product->picture_path}}" alt="{{$product->title}}">
                </a>
                <div class="card-body">
                    <p class="card-text"> {{$product->passage}} </p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary blue">{{$product->button_name}}</a>
                    <p>{{$product->price}} تومان</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

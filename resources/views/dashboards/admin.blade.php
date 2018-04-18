<h4 class="text-green dinar mb-4"> <i class="fa fa-cogs ml-1"></i> مدیریت سرویس ها </h4>
<div class="text-center">
    @php
        $services = ['اتاق ها','پذیرایی','خدمات سمعی بصری','خدمات گرافیکی','خدمات روابط عمومی'];
        $icons = ['hotel','coffee','film','gamepad','headphones'];
    @endphp
    @foreach (array_combine($services,$icons) as $service => $icon)
        <div class="col5">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header text-center"> <i class="fa fa-{{$icon}} ml-1"></i> مدیریت {{$service}}</div>
                <div class="card-body">
                    <a href="#" class="btn btn-block text-light white-shadow bg-blue-no-hover"> <i class="fa fa-eye ml-1"></i> مشاهد همه </a>
                    <a href="#" class="btn btn-block text-light white-shadow bg-green"> <i class="fa fa-plus ml-1"></i> تعریف مورد جدید </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
<hr>

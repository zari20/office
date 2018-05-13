<div class="direct-x">
    <table class="table table-bordered table-hover table-striped text-center">
        <thead>
            <tr>
                <th>هزینه رزرو سالن</th>
                @foreach (services() as $key => $service)
                    <th>هزینه {{$service->title}}</th>
                @endforeach
                <th>مجموع</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td id="pricing-room"> {{old('schedule')['cost'] ? number_format(old('schedule')['cost']) : 0}} </td>
                @foreach (services() as $key => $service)
                    <td id="pricing-service-{{$service->id}}"> 0 </td>
                @endforeach
                <td id="pricing-total"> {{old('total_cost') ? number_format(old('total_cost')) : 0}} </td>
            </tr>
        </tbody>
    </table>
</div>

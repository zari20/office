<div class="direct-x">
    <table class="table table-bordered table-hover table-striped text-center">
        <thead>
            <tr>
                <th> ردیف </th>
                <th> عنوان </th>
                <th> قیمت پایه </th>
                <th> تعداد </th>
                <th> توضیحات </th>
                <th colspan="2"> عملیات </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($models as $key => $model)
                <tr>
                    <td> {{$key+1}} </td>
                    <td> {{$model->title ?? '-'}} </td>
                    <td> {{toman($model->base)}} </td>
                    <td> @include('fragments.cor', ['var' => $model->countable]) </td>
                    <td> {{$model->description ? str_with_dots($model->description) : '-'}} </td>
                    <td> <a title="ویرایش" href="{{url("services/$model->id/edit?kind=service_model")}}" class="text-success"> <i class="fa fa-edit"></i> </a> </td>
                    <td> @include('fragments.delete', ['object'=>$model, 'name' => 'service', 'value'=>'service_model']) </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

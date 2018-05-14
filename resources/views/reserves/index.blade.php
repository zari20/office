@extends('layouts.app')
@section('content')
    <p class="h2 text-blue"> لیست رزرو ها </p>
    <hr>
    @if (count($reserves))
        <div class="direct-x">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead>
                    <tr>
                        <th> ردیف </th>
                        @admin
                            <th> شماره تماس کاربر </th>
                        @endadmin
                        <th> سالن </th>
                        <th> خدمات </th>
                        <th> کد تخفیف </th>
                        <th> مجموع هزینه ها </th>
                        <th> قابل پرداخت </th>
                        <th> وضعیت </th>
                        <th colspan="2"> عملیات </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reserves as $key => $reserve)
                        <tr>
                            <th scope="row"> {{$key+1}} </th>
                            @admin
                                <td>
                                    @if (isset($reserve->user->id) && $reserve->user->id)
                                        <a href="{{url("users/{$reserve->user->id}")}}"> {{$reserve->user->mobile ?? '?'}} </a>
                                    @endif
                                </td>
                            @endadmin
                            <td> {{$reserve->room->name ?? '?'}} </td>
                            <td>
                                @foreach (services() as $key => $service)
                                    <span class="mx-1" title="{{$service->title}}">
                                        @include('fragments.cor', ['var' => $reserve->services->find($service->id)])
                                    </span>
                                @endforeach
                            </td>
                            <td> {{ $reserve->discount_code_id ? ($reserve->discount->code ?? '?') : '-'}} </td>
                            <td> {{toman($reserve->total_cost)}} </td>
                            <td> {{$reserve->payable_amount ? toman($reserve->payable_amount) : toman($reserve->total_cost)}} </td>
                            <td class="bg-{{$reserve->status ? ( $reserve->status==1 ? 'success text-white' : 'danger text-white' ) : 'warning'  }}">
                                {{$reserve->status ? ( $reserve->status==1 ? 'پرداخت شده' : 'کنسل شده' ) : 'معلق'  }}
                            </td>
                            @regular
                                <td>
                                    @if ($reserve->status == 0)
                                        <form class="d-inline" action="{{url("reserves/pay/$reserve->id")}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-info"> <i class="fa fa-credit-card ml-1"></i> پرداخت آنلاین </button>
                                        </form>
                                    @else
                                        -
                                    @endif
                                </td>
                            @endregular
                            <td>
                                <a href="{{url("reserves/$reserve->id")}}" class="btn btn-info"> <i class="fa fa-eye ml-1"></i> مشاهده </a>
                            </td>
                            {{-- @admin
                                <td>
                                     <a onclick="if(confirm('ایا این آیتم پاک شود؟')) $('form#delete-reserve-{{$reserve->id}}').submit()" title="حذف">
                                         <i class="fa fa-trash text-danger"></i>
                                     </a>
                                     <form class="d-none" action="{{url("reserves/$reserve->id")}}" method="post" id="delete-reserve-{{$reserve->id}}">
                                         @csrf
                                         {{method_field('DELETE')}}
                                     </form>
                                 </td>
                            @endadmin --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning text-center p-3">
            <i class="fa fa-warning ml-1"></i>
            موردی یافت نشد.
        </div>
    @endif
@endsection

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Management</title>

    <!-- Styles -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/fonts.css')}}" rel="stylesheet">
    <link href="{{asset('css/colors.css')}}" rel="stylesheet">
    <link href="{{asset('css/home.css')}}" rel="stylesheet">
</head>
<body dir="rtl">
    <hr>
    @guest
        <a class="btn btn-primary" href="{{ route('login') }}"> Login </a>
    @else
        <div class="row">
            <div class="dropdown col-md-6 text-center p-3">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ادمین
                </button>
                <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
            <div class="dropdown col-md-6 text-center show p-3">
                <a class="btn btn-danger dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    انتخاب منو
                </a>

                <div class="dropdown-menu dropdown-menu-right text-right manage" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{url('/manage/welcome_words')}}"> مدیریت کلمات </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_colors')}}"> مدیریت رنگ ها </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_header')}}"> هدر </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_menu')}}"> منو </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_logo')}}"> لوگو </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_cols')}}"> ستون ها </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_sliders')}}"> اسلایدر </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_introduce_tabs')}}"> تب های {{$words->introduce}} </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_team_members')}}"> {{$words->our_team}} </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_our_services')}}"> {{$words->our_services}} </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_our_projects')}}"> {{$words->our_projects}} </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_our_departments')}}"> {{$words->our_departments}} </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_our_views')}}"> {{$words->our_views}} </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_our_branches')}}"> {{$words->our_branches}} </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_main_branch')}}"> {{$words->contact_main_branch}} </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_contact_branches')}}"> {{$words->contact_branches}} </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_catalogs')}}"> {{$words->catalogs}} </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_videos')}}"> {{$words->videos}} </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_products')}}"> محصولات </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_links')}}"> لینک ها </a>
                    <a class="dropdown-item" href="{{url('/manage/welcome_footer')}}"> فوتر </a>
                    {{-- <div class="dropdown-divider"></div> --}}
                </div>
            </div>
        </div>
    @endguest
    <hr>

<div class="content p-4">
    @include('partials.are_you_sure')
    @include('partials.flash')
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/home.js')}}"></script>
</body>
</html>

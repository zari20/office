<!DOCTYPE HTML>
<html lang="en">

<head>
	<title> ورود به مدیریت قالب سایت </title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="css/welcome/login.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/welcome/fonts.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
</head>

<body>
	<!--header-->
	<div class="header-w3l">
		<h1>
			<span>R</span>oyan
			<span>R</span>asaneh
	</div>
	<!--//header-->
	<div class="main-content-agile">
		<div class="sub-main-w3">
            @if ($errors->any())
                <div class="errors">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
			<form action="{{url('/welcome_login')}}" method="post">
                {{ csrf_field() }}
				<div class="pom-agile">
                    <span class="fa fa-user-o" aria-hidden="true"></span>
					<input placeholder="نام کاربری" name="username" class="user" type="text" required="" value="{{old('username')}}">
				</div>
				<div class="pom-agile">
					<span class="fa fa-key" aria-hidden="true"></span>
					<input placeholder="رمز عبور" name="password" class="pass" type="password" required="">
				</div>
				{{-- <div class="sub-w3l">
					<div class="sub-agile">
						<input type="checkbox" id="brand1" value="">
						<label for="brand1">
							<span></span>Remember me</label>
					</div>
					<a href="#">Forgot Password?</a>
					<div class="clear"></div>
				</div> --}}
                <br>
				<div class="right-w3l">
					<button type="submit"> ورود </button>
				</div>
			</form>
		</div>
	</div>
	<!--//main-->
	{{-- <!--footer-->
	<div class="footer">
		<p>&copy; 2018 Creative Login Form. All rights reserved | Design by
			<a href="http://w3layouts.com">W3layouts</a>
		</p>
	</div>
	<!--//footer--> --}}
</body>

</html>

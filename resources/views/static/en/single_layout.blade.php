<!DOCTYPE html>
<html lang="bg">

@include('static.includes.en.single_head')

<body style="opacity:0">
    <script src="./js/jquery.morelines.js"></script>
    <div id="content">
        <!-- header section - nav - gallery -->
			<div id="header" class="col-md-12 col-sm-12 d-flex flex-row flex-wrap header">
				<div id="logo" class="col-md-1 col-sm-1">
					<h1><a href="{{route('home')}}"><img src="{{asset('/images/logoVS_en.png')}}" alt="vso-logo" class="img-responsive main-logo"></a></h1>
				</div>
                @include('static.includes.en.menu')

				<div class="row buttons-right col-md-2">
					<div id="candidate-btn" class="col-md-2">
						<span id="candidate"><a href="{{route('login')}}">Login</a></span>
					</div>
				</div>
                <!-- hamburger -->
                @include('static.includes.en.hamburger_menu')
                <!-- end of hamburger -->
			</div>
            @include('static.includes.en.lang_btn')
		<!-- end of header section -->
        @yield('content')
    </div>
        <script src="{{asset('/js/hamburger-menu.js')}}"></script>
</body>
</html>

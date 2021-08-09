<!DOCTYPE html>
<html lang="bg">

@include('static.includes.bg.courses_head')

<body style="opacity:0">
    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
    <!-- JQuery UI-->
    <script type="text/javascript" src="{{asset('/js/jquery-ui.js')}}"></script>
    @include('static.includes.bg.lang_btn')
    @yield('content')
    <div class="section">
        @include('static.includes.bg.footer')
    </div>
<script>
    $(function() {
        $('.main-nav-list > li > a').on('click', function() {
            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top
            }, 500, 'linear');
        });

        $('#prepare > a').on('click', function() {
            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top
            }, 1000, 'linear');
        });
    
        $('.card').on('mouseenter',function() {
            if($(this).find('img').attr('data-hover-img')) {
                var hoverImg = $(this).find('img').attr('data-hover-img');
                $(this).find('img').attr('data-hover-img', $(this).find('img').attr('src'));
                $(this).find('img').attr('src', hoverImg);
            }
        });
    
        $('.card').on('mouseleave', function(){
            if($(this).find('img').attr('data-hover-img')) {
                var hoverImg = $(this).find('img').attr('data-hover-img');
                $(this).find('img').attr('data-hover-img', $(this).find('img').attr('src'));
                $(this).find('img').attr('src', hoverImg);
            }
        });
    });
</script>
<script type="text/javascript">
    $(function() {
        $('head').append('<link rel="preload stylesheet" href="{{asset('/css/static_courses.css')}}" as="style">');
        $('head').append('<link rel="preload stylesheet" href="{{asset('/css/personal_application_results.css')}}" as="style">');
        $('head').append('<link rel="preload stylesheet" href="{{asset('/css/bootstrap.css')}}" as="style">');
        $('head').append('<link rel="preload stylesheet" href="{{asset('/css/bootstrap-grid.min.css')}}" as="style">');
        $('head').append('<link rel="preload stylesheet" href="{{asset('/css/font-awesome.min.css')}}" as="style">');

        var sectionsnap = document.createElement("script");
        sectionsnap.src = "{{asset('/js/jquery-sectionsnap.js')}}";
        var hamburger = document.createElement("script");
        hamburger.src = "{{asset('/js/hamburger-menu.js')}}";
        var countdownTimer = document.createElement("script");
        countdownTimer.src = "{{asset('/js/countdownTimer.js')}}";

        $('body').append(sectionsnap);
        $('body').append(hamburger);
        $('body').append(countdownTimer);
    });
</script>
</body>

</html>

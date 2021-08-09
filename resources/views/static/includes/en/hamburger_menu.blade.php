<div class="hamburger-wrap col-sm-12 col-md-12 text-center">
    <button class="hamburger"><img src="{{asset('/images/hamburger-menu.png')}}" alt=""></button>
    <button class="cross">&#735;</button>
    <div class="menu col-md-12 col-sm-12 col-xs-12">
        <ul class="hamburger-nav">
            <li class="nav-item"><a href="{{route('home')}}">Home</a></li>
            <li class="nav-item"><a class="about-hamburger" href="#">About<i class="fas fa-angle-down"></i></a></li>
            <li class="about-go bg-secondary"><a class="text-light" href="{{route('mission')}}">Mission</a></li>
            <li class="about-go bg-secondary"><a class="text-light" href="{{route('about')}}">Team</a></li>
            <li class="about-go bg-secondary"><a class="text-light" href="{{route('year_reports')}}">Annual reports</a></li>
            <li class="about-go bg-secondary"><a class="text-light" href="{{route('contacts')}}">Contacts</a></li>
            <li class="nav-item"><a href="http://gnezdoto.vratsasoftware.com/" target=" _blank">The Nest</a></li>
            <li class="nav-item"><a class="edu-hamburger" href="#">Courses <i class="fas fa-angle-down"></i></a></li>
            <li class="edu-go bg-secondary"><a class="text-light" href="{{route('programmingCourses')}}">Programming</a></li>
            <li class="edu-go bg-secondary"><a class="text-light" href="{{route('digitalMarketing')}}">Digital Marketing</a></li>
            <li class="nav-item"><a href="{{route('login')}}" class="right-mobile">Login</a></li>
            {{-- <li class="nav-item"><a href="#" class="right-mobile">APPLY NOW</a></li> --}}
            <li>
                <a href="{{ route('langroute', 'bg') }}"><img src="{{asset('/images/bg.png')}}" width="25px"></a>
            </li>
        </ul>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $('.about-hamburger').click();
        $('.about-hamburger').click();
        $('.edu-hamburger').click();
        $('.edu-hamburger').click();
    });
    $('.about-hamburger').on('click',function(){
        if(!$(this).hasClass('opened')){
            $(this).addClass('opened');
            $(this).find('i').removeClass('fa-angle-down').addClass('fa-angle-up');
            $(this).parent().addClass('nav-item');
            $('.about-go').show();
        }else{
            $(this).removeClass('opened');
            $(this).find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
            $(this).parent().removeClass('nav-item');
            $('.about-go').hide();
        }
    });

    $('.edu-hamburger').on('click',function(){
        if(!$(this).hasClass('opened')){
            $(this).addClass('opened');
            $(this).find('i').removeClass('fa-angle-down').addClass('fa-angle-up');
            $(this).parent().addClass('nav-item');
            $('.edu-go').show();
        }else{
            $(this).removeClass('opened');
            $(this).find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
            $(this).parent().removeClass('nav-item');
            $('.edu-go').hide();
        }
    });
</script>

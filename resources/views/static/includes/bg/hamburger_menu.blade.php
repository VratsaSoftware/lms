<div class="hamburger-wrap col-sm-12 col-md-12 text-center">
    <button class="hamburger"><img src="{{asset('/images/hamburger-menu.png')}}" alt=""></button>
    <button class="cross">&#735;</button>
    <div class="menu col-md-12 col-sm-12 col-xs-12">
        <ul class="hamburger-nav">
            <li class="nav-item"><a href="{{route('home')}}">Начало</a></li>
            <li class="nav-item"><a class="about-hamburger" href="#">За нас <i class="fas fa-angle-down"></i></a></li>
            <li class="about-go bg-secondary"><a class="text-light" href="{{route('mission')}}">Мисия</a></li>
            <li class="about-go bg-secondary"><a class="text-light" href="{{route('about')}}">Екип</a></li>
            <li class="about-go bg-secondary"><a class="text-light" href="{{route('year_reports')}}">Годишни Отчети</a></li>
            <li class="about-go bg-secondary"><a class="text-light" href="{{route('contacts')}}">Контакти</a></li>
            <li class="nav-item"><a href="http://gnezdoto.vratsasoftware.com/" target=" _blank">Гнездото</a></li>
            <li class="nav-item"><a class="edu-hamburger" href="#">Обучения <i class="fas fa-angle-down"></i></a></li>
            <li class="edu-go bg-secondary"><a class="text-light" href="{{route('programmingCourses')}}">Програмиране</a></li>
            <li class="edu-go bg-secondary"><a class="text-light" href="{{route('digitalMarketing')}}">Дигитален Маркетинг</a></li>
            <li class="nav-item"><a href="{{route('login')}}" class="right-mobile">Вход</a></li>
            {{-- <li class="nav-item"><a href="#" class="right-mobile">Кандидатствай</a></li> --}}
            <li>
                <a href="{{ route('langroute', 'en') }}"><img src="{{asset('/images/en.png')}}" width="25px"></a>
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

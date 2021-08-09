@extends('static.courses_template')
@section('title', 'Курсове по Програмиране')
@section('content')
    <div class="section">
        <div id="header" style="background: url(./images/cover-img.png)">
            <!-- hamburger -->
        @include('static.includes.bg.hamburger_menu')
        <!-- end of hamburger -->
            <div class="overlay">
                <div id="logo" class="col-md-12 text-center">
                    <a href="{{route('home')}}"><img src="{{asset('/images/logoVStext.png')}}" alt="vso-logo" class="img-fluid" width="20%"></a>
                </div>

                <div class="header-title col-md-12 text-center">
                    <span>9-месечни курсове по програмиране за ученици и възрастни</span>
                </div>
                {{-- <div class="header-sub-title col-md-12 text-center">
                    <span>Курса започва след</span><br/>
                </br/>
                    <span class="timer-programming"><img src="{{asset('/images/loaders/load-31.gif')}}" alt="timer"/></span>
                </div> --}}
                <div class="header-button col-md-12 text-center mb-5" style="visibility:visible">
                    <span id="prepare" class="end-candidate marketing-candidate-btn"><a href="{{route('application.create',['type' => $type])}}">Кандидаствай</a></span>
                </div>

                <div class="header-menu col-md-12" id="header-sticky">
                    <nav class="text-center">
                        <ul class="d-flex flex-wrap main-nav-list">
                            <li class="p-3"><img src="{{asset('/images/logoVStext.png')}}" alt="" class="img-fluid"></li>
                            <li class="p-3"><a href="{{route('home')}}">Начало</a></li>
                            <li class="p-3"><a href="#information-holder">Информация</a></li>
                            <li class="p-3"><a href="#program-holder">Програма</a></li>
                            <li class="p-3"><a href="#details-holder">Детайли</a></li>
                            <li class="p-3"><a href="#application-holder">Кандидастване</a></li>
                            <!-- <li class=""><a href="">Такса</a></li> -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div id="information-holder">

    </div>
    <div id="information" class="section">
        <div class="d-flex flex-wrap flex-row">
            <div class="col-md-8 d-flex flex-wrap text-center info-text-container">
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Гимназисти</span>
                    </div>
                    <div class="info-text">
                        Ти си ученик в гимназия и състезателна натура. Амбициозен си, интересуваш се от технологии и програмиране, но наученото в часовете по информатика не ти е достатъчно. Учи наравно с големите и излез с едни гърди напред пред връстниците си.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Фрийлансъри</span>
                    </div>
                    <div class="info-text">
                        Искаш да работиш за себе си, да си свободен и независим. Обичаш предизвикателството да създаваш решения за различни компании. Мечтаеш сам да избираш работата, с която да се захванеш. Придобий уменията, които могат да ти дадат всичко това.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Преквалификация</span>
                    </div>
                    <div class="info-text">
                        Работиш рутинна работа без добри перспективи за кариерно развитие. Стани част от най-бързо растящият сектор в България, в който добрите условия на труд са задължителни, а допълнителните усилия които полагаш – възнаградени.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Професионално развитие</span>
                    </div>
                    <div class="info-text">
                        Светът около теб се променя с напредването на технологиите. Живеем в 21 век и има много възможности за добра кариера, дори във Враца. Нашата академия предлага практическо обучение водено от опитни лектори.
                    </div>
                </div>
            </div>
            <div class="col-md-4 info-pic">
                <div class="info-img">
                    <img src="{{asset('/images/programming-page-big.jpg')}}" alt="info-pic" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <div id="program-holder">

    </div>
    <div class="section">
        <div id="program">
            <div class="program-title text-center">ПРОГРАМА</div>
            <div class="program-scheme col-md-12 text-center">
                <div id="tabs">
                    <ul class="tabs-nav d-flex flex-wrap flex-row program-nav">
                        <li><a href="#tabs-1"><i class="fas fa-caret-down"></i>Уеб разработка с PHP</a></li>
                        <li><a href="#tabs-2"><i class="fas fa-caret-right"></i>Java технологии</a></li>
                    </ul>
                    <div class="program-holder d-flex justify-content-center">
                        <!-- php tab -->
                        <div id="tabs-1" class="p-3 php">
                            <div class="col-md-12 d-flex flex-row flex-wrap php-program-holder">
                                <!-- first lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info">
                                        <p class="program-info">
                                            Какво ще знам и мога след Ниво 1: Основи на програмирането с PHP - Създаване на уеб страници с HTML&CSS. Основи на програмирането с PHP.Работа с git
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick"><img src="{{asset('/images/tick-y-big.png')}}" alt="tick"></div>
                                    <div class="col-md-4 program-info-img">
                                        <img src="{{asset('/images/code-logos/html-transperent.png')}}" alt="html-logo" class="code-logos-program" title="HTML5">
                                        <img src="{{asset('/images/code-logos/css-original.png')}}" alt="html-logo" class="code-logos-program" title="CSS3">
                                        <img src="{{asset('/images/code-logos/php-original.png')}}" alt="html-logo" class="code-logos-program" title="PHP7">
                                        <img src="{{asset('/images/code-logos/git-original.png')}}" alt="html-logo" class="code-logos-program" title="GIT">
                                    </div>
                                </div>
                                <!-- end of first-lvl -->

                                <!-- second lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info">
                                        <p class="program-info">
                                            Какво ще знам и мога след Ниво 2: Бази данни - Работа с MySQL база данни и създаване на PHP уеб приложения с база данни
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick"><img src="{{asset('/images/tick-y-big.png')}}" alt="tick"></div>
                                    <div class="col-md-4 program-info-img">
                                        <img src="{{asset('/images/code-logos/mysql-original.png')}}" alt="html-logo" class="code-logos-program" title="MySQL">
                                        <img src="{{asset('/images/code-logos/php-original.png')}}" alt="html-logo" class="code-logos-program" title="PHP7">
                                    </div>
                                </div>
                                <!-- end of second lvl -->

                                <!-- third lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info">
                                        <p class="program-info">
                                            Какво ще знам и мога след Ниво 3: Основи на front-end програмирането - Създаване на приложения с client side логика чрез JavaScript & jQuery
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick"><img src="{{asset('/images/tick-y-big.png')}}" alt="tick"></div>
                                    <div class="col-md-4 program-info-img">
                                        <img src="{{asset('/images/code-logos/js-original.png')}}" alt="html-logo" class="code-logos-program" title="JavaScript">
                                        <img src="{{asset('/images/code-logos/json-original.png')}}" alt="html-logo" class="code-logos-program" title="JSON">
                                        <img src="{{asset('/images/code-logos/ajax-original.png')}}" alt="html-logo" class="code-logos-program" title="AJAX CALLs">
                                        <img src="{{asset('/images/code-logos/jquery-original.png')}}" alt="html-logo" class="code-logos-program" title="JQUERY">
                                    </div>
                                </div>
                                <!-- end of third lvl -->

                                <!-- fourth lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info">
                                        <p class="program-info">
                                            Какво ще знам и мога след Ниво 4: ООП и MVC - Базови познания по обектно ориентирано програмиране. Създаване на уеб приложения с Laravel framework
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick"><img src="{{asset('/images/tick-y-big.png')}}" alt="tick"></div>
                                    <div class="col-md-4 program-info-img">
                                        <img src="{{asset('/images/code-logos/oop-original.png')}}" alt="PHP-logo" class="code-logos-program" title="PHP OOP">
                                        <img src="{{asset('/images/code-logos/laravel-original.png')}}" alt="html-logo" class="code-logos-program" title="LARAVEL">
                                    </div>
                                </div>
                                <!-- end of fourth lvl -->
                            </div>
                        </div>
                        <!-- end of php tab -->

                        <!-- java tab -->
                        <div id="tabs-2" class="p-3 java">
                            <div class="col-md-12 d-flex flex-row flex-wrap php-program-holder">
                                <!-- first lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info">
                                        <p class="program-info">
                                            Какво ще знам и мога след Ниво 1: Основи на езика Java - работа със среда за разработка IntelliJ, основни разбирания за системата git
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick"><img src="{{asset('/images/tick-y-big.png')}}" alt="tick"></div>
                                    <div class="col-md-4 program-info-img">
                                        <img src="{{asset('/images/code-logos/java-original.png')}}" alt="html-logo" class="code-logos-program" title="JAVA">
                                        <img src="{{asset('/images/code-logos/git-original.png')}}" alt="html-logo" class="code-logos-program" title="GIT">
                                        <img src="{{asset('/images/code-logos/ij-original.png')}}" alt="html-logo" class="code-logos-program" title="IntelliJ">
                                    </div>
                                </div>
                                <!-- end of first-lvl -->

                                <!-- second lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info">
                                        <p class="program-info">
                                            Какво ще знам и мога след Ниво 2: Java ООП -  разбиране за абстрактност и полиморфизъм, работа с файлове
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick"><img src="{{asset('/images/tick-y-big.png')}}" alt="tick"></div>
                                    <div class="col-md-4 program-info-img">
                                        <img src="{{asset('/images/code-logos/java-original.png')}}" alt="html-logo" class="code-logos-program" title="JAVA">
                                        <img src="{{asset('/images/code-logos/oop-original.png')}}" alt="html-logo" class="code-logos-program" title="JAVA OOP">
                                    </div>
                                </div>
                                <!-- end of second lvl -->

                                <!-- third lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info">
                                        <p class="program-info">
                                            Какво ще знам и мога след Ниво 3: Android - работа с Андроид студио, бази данни и дизайн
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick"><img src="{{asset('/images/tick-y-big.png')}}" alt="tick"></div>
                                    <div class="col-md-4 program-info-img">
                                        <img src="{{asset('/images/code-logos/a-studio-original.png')}}" alt="html-logo" class="code-logos-program" title="Android Studio">
                                        <img src="{{asset('/images/code-logos/android-original.png')}}" alt="html-logo" class="code-logos-program" title="Android">
                                    </div>
                                </div>
                                <!-- end of third lvl -->

                                <!-- fourth lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info">
                                        <p class="program-info">
                                            Какво ще знам и мога след Ниво 4: Създаване на web приложения - Работа с Java Servlets и JSP (Java Server Pages). Боравене с релационни бази данни. Работа с Tomcat сървър.
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick"><img src="{{asset('/images/tick-y-big.png')}}" alt="tick"></div>
                                    <div class="col-md-4 program-info-img">
                                        <img src="{{asset('/images/code-logos/tom-cat-original.png')}}" alt="html-logo" class="code-logos-program" title="TomCat">
                                        <img src="{{asset('/images/code-logos/mysql-original.png')}}" alt="html-logo" class="code-logos-program" title="MySQL">
                                        <img src="{{asset('/images/code-logos/html-transperent.png')}}" alt="html-logo" class="code-logos-program" title="HTML/XML">
                                    </div>
                                </div>
                                <!-- end of fourth lvl -->
                            </div>
                        </div>
                        <!-- end of java tab -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div id="details-holder">

    </div>
    <div class="section">
        <div id="details">
            <div class="details-title text-center">Детайли</div>
            <div class="details-container col-md-12 d-flex flex-wrap flex-row">
                <div class="col-md-4">
                    <div class="card card-2 text-center card-programing">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/programing/icons/calendar_green.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/calendar.png')}}">
                            </div>
                            <div class="col-md-12 title-details-digi">
                                Продължителност
                            </div>
                            <div class="col-md-12">
                                Занятията се провеждат два пъти седмично в удобно време, съобразено с работещи и ученици.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-2 text-center card-programing">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/programing/icons/startup_green.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/startup.png')}}">
                            </div>
                            <div class="col-md-12 title-details-digi">
                                Трудност
                            </div>
                            <div class="col-md-12">
                                Курсът е предназначен за начинаещи, но въпреки това е интензивен и е нужно да се полагат много усилия.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-2 text-center card-programing">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/programing/icons/contract_green.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/contract.png')}}">
                            </div>
                            <div class="col-md-12 title-details-digi">
                                Практически насочен
                            </div>
                            <div class="col-md-12">
                                Курсът включва малко теория и много практика. Всяко ниво завършва с изпит и финален проект.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 spacer-program"></div>

                <div class="col-md-4">
                    <div class="card card-2 text-center card-programing">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/programing/icons/medal_green.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/medal.png')}}">
                            </div>
                            <div class="col-md-12 title-details-digi">
                                Сертификат
                            </div>
                            <div class="col-md-12">
                                Успешно покрилите 50% от критериите получават сертификат за участие, а тези над 80% - професионален сертификат.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-2 text-center card-programing">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/programing/icons/payment_green.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/payment.png')}}">
                            </div>
                            <div class="col-md-12 title-details-digi">
                                Цена
                            </div>
                            <div class="col-md-12">
                                Всеки за един модул е 160лв, а за два - 300лв. Най-добре представилите се на подбора получават пълна стипендия.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-2 text-center card-programing">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/programing/icons/goal_green.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/goal.png')}}">
                            </div>
                            <div class="col-md-12 title-details-digi">
                                Менторска програма
                            </div>
                            <div class="col-md-12">
                                Успешните курсисти имат възможност да работят заедно с опитен ментор по реален проект за НПО.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="application-holder">

    </div>
    <div class="section">
        <div id="application">
            <div class="application-title text-center">Кандидатстване</div>
        </div>
        <div class="col-md-12 d-flex flex-row flex-wrap steps-wrapper text-center">
            <!-- circle steps icons -->
            <ul class="steps col-md-12">
                <li>1
                    <span>електронна форма</span>
                </li>
                <li>2
                    <span>предварителен тест</span>
                </li>
                <li>3
                    <span>самостоятелна задача</span>
                </li>
                <li>4
                    <span>интервю</span>
                </li>
                <li class="active-step">5
                    <span>прием</span>
                </li>
            </ul>

            <!-- images -->

            <div class="candidate-imgs col-md-12 flex-row flex-wrap text-center">
                <div class="col-md-1"></div>
                <div class="steps col-md-2 first-candidate-img">
                    <img src="{{asset('/images/candidate-img-step-1.png')}}" alt="step" class="img-fluid candidate-img">
                </div>

                <div class="steps col-md-2">
                    <img src="{{asset('/images/candidate-img-step-2.png')}}" alt="step" class="img-fluid candidate-img">
                </div>
                <div class="steps col-md-2">
                    <img src="{{asset('/images/candidate-img-step-3.png')}}" alt="step" class="img-fluid candidate-img">
                </div>
                <div class="steps col-md-2">
                    <img src="{{asset('/images/candidate-img-step-4.png')}}" alt="step" class="img-fluid candidate-img">
                </div>
                <div class="steps col-md-2">
                    <img src="{{asset('/images/candidate-img-step-5.png')}}" alt="step" class="img-fluid candidate-img">
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-12 text-center">
        <span id="prepare-programing" class="end-candidate programming-candidate-btn" style="background:#1C8800!important;"><a style="color:#fff!important" href="{{route('application.create',['type' => $type])}}">КАНДИДАТСТВАЙ</a></span>
    </div>
    </div>

    <script>
        // Set the date we're counting down to
        var programmingDate = new Date("Feb 10, 2019 00:00:00").getTime();
        var timerClass = '.timer-programming';

        // Update the count down every 1 second
        var start = setInterval(function() {
            timer(programmingDate,timerClass)
        }, 1000);
    </script>
    <script>
        var headeroffset = $("#header-sticky").offset();
        var sticky = (headeroffset.top - 50);

        $(window).scroll(function() {
            if (window.pageYOffset >= sticky && !$("#header-sticky").hasClass('sticky')) {
                $("#header-sticky").addClass('sticky');
            }
            if(window.pageYOffset < sticky && $("#header-sticky").hasClass('sticky')) {
                $("#header-sticky").removeClass('sticky');
            }
        });
    </script>
    <script type="text/javascript">
        $(function(){
            var programTabs = document.createElement("script");
            programTabs.src = "{{asset('/js/program-tabs.js')}}";

            $('body').append(programTabs);
            tickAnimation(3);
        });
    </script>
@endsection

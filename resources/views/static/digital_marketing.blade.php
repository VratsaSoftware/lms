@extends('static.courses_template')
@section('title', 'Курс по Дигитален Маркетинг')
@section('content')
    <div class="section">
        <div id="header" style="background: url(./images/cover-img-smallest.png)">
            <!-- hamburger -->
        @include('static.includes.bg.hamburger_menu')
        <!-- end of hamburger -->
            <div class="overlay-marketing">
                <div id="logo" class="col-md-12 text-center">
                    <a href="{{route('home')}}"><img src="{{asset('/images/logoVStext.png')}}" alt="vso-logo" class="img-fluid" width="20%"></a>
                </div>

                <div class="header-title col-md-12 text-center">
                    <span>Покори върховете на<br /> Дигиталния Маркетинг</span>
                </div>
                <div class="header-button col-md-12 text-center mb-5" style="visibility:visible">
                    <span id="prepare" class="end-candidate marketing-candidate-btn"><a href="{{route('application.create',['type' => $type])}}">Кандидаствай</a></span>
                </div>
                <div class="header-sub-title col-md-12 text-center">
                    <span class="timer-digital"><img src="{{asset('/images/loaders/load-32.gif')}}" alt="timer"/></span>
                </div>

                <div class="header-menu col-md-12 header-marketing" id="header-sticky">
                    <nav class="text-center">
                        <ul class="d-flex flex-wrap main-nav-list">
                            <li class="p-3"><img src="{{asset('/images/logoVStext.png')}}" alt="vso-logo" class="img-fluid"></li>
                            <li class="p-3"><a href="{{route('home')}}">Начало</a></li>
                            <li class="p-3"><a href="#information-holder">Информация</a></li>
                            <li class="p-3"><a href="#program-holder">Програма</a></li>
                            <li class="p-3"><a href="#lecturers-holder">Лектори</a></li>
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
    <div class="section">
        <div id="information" class="d-flex flex-wrap flex-row">
            <div class="col-md-8 d-flex flex-wrap text-center info-text-container">
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Гимназисти</span>
                    </div>
                    <div class="info-text">
                        Мислиш, че училището не ти дава всичко, от което имаш нужда. Искаш още от сега да започнеш да градиш своето бъдеще в сфера с големи възможности за развитие. Започни да учиш нещо, което може да използваш веднага.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Фрийлансъри</span>
                    </div>
                    <div class="info-text">
                        Работи за себе си и променяй света. Имаш възможност да създадеш свой собствен стил и имидж, които да те направят търсен. Може да избираш проектите, с които да се захванеш и да ги изпълняваш от всяко място, на което ти харесва да бъдеш.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Преквалификация</span>
                    </div>
                    <div class="info-text">
                        Ако имаш творческо мислене, което сегашната ти работа не позволява да използваш и развиваш. Ако искаш да правиш нещо, с което да се чувстваш щастлив и полезен. Инвестирай време в себе си и започни нещо смислено.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Професионално развитие</span>
                    </div>
                    <div class="info-text">
                        Избери път, който ти дава възможност да растеш и да ставаш по-добър. Бъди в крак с новите технологии и тенденции. Започни своето пътуване воден от опитни лектори и направи така, че ти самият да създадеш свои последователи.
                    </div>
                </div>
            </div>
            <div class="col-md-4 info-pic">
                <div class="info-img">
                    <img src="{{asset('/images/digital-marketing-1.jpg')}}" alt="info-pic" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <div id="program-holder">

    </div>
    <div id="program">
        <div class="program-title text-center">Програма</div>
    </div>
    <div class="section d-flex flex-row flex-wrap text-center">
        <div class="col-md-4 col-xs-12 text-center">
        <div class="snip1527">
            <div class="image"><img src="{{asset('images/digi_marketing/software-development-4165307_1920.jpg')}}" alt="pr-sample23" /></div>
            <figcaption>
                <div class="date"><span class="day">1</span><span class="month">ниво</span></div>
                <span class="levels-title">Основи на дигиталния маркетинг</span>
                <p>
                    Въвеждащ курс по дигитален маркетинг. Обучението е безплатно и дава възможност да придобиете основни знания в сферата на дигиталния маркетинг. Всяка лекция от курса обхваща, както теоретични знания, така и  конкретни примери за подход и резултати.
                </p>
            </figcaption>
        </div>
        </div>
        
        <div class="col-md-4 col-xs-12 text-center">
        <div class="snip1527">
            <div class="image"><img src="{{asset('images/digi_marketing/student-849822_1920.jpg')}}" alt="pr-sample24" /></div>
            <figcaption>
                <div class="date"><span class="day">2</span><span class="month">ниво</span></div>
                <span class="levels-title">Маркетинг чрез съдържание и социални мрежи</span>
                <p>
                    В рамките на този модул ще опознаете в детайли как работи най-използваната социална мрежа в България. Как се създават правилно рекламни кампании и как да създаваме съдържание за постигането на качествено ангажиране с Вашия бизнес.
                </p>
            </figcaption>
        </div>
        </div>
        
        <div class="col-md-4 col-xs-12 text-center">
        <div class="snip1527">
            <div class="image"><img src="{{asset('images/digi_marketing/success-4165306_1920.jpg')}}" alt="pr-sample25" /></div>
            <figcaption>
                <div class="date"><span class="day">3</span><span class="month">ниво</span></div>
                <span class="levels-title">Оптимизация за търсачки (SEO)</span>
                <p>
                    Открий как да оптимизираш онлайн присъствието на един бизнес с цел увеличаване стойноста на бранда и привличането на нови клиенти. Научи повече за алгоритъма на Google и кои добри практики помагат за подобряване  класирането в резултатите.
                </p>
            </figcaption>
        </div>
        </div>
    </div>
    
    <div id="lecturers-holder">
    
    </div>
    <div class="section">
        <div class="program-title text-center lecturers-title">Лектори</div>
        <!-- Team -->
        <section id="team" class="pb-5">
                <div class="d-flex flex-row flex-wrap text-center">
                    <!-- Team member -->
                    <div class="col-md-4">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid" src="{{asset('/images/digi_marketing/Ivailo_pic.jpg')}}" alt="card image"></p>
                                            <h4 class="card-title under-program">Ивайло Йорданов</h4>
                                            <p class="card-text">Основател и управител на дигитална агенция evol.bg</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="backside">
                                    <div class="card">
                                        <div class="card-body text-center mt-4">
                                            <h4 class="card-title under-program">Ивайло Йорданов</h4>
                                            <p class="card-text">Консултант по дигитален маркетинг и основател на агенция за дигитален маркетинг
                                                <a href="https://www.evol.bg/">evol.bg</a>. Работил е за bTV Media Group, Havas, Hewlett Packard Enterprise. В момента от услугите му се възползват и фирми от Враца и региона.</p>
                                            <ul class="list-inline">
                                                <li><a href="https://www.linkedin.com/in/ivaylo-yordanov/" target="_blank" class="lecturer-in-link"><img src="{{asset('images/digi_marketing/linkedin.png')}}" data-hover-img="{{asset('images/digi_marketing/linkedin.png')}}" alt="linkedin"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./Team member -->
    
                    <!-- Team member -->
                    <div class="col-md-4">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid" src="{{asset('images/digi_marketing/katya_small.jpg')}}" alt="card image"></p>
                                            <h4 class="card-title under-program">Катя Тодорова</h4>
                                            <p class="card-text">Founder & CEO, MEmotion <br/> Managing Partner & CMO, Clientric Group</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="backside">
                                    <div class="card">
                                        <div class="card-body text-center mt-4">
                                            <h4 class="card-title under-program">Катя Тодорова</h4>
                                            <p class="card-text">Катя основава бутиковата дигитална бранд агенция <a href="https://memotion.net/" target="_blank">MЕmotion</a> през 2013 г. През 2015 MEmotion става част от
                                                <a href="https://www.clientric.bg/" target="_blank">CLIENTRIC</a> Group. - консорциум от компании в сферата на иновативните софтуерни и интерактивни маркетинг решения, в който Катя е управляващ партньор.</p>
                                            <ul class="list-inline">
                                                <li><a href="https://www.linkedin.com/in/katyatodorova/" target="_blank" class="lecturer-in-link"><img src="{{asset('images/digi_marketing/linkedin.png')}}" data-hover-img="{{asset('images/digi_marketing/linkedin.png')}}" alt="linkedin"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./Team member -->
    
                    <!-- Team member -->
                    <div class="col-md-4">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid" src="{{asset('images/digi_marketing/kalin_georgiev.jpg')}}" alt="card image"></p>
                                            <h4 class="card-title under-program">Калин Георгиев</h4>
                                            <p class="card-text">Управител на дигитална агенция <br/> Тракиада</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="backside">
                                    <div class="card">
                                        <div class="card-body text-center mt-4">
                                            <h4 class="card-title under-program">Калин Георгиев</h4>
                                            <p class="card-text">Калин Георгиев е енергичен и бързомислещ предприемач с 20 години опит в дигиталната индустрия. Започнал като web developer за агенция в Лондон, след това маркетинг консултант във Валенсия и Малта, а сега управляващ дигитална агенция
                                                <a href="https://www.trakiada.com/" target="_blank">Тракиада</a>  във Враца.</p>
                                            <ul class="list-inline">
                                                <li><a href="https://www.linkedin.com/in/kalin-gueorguiev-91255612a/" target="_blank" class="lecturer-in-link"><img src="{{asset('images/digi_marketing/linkedin.png')}}" data-hover-img="{{asset('images/digi_marketing/linkedin.png')}}" alt="linkedin"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./Team member -->
                </div>
        </section>
        <!-- Team -->
    </div>

    <div id="details-holder">

    </div>
    <div class="section">
        <div id="details" class="marketing-details">
            <div class="details-title text-center">Детайли</div>
            <div class="details-container d-flex flex-row flex-wrap text-center">
                <div class="col-md-4">
                    <div class="card card-2 text-center">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/digi_marketing/icons/calendar_orange.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/calendar.png')}}">
                            </div>
                            <div class="col-md-12 title-details-digi">
                                Продължителност
                            </div>
                            <div class="col-md-12">
                                Занятията се провеждат веднъж или два пъти седмично в удобно време, съобразено с работещи и ученици.
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="card card-2 text-center">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/digi_marketing/icons/startup_orange.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/startup.png')}}">
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
                    <div class="card card-2 text-center">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/digi_marketing/icons/contract_orange.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/contract.png')}}">
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
                    <div class="card card-2 text-center">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/digi_marketing/icons/medal_orange.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/medal.png')}}">
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
                    <div class="card card-2 text-center">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/digi_marketing/icons/payment_orange.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/payment.png')}}">
                            </div>
                            <div class="col-md-12 title-details-digi">
                                Цена
                            </div>
                            <div class="col-md-12">
                                Първо ниво е безплатно. <br/>Пакетната цена за второ и трето ниво е 150лв.
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="card card-2 text-center">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/digi_marketing/icons/goal_orange.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/goal.png')}}">
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

    <div id="application-holder">

    </div>
    <div class="section">
        <div id="application">
            <div class="application-title text-center">Кандидатстване</div>
        </div>
        <div class="col-md-12 d-flex flex-row flex-wrap steps-wrapper text-center">
            <!-- circle steps icons -->
            <ul class="steps col-md-12">
                <li class="marketing-steps">1
                    <span>електронна форма</span>
                </li>
                <li class="marketing-steps">2
                    <span>самостоятелна задача</span>
                </li>
                <li class="marketing-steps">3
                    <span style="margin-left:-4vw">интервю</span>
                </li>
                <li class="marketing-steps">4
                    <span style="margin-left:-3vw">прием</span>
                </li>
            </ul>

            <!-- images -->

            <div class="candidate-imgs col-md-12 flex-row flex-wrap text-center">
                <div class="col-md-2"></div>
                <div class="steps col-md-2 first-candidate-img">
                    <img src="{{asset('/images/digi-1.png')}}" alt="step" class="img-fluid candidate-img" style="margin-left:-30%">
                </div>
                <div class="steps col-md-2">
                    <img src="{{asset('/images/digi-3.png')}}" alt="step" class="img-fluid candidate-img" style="margin-left:-12%">
                </div>
                <div class="steps col-md-2">
                    <img src="{{asset('/images/digi-4.png')}}" alt="step" class="img-fluid candidate-img" style="margin-right:-17%">
                </div>
                <div class="steps col-md-2">
                    <img src="{{asset('/images/digi-5.png')}}" alt="step" class="img-fluid candidate-img" style="margin-left:54%;">
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-center">
        <span id="prepare-digi" class="end-candidate marketing-candidate-btn"><a href="{{route('application.create',['type' => $type])}}">КАНДИДАТСТВАЙ</a></span>
    </div>
    </div>
    <script>
        // Set the date we're counting down to
        var digitalDate = new Date("Feb 07, 2020 00:00:00").getTime();
        var timerClass = '.timer-digital';

        // Update the count down every 1 second
        var start = setInterval(function() {
            timer(digitalDate,timerClass)
        }, 1000);
    </script>
    <script>
        var headeroffset = $("#header-sticky").offset();
        var sticky = (headeroffset.top - 100);
        $(window).scroll(function() {
            // if (window.pageYOffset > sticky) {
            //     $("#header-sticky").addClass('sticky-marketing');
            // } else {
            //     $("#header-sticky").removeClass('sticky-marketing');
            // }

            $(window).scroll(function() {
                if (window.pageYOffset >= sticky && !$("#header-sticky").hasClass('sticky-marketing')) {
                    $("#header-sticky").addClass('sticky-marketing');
                }
                if(window.pageYOffset < sticky && $("#header-sticky").hasClass('sticky-marketing')) {
                    $("#header-sticky").removeClass('sticky-marketing');
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(function(){
            var programTabs = document.createElement("script");
            programTabs.src = "{{asset('/js/program-tabs.js')}}";

            $('body').append(programTabs);
            tickAnimation(2);
            $(".hover").mouseleave(
                    function() {
                        $(this).removeClass("hover");
                    }
            );
        });
    </script>
@endsection

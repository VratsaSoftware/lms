@extends('static.en.courses_template')
@section('title', 'Digital Marketing Course')
@section('content')
    <div class="section">
        <div id="header" style="background: url(./images/cover-img-smallest.png)">
            <!-- hamburger -->
        @include('static.includes.en.hamburger_menu')
        <!-- end of hamburger -->
            <div class="overlay-marketing">
                <div id="logo" class="col-md-12 text-center">
                    <a href="{{route('home')}}"><img src="{{asset('/images/logoVS_en_white.png')}}" alt="vso-logo" class="img-fluid" width="20%"></a>
                </div>

                <div class="header-title col-md-12 text-center">
                    <span>Conquer new heights in<br /> Digital Marketing</span>
                </div>
                {{-- <div class="header-sub-title col-md-12 text-center">
                    <span>Курса започва след</span><br/>
                </br/>
                    <span class="timer-digital"><img src="{{asset('/images/loaders/load-32.gif')}}" alt="timer"/></span>
                </div> --}}
                <div class="header-button col-md-12 text-center mb-5">
                    <span id="prepare"><a href="#application">Apply now</a></span>
                </div>

                <div class="header-menu col-md-12 header-marketing" id="header-sticky">
                    <nav class="text-center">
                        <ul class="d-flex flex-wrap main-nav-list">
                            <li class="p-3"><img src="{{asset('/images/logoVS_en_white.png')}}" alt="vso-logo" class="img-fluid"></li>
                            <li class="p-3"><a href="{{route('home')}}">Home</a></li>
                            <li class="p-3"><a href="#information-holder">Information</a></li>
                            <li class="p-3"><a href="#program-holder">Program</a></li>
                            <li class="p-3"><a href="#details-holder">Details</a></li>
                            <li class="p-3"><a href="#application-holder">Application</a></li>
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
                        <span>High school students</span>
                    </div>
                    <div class="info-text">
                        You think school does not give you everything you need. You want to start building your future right now in a field that offers great development. Start learning something you can use right away.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Freelancers</span>
                    </div>
                    <div class="info-text">
                        Work for yourself and change the world. You have the opportunity to create your own style and image which will make you highly valuable. You can choose the projects that you work on and execute them from any place you like to be.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Retraining</span>
                    </div>
                    <div class="info-text">
                        You have creative thinking that your current job does not allow you to use and develop. You want to do something that makes you happy and helpful. Invest time in yourself and start something meaningful.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Professional Development</span>
                    </div>
                    <div class="info-text">
                        Choose a path that gives you the opportunity to grow and become better. Keep up to date with new technologies and trends. Start your journey led by experienced lecturers and make sure you create your own mark.
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
    <div class="section">
        <div id="program">
            <div class="program-title text-center">Program</div>
            <div class="section d-flex flex-row flex-wrap text-center">
                <div class="col-md-4 text-center">
                    <div class="snip1527">
                        <div class="image"><img src="{{asset('images/digi_marketing/software-development-4165307_1920.jpg')}}" alt="pr-sample23" /></div>
                        <figcaption>
                            <div class="date"><span class="day">1</span><span class="month">ниво</span></div>
                            <h3>Основи на дигиталния маркетинг</h3>
                            <p>
                        
                                You know what we need, Hobbes? We need an attitude. Yeah, you can't be cool if you don't have an attitude.
                            </p>
                        </figcaption>
                        <a href="#"></a>
                    </div>
                </div>
        
                <div class="col-md-4 text-center">
                    <div class="snip1527">
                        <div class="image"><img src="{{asset('images/digi_marketing/student-849822_1920.jpg')}}" alt="pr-sample24" /></div>
                        <figcaption>
                            <div class="date"><span class="day">2</span><span class="month">ниво</span></div>
                            <h3>Бизнесът и социалните мрежи</h3>
                            <p>
                        
                                Sometimes the surest sign that intelligent life exists elsewhere in the universe is that none of it has tried to contact us.
                            </p>
                        </figcaption>
                        <a href="#"></a>
                    </div>
                </div>
        
                <div class="col-md-4 text-center">
                    <div class="snip1527">
                        <div class="image"><img src="{{asset('images/digi_marketing/success-4165306_1920.jpg')}}" alt="pr-sample25" /></div>
                        <figcaption>
                            <div class="date"><span class="day">3</span><span class="month">ниво</span></div>
                            <h3>Анализ на потребителкси данни</h3>
                            <p>
                        
                                I don't need to compromise my principles, because they don't have the slightest bearing on what happens to me anyway.
                            </p>
                        </figcaption>
                        <a href="#"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div id="details-holder">

    </div>
    <div class="section">
        <div id="details" class="marketing-details">
            <div class="details-title text-center">Details</div>
            <div class="details-container col-md-12 d-flex flex-wrap flex-row">
                <div class="col-md-4">
                    <div class="card card-2 text-center">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/digi_marketing/icons/calendar_orange.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/calendar.png')}}">
                            </div>
                            <div class="col-md-12 title-details-digi">
                                Speed Optimization
                            </div>
                            <div class="col-md-12">
                                Far far away, behind the word mountains, far from the countries Vokalia Separated...
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
                                Speed Optimization
                            </div>
                            <div class="col-md-12">
                                Far far away, behind the word mountains, far from the countries Vokalia Separated...
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
                                Speed Optimization
                            </div>
                            <div class="col-md-12">
                                Far far away, behind the word mountains, far from the countries Vokalia Separated...
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
                                Speed Optimization
                            </div>
                            <div class="col-md-12">
                                Far far away, behind the word mountains, far from the countries Vokalia Separated...
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
                                Speed Optimization
                            </div>
                            <div class="col-md-12">
                                Far far away, behind the word mountains, far from the countries Vokalia Separated...
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
                                Speed Optimization
                            </div>
                            <div class="col-md-12">
                                Far far away, behind the word mountains, far from the countries Vokalia Separated...
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
            <div class="application-title text-center">Application</div>
        </div>
        <div class="col-md-12 d-flex flex-row flex-wrap steps-wrapper text-center">
            <!-- circle steps icons -->
            <ul class="steps col-md-12">
                <li class="marketing-steps">1
                    <span style="margin-left:-4vw;">electronic form</span>
                </li>
                <li class="marketing-steps">2
                    <span style="margin-left:-4vw;">individual test</span>
                </li>
                <li class="marketing-steps">3
                    <span style="margin-left:-3.5vw;">individual task</span>
                </li>
                <li class="marketing-steps">4
                    <span style="margin-left:-3.5vw;">interview</span>
                </li>
                <li class="marketing-steps">5
                    <span style="margin-left:-3.5vw;">reception</span>
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
        <span id="prepare" class="end-candidate marketing-candidate-btn"><a href="{{route('application.create',['type' => $type])}}">APPLY NOW</a></span>
    </div>
    </div>
    <script>
        // Set the date we're counting down to
        var digitalDate = new Date("Feb 15, 2019 00:00:00").getTime();
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
        });
    </script>
@endsection

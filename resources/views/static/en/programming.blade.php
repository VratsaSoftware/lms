@extends('static.en.courses_template')
@section('title', 'Programming courses')
@section('content')
    <div class="section">
        <div id="header" style="background: url(./images/cover-img.png)">
            <!-- hamburger -->
        @include('static.includes.en.hamburger_menu')
        <!-- end of hamburger -->
            <div class="overlay">
                <div id="logo" class="col-md-12 text-center">
                    <a href="{{route('home')}}"><img src="{{asset('/images/logoVS_en_white.png')}}" alt="vso-logo" class="img-fluid" width="20%"></a>
                </div>

                <div class="header-title col-md-12 text-center">
                    <span>9-month programming courses for high school students and adults</span>
                </div>
                {{-- <div class="header-sub-title col-md-12 text-center">
                    <span>Course Starting</span><br/>
                </br/>
                    <span class="timer-programming"><img src="{{asset('/images/loaders/load-31.gif')}}" alt="timer"/></span>
                </div> --}}
                <div class="header-button col-md-12 text-center mb-5" style="visibility:hidden">
                    <span id="prepare"><a href="#application">Apply</a></span>
                </div>

                <div class="header-menu col-md-12" id="header-sticky">
                    <nav class="text-center">
                        <ul class="d-flex flex-wrap main-nav-list">
                            <li class="p-3"><img src="{{asset('/images/logoVS_en_white.png')}}" alt="" class="img-fluid"></li>
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
    <div id="information" class="section">
        <div class="d-flex flex-wrap flex-row">
            <div class="col-md-8 d-flex flex-wrap text-center info-text-container">
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>High school students</span>
                    </div>
                    <div class="info-text">
                        You are a high school student with a competitive personality. You are ambitious, interested in technology and programming, but the lessons you learned in school are not enough. Learn along with the adults and get ahead of your peers.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Freelancers</span>
                    </div>
                    <div class="info-text">
                        You want to work for yourself, be free and independent. You love the challenge of creating solutions for different companies. You dream of choosing what you want to do Acquire the skills that can give you all that.
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
                    <img src="{{asset('/images/programming-page-big.jpg')}}" alt="info-pic" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <div id="program-holder">

    </div>
    <div class="section">
        <div id="program">
            <div class="program-title text-center">PROGRAM</div>
            <div class="program-scheme col-md-12 text-center">
                <div id="tabs">
                    <ul class="tabs-nav d-flex flex-wrap flex-row program-nav">
                        <li><a href="#tabs-1"><i class="fas fa-caret-down"></i>Web Development with PHP</a></li>
                        <li><a href="#tabs-2"><i class="fas fa-caret-right"></i>Java technologies</a></li>
                    </ul>
                    <div class="program-holder d-flex justify-content-center">
                        <!-- php tab -->
                        <div id="tabs-1" class="p-3 php">
                            <div class="col-md-12 d-flex flex-row flex-wrap php-program-holder">
                                <!-- first lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info">
                                        <p class="program-info">
                                            What will know after level 1: Introducing to programming with PHP - Creating website pages with HTML & CSS. PHP basics.GIT basics
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
                                            What will know after level 2: DataBases - Working with MYSQL and creating PHP application with database.
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
                                            What will know after level 3: Introducing to Front-End programming - Creating front-end applications with JavaScript & jQuery.
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
                                            What will know after level 4: OOP and MVC - Object Oriented Programming. Creating web application with Laravel framework.
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
                                            What will know after level 1: Introducing to Java programming - working with IntelliJ, GIT basics.
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
                                            What will know after level 2: Java ООP -  abstraction and polymorphism, working with files.
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
                                            What will know after level 3: Android - working with Android studio, databases and design
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
                                            What will know after level 4: Създаване на web приложения - working with Java Servlets and JSP (Java Server Pages). Working with relational databases. Working with Tomcat server.
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
            <div class="details-title text-center">Details</div>
            <div class="details-container col-md-12 d-flex flex-wrap flex-row">
                <div class="col-md-4">
                    <div class="card card-2 text-center card-programing">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/programing/icons/calendar_green.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/calendar.png')}}">
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
                    <div class="card card-2 text-center card-programing">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/programing/icons/startup_green.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/startup.png')}}">
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
                    <div class="card card-2 text-center card-programing">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/programing/icons/contract_green.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/contract.png')}}">
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
                    <div class="card card-2 text-center card-programing">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/programing/icons/medal_green.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/medal.png')}}">
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
                    <div class="card card-2 text-center card-programing">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/programing/icons/payment_green.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/payment.png')}}">
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
                    <div class="card card-2 text-center card-programing">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/programing/icons/goal_green.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/goal.png')}}">
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
                <li>1
                    <span style="margin-left:-4vw;">electronic form</span>
                </li>
                <li>2
                    <span style="margin-left:-4vw;">individual test</span>
                </li>
                <li>3
                    <span style="margin-left:-3.5vw;">individual task</span>
                </li>
                <li>4
                    <span style="margin-left:-3.5vw;">interview</span>
                </li>
                <li class="active-step">5
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
        <span id="prepare" class="end-candidate programming-candidate-btn"><a href="{{route('application.create',['type' => $type])}}">APPLY</a></span>
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

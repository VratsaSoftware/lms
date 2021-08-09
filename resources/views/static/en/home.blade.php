<!DOCTYPE html>
<html lang="en">

@include('static.includes.en.home_head')

<body style="opacity:0">
@include('static.includes.en.lang_btn')
<!-- JQuery -->
<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>

<div id="content">
    <!-- header section - nav - gallery -->
    <div class="section">
        <div id="header" class="col-md-11 col-sm-12 row">
            <div id="logo" class="col-md-1 col-sm-1">
                <h1><a href="{{route('home')}}"><img src="{{asset('/images/logoVS_en_white.png')}}" alt="vso-logo" class="img-responsive main-logo"></a></h1>
            </div>

            @include('static.includes.en.menu')

            <ul id='right-menu'>
                <li><a href="#header"><img src="{{asset('/images/oval.png')}}" alt="nav-img"></a>
                <li><a href="#numbers"><img src="{{asset('/images/oval.png')}}" alt="nav-img"></a>
                <li><a href="#events"><img src="{{asset('/images/oval.png')}}" alt="nav-img"></a>
                <li><a href="#partners"><img src="{{asset('/images/oval.png')}}" alt="nav-img"></a>
                <li><a href="#testimonials"><img src="{{asset('/images/oval.png')}}" alt="nav-img"></a>
            </ul>

            <div class="row buttons-right col-md-2">
                <div id="login-btn" class="col-md-2">
                    <span id="log-in"><a href="{{route('login')}}">LOGIN</a></span>
                </div>
                <!--<div id="candidate-btn" class="col-md-2">-->
            <!--    <span id="candidate"><a href="{{route('application.create')}}">Кандидатствай</a></span>-->
                <!--</div>-->
            </div>
        </div>
        @include('static.includes.en.hamburger_menu')
    </div>
    <!-- end of header section -->

    <!-- image gallery carousel  -->
    <div class="section">
        <div id="carousel">
            <div class="slideshow-container">
                {{-- title = 33 characters, text min = 125 / max = 290 --}}
                <div class="mySlides" data-src="{{asset('/images/home-top-slider/hack.jpg')}}" data-loader="{{asset('/images/loaders/load-22.gif')}}">
                    <img src="" width="100%" alt="events">
                    <div class="text text-wrap-gallery col-md-12 text-center">
                        <p>
                            <span class="slider-title">Hack Vratsa</span>
                        <p />
                        <p>
                        <p class="slider-subtitle-content">
                            All students, students and workers with interest in programming, design and entrepreneurship can participate in HackVratsa. The goal of the initiative is to team together to formulate a concept for a software product and to start work on its development.
                        </p>
                        <br/>

                        <span class="title-btns-content"><a class="sub-btn" href="http://hack.vratsa.net/" target=" _blank">read more</a></span>
                        </p>
                    </div>
                </div>

                <div class="mySlides" data-src="{{asset('/images/home-top-slider/cws_fb_cover2 (1).png')}}" data-loader="{{asset('/images/loaders/load-22.gif')}}">
                    <img src="" width="100%" alt="events">
                    <div class="text text-wrap-gallery col-md-12 text-center">
                        <p>
                            <span class="slider-title">The Nest</span>
                        <p />
                        <p>
                        <p class="slider-subtitle-content text-center">
                            "The Nest" is the first shared workspace in Northwestern Bulgaria and is a project of <br/> "Vratsa Software Society."<br/>
                                                                <br/>We are currently working on its creation!
                        </p>
                        <br/>

                        <span class="title-btns-content"><a class="sub-btn" href="http://gnezdoto.vratsasoftware.com/" target=" _blank">read more</a></span>
                        </p>
                    </div>
                </div>

                <div class="mySlides" data-src="{{asset('/images/home-top-slider/arduino.jpg')}}" data-loader="{{asset('/images/loaders/load-22.gif')}}">
                    <img src="" width="100%" alt="events">
                    <div class="text text-wrap-gallery col-md-12 text-center">
                        <p>
                            <span class="slider-title">Arduino</span>
                        <p />
                        <p>
                        <p class="slider-subtitle-content">
                            Soon we start an Arduino course!<br />
                                                                 Arduino is one of the most popular platforms for robotics hobby. It is a microcontroller with a huge user community, and over the years has been used for thousands of diverse projects.
                        </p>
                        <br/>

                        <span class="title-btns-content"><a class="sub-btn" href="https://docs.google.com/forms/d/e/1FAIpQLSf5-bKSKqJcMDONIrp93ggmYvaW84x3DR9e2em-uQf5LhH6aA/viewform" target=" _blank">apply</a></span>
                        </p>
                    </div>
                </div>

                <div class="mySlides" data-src="{{asset('/images/home-top-slider/mindhub.jpg')}}" data-loader="{{asset('/images/loaders/load-22.gif')}}">
                    <img src="" width="100%" alt="events">
                    <div class="text text-wrap-gallery col-md-12 text-center">
                        <p>
                            <span class="slider-title">IT courses for children 6-11years. in Vratsa</span>
                        <p />
                        <p>
                        <p class="slider-subtitle-content">
                            MindHub is the first innovative programming club for children between the ages of 6 and 11.<br/>
                                                                     During the school year 2018/2019 for the first time and in Vratsa there will be courses of mindhub.
                        </p>
                        <br/>

                        <span class="title-btns-content"><a class="sub-btn" href="https://mindhub.bg/" target=" _blank">read more</a></span>
                        </p>
                    </div>
                </div>

                <div class="mySlides" data-src="{{asset('/images/home-top-slider/programming-pic.jpg')}}" data-loader="{{asset('/images/loaders/load-22.gif')}}">
                    <img src="" width="100%" alt="events">
                    <div class="text text-wrap-gallery col-md-12 text-center">
                        <p>
                            <span class="slider-title">9-month programming courses</span>
                        <p />
                        <p>
                        <p class="slider-subtitle-content">
                            The training will help you acquire basic programming skills and be able to start an internship at a software company in Vratsa!
                            At the moment, 24 people have completed the courses working in the IT field in Vratsa and 3 companies have opened offices in the city.
                        </p>
                        <br/>

                        <span class="title-btns-content"><a class="sub-btn" href="{{route('programmingCourses')}}">read more</a></span>
                        </p>
                    </div>
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
            <br>

            <div id="thumbnails" class="col-md-12">
                <span class="dot" onclick="currentSlide(1)"><img src="{{asset('/images/home-top-slider/hack_thumb.png')}}" width="100%" alt="gallery-nav"></span>
                <span class="dot" onclick="currentSlide(2)"><img src="{{asset('/images/home-top-slider/gnezdoto_logo_cropped.jpg')}}" width="100%" alt="gallery-nav"></span>
                <span class="dot" onclick="currentSlide(3)"><img src="{{asset('/images/home-top-slider/arduino_logo.png')}}" width="100%" alt="gallery-nav"></span>
                <span class="dot" onclick="currentSlide(4)"><img src="{{asset('/images/home-top-slider/mind-hub-crop.png')}}" width="100%" alt="gallery-nav"></span>
                <span class="dot" onclick="currentSlide(5)"><img src="{{asset('/images/home-top-slider/vsc-thumb-big-2.png')}}" width="100%" alt="gallery-nav"></span>
            </div>

        </div>
    </div>
    <!-- end of image gallery carousel  -->

    <!-- big numbers section -->
    <div class="section">
        <div id="numbers">
            <div class="numbers-section d-flex flex-row bd-highlight mb-12 justify-content-around flex-wrap">

                <div class="num-num col-md-2 bd-highlight">
                    <div class="num-big-num count">3</div>
                    <div class="num-content">new software companies opened offices in Vratsa</div>
                </div>
                <div class="right-line col-md-1">
                    <img src="{{asset('/images/right-num-line.png')}}" alt="line-img">
                </div>


                <div class="num-num col-md-2 bd-highlight">
                    <div class="num-big-num count">1570</div>
                    <div class="num-content">participants in our events</div>
                </div>
                <div class="right-line col-md-1">
                    <img src="{{asset('/images/right-num-line.png')}}" alt="line-img">
                </div>


                <div class="num-num col-md-2 bd-highlight">
                    <div class="num-big-num count">250</div>
                    <div class="num-content">people started our courses</div>
                </div>
                <div class="right-line col-md-1">
                    <img src="{{asset('/images/right-num-line.png')}}" alt="line-img">
                </div>


                <div class="num-num col-md-2 bd-highlight">
                    <div class="num-big-num count">4</div>
                    <div class="num-content">years</div>
                </div>

            </div>
        </div>
        <div class="why">
            <div class="why-title col-md-12 text-center">
                <span>Why Vratsa Software Community?</span>
            </div>
            <div class="why-sections d-flex mb-12 flex-row flex-wrap">
                <div class="why-first-section p-4 col-md-4 text-center">
                    <img src="{{asset('/images/why-first-icon.png')}}" class="img-fluid" alt="icon-img">
                    <span class="why-first-content">
                            We are developing software industry in Vratsa by organising interesting IT events and courses in programming, digital marketing and others.</span>
                </div>
                <div class="why-second-section p-4 col-md-4 text-center">
                    <img src="{{asset('/images/why-second-icon.png')}}" class="img-fluid" alt="icon-img">
                    <span class="why-second-content">Our trainers are highly professional and practitioners with ambition to pass on their knowledge and experience.</span>
                </div>
                <div class="why-third-section p-4 col-md-4 text-center">
                    <img src="{{asset('/images/why-third-icon.png')}}" class="img-fluid" alt="icon-img">
                    <span class="why-third-content">We have received numerous national and international awards and recognition. Some of them are: Worthy Bulgarians 2017, inclusion in the list of Forbes Europe 30 under 30, Google RISE Awards.</span>
                </div>
            </div>
        </div>
    </div>
    <!-- end of big numbers section -->

    <!-- events section -->
    <div class="section">
        <div id="events">
            <div class="events-title col-md-12 text-center">
                <span>Events</span>
            </div>
            <div class="main-events d-flex mb-12 flex-row col-md-12 flex-wrap">
                <div class="p-6 col-md-6 text-center main-event-first">
                    <a href="https://hack.vratsa.net/" target=" _blank">
                        <img src="" data-img="{{asset('/images/home-events/HackVratsa.jpg')}}" alt="events">
                    </a>
                    <div class="event-title-top">
                        <a href="https://hack.vratsa.net/" target=" _blank" class="event-top-link">HackVratsa</a>
                    </div>
                </div>
                <div class="p-6 col-md-6 text-center main-event-second">
                    <a href="https://hunt.vratsa.net/" target=" _blank">
                        <img src="" data-img="{{asset('/images/home-events/th.jpg')}}" alt="events">
                    </a>
                    <div class="event-title-top">
                        <a href="https://hunt.vratsa.net/" target=" _blank" class="event-top-link">TreasureHunt</a>
                    </div>
                </div>
                <div class="p-6 col-md-6 text-center main-event-first">
                    <a href="https://www.facebook.com/railsgirlsvratsa/" target=" _blank">
                        <img src="" data-img="{{asset('/images/home-events/railsgirls.png')}}" alt="events">
                    </a>
                    <div class="event-title-top">
                        <a href="https://www.facebook.com/railsgirlsvratsa/" target=" _blank" class="event-top-link">RailsGirls</a>
                    </div>
                </div>
                <div class="p-6 col-md-6 text-center main-event-second">
                    <a href="https://codeweek.vratsa.net/" target=" _blank">
                        <img src="" data-img="{{asset('/images/home-events/cw18.png')}}" alt="events">
                    </a>
                    <div class="event-title-top">
                        <a href="https://codeweek.vratsa.net/" target=" _blank" class="event-top-link">CodeWeek</a>
                    </div>
                </div>
            </div>

            <div class="secondary-events">
                <section class="center slider col-md-11 filmstrip-events">
                    <div>
                        <a href="http://codeweek.vratsa.net/" target=" _blank" class="event-top-link">
                            <img src="{{asset('/images/home-events/cw18.png')}}" alt="events">
                        </a>
                        <div class="event-title-top-small">
                            <a href="http://codeweek.vratsa.net/" target=" _blank" class="event-top-link">CodeWeek</a>
                        </div>
                    </div>
                    <div>
                        <a href="https://learndigital.withgoogle.com/digitalengarazh" target=" _blank" class="event-top-link">
                            <img src="{{asset('/images/home-events/google-garage.jpg')}}" alt="events">
                        </a>
                        <div class="event-title-top-small">
                            <a href="https://learndigital.withgoogle.com/digitalengarazh" target=" _blank" class="event-top-link">Google Digital Garage</a>
                        </div>
                    </div>

                    <div>
                        <a href="http://hack.vratsa.net/" target=" _blank" class="event-top-link">
                            <img src="{{asset('/images/home-events/HackVratsa.jpg')}}" alt="events">
                        </a>
                        <div class="event-title-top-small">
                            <a href="http://hack.vratsa.net/" target=" _blank" class="event-top-link">HackVratsa</a>
                        </div>
                    </div>
                    <div>
                        <a href="http://railsgirls.com/" target=" _blank" class="event-top-link">
                            <img src="{{asset('/images/home-events/railsgirls.png')}}" alt="events">
                        </a>
                        <div class="event-title-top-small">
                            <a href="http://railsgirls.com/" target=" _blank" class="event-top-link">RailsGirls</a>
                        </div>
                    </div>
                    <div>
                        <a href="http://hunt.vratsa.net/" target=" _blank" class="event-top-link">
                            <img src="{{asset('/images/home-events/th.jpg')}}" alt="events">
                        </a>
                        <div class="event-title-top-small">
                            <a href="http://hunt.vratsa.net/" target=" _blank" class="event-top-link">TreasureHunt</a>
                        </div>
                    </div>
                    <div>
                        <a href="http://eotr.edit.bg/" target=" _blank" class="event-top-link">
                            <img src="{{asset('/images/home-events/edit-vr.jpg')}}" alt="events">
                        </a>
                        <div class="event-title-top-small">
                            <a href="http://eotr.edit.bg/" target=" _blank" class="event-top-link">EditOnTheRoad</a>
                        </div>
                    </div>
                    <div>
                        <a href="{{route('digitalMarketing')}}" target=" _blank" class="event-top-link">
                            <img src="{{asset('/images/home-events/digital-event.jpg')}}" alt="events">
                        </a>
                        <div class="event-title-top-small">
                            <a href="{{route('digitalMarketing')}}" target=" _blank" class="event-top-link">DigitalMarketing</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- end of events section -->

    <!-- partners/sponsors section -->
    <div class="section">
        <div id="partners" class="col-md-12">
            <div class="partners-title col-md-12 text-center">
                <span>Partners</span>
            </div>
            <!-- only 4 visible -->
            <div class="col-md-12 flex-wrap sponsors-logos b-description_readmore js-description_readmore text-center more-sponsors">
                <div class="p-3 col-md-3 sponsors-1"><a href="https://www.us4bg.org/" target=" _blank"><img src="{{asset('/images/partners/us4bg-logo.png')}}" alt="us4bg-logo" class="img-fluid"></a></div>
                <div class="p-3 col-md-3 sponsors-2"><a href="https://nova.bg/promyanata" target=" _blank"><img src="{{asset('/images/partners/promianata-logo.png')}}" alt="promianata-logo" class="img-fluid"></a></div>
                <div class="p-3 col-md-3 sponsors-3"><a href="http://www.vratza.bg/" target=" _blank"><img src="{{asset('/images/partners/vratsa-municipality-logo.jpg')}}" alt="vratsa-municipality-logo" class="img-fluid"></a></div>
                <div class="p-3 col-md-3 sponsors-4"><a href="https://www.telerikacademy.com/" target=" _blank"><img src="{{asset('/images/partners/Telerik_Academy_Logo.png')}}" alt="Telerik_Academy_Logo" class="img-fluid"></a></div>

                <div class="p-3 col-md-3 sponsors-5" data-img="{{asset('/images/partners/mindhub-logo.png')}}"><a href="https://mindhub.bg/" target=" _blank"><img src=" " alt="mindhub-logo" class="img-fluid"></a></div>
                <div class="p-3 col-md-3 sponsors-6" data-img="{{asset('/images/partners/CDB-logo.png')}}"><a href="https://www.coderdojo.bg/" target=" _blank"><img src=" " alt="Coder Dojo Bulgaria" class="img-fluid"></a></div>
                <div class="p-3 col-md-3 sponsors-7" data-img="{{asset('/images/partners/movebg-logo2.png')}}"><a href="https://move.bg/" target=" _blank"><img src=" " alt="movebg-logo" class="img-fluid"></a></div>
                <div class="p-3 col-md-3 sponsors-8" data-img="{{asset('/images/partners/NMD-Logo.gif')}}"><a href="http://nmd.bg/" target=" _blank"><img src=" " alt="NMD-Logo" class="img-fluid"></a></div>

                <div class="col-md-3"></div>

                <div class="p-3 col-md-3 sponsors-9" data-img="{{asset('/images/partners/eSkills-For-Future-logo.png')}}"><a href="http://eskills.tto-bait.bg/" target=" _blank"><img src=" " alt="eSkills-For-Future-logo" class="img-fluid"></a></div>

                <div class="p-3 col-md-3 sponsors-10" data-img="{{asset('/images/partners/Startup-logo-main.png')}}"><a href="http://startup.bg/" target=" _blank"><img src=" " alt="Startup-logo-main" class="img-fluid"></a></div>
                <div class="col-md-3"></div>
            </div>
            <div class="col-md-5">

            </div>
            <div class="col-md-2 b-description_readmore_button" data-lang="{{Session::get('locale')}}">
                show more
            </div>
            <div class="col-md-5">

            </div>
            <!-- end of only 4 visible -->

            <!-- mobile sponsors logo's -->
            <div class="col-md-12 col-xs-12 col-sm-12 flex-wrap text-center mobile-sponsors">
                <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-1"><a href="https://www.us4bg.org/" target=" _blank"><img src="{{asset('/images/partners/us4bg-logo.png')}}" alt="us4bg-logo" class="img-fluid"></a></div>
                <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-2"><a href="https://nova.bg/promyanata" target=" _blank"><img src="{{asset('/images/partners/promianata-logo.png')}}" alt="promianata-logo" class="img-fluid"></a></div>
                <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-3"><a href="http://www.vratza.bg/" target=" _blank"><img src="{{asset('/images/partners/vratsa-municipality-logo.jpg')}}" alt="vratsa-municipality-logo" class="img-fluid"></a></div>
                <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-4"><a href="https://www.telerikacademy.com/" target=" _blank"><img src="{{asset('/images/partners/Telerik_Academy_Logo.png')}}" alt="Telerik_Academy_Logo" class="img-fluid"></a></div>

                <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-5"><a href="https://mindhub.bg/" target=" _blank"><img src="{{asset('/images/partners/mindhub-logo.png')}}" alt="mindhub-logo" class="img-fluid"></a></div>
                <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-6"><a href="https://www.coderdojo.bg/" target=" _blank"><img src="{{asset('/images/partners/CDB-logo.png')}}" alt="Coder Dojo Bulgaria" class="img-fluid"></a></div>
                <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-7"><a href="https://move.bg/" target=" _blank"><img src="{{asset('/images/partners/movebg-logo2.png')}}" alt="movebg-logo" class="img-fluid"></a></div>
                <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-8"><a href="http://nmd.bg/" target=" _blank"><img src="{{asset('/images/partners/NMD-Logo.gif')}}" alt="NMD-Logo" class="img-fluid"></a></div>

                <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-5"><a href="http://eskills.tto-bait.bg/" target=" _blank"><img src="{{asset('/images/partners/eSkills-For-Future-logo.png')}}" alt="eSkills-For-Future-logo" class="img-fluid"></a></div>
                <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-6"><a href="http://startup.bg/" target=" _blank"><img src="{{asset('/images/partners/Startup-logo-main.png')}}" alt="Startup-logo-main" class="img-fluid"></a></div>
            </div>
            <!-- end of mobile sponsors logo's -->
        </div>
    </div>
    <!-- end of partners/sponsors section -->

    <!-- testimonials section -->
    <div class="section">
        <div id="testimonials">
            <div class="testimonials-title col-md-12 text-center">
                <span>What our coursists are saying about us</span>
            </div>
            <div class="col-md-12 flex-row justify-content-between d-flex flex-wrap testimonials-students text-center">
                <div class="p-2 col-md-3 first-student student-1">
                    <img src="{{asset('/images/home-testimonials/adi-todorova.jpg')}}" alt="Adi Todorova" class="student-img img-fluid">
                    <div class="student-comment">A super cool organization that helps everyone who wants to develop in the IT sphere. Their courses give a good foundation in programming, and the most exciting part is getting to meet new people.</div>
                    <div class="student-name">Adelina Todorova, student</div>
                </div>

                <div class="p-2 col-md-3 second-student student-2">
                    <img src="{{asset('/images/home-testimonials/svetli_170x170.png')}}" alt="Svetoslav Vasilev" class="student-img img-fluid">
                    <div class="student-comment">Great way to kickstart with which you can start work in the IT. I personally passed the 9 - month PHP course, then started work immediately.</div>
                    <div class="student-name">Svetoslav Vasilev, programmer</div>
                </div>

                <div class="p-2 col-md-3 third-student student-3">
                    <img src="{{asset('/images/home-testimonials/ivan-spasov.png')}}" alt="Ivan Spasov" class="student-img img-fluid">
                    <div class="student-comment">Vratsa Software is not just a community they are an inspiring family that makes you feel like an irreplaceable and important part of something special.</div>
                    <div class="student-name">Ivan Spasov, student</div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of testimonials section -->

    <!-- cookies section -->
    <div class="section">
        <!-- <div id="cookies" class="col-md-12 d-flex flex-wrap"> -->
    <!-- <div class="cookie-text col-md-8">
                    <span class="p-6 col-md-3 col-xs-3 col-sm-3"><img src="{{asset('/images/partners/us4bg-logo-small.png')}}" alt="sponsor" class="img-fluid cookie-sponsor-img"></span>
                    <span class="cookie-sponsor-text">
                        General partner for the period 2017-2019 is foundation America for Bulgaria.<br />
                    </span>
                </div> -->

    <!-- <div class="col-md-12 text-right">Vratsa Software &copy; {{\Carbon\Carbon::now()->format('Y')}}</div>
                <div class="col-md-12 text-right"><img src="{{asset('images/location-front.png')}}" alt="location" width="20px">Vratsa, 3000, str. Kokiche 14</div> -->
        <!-- </div> -->
        @include('static.includes.en.footer')
    </div>
    <!-- end of cookies section -->
    <script src="{{asset('/js/slick.js')}}"></script>
    <script src="{{asset('/js/hamburger-menu.js')}}" async></script>
    <script>
        $(function() {
            $('.main-nav-list > li > a').on('click', function() {
                $('html, body').animate({
                    scrollTop: $($(this).attr('href')).offset().top
                }, 500, 'linear');
            });
        })
    </script>
    <script type="text/javascript">
        $(function() {
            $('head').append('<link rel="preload stylesheet" href="{{asset('/css/landing.css')}}" as="style">');
            $('head').append('<link rel="preload stylesheet" href="{{asset('/css/bootstrap.min.css')}}" as="style">');
            $('head').append('<link rel="preload stylesheet" href="{{asset('/css/bootstrap-grid.min.css')}}" as="style">');
            $('head').append('<link rel="preload stylesheet" href="{{asset('/css/slick.css')}}" as="style">');
            $('head').append('<link rel="preload stylesheet" href="{{asset('/css/slick-theme.css')}}" as="style">');
            $('head').append('<link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}" />');
            var frontGallery = document.createElement("script");
            frontGallery.src = "{{asset('/js/front-gallery.js')}}";
            var customGallery = document.createElement("script");
            customGallery.src = "{{asset('/js/custom-gallery.js')}}";
            var numbers = document.createElement("script");
            numbers.src = "{{asset('/js/numbers-section-trigger.js')}}";
            var filmstrip = document.createElement("script");
            filmstrip.src = "{{asset('/js/filmstrip.js')}}";
            var sponsors = document.createElement("script");
            sponsors.src = "{{asset('/js/sponsors.js')}}";
            var students = document.createElement("script");
            students.src = "{{asset('/js/students.js')}}";
            var rightDot = document.createElement("script");
            rightDot.src = "{{asset('/js/right-dot-menu.js')}}";
            setTimeout(loadJs,2000);
            $('body').append(frontGallery);
            function loadJs(){
                $('body').append(customGallery);
                $('body').append(numbers);
                $('body').append(filmstrip);
                $('body').append(sponsors);
                $('body').append(students);
                $('body').append(rightDot);
            }

            $( '.main-events > div' ).each( function ( k, v ) {
                $( this ).find( 'img' ).attr( 'src', $( this ).find( 'img' ).attr( 'data-img' ) );
            } );
        });
    </script>
</body>

</html>

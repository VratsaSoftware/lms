<!DOCTYPE html>
<html lang="en">

@include('static.includes.en.about_head')

<body>
    @include('static.includes.en.lang_btn')
    <!-- header section - nav - gallery -->
{{--    <div class="section" id="header-section">--}}
{{--        <div class="overlay-top-img">--}}
{{--            <img src="{{asset('/images/team.png')}}" alt="bg-img" class="img-fluid">--}}
{{--        </div>--}}
{{--    </div>--}}
    <div id="header" class="col-md-12 col-sm-12 d-flex flex-row flex-wrap header">
        <div id="logo" class="col-md-1 col-sm-1">
            <h1><a href="{{route('home')}}"><img src="{{asset('/images/logoVS_en.png')}}" alt="vso-logo" class="img-responsive main-logo"></a></h1>
        </div>
        <div class="col-md-12 text-center d-flex flex-row flex-wrap top-text-wrap content-wrapper">
            <div class="col-md-12 header-about-text">
                Vratsa Software Team
            </div>
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
    </div>
    <!-- end of header section -->
    <div class="col-md-12 founders-title text-center">
        Founders
    </div>
    <!-- team section -->
    <div class="section">
        <div id="team" class="col-md-12 d-flex flex-row flex-wrap text-center">
            <div class="col-md-4 founders">
                <div class="team-holder">
                    <img src="{{asset('/team_pictures/ek_pic.jpeg')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Emiliyan Kadiyski
                    </div>
                    <div class="team-txt">
                        Born in Vratsa, Emo graduated the local Mathematical High School, after which he completed his masters in Informatics at Sofia University "St. Kliment Ohridski ". He works as a web developer and in 2011 is part of the first cohort of “Teach for Bulgaria”s teachers. In 2013, together with two friends, he started Vratsa Software Community. The organization is developing digital industry in their Vratsa, offering programming courses and interesting IT events. Currently, Emo works as a programmer and as a teacher at the technical high school "N. J. Vaptsarov "in Vratsa. From 2015 there is a specialty in programming. His hobbies are mainly sports: football, skiing, running, traveling and hiking
                    </div>
                    {{-- <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> hristo.botev@mail.com</span>
                    </div> --}}
                </div>
            </div>

            <div class="col-md-4 founders">
                <div class="team-holder">
                    <img src="{{asset('/team_pictures/teo_pic5.jpg')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Teodor Kostadinov
                    </div>
                    <div class="team-txt">
                        Theodore is one of the founders of Vratsa software and one of the first lecturers in the organisation. He is involved in both programming and teaching, as well as organizing events and competitions. His favorite game is the annual Treasure Hunt in Vratsa, for which he draws inspiration from the many escape rooms he walks on. Theodore is a senior programmer at a major American company, working mainly with Java and Android. He likes to experiment with different technologies and techniques, and often begin his own projects. The love for programming is what he wants to pass on to his students.
                    </div>
                    {{-- <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> hristo.botev@mail.com</span>
                    </div> --}}
                </div>
            </div>

            <div class="col-md-4 founders">
                <div class="team-holder">
                    <img src="{{asset('/team_pictures/Iliyan-Dimov-pic.jpg')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Iliyan Dimov
                    </div>
                    <div class="team-txt">
                        Ilian has a technical mind that makes him believe that innovative and modern jobs can be worked from everywhere. He loves his hometown of Vratsa and also likes to help people. He is motivated by the idea that Vratsa can become an IT hub in northwest Bulgaria.
                        Education: Technical University of Sofia<br/>
                        Master of Robotics<br/>
                        Profession: programmer and co - founder of Vratsa Software Society<br/>
                    </div>
                    {{-- <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> hristo.botev@mail.com</span>
                    </div> --}}
                </div>
            </div>

            <div class="col-md-12 founders-title">
                Managing Team
            </div>

            <div class="col-md-2">

            </div>

            <div class="col-md-4 leaders">
                <div class="team-holder">
                    <img src="{{asset('/images/men-no-avatar.png')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Tonko Vlahov
                    </div>
                    <div class="team-txt">
                        Tonko graduated from the University of National and World Economy. He joined Vratsa Software’s team three years ago and since then he has been involved in organizational development, marketing and event management. One of the captains CoderDojo Bulgaria. He loves listening to music, watching movies and reading comics.
                    </div>
                    <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> tonko@vratsasoftware.com</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 leaders">
                <div class="team-holder">
                    <img src="{{asset('/team_pictures/ivan_pic.jpg')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Ivan Strijlev
                    </div>
                    <div class="team-txt">
                        Ivan was born and lives in Vratsa. He graduated in psychology at SWU "Neofit Rilski". He has worked in his specialty in the education system. For more than ten years he has been involved in creating and conducting training sessions and team buildings. His hobby is photography, hiking and graphic design.
                    </div>
                    <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> ivan@vratsasoftware.com</span>
                    </div>
                </div>
            </div>

            <div class="col-md-2">

            </div>

            <div class="col-md-12 founders-title">
                Teachers
            </div>

            <div class="col-md-4 teachers">
                <div class="team-holder">
                    <img src="{{asset('/team_pictures/lili_pic.jpg')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Liliya Mihailova
                    </div>
                    <div class="team-txt">
                        Born in Vratsa, Lily graduated from the Mathematical High School in the city with biology profile. She then studied Biotechnology at Sofia University "St. Kliment Ohridski ". In the beginning of 2015 she took part in the first programming course. After graduating successfully, she started working as Android and Java Web Developer at Inveitix, the largest software company in the city. A month later, she became part of the Vratsa Software’s team as a lecturer in the programming course with Java. She loves to cook for her loved ones and to take a walk in the nature.
                    </div>
                    {{-- <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid team-pic">
                                <span> hristo.botev@mail.com</span>
                    </div> --}}
                </div>
            </div>

            <div class="col-md-4 teachers">
                <div class="team-holder">
                    <img src="{{asset('/team_pictures/tito_pic.jpg')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Tihomir Krastev
                    </div>
                    <div class="team-txt">
                        Born in Vratsa, Tito graduated from the "Hristo Botev" High School. After that he got a Bachelor of Public Administration at the University of National and World Economy and a Master's Degree in Management at "Varna University of Economics". In the spring of 2015, he was part of the first nine month course of Vratsa Software as a student and in summer he started working as a programmer at the largest software company in the city - Inveitix. Currently, Tito is a Senior Android Developer and Team Leader of the Java team at the company. From the end of 2015 he joined again the nine-month courses, but this time around as a lecturer. His hobbies are - football, traveling and games.

                    </div>
                    {{-- <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid team-pic">
                        <span> hristo.botev@mail.com</span>
                    </div> --}}
                </div>
            </div>

            <div class="col-md-4 teachers">
                <div class="team-holder">
                    <img src="{{asset('/team_pictures/milena_pic.jpg')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Milena Tomova
                    </div>
                    <div class="team-txt">
                        She entered the first edition of the 9-month courses of Vratsa Software and graduated from the Web development with PHP course. "Never before had I imagined that I would be engaged in programming, even less so that I would teach. I dreamed of knowing many languages. Apparently I have not specified that I do not mean programming languages. " "I'm not from Vratsa, and the place you are in doesn’t matter. The people around you are important and thanks to which you constantly increase your knowledge and become convinced in your abilities. "She is currently leading the Web development course with the PHP. Zend Certified Engineer and Certified Laravel Developer.
                    </div>
                    {{-- <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid team-pic">
                        <span> hristo.botev@mail.com</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- end of team section -->

    <div class="section">
            @include('static.includes.en.footer')
    </div>

    <script src="{{asset('/js/hamburger-menu.js')}}"></script>
</body>

</html>

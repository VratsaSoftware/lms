<!DOCTYPE html>
<html lang="bg">

@include('static.includes.bg.about_head')

<body>
    @include('static.includes.bg.lang_btn')
    <!-- header section - nav - gallery -->
{{--    <div class="section" id="header-section">--}}
    {{--        <div class="overlay-top-img">--}}
    {{--            <img src="{{asset('/images/team.png')}}" alt="bg-img" class="img-fluid">--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div id="header" class="col-md-12 col-sm-12 d-flex flex-row flex-wrap header">
        <div id="logo" class="col-md-1 col-sm-1">
            <h1><a href="{{route('home')}}"><img src="{{asset('/images/logoVS_bg.png')}}" alt="vso-logo" class="img-responsive main-logo"></a></h1>
        </div>
        <div class="col-md-12 text-center d-flex flex-row flex-wrap top-text-wrap content-wrapper">
            <div class="col-md-12 header-about-text">
                Екипът на Враца Софтуер Общество
            </div>
        </div>
        @include('static.includes.bg.menu')

        <div class="row buttons-right col-md-2">
            <div id="candidate-btn" class="col-md-2">
                <span id="candidate"><a href="{{route('login')}}">ВХОД</a></span>
            </div>
        </div>
        <!-- hamburger -->
        @include('static.includes.bg.hamburger_menu')
        <!-- end of hamburger -->
    </div>
    <!-- end of header section -->
    <div class="col-md-12 founders-title text-center">
        Основатели
    </div>
    <!-- team section -->
    <div class="section">
        <div id="team" class="col-md-12 d-flex flex-row flex-wrap text-center">
            <div class="col-md-4 founders">
                <div class="team-holder">
                    <img src="{{asset('/team_pictures/ek_pic.jpeg')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Емилиян Кадийски
                    </div>
                    <div class="team-txt">
                        Роден във Враца, Емо завършва математическата гимназия в града, след това магистратура по Информатика в СУ “Св. Климент Охридски”. Работи като уеб програмист и през 2011г е част от първата кохорта учители на Заедно в час.
                        Хобитата му са да спортува: футбол, ски, тичане, да пътува и да обикаля сред природата.
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
                        Теодор Костадинов
                    </div>
                    <div class="team-txt">
                        Теодор е един от основателите на <b>Враца софтуер</b> и един от първите лектори в сдружението.  Занимава се както с програмиране и преподаване, така и с организиране на събития и състезания. Любима негова е игра е ежегодният Лов на съкровище във Враца, за която черпи вдъхновение от множеството ескейп стаи на които ходи.

                       Теодор е старши програмист в голяма американска компания, като се занимава соновно с Джава и Андроид. Обича да експериментира с различни технологии и похвати, и често подхваща собствени проекти. Любовта към програмирането е нещото, което иска да предаде на своите курсисти.
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
                        Илиян Димов
                    </div>
                    <div class="team-txt">
                        Илиян има технически ум, който го кара да вярва, че иновативните и модерни
                        професии могат да се работят отвсякъде. Той обича родния си град Враца и
                        също така обича да помага на хората. Мотивиран е от идеята, че Враца може
                        да се превърне в ИТ хъб в Северозападна България.<br/>
                        Образование: Технически университет София<br/>
                        Магистър по Роботика<br/>
                        Професия: Програмист и съосновател на <br /><b>Враца Софтуер Общество.</b>
                    </div>
                    {{-- <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> hristo.botev@mail.com</span>
                    </div> --}}
                </div>
            </div>

            <div class="col-md-12 founders-title">
                Управленски Екип
            </div>

            <div class="col-md-2">

            </div>

            <div class="col-md-4 leaders">
                <div class="team-holder">
                    <img src="{{asset('/images/men-no-avatar.png')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Тонко Влахов
                    </div>
                    <div class="team-txt">
                        Тонко е завършил политология в УНСС. Присъединява се към екипа на Враца софтуер през 2016 и от тогава се занимава с организационно развитие, маркетинг и организиране на събития. Един от капитаните на CoderDojo Bulgaria. Запален меломан и любител на кино изкуството и комиксите.
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
                        Иван Стрижлев
                    </div>
                    <div class="team-txt">
                        Иван е роден и живее във Враца. Завършил е психология в ЮЗУ „Неофит Рилски“. Работил е по специалността си в системата на образованието. Повече от десет години се занимава със създаването и провеждането на тренинг обучения и тиймбилдинги. Хоби му е фотографията, планинарството и графичния дизайн.
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
                Преподаватели
            </div>

            <div class="col-md-4 teachers">
                <div class="team-holder">
                    <img src="{{asset('/team_pictures/lili_pic.jpg')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Лилия Михайлова
                    </div>
                    <div class="team-txt">
                        Родена във Враца, Лили завършва природо-математическата гимназия в града с профил биология. След това изучава Биотехнологии в СУ “Св. Климент Охридски”. В началото на 2015 година е част от първия курс по програмиране на ВСО. След като го завършва успешно започва работа като Android и Java Web Developer в Инвейтикс - най-голямата софтуерна компания в града. Месец след това става част от екипа на ВСО като лектор в курса по програмиране с Java.
                        Обича да готви за любимите си хора и да се разхожда сред природата.
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
                        Тихомир Кръстев
                    </div>
                    <div class="team-txt">
                        Роден във Враца, Тито  завършва СОУ “Христо Ботев” с профил история, след това бакалавър по Публична администрация  в УНСС и магистратура по Мениджмънт в “Икономически университет - Варна”. През пролетта на 2015г е част от първия девет месечен курс на ВСО като курсист и през лятото започва работа като програмист в най-голямата софтуерна компания в града - Инвейтикс. В момента Тито е Senior Android Developer, както и тийм лидер на Java екипа в компанията. От края на 2015г отново е част от девет месечните курсове, но този път като преподавател.
                        Хобитата му са - футбол, да пътува и игрите.

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
                        Милена Томова
                    </div>
                    <div class="team-txt">
                        Завършва първото издание на 9-месечните курсове на Враца Софтуер, направление Уеб разработка с РНР.
                        “Никога дотогава не бях си представяла, че ще се занимавам с програмиране, още по-малко, че ще преподавам. Мечтаех си да знам много езици. Явно не съм уточнила, че нямам предвид езици за програмиране”.
                        “Не съм от Враца, а и мястото не е от значение. Важни са хората, които те заобикалят и благодарение на които непрекъснато увеличаваш знанията и се убеждаваш в способностите си.”
                        В момента води курса по Уеб разработка с РНР.
                        Zend Certfied Engeneer и Certified Laravel Developer.
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
        @include('static.includes.bg.footer')
    </div>

    <script src="{{asset('/js/hamburger-menu.js')}}"></script>
</body>

</html>

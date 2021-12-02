@extends('layouts.template')
@section('title', 'Кандидастване')
@section('content')
    <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
    <div class="content-wrap">
        <div class="section">
            <div class="candidation-wrap col-md-12 d-flex flex-row flex-wrap">
                <div class="col-md-12 candidation text-center d-flex flex-row flex-wrap">
                    @if (!empty(Session::get('success')))
                        <p>
                            <div class="alert alert-success slide-on">
                        <p>{{ session('success') }}</p>
                </div>
                </p>
            @endif
            <!-- course candidation statistic -->
                <div class="col-md-12 candidation-title">
                        <div class="form-group">
                            <label for="sel1">Процес на кандидстване</label>
                        </div>
                </div>
                <div class="col-md-12 candidation-text" style="margin-bottom:0">
                    @if(isset($entry->approved) && is_null($entry->approved))
                        все още нямате оценка
                    @else
                        @if(!env('IS_APPLICATION_OPEN', false))
                            <b>Регистрацията за записване на курсовете все още не е отворена!</b><br/>
                            <i>Записването ще стане след : {{env('APPLICATION_DATE', 'Септември')}}</i>
                        @else
                            @if(isset($entry) && is_null($entry->test_score) || isset($entry->more_test))
                                <a href="{{route('prepare.test')}}" id="test" style="display: inline-block;margin-bottom:3%;">
                                    <button type="button" class="btn btn-success">ТЕСТ</button>
                                    <br/>
                                    Брой тестове: [ {{ isset($entry['test_count'])?$entry['test_count']:'' }} ]
                                </a>
                            @else
                                @if(isset($entry) && is_null($entry->test_score))
                                    Очаквайте скоро да ви се покаже тук бутона за Тест
                                @endif
                            @endif
                        @endif
                        @if(isset($entry->test_stats))
                            @foreach($entry->test_stats as $sKey => $stats)
                                <div class="col-md-12 d-flex flex-row flex-wrap"
                                     style="margin-bottom: 1%;margin-top:-2%">
                                    <div class="col-md-2">Тест:<br/>
                                        <strong> {{$stats[5]['test_title']}} </strong>
                                    </div>
                                    <div class="col-md-2 text-center">Брой
                                        Въпроси:<br/><strong> {{$stats[0]['questionsCount']}}</strong></div>
                                    <div class="col-md-2 text-center">Брой
                                        Отговори:<br/><strong> {{$stats[1]['answered']}}</strong></div>
                                    <div class="col-md-3 text-center">Точки верни
                                        отговори:<br/><strong> {{$stats[2]['score']}}</strong></div>
                                    <div class="col-md-3 text-center">Максимален брой
                                        точки:<br/><strong> {{$stats[3]['maxScore']}}</strong></div>
                                    <div class="col-md-12 text-center" style="margin-top:1%">
                                        <strong>Резултат: {{$stats[4]['percentage']}}%</strong>
                                    </div>
                                </div>
                                <br/>
                            @endforeach
                        @endif
                    @endif
                </div>
                <div class="col-md-12 candidation-text">

                </div>
                @if(env('IS_APPLICATION_OPEN', false))
                    <!-- circle steps icons -->
                        <ul class="steps col-md-12" style="margin-top:7%">
                            <li>1
                                <span>електронна форма</span>
                                <div class="personal-steps">
                                    @if(is_null($entry) || !is_null($entry) && is_null($entry->entry_form_id))
    {{--                                    <a href="{{route('application.create')}}" id="candidate"--}}
    {{--                                       data-url="{{route('application.create')}}">--}}
    {{--                                        <button type="button" class="btn btn-success">Кандидаствай</button>--}}
    {{--                                    </a>--}}
                                    @else
                                        вече сте изпратили своята форма
                                    @endif
                                </div>
                            </li>

                            <li class="active-step">2
                                @endif
                                <span>предварителен тест</span>
                                <div class="personal-steps">
                                @if(isset($entry) && !is_null($entry->entry_form_id))
                                    <!--@if(is_null($entry->test_score) || isset($entry->more_test))-->
                                    <!--    <a href="{{route('prepare.test')}}" id="test" style="margin-top: -7%;display: inline-block;margin-bottom:3%;">-->
                                        <!--        <button type="button" class="btn btn-success">ТЕСТ</button>-->
                                        <!--        <br/>-->
                                    <!--        Брой тестове: [ {{ isset($entry['test_count'])?$entry['test_count']:'' }} ]-->
                                        <!--    </a>-->
                                        <!--@else-->
                                    <!--    @if(is_null($entry->test_score))-->
                                        <!--        Очаквайте скоро да ви се покаже тук бутона за Тест-->
                                        <!--    @endif-->
                                        <!--@endif-->
                                    <!--@if(isset($entry->test_stats))-->
                                    <!--    @foreach($entry->test_stats as $sKey => $stats)-->
                                        <!--        <div class="col-md-12 d-flex flex-row flex-wrap"-->
                                        <!--             style="margin-bottom: 1%;margin-top:-2%">-->
                                        <!--            <div class="col-md-2">Тест:<br/>-->
                                    <!--                <strong> {{$stats[5]['test_title']}} </strong>-->
                                        <!--            </div>-->
                                        <!--            <div class="col-md-2 text-center">Брой-->
                                    <!--                Въпроси:<br/><strong> {{$stats[0]['questionsCount']}}</strong></div>-->
                                        <!--            <div class="col-md-2 text-center">Брой-->
                                    <!--                Отговори:<br/><strong> {{$stats[1]['answered']}}</strong></div>-->
                                        <!--            <div class="col-md-3 text-center">Точки верни-->
                                    <!--                отговори:<br/><strong> {{$stats[2]['score']}}</strong></div>-->
                                        <!--            <div class="col-md-3 text-center">Максимален брой-->
                                    <!--                точки:<br/><strong> {{$stats[3]['maxScore']}}</strong></div>-->
                                        <!--            <div class="col-md-12 text-center" style="margin-top:1%">-->
                                    <!--                <strong>Резултат: {{$stats[4]['percentage']}}%</strong>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--        <br/>-->
                                        <!--    @endforeach-->
                                        <!--@endif-->
                                        @else
                                            тази стъпка предстои
                                        @endif
                                </div>
                            </li>
                            @if(isset($entry->task) && is_null($entry->interview))
                                <li class="active-step">3
                            @else
                                <li>3
                                    @endif
                                    <span>самостоятелна задача</span>
                                    <div class="personal-steps">
                                        @if(isset($entry))
                                            {{!is_null($entry->task)?$entry->task:'тази стъпка предстои'}}
                                        @endif
                                    </div>
                                </li>
                                @if(isset($entry->interview) && is_null($entry->approved))
                                    <li class="active-step">4
                                @else
                                    <li>4
                                        @endif
                                        <span>интервю</span>
                                        <div class="personal-steps">
                                            @if(isset($entry))
                                                {{!is_null($entry->interview)?$entry->interview:'тази стъпка предстои'}}
                                            @endif
                                        </div>
                                    </li>
                                    <li>5
                                        <span>прием</span>
                                        <div class="personal-steps">
                                            @if(isset($entry))
                                                {{!is_null($entry->approved)?$entry->approved:'тази стъпка предстои'}}
                                            @endif
                                        </div>
                                    </li>
                        </ul>

                        <!-- images -->

                        <div class="candidate-imgs col-md-12 flex-row flex-wrap text-center">
                            <div class="col-md-1"></div>
                            <div class="steps col-md-2 first-candidate-img">
                                <img src="{{asset('/images/candidate-img-step-1.png')}}" alt="step"
                                     class="img-fluid candidate-img">
                            </div>

                            <div class="steps col-md-2">
                                <img src="{{asset('/images/candidate-img-step-2.png')}}" alt="step"
                                     class="img-fluid candidate-img">
                            </div>
                            <div class="steps col-md-2">
                                <img src="{{asset('/images/candidate-img-step-3.png')}}" alt="step"
                                     class="img-fluid candidate-img">
                            </div>
                            <div class="steps col-md-2">
                                <img src="{{asset('/images/candidate-img-step-4.png')}}" alt="step"
                                     class="img-fluid candidate-img">
                            </div>
                            <div class="steps col-md-2">
                                <img src="{{asset('/images/candidate-img-step-5.png')}}" alt="step"
                                     class="img-fluid candidate-img">
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
                <!-- end of course candidation statistic -->
            </div>
            <!-- opened courses -->
            <div class="col-md-12 events-now-text text-center" style="border-top:1px solid #d3d3d3;padding-top: 1%;">Отворени Курсове</div>
            <div class="col-md-12 available-events d-flex flex-row flex-wrap">
                @foreach($courses as $course)
                    <div class="col-md-6">
                        <div class="event-title col-md-12" style="border:1px solid {{is_null($course->color)?'':$course->color}};background: {{is_null($course->color)?'':$course->color}}">{{$course->name}}</div>
                        <div class="event-body col-md-12 text-center">
                            <a href="{{route('application.create',[$course->training_type,$course->id])}}">
                                <div class="event-body-text levels-btn" style="border:1px solid {{is_null($course->color)?'':$course->color}};background: {{is_null($course->color)?'':$course->color}}">
                                    Запиши се
                                </div>
                            </a>
                            <img src="{{asset('images/course-'.$course->id.'/'.$course->picture)}}" style="height:auto" alt="event-body">
                        </div>
                        <div class="event-footer col-md-12 d-flex flex-row flex-wrap" style="border:1px solid {{is_null($course->color)?'':$course->color}};background: {{is_null($course->color)?'':$course->color}}">
                            <div class="col-md-6">Лектор(и):<br/>
                                @foreach($course->lecturers as $lecturer)
                                    {{$lecturer->User->name}} {{$lecturer->User->last_name}} <br/>
                                @endforeach
                            </div>
                            <div class="col-md-6">Начало: <br/>
                                {{$course->starts->format('d-m-Y')}}
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- end of opened courses -->
            </div>
        </div>
    </div>

    <script src="./js/fixed-left-top-menu.js"></script>
    <script>
        $(function () {
            $('li.active-step').prevAll().mouseenter(function () {
                $(this).parent().prev('.candidation-text').html($(this).find('.personal-steps').html());
            });

            $('li.active-step').prevAll().mouseleave(function () {
                // $('.candidation-text').text($('.active-step').find('.personal-steps').text());
            });

            $('.steps > li').mouseenter(function () {
                $(this).parent().prev('.candidation-text').html($(this).find('.personal-steps').html());
            });

            $('li.active-step').nextAll().mouseenter(function () {
                $(this).css('background', '#ffcccc').attr('title', 'Този етап предстои!');
            });

            $('li.active-step').nextAll().mouseleave(function () {
                $(this).css('background', '#D3D3D3').attr('title', '');
            });
        });
    </script>
@endsection

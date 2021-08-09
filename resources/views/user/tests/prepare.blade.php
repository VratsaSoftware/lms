@extends('layouts.template')
@section('title', 'Стартиране на Тест')
@section('content')
    <link rel="stylesheet" href="{{asset('css/test_prepare.css')}}">
    <div class="content-wrap" style="margin-top:13vw">
        <div class="section">
            <div class="col-md-12 d-flex flex-row flex-wrap">
                <div class="col-md-4 text-center">
                    <img src="{{asset('images/time.png')}}" width="256px" alt="time">
                    <br>
                    Продължителност: {{$test->duration->format('H'.'ч.'.'i'.'м.')}}
                </div>
                <div class="col-md-4 text-center">
                    <img src="{{asset('images/title.png')}}" width="256px" alt="title">
                    <br>
                    Заглавие: {{$test->title}}
                </div>
                <div class="col-md-4 text-center">
                    <img src="{{asset('images/questions.png')}}" width="256px" alt="title">
                    <br>
                    Брой въпроси: {{$qCount}}
                </div>
                <div class="col-md-12" style="margin-top:5vw">
                    Основни правила:
                    <ul>
                        <li>Може да се връщате на въпросите по всяко време преди предаването на теста</li>
                        <li>Въпросите са няколко вида:
                            <ol>
                                <li><i class="fas fa-keyboard"></i> отворен отговор (поле за въвеждане на текст)
                                    <ul>
                                        <li>взима се под внимание разстоянието между букви (думи, символи, числа..)</li>
                                    </ul>
                                </li>
                                <li><i class="far fa-dot-circle"></i> един верен отговор</li>
                                <li><i class="far fa-check-square"></i> много верни отговори (повече от 1 верен отговор)
                                    <ul>
                                        <li>на въпроса се смята за правилно отговорен ако са маркирани само верните отговори</li>
                                    </ul>
                                </li>
                            </ol>
                        </li>
                        <li>В дясно са изредени всички въпроси от теста
                            <ul>
                                <li>Червена рамка - на въпроса не е даден отговор</li>
                                <li>Зелена рамка - на въпроса е даден отговор (+ малка иконка <img src="{{asset('images/tick-y-big.png')}}" style="margin-top:-1%" class="answered-img" alt="y" width="2%">)</li>
                            </ul>
                        </li>
                        <li>
                            В дясно на текущия въпрос <span class="y-bg">фона е жълт</span>, на въпросите с даден отговор рамката е <span class="green-border">зелена</span>, на въпросите без даден отговор рамката е <span class="red-border">червена</span>
                        </li>
                        <li>
                            След стартиране на теста, при излизане, прекъсване на интернет, напускане на страницата, времето тече, и след като изтече указаното време теста се изпраща автоматично
                        </li>
                        <li>
                            Ако има други тестове, те ще станат активни едва след като на текущия тест, времето изтече или е предаден
                        </li>
                        <li>Теста се предава преди да изтече времетраенето на самия тест, след което се изпраща автоматично</li>
                        <li>По време на теста няма как да се провери даден въпрос дали е отговрен правилно или не</li>
                        <li>След изтичане на времето или след предаване, веднага се вижда резултата от теста</li>
                    </ul>
                </div>
                <div class="col-md-12 text-center" style="margin-top:5vw">
                    <a href="{{route('test.start')}}">
                        <button id="begin_test" class="btn-lg btn-outline-success">Започни Теста</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
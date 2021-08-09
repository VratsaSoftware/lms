@extends('layouts.template')
@section('title', 'Тестове')

@section('head')
    <link href="{{ asset('css/lection/lection.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <link rel="stylesheet" href="{{asset('/css/create_tests.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    @if (!empty(Session::get('success')))
        <p>
            <div class="alert alert-success slide-on" style="margin-top:-40px">
        <p>{{ session('success') }}</p>
        </div>
        </p>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger slide-on" style="margin-top:-40px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="section">
        <div class="col-md-12 d-flex flex-row flex-wrap test-statistic-wrapper">
            <div class="col-md-12 text-center">Количество Въпроси</div>
            <div class="col-md-2 all-questions text-center d-flex flex-row flex-wrap">
                <div class="col-md-12">Общо</div>
                <div class="col-md-12">
                    <div class="circles">
                        <div class="circle-with-text">
                            {{count($questions)}}
                        </div>
                    </div>
                </div>
            </div>
            @foreach($banks as $bank)
                <div class="col-md-2 all-questions text-center d-flex flex-row flex-wrap">
                    <div class="col-md-12">{{$bank->name}}</div>
                    <div class="col-md-12">
                        <div class="circles">
                            <div class="circle-with-text">
                                {{$bank->questions_count}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="col-md-12 dif-wrapper d-flex flex-row flex-wrap" id="dif-wrapper">
            <div class="col-md-12 text-center">Трудност</div>
            <div class="col-md-2 all-questions text-center d-flex flex-row flex-wrap">
                <div class="col-md-12">Лесни</div>
                <div class="col-md-12">
                    <div class="circles">
                        <div class="circle-with-text easy">
                            {{$difficultyCount['easy']}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2 all-questions text-center d-flex flex-row flex-wrap">
                <div class="col-md-12">Нормални</div>
                <div class="col-md-12">
                    <div class="circles">
                        <div class="circle-with-text normal">
                            {{$difficultyCount['medium']}}
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-2 all-questions text-center d-flex flex-row flex-wrap">
                <div class="col-md-12">Трудни &nbsp;<i class="fas fa-medal"></i></div>
                <div class="col-md-12">
                    <div class="circles">
                        <div class="circle-with-text hard">
                            {{$difficultyCount['hard']}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal for editing elements -->
        <div id="modal">
            <div class="modal-content print-body">
                <div class="modal-header">
                    <h2></h2>
                </div>
                <div class="copy text-center">

                    <p>

                    </p>

                    </form>
                </div>
                <div class="cf footer">
                    <div></div>
                    <a href="#" class="btn close-modal">Затвори</a>
                </div>
            </div>
            <div class="overlay"></div>
        </div>
        <!-- end of modal -->
        <div id="banks" class="col-md-12 test-wrapper d-flex flex-row flex-wrap">
            <!-- test nav -->
            <div class="col-md-12 text-left" style="margin-top: -4%;">
                <a href="#modal" class="add-bank">
                    <img src="{{asset('/images/profile/add-icon.png')}}" alt="add">&nbsp;Добави Банка
                </a>
                <div class="col-md-12 create-bank">
                    <form action="{{route('create.bank')}}" id="create-bank-form" method="POST"
                          enctype='multipart/form-data'>
                        {{ csrf_field() }}

                        <p>
                            <label for="title">Заглавие/Име</label>
                        </p>
                        <p>
                            <input type="text" name="title" placeholder="въведи име на банката/теста"
                                   value="{{old('title')}}">
                        <hr>
                        </p>
                        <p>
                            Снимка/лого
                        </p>
                        <p>
                            <input type="file" name="bank_img">
                        </p>
                        <hr>
                        <div class="add-banks-template col-md-12">
                            <p>
                                Въпроси:<select name="from_bank[]">
                                    <option selected></option>
                                    @foreach($banks as $bank)
                                        <option value="{{$bank->id}}">{{$bank->name}}</option>
                                    @endforeach
                                </select>
                            </p>
                            <div class="d-flex flex-row flex-wrap col-md-12">
                                <div class="col-md-4">Лесни : <input name="from_bank_easy[]" type="number"></div>
                                <div class="col-md-4">Средни : <input name="from_bank_medium[]" type="number"></div>
                                <div class="col-md-4">Трудни : <input name="from_bank_hard[]" type="number"></div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-md-12 add-more-options">
                            <a href=""><img src="{{asset('/images/profile/add-icon.png')}}" alt="add"></a>
                        </div>
                        <script>
                            $('.add-more-options > a').on('click', function (e) {
                                e.preventDefault();
                                var addingQ = $('.add-banks-template').last().clone(true);
                                $(this).parent().prev('.add-banks-template').after(addingQ);
                            });
                        </script>

                    </form>
                </div>
            </div>
            <div class="col-md-4 test-nav d-flex flex-row flex-wrap">
                @foreach($banks as $bank)
                    <div class="col-md-12 d-flex flex-row flex-wrap bank-holder" data-bank-id="{{$bank->id}}">
                        <span class="col-md-5 text-left">{{$bank->name}}</span>
                        <span class="col-md-2 text-center"></span>
                        <span class="col-md-5 text-center"><i class="fas fa-book"></i>&nbsp;{{$bank->questions_count}}&nbsp;<i
                                    class="fas fa-medal"></i>&nbsp;{{$bank->difficultyCount['hard']}}</span>
                    </div>

                    <div class="no-show data-container col-md-12">
                        <div class="col-md-12 bank-statistic-holder">
                            <li class="list-group-item list-group-item-light col-md-12 d-flex flex-row flex-wrap text-center bank-statistic">
                                <div class="col-md-3">Общо: <span>{{$bank->questions_count}}</span></div>
                                <div class="col-md-3">Лесни: <span>{{$bank->difficultyCount['easy']}}</span></div>
                                <div class="col-md-3">Средни: <span>{{$bank->difficultyCount['medium']}}</span></div>
                                <div class="col-md-3">Трудни: <span>{{$bank->difficultyCount['hard']}}</span></div>
                            </li>
                        </div>

                        <div class="col-md-12">
                            <ul class="list-group tests-list">
                                <li class="list-group-item list-group-item-success add-question" id="add-question-li">
                                    <a href="#modal"><img src="./images/profile/add-icon.png" alt="add">&nbsp;Добави</a>
                                </li>
                                <div class="create-question">
                                    <form class="form-horizontal" action="{{route('store.question')}}" method="POST"
                                          enctype='multipart/form-data'
                                          id="create-question">
                                        {{ csrf_field() }}
                                        <div class="col-md-12">
                                            Тип:&nbsp;<select name="type" class="q-types" id="q-types">
                                                <option disabled selected value>Избери Тип</option>
                                                <option value="open">Отворен</option>
                                                <option value="one">Един Верен</option>
                                                <option value="many">Много Верни</option>
                                            </select>
                                        </div>
                                        <!-- //adding question fields -->
                                        <script>
                                            $('#q-types').on('change', function () {
                                                var selected = $(this).val();
                                                // $('.modal-content > .cf > div').html('<input class="btn send-bank" type="submit" value="Добави">');
                                                $('.copy > p > form').find('.q-open').remove();
                                                $('.copy > p > form').find('.q-one').remove();
                                                $('.copy > p > form').find('.q-many').remove();
                                                $('.copy > p > form > div:nth-child(1)').find('i').remove();
                                                switch (selected) {
                                                    case 'open':
                                                        $(this).parent().parent().append($('.q-open-wrap').html());
                                                        break;
                                                    case 'one':
                                                        $(this).parent().parent().append($('.q-one-wrap').html());
                                                        break;
                                                    case 'many':
                                                        $(this).parent().parent().append($('.q-many-wrap').html());
                                                        break;
                                                    default:
                                                }
                                            });
                                        </script>
                                        <script>
                                            $("#create-question").submit(function(e){
                                                var validated = frontEndValidation('create-question');
                                                if(validated){
                                                    $(this).submit();
                                                }else{
                                                    e.preventDefault();
                                                }
                                            });
                                        </script>
                                </div>
                                <!-- open question box holder -->
                                <div class="col-md-12 q-open-wrap">
                                    <div class="col-md-12 questions-box q-open">
                                        снимка:
                                        <input type="file" name="image"><br/>
                                        въпрос: <i class="fa fa-asterisk" style="font-size: 0.75em; color: #f00;"></i><br>
                                        <textarea name="question" id="q-open" cols="30" rows="5" class="required"></textarea>
                                        <br>
                                        <i class="fa fa-asterisk" style="font-size: 0.75em; color: #f00;"></i>
                                        <select name="difficulty" id="diff" class="required">
                                            <option disabled selected value="0">Трудност</option>
                                            <option value="1">лесен</option>
                                            <option value="2">нормален</option>
                                            <option value="3">труден</option>
                                        </select>&nbsp;&nbsp;
                                        <input type="radio" name="bonus_radio" value="0" id="no-bonus" checked> <label
                                                for="no-bonus">Без Бонус</label>&nbsp;&nbsp;
                                        <input type="radio" name="bonus_radio" value="1" id="yess-bonus"> <label
                                                for="yess-bonus">Бонус</label>
                                        <br>
                                        отговор: (опционално) <br>
                                        снимка:
                                        <input type="file" name="open_a_image">
                                        <br>
                                        <textarea name="answer" id="open-answer" cols="30" rows="5"></textarea>
                                        <script type="text/javascript">
                                            var addedThropyOpen = false;

                                            $('#yess-bonus').on('click', function () {
                                                if (!addedThropyOpen) {
                                                    $('.copy > p > form > div:nth-child(1)').append('<i class="fas fa-trophy"></i>');
                                                    $(this).next('label').after('&nbsp;&nbsp;<input type="number" name="bonus" class="bonus-points">');
                                                    addedThropyOpen = true;
                                                }
                                            });

                                            $('#no-bonus').on('click', function () {
                                                if (addedThropyOpen) {
                                                    $('.copy > p > form > div:nth-child(1)').find('i').remove();
                                                    $('.bonus-points').remove();
                                                    addedThropyOpen = false;
                                                }
                                            });
                                        </script>
                                        <div class="col-md-12 text-center create-q-btn">
                                            <button type="submit" class="btn btn-success" style="float:none">Създай</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <!-- end of open qustion box holder -->

                                <!-- one question box holder -->
                                <div class="col-md-12 q-one-wrap">
                                    <div class="col-md-12 questions-box q-one">
                                        <p>
                                            снимка:
                                            <input type="file" name="image"><br/>
                                            въпрос:
                                            <i class="fa fa-asterisk" style="font-size: 0.75em; color: #f00;"></i><br/>
                                            <textarea name="question" id="q-one" cols="30" rows="5" class="required"></textarea>
                                            <br>
                                            <i class="fa fa-asterisk" style="font-size: 0.75em; color: #f00;"></i>
                                            <select name="difficulty" class="required">
                                                <option disabled selected value="0">Трудност</option>
                                                <option value="1">лесен</option>
                                                <option value="2">нормален</option>
                                                <option value="3">труден</option>
                                            </select>&nbsp;&nbsp;
                                            <input type="radio" name="bonus_radio" value="0" id="no-bonus" checked>
                                            <label
                                                    for="no-bonus">Без Бонус</label>&nbsp;&nbsp;
                                            <input type="radio" name="bonus_radio" value="1" id="yess-bonus"> <label
                                                    for="yess-bonus">Бонус</label>
                                        </p>
                                        <p>отговори:</p>
                                        <input type="hidden" name="correct_one_answer" id="correct_one_answer">
                                        <p class="input-answers">
                                            снимка:
                                            <input type="file" name="open_a_image[]" id="open_a_image"><br/>
                                            <input type="hidden" name="image_for_" class="open_a_image_a" value="0">
                                            <a href="" class="icon-click">
                                                <i class="fas fa-check-circle"></i></a>&nbsp;<input type="text"
                                                                                                         class="q-one-answer required"
                                                                                                         name="answers[]" data-q-count=0>
                                            <a href="" class="remove-q modal-remove-q"><i class="fas fa-times"></i></a>
                                        </p>
                                        <div class="col-md-12 add-answers">
                                            <a href="">
                                                <img src="{{asset('/images/profile/add-icon.png')}}" alt="add">
                                            </a>
                                            <span></span>
                                        </div>
                                        <script>
                                            var addedThropy = false;

                                            $('#yess-bonus').on('click', function () {
                                                if (!addedThropy) {
                                                    $('.copy > p > form > div:nth-child(1)').append('<i class="fas fa-trophy"></i>');
                                                    $(this).next('label').after('&nbsp;&nbsp;<input type="number" name="bonus" class="bonus-points">');
                                                    addedThropy = true;
                                                }
                                            });

                                            $('#no-bonus').on('click', function () {
                                                if (addedThropy) {
                                                    $('.copy > p > form > div:nth-child(1)').find('i').remove();
                                                    $('.bonus-points').remove();
                                                    addedThropy = false;
                                                }
                                            });

                                            $('#open_a_image').change(function (){
                                                var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
                                                fileName = fileName.replace(/\s/g, '');
                                                $(this).parent().find('.open_a_image_a').val(fileName);
                                                var inputNum = $(this).parent().find('.q-one-answer').attr('data-q-count');
                                                $(this).parent().find('.open_a_image_a').attr('name','image_for_'+inputNum);
                                            });

                                            $('.add-answers > a').on('click', function (e) {
                                                e.preventDefault();

                                                var addAnswer = $('.copy > p > form > .q-one >  .input-answers').last().clone(true);
                                                //numbering inputs so after that will append input with correct answer number of input
                                                var currentNum = parseInt(addAnswer.find('.q-one-answer').attr('data-q-count'));
                                                addAnswer.find('#open_a_image').val(null);
                                                addAnswer.find('input').attr('data-q-count',currentNum + 1);
                                                // if cloning correct answer box remove the class
                                                if (addAnswer.find('a').hasClass('corect-answer-one')) {
                                                    addAnswer.find('a').removeClass('corect-answer-one');
                                                    addAnswer.find('.q-one-answer').removeClass('corect-answer-one');
                                                    // addAnswer.find('a').find('.fas').removeClass('fa-times').addClass('fa-check-circle');
                                                }

                                                $('.q-one > .add-answers').prev('.input-answers').after(addAnswer);
                                                var numAnswers = ($('.copy > p > form > .q-one').find('.input-answers').length);
                                                $('.q-one > .add-answers > span').html(numAnswers);
                                            });

                                            $('.icon-click').on('click', function (e) {
                                                e.preventDefault();
                                                if (!$(this).hasClass('corect-answer-one')) {
                                                    $(this).addClass('corect-answer-one');
                                                    $('#correct_one_answer').val($(this).next('.q-one-answer').attr('data-q-count'));
                                                    // $(this).find('.fas').removeClass('fa-check-circle').addClass('fa-times');
                                                    $(this).next('.q-one-answer').addClass('corect-answer-one');
                                                    $(this).parent().prevAll().find('a').removeClass('corect-answer-one');
                                                    $(this).parent().prevAll().find('a').next('.q-one-answer').removeClass('corect-answer-one');
                                                    // $(this).parent().prevAll().find('a').find('.fas').removeClass('fa-times').addClass('fa-check-circle');
                                                    $(this).parent().nextAll().find('a').removeClass('corect-answer-one');
                                                    $(this).parent().nextAll().find('a').next('.q-one-answer').removeClass('corect-answer-one');
                                                    // $(this).parent().nextAll().find('a').find('.fas').removeClass('fa-times').addClass('fa-check-circle');
                                                } else {
                                                    $(this).removeClass('corect-answer-one');
                                                    $(this).next('.q-one-answer').removeClass('corect-answer-one');
                                                    $('#correct_one_answer').val(null);
                                                }
                                            });

                                            $('.remove-q').on('click', function (e) {
                                                e.preventDefault();
                                                if ($('.copy > p > form > .q-one').find('.input-answers').length > 1) {
                                                    // var correctOne = $(this).parent().parent().find('.input-answers').find("input:text").hasClass("corect-answer-one");
                                                    // if(correctOne) {
                                                    //     $('#correct_one_answer').val($(this).parent().parent().find('.input-answers').find("input:text").attr('data-q-count'));
                                                    // }
                                                    $(this).parent().remove();
                                                    $('.copy > p > form > .q-one').find('.input-answers').each(function(i, obj) {
                                                            var correctOne = $(this).find(".corect-answer-one");
                                                            if (correctOne) {
                                                                $('#correct_one_answer').val(i);
                                                            }
                                                            $(this).find(".open_a_image_a").attr('data-q-count', i);
                                                            $(this).find("#open_a_image").attr('data-q-count', i);
                                                            $(this).find(".q-one-answer").attr('data-q-count', i );
                                                    });

                                                    var numAnswers = ($('.copy > p > form > .q-one').find('.input-answers').length);
                                                    $('.q-one > .add-answers > span').html(numAnswers);
                                                }
                                            });
                                        </script>
                                        <div class="col-md-12 text-center create-q-btn">
                                            <button type="submit" class="btn btn-success" style="float:none">Създай</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <!-- end of one question box holder -->

                                <!-- many question box holder -->
                                <div class="col-md-12 q-many-wrap">
                                    <div class="col-md-12 questions-box q-many">
                                        <p>снимка:
                                            <input type="file" name="image"><br/>
                                            въпрос: <i class="fa fa-asterisk" style="font-size: 0.75em; color: #f00;"></i><br>
                                            <textarea name="question" id="question" cols="30" rows="5" class="required"></textarea>
                                            <br>
                                            <i class="fa fa-asterisk" style="font-size: 0.75em; color: #f00;"></i>
                                            <select name="difficulty" class="required">
                                                <option disabled selected value="0">Трудност</option>
                                                <option value="1">лесен</option>
                                                <option value="2">нормален</option>
                                                <option value="3">труден</option>
                                            </select>&nbsp;&nbsp;
                                            <input type="radio" name="bonus_radio" value="0" id="no-bonus" checked>
                                            <label
                                                    for="no-bonus">Без Бонус</label>&nbsp;&nbsp;
                                            <input type="radio" name="bonus_radio" value="1" id="yess-bonus"> <label
                                                    for="yess-bonus">Бонус</label>
                                        </p>
                                        <p>отговори:</p>
                                        <input type="hidden" name="correct_many_answer" id="correct_many_answer">
                                        <p class="input-answers">
                                            снимка:
                                            <input type="file" name="many_a_image[]" id="many_a_image"><br/>
                                            <input type="hidden" name="image_for_" class="many_a_image_a" value="0">
                                            <a href="" class="icon-click-many">
                                                <i class="fas fa-check-circle"></i>
                                            </a>&nbsp;
                                            <input type="text" class="q-many-answer" name="answers[]" data-q-count=0 style="width:90%">
                                            <a href="" class="remove-q">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </p>
                                        <div class="col-md-12 add-answers-many">
                                            <a href="">
                                                <img src="{{asset('/images/profile/add-icon.png')}}" alt="add">
                                            </a>
                                            <span></span>
                                        </div>
                                        <script type="text/javascript">
                                            var addedThropyMany = false;

                                            $('#yess-bonus').on('click', function () {
                                                if (!addedThropyMany) {
                                                    $('.copy > p > form > div:nth-child(1)').append('<i class="fas fa-trophy"></i>');
                                                    $(this).next('label').after('&nbsp;&nbsp;<input type="number" name="bonus" class="bonus-points">');
                                                    addedThropyMany = true;
                                                }
                                            });

                                            $('#no-bonus').on('click', function () {
                                                if (addedThropyMany) {
                                                    $('.copy > p > form > div:nth-child(1)').find('i').remove();
                                                    $('.bonus-points').remove();
                                                    addedThropyMany = false;
                                                }
                                            });

                                            $('#many_a_image').change(function (){
                                                var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
                                                fileName = fileName.replace(/\s/g, '');
                                                $(this).parent().find('.many_a_image_a').val(fileName);
                                                var inputNum = $(this).parent().find('.q-many-answer').attr('data-q-count');
                                                $(this).parent().find('.many_a_image_a').attr('name','image_for_'+inputNum);
                                            });

                                            $('.add-answers-many > a').on('click', function (e) {
                                                e.preventDefault();

                                                var addAnswer = $('.copy > p > form > .q-many > .input-answers').last().clone(true);
                                                //numbering inputs so after that will append input with correct answer number of input
                                                var currentNum = parseInt(addAnswer.find('.q-many-answer').attr('data-q-count'));
                                                addAnswer.find('#many_a_image').val(null);
                                                addAnswer.find('input').attr('data-q-count',currentNum + 1);
                                                // if cloning correct answer box remove the class
                                                if (addAnswer.find('a').hasClass('corect-answer-one')) {
                                                    addAnswer.find('a').removeClass('corect-answer-one');
                                                    addAnswer.find('.q-many-answer').removeClass('corect-answer-one');
                                                    // addAnswer.find('a').find('.fas').removeClass('fa-times').addClass('fa-check-circle');
                                                }

                                                $('.q-many > .add-answers-many').prev('.input-answers').after(addAnswer);
                                                var numAnswers = ($('.copy > p > form > .q-many > .input-answers').find('.corect-answer-one').length / 2);
                                                var maxAnswers = ($('.copy > p > form > .q-many > .input-answers').length);


                                                $('.q-many > .add-answers-many > span').html(numAnswers + '/' + maxAnswers);

                                            });

                                            $('.remove-q').on('click', function (e) {
                                                e.preventDefault();
                                                if ($('.copy > p > form > .q-many').find('.input-answers').length > 1) {

                                                    var maxAnswers = ($('.copy > p > form > .q-many >.input-answers').length);
                                                    if (maxAnswers > 0) {
                                                        maxAnswers -= 1;
                                                    }

                                                    //if clicked to remove element have correct class remove answers count - 1
                                                    if ($(this).parent().find('.icon-click-many').hasClass('corect-answer-one')) {
                                                        numAnswers -= 1;
                                                    }
                                                    $('.copy > p > form > .q-many').find('.input-answers').each(function(i, obj) {
                                                        if($(this).find("input:text").hasClass("corect-answer-one")){

                                                        }
                                                        $(this).find(".many_a_image_a").attr('data-q-count', i);
                                                        $(this).find("#many_a_image").attr('data-q-count', i);
                                                        $(this).find(".q-many-answer").attr('data-q-count', i );
                                                    });

                                                    $(this).parent().remove();
                                                    $('.copy > p > form > .q-many').find('.input-answers').each(function(i, obj) {
                                                        $(this).find(".many_a_image_a").attr('data-q-count', i);
                                                        $(this).find("#many_a_image").attr('data-q-count', i);
                                                        $(this).find(".q-many-answer").attr('data-q-count', i );
                                                    });
                                                    var removedCorrect = $('#correct_many_answer').val().split(",");
                                                    var nextNum = parseInt($(this).prev('.q-many-answer').attr('data-q-count'));
                                                    var added = ',';
                                                    $.each(removedCorrect,function(i){
                                                        var checkNum = parseInt(removedCorrect[i]);
                                                        if(checkNum !== nextNum && removedCorrect[i] !== ''){
                                                            added += removedCorrect[i]+',';
                                                        }
                                                    });
                                                    $('#correct_many_answer').val(added);
                                                    var numAnswers = ($('.copy > p > form > .q-many > .input-answers').find('.corect-answer-one').length / 2);

                                                    $('.q-many > .add-answers-many > span').html(numAnswers + '/' + maxAnswers);
                                                }
                                            });

                                            $('.icon-click-many').on('click', function (e) {
                                                e.preventDefault();
                                                if (!$(this).hasClass('corect-answer-one')) {
                                                    $(this).addClass('corect-answer-one');
                                                    $(this).next('.q-many-answer').addClass('corect-answer-one');
                                                    $('#correct_many_answer').val($('#correct_many_answer').val()+','+$(this).next('.q-many-answer').attr('data-q-count'));

                                                    var numAnswers = (($('.copy > p > form > .q-many > .input-answers').find('.corect-answer-one').length / 2) - 1);
                                                    var maxAnswers = ($('.copy > p > form > .q-many > .input-answers').length);
                                                    numAnswers += 1;
                                                    $('.q-many > .add-answers-many > span').html(numAnswers + '/' + maxAnswers);
                                                } else {
                                                    $(this).removeClass('corect-answer-one');
                                                    $(this).next('.q-many-answer').removeClass('corect-answer-one');
                                                    var numAnswers = (($('.copy > p > form > .q-many > .input-answers').find('.corect-answer-one').length / 2));
                                                    var maxAnswers = ($('.copy > p > form > .q-many > .input-answers').length);
                                                    var removedCorrect = $('#correct_many_answer').val().split(",");
                                                    var nextNum = parseInt($(this).next('.q-many-answer').attr('data-q-count'));
                                                    var added = ',';
                                                    $.each(removedCorrect,function(i){
                                                        var checkNum = parseInt(removedCorrect[i]);
                                                        if(checkNum !== nextNum && removedCorrect[i] !== ''){
                                                            added += removedCorrect[i]+',';
                                                        }
                                                    });
                                                    $('#correct_many_answer').val(added);

                                                    $('.q-many > .add-answers-many > span').html(numAnswers + '/' + maxAnswers);
                                                }
                                            });
                                        </script>
                                        <div class="col-md-12 text-center create-q-btn">
                                            <button type="submit" class="btn btn-success" style="float:none">Създай</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <!-- end of many question box holder -->

                            @foreach($bank->Questions as $question)
                                @if($question->type == 'open')
                                    <!-- open question -->
                                        @switch($question->difficulty)
                                            @case(1)
                                            <li class="list-group-item list-group-item-dark col-md-12 d-flex flex-row flex-wrap">
                                            @break
                                            @case(2)
                                            <li class="list-group-item list-group-item-primary col-md-12 d-flex flex-row flex-wrap">
                                            @break
                                            @case(3)
                                            <li class="list-group-item list-group-item-danger col-md-12 d-flex flex-row flex-wrap">
                                                @break
                                                @endswitch
                                                <p>
                                                <div class="col-md-7 question">
                                                    @if(!is_null($question->image))
                                                        <span><img src="{{asset('images/questions/'.$question->image)}}"
                                                                   alt="q_image"
                                                                   class="q_image img-responsive"></span>
                                                        <br/>
                                                    @endif
                                                    {{$question->question}}
                                                </div>
                                                <div class="col-md-5 text-right">
                                                    <span class="col-md-4"><i class="fas fa-keyboard"></i></span>
                                                    <span class="col-md-4 num-correct">X</span>
                                                    <span class="col-md-2"><a href="{{route('question.edit',['question' => $question->id])}}" data-route="{{route('update.question',['question' => $question->id])}}" class="edit-question"><i
                                                                    class="fas fa-pencil-alt"></i></a></span>
                                                    <span class="col-md-2">
                                                         <form action="{{ route('delete.question',$question->id) }}"
                                                               method="POST" id="delete-lection"
                                                               onsubmit="return ConfirmDelete()">
                                                                    {{ method_field('DELETE') }}
                                                             {{ csrf_field() }}
                                                                <button class="btn btn-light delete-q"><i
                                                                            class="fas fa-times"></i></button>
                                                                </form>
                                                    </span>
                                                </div>
                                                </p>
                                                <p>
                                                <div class="col-md-12">
                                                    <span class="correct-open corect-answer">
                                                        @if(isset($question->Answers[0]) && !is_null($question->Answers[0]->image))
                                                            <span><img src="{{asset('images/questions/'.$question->Answers[0]->image)}}"
                                                                       alt="q_image" class="q_image_inside img-responsive"></span>
                                                            <br>
                                                        @endif
                                                        {{isset($question->Answers[0]->answer)?$question->Answers[0]->answer:null}}
                                                    </span>
                                                    <ul class="answers-list">
                                                    </ul>
                                                    @if(!is_null($question->bonus))
                                                        <div class="col-md-12 text-right trophy-bonus">
                                                            +{{$question->bonus}}&nbsp;<i class="fas fa-trophy"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                </p>
                                            </li>
                                            <!-- end of open question -->
                                            @endif

                                            @if($question->type == 'many')
                                            <!-- /multiple -->
                                                @switch($question->difficulty)
                                                    @case(1)
                                                    <li class="list-group-item list-group-item-dark col-md-12 d-flex flex-row flex-wrap">
                                                    @break
                                                    @case(2)
                                                    <li class="list-group-item list-group-item-primary col-md-12 d-flex flex-row flex-wrap">
                                                    @break
                                                    @case(3)
                                                    <li class="list-group-item list-group-item-danger col-md-12 d-flex flex-row flex-wrap">
                                                        @break
                                                        @endswitch
                                                        <p>
                                                        <div class="col-md-7 question">
                                                            @if(!is_null($question->image))
                                                                <span><img src="{{asset('images/questions/'.$question->image)}}"
                                                                           alt="q_image"
                                                                           class="q_image img-responsive"></span>
                                                                <br/>
                                                            @endif
                                                            {{$question->question}}
                                                        </div>
                                                        <div class="col-md-5 text-right">
                                                            <span class="col-md-4"><i
                                                                        class="far fa-check-square"></i></span>
                                                            <span class="col-md-4 num-correct">{{$question->correctCount}}</span>
                                                            <span class="col-md-2"><a href="{{route('question.edit',['question' => $question->id])}}" data-route="{{route('update.question',['question' => $question->id])}}" class="edit-question"><i
                                                                            class="fas fa-pencil-alt"></i></a></span>
                                                            <span class="col-md-2">
                                                                <form action="{{ route('delete.question',$question->id) }}"
                                                                      method="POST" id="delete-lection"
                                                                      onsubmit="return ConfirmDelete()">
                                                                    {{ method_field('DELETE') }}
                                                                    {{ csrf_field() }}
                                                                <button class="btn btn-light delete-q"><i
                                                                            class="fas fa-times"></i></button>
                                                                </form>
                                                            </span>
                                                        </div>
                                                        </p>
                                                        <p>
                                                        <div class="col-md-12">
                                  <span class="correct-multiple">
                                    <ul class="answers-list">
                                        @foreach($question->Answers as $answer)
                                            @if($answer->correct > 0)
                                                <li class="corect-answer">
                                            @else
                                                <li>
                                            @endif
                                                    @if(!is_null($answer->image))
                                                        <span><img src="{{asset('images/questions/'.$answer->image)}}"
                                                                   alt="q_image" class="q_image_inside img-responsive"></span>
                                                        <br>
                                                    @endif
                                                    {{$answer->answer}}</li>
                                        @endforeach
                                    </ul>
                                    @if(!is_null($question->bonus))
                                          <div class="col-md-12 text-right trophy-bonus">+{{$question->bonus}}&nbsp;<i
                                                      class="fas fa-trophy"></i></div>
                                      @endif
                                  </span>
                                                        </div>
                                                        </p>
                                                    </li>
                                                    <!-- /end of multiple -->
                                                    @endif

                                                <!-- /one correct -->
                                                    @if($question->type == 'one')
                                                        @switch($question->difficulty)
                                                            @case(1)
                                                            <li class="list-group-item list-group-item-dark col-md-12 d-flex flex-row flex-wrap">
                                                            @break
                                                            @case(2)
                                                            <li class="list-group-item list-group-item-primary col-md-12 d-flex flex-row flex-wrap">
                                                            @break
                                                            @case(3)
                                                            <li class="list-group-item list-group-item-danger col-md-12 d-flex flex-row flex-wrap">
                                                                @break
                                                                @endswitch
                                                                <p>
                                                                <div class="col-md-7 question">
                                                                    @if(!is_null($question->image))
                                                                        <span><img src="{{asset('images/questions/'.$question->image)}}"
                                                                                   alt="q_image"
                                                                                   class="q_image img-responsive"></span>
                                                                        <br/>
                                                                    @endif
                                                                    {{$question->question}}
                                                                </div>
                                                                <div class="col-md-5 text-right">
                                                                    <span class="col-md-4"><i
                                                                                class="far fa-dot-circle"></i></span>
                                                                    <span class="col-md-4 num-correct">1</span>
                                                                    <span class="col-md-2"><a href="{{route('question.edit',['question' => $question->id])}}"
                                                                                              data-route="{{route('update.question',['question' => $question->id])}}" class="edit-question"><i
                                                                                    class="fas fa-pencil-alt"></i></a></span>
                                                                    <span class="col-md-2">
                                                                         <form action="{{ route('delete.question',$question->id) }}"
                                                                               method="POST" id="delete-lection"
                                                                               onsubmit="return ConfirmDelete()">
                                                                    {{ method_field('DELETE') }}
                                                                             {{ csrf_field() }}
                                                                <button class="btn btn-light delete-q"><i
                                                                            class="fas fa-times"></i></button>
                                                                </form>
                                                                    </span>
                                                                </div>
                                                                </p>
                                                                <p>
                                                                <div class="col-md-12">
                                  <span class="correct-one">
                                    <ul class="answers-list">
                                       @foreach($question->Answers as $answer)
                                            @if($answer->correct > 0)
                                                <li class="corect-answer">
                                            @else
                                                <li>
                                            @endif
                                                    @if(!is_null($answer->image))
                                                        <span><img src="{{asset('images/questions/'.$answer->image)}}"
                                                                   alt="q_image" class="q_image_inside img-responsive"></span>
                                                        <br>
                                                    @endif
                                                    {{$answer->answer}}</li>
                                        @endforeach
                                    </ul>
                                      @if(!is_null($question->bonus))
                                          <div class="col-md-12 text-right trophy-bonus">+{{$question->bonus}}&nbsp;<i
                                                      class="fas fa-trophy"></i></div>
                                      @endif
                                  </span>
                                                                </div>
                                                                </p>
                                                            </li>
                                                            @endif
                                                        <!-- /end of one correct -->
                                                            @endforeach
                            </ul>
                        </div>
                        <div class="col-md-12 text-center back-to-top">
                            <a href="#" id="scroll-to-top">
                                <button class="btn btn-success top-btn">Начало <i class="fas fa-arrow-up"></i></button>
                            </a>
                            <script>
                                $('#scroll-to-top').click(function (e) {
                                    e.preventDefault();
                                    $('#banks > #tests-content').scrollTop(0);
                                });
                            </script>
                        </div>
                    </div>
                @endforeach
                    <div class="no-show editing-form-wrapper">
                        <form action="" id="editing_form" name="editing_form" action="" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                        </form>
                    </div>
            </div>
            <!-- end of test nav -->

            <!--  //test content holder -->
            <div class="col-md-8 tests-content d-flex flex-row flex-wrap text-center" id="tests-content">

            </div>
            <!--  end of test content holder -->
        </div>
        <div class="col-md-12 d-flex flex-row flex-wrap">
            <div class="col-md-12 text-center">
                <strong>Тестове</strong>
            </div>
            <div class="col-md-12 text-left">
                <a href="{{route('test.create')}}" class="add-bank" style="position: inherit">
                    <img src="{{asset('/images/profile/add-icon.png')}}" alt="add">&nbsp;Добави Тест
                </a>
            </div>
            <div class="col-md-12" style="overflow: scroll">
                <table class="table table-striped" id="tests-table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Заглавие</th>
                        <th scope="col">Започва</th>
                        <th scope="col">Свършва</th>
                        <th scope="col">Продължителност (Час:мин.)</th>
                        <th scope="col">Банка</th>
                        <th scope="col">Записани</th>
                        <th scope="col">действия</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($tests as $test)
                            <tr>
                                <td>{{$test->id}}</td>
                                <td>{{$test->title}}</td>
                                <td>{{$test->start_at->format('d-m-y')}}</td>
                                <td>{{$test->expire_at->format('d-m-y')}}</td>
                                <td>{{$test->duration->format('H:i')}}</td>
                                <td>{{isset($test->bank[0]->name)?$test->bank[0]->name:''}}</td>
                                <td>
                                    <ol>
                                        @foreach($test->Users as $user)
                                            <li>{{$user->name}} - <strong>{{$user->email}}</strong></li>
                                        @endforeach
                                    </ol>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('test.edit',$test->id)}}" style="display:block;margin-bottom:10%">
                                        <button class="btn btn-outline-info">edit</button>
                                    </a>
                                    <form action="{{ route('test.destroy',$test->id) }}" method="POST" onsubmit="return ConfirmDelete()" id="delete-edu">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger delete-module-btn" value="DELETE"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="{{asset('js/create_tests.js')}}"></script>
    <script>
        function ConfirmDelete() {
            var x = confirm("Сигурни ли сте че искате да изтриете ?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
    <script>
        $('.q_image').on('click', function () {
            if ($(this).hasClass('img_big')) {
                $(this).removeClass('img_big');
            } else {
                $(this).addClass('img_big')
            }
        });

        $('.q_image_inside').on('click', function () {
            if ($(this).hasClass('img_big')) {
                $(this).removeClass('img_big');
            } else {
                $(this).addClass('img_big')
            }
        });
        $(document).ready(function() {
            $('#tests-table').DataTable({
                responsive: true,
                order: [[0, "desc"]],
            });
        } );
    </script>
@endsection

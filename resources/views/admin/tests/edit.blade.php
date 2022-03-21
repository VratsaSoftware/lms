@extends('layouts.template_old')
@section('title', 'Тестове')
@section('content')
    <link rel="stylesheet" href="{{asset('/css/create_tests.css')}}">
    @if (!empty(Session::get('success')))
        <p>
            <div class="alert alert-success slide-on" style="margin-top:80px">
        <p>{{ session('success') }}</p>
        </div>
        </p>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger slide-on" style="margin-top:80px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="section" style="padding-top:10%">
        <form id="editing_form" name="editing_form"
              action="{{route('update.question',['question' => $question->id])}}" method="POST"
              enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            @if($question->type == 'open')
                <input type="hidden" name="type" value="open">
                <!-- open question box holder -->
                <div class="col-md-12">
                    <div class="col-md-12 questions-box q-open">
                        снимка:
                        @if(!is_null($question->image))
                            <img src="{{asset('images/questions/'.$question->image)}}" alt="edit-img-q" class="q_image"
                                 width="20%">
                        @endif
                        <input type="file" name="image"><br/>
                        въпрос: <i class="fa fa-asterisk" style="font-size: 0.75em; color: #f00;"></i><br>
                        <textarea name="question" id="q-open" cols="30" rows="5"
                                  class="required">{{$question->question}}</textarea>
                        <br>
                        <i class="fa fa-asterisk" style="font-size: 0.75em; color: #f00;"></i>
                        <select name="difficulty" id="diff" class="required">
                            <option disabled selected value="0">Трудност</option>
                            <option value="1" {{$question->difficulty == '1'?'selected':''}}>лесен</option>
                            <option value="2" {{$question->difficulty == '2'?'selected':''}}>нормален</option>
                            <option value="3" {{$question->difficulty == '3'?'selected':''}}>труден</option>
                        </select>&nbsp;&nbsp;
                        <input type="radio" name="bonus_radio" value="0"
                               id="no-bonus" {{is_null($question->bonus)?'checked':''}}> <label
                                for="no-bonus">Без Бонус</label>&nbsp;&nbsp;
                        <input type="radio" name="bonus_radio" value="1" id="yess-bonus"
                               data-bonus="{{$question->bonus}}" {{is_null($question->bonus)?'':'checked'}}> <label
                                for="yess-bonus">Бонус</label>
                        {{--                        <input type="number" name="bonus" value="{{is_null($question->bonus)?0:$question->bonus}}">--}}
                        <br>
                        отговор: (опционално) <br>
                        снимка:
                        @if($question->Answers()->exists() && !is_null($question->Answers[0]->image))
                            <img src="{{asset('images/questions/'.$question->Answers[0]->image)}}" alt=""
                                 class="q_image_inside" width="20%">
                        @endif
                        <input type="file" name="open_a_image">
                        <br>
                        <textarea name="answer" id="open-answer" cols="30"
                                  rows="5">{{$question->Answers()->exists()?$question->Answers[0]->answer:''}}</textarea>
                        @if($question->Answers()->exists())
                            <input type="hidden" name="open_answer_id" value="{{$question->Answers[0]->id}}">
                        @endif
                        <script type="text/javascript">
                            var addedThropyOpen = false;

                            $('#yess-bonus').on('click', function () {
                                if (!addedThropyOpen) {
                                    $('.copy > p > form > div:nth-child(1)').append('<i class="fas fa-trophy"></i>');
                                    $(this).next('label').after('&nbsp;&nbsp;<input type="number" name="bonus" class="bonus-points" value="' + $(this).attr('data-bonus') + '">');
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
                            <button type="submit" class="btn btn-success" style="float:none">Редактирай</button>
                        </div>
                    </div>
        </form>
    </div>
    <!-- end of open qustion box holder -->
    @endif

    @if($question->type == 'one')
        <input type="hidden" name="type" value="one">
        <!-- one question box holder -->
        <div class="col-md-12">
            <div class="col-md-12 questions-box q-one">
                <p>
                    снимка:
                    @if(!is_null($question->image))
                        <img src="{{asset('images/questions/'.$question->image)}}" alt="edit-img-q" class="q_image"
                             width="20%">
                    @endif
                    <input type="file" name="image"><br/>
                    въпрос:
                    <i class="fa fa-asterisk" style="font-size: 0.75em; color: #f00;"></i><br/>
                    <textarea name="question" id="question" cols="30" rows="5"
                              class="required">{{$question->question}}</textarea>
                    <br>
                    <i class="fa fa-asterisk" style="font-size: 0.75em; color: #f00;"></i>
                    <select name="difficulty" class="required">
                        <option disabled selected value="0">Трудност</option>
                        <option value="1" {{$question->difficulty == '1'?'selected':''}}>лесен</option>
                        <option value="2" {{$question->difficulty == '2'?'selected':''}}>нормален</option>
                        <option value="3" {{$question->difficulty == '3'?'selected':''}}>труден</option>
                    </select>&nbsp;&nbsp;
                    <input type="radio" name="bonus_radio" value="0"
                           id="no-bonus" {{is_null($question->bonus)?'checked':''}}>
                    <label
                            for="no-bonus">Без Бонус</label>&nbsp;&nbsp;
                    <input type="radio" name="bonus_radio" value="1" id="yess-bonus"
                           data-bonus="{{$question->bonus}}" {{is_null($question->bonus)?'':'checked'}}> <label
                            for="yess-bonus">Бонус</label>
                </p>
                <p>отговори:</p>
                <input type="hidden" name="correct_one_answer" id="correct_one_answer" value="">
                @if(count($question->Answers) < 1)
                    <p class="input-answers">
                        снимка:
                        <input type="hidden" name="old_image_0" class="old_image" value="">

                        <input type="file" name="open_a_image[]" class="open_a_image"><br/>
                        <input type="hidden" name="image_for_" class="open_a_image_a" value="0">
                        <a href="" class="icon-click">
                            <i class="fas fa-check-circle"></i></a>&nbsp;<input type="text"
                                                                                class="q-one-answer required"
                                                                                name="answers[]" data-q-count="0"
                                                                                value="">
                        <a href="" class="remove-q" style="margin-left:51.5%"><i class="fas fa-times"></i></a>
                    </p>
                @endif
                @foreach($question->Answers as $num => $answer)
                    @if($answer->correct > 0)
                        <?php $correct = true; ?>
                    @else
                        <?php $correct = false; ?>
                    @endif
                    <p class="input-answers">
                        снимка:
                        @if(!is_null($answer->image))
                            <img src="{{asset('images/questions/'.$answer->image)}}" alt="edit-img-q" class="q_image"
                                 width="20%">
                            <input type="hidden" name="old_image_{{$num}}" class="old_image" value="{{$answer->image}}">
                        @endif
                        <input type="file" name="open_a_image[]" class="open_a_image"><br/>
                        <input type="hidden" name="image_for_" class="open_a_image_a" value="0">
                        <a href="" class="icon-click {{$correct?'click_me corect-answer-one':''}}">
                            <i class="fas fa-check-circle"></i></a>&nbsp;<input type="text"
                                                                                class="q-one-answer required {{$correct?'corect-answer-one':''}}"
                                                                                name="answers[]" data-q-count="{{$num}}"
                                                                                value="{{$answer->answer}}">
                        <a href="" class="remove-q" style="margin-left:51.5%"><i class="fas fa-times"></i></a>
                    </p>
                @endforeach

                <div class="col-md-12 add-answers">
                    <a href="">
                        <img src="{{asset('/images/profile/add-icon.png')}}" alt="add">
                    </a>
                </div>
                <script>
                    var addedThropy = false;

                    $('#yess-bonus').on('click', function () {
                        if (!addedThropy) {
                            $('.copy > p > form > div:nth-child(1)').append('<i class="fas fa-trophy"></i>');
                            $(this).next('label').after('&nbsp;&nbsp;<input type="number" name="bonus" class="bonus-points" value="'+$(this).attr('data-bonus')+'">');
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

                    $('.open_a_image').change(function () {
                        var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
                        fileName = fileName.replace(/\s/g, '');
                        $(this).parent().find('.open_a_image_a').val(fileName);
                        var inputNum = $(this).parent().find('.q-one-answer').attr('data-q-count');
                        $(this).parent().find('.open_a_image_a').attr('name', 'image_for_' + inputNum);
                    });

                    $('.add-answers > a').on('click', function (e) {
                        e.preventDefault();

                        var addAnswer = $('.input-answers').last().clone(true);
                        //numbering inputs so after that will append input with correct answer number of input
                        var currentNum = parseInt(addAnswer.find('.q-one-answer').attr('data-q-count'));
                        addAnswer.find('.q_image').remove();
                        addAnswer.find('.open_a_image').val(null);
                        addAnswer.find('input').attr('data-q-count', currentNum + 1);
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
                        if ($('.q-one').find('.input-answers').length > 1) {
                            $(this).parent().remove();
                            $('.q-one').find('.input-answers').each(function (i, obj) {
                                $(this).find(".open_a_image_a").attr('data-q-count', i);
                                $(this).find("#open_a_image").attr('data-q-count', i);
                                $(this).find(".q-one-answer").attr('data-q-count', i);
                                $(this).find('.old_image').attr('name', 'old_image_' + i);
                                var correctOne = $(this).find("input.corect-answer-one[type=text]");
                                if (correctOne.attr('data-q-count')) {
                                    $('#correct_one_answer').val(i);
                                }
                            });

                            var numAnswers = ($('.copy > p > form > .q-one').find('.input-answers').length);
                            $('.q-one > .add-answers > span').html(numAnswers);
                        }
                    });
                </script>
                <div class="col-md-12 text-center create-q-btn">
                    <button type="submit" class="btn btn-success" style="float:none">Редактирай</button>
                </div>
            </div>
            </form>
        </div>
        <!-- end of one question box holder -->
    @endif

    @if($question->type == 'many')
        <input type="hidden" name="type" value="many">
        <!-- many question box holder -->
        <div class="col-md-12">
            <div class="col-md-12 questions-box q-many">
                <p>снимка:
                    @if(!is_null($question->image))
                        <img src="{{asset('images/questions/'.$question->image)}}" alt="edit-img-q" class="q_image"
                             width="20%">
                    @endif
                    <input type="file" name="image"><br/>
                    въпрос: <i class="fa fa-asterisk" style="font-size: 0.75em; color: #f00;"></i><br>
                    <textarea name="question" id="question" cols="30" rows="5" class="required">{{$question->question}}</textarea>
                    <br>
                    <i class="fa fa-asterisk" style="font-size: 0.75em; color: #f00;"></i>
                    <select name="difficulty" class="required">
                        <option disabled selected value="0">Трудност</option>
                        <option value="1" {{$question->difficulty == '1'?'selected':''}}>лесен</option>
                        <option value="2" {{$question->difficulty == '2'?'selected':''}}>нормален</option>
                        <option value="3" {{$question->difficulty == '3'?'selected':''}}>труден</option>
                    </select>&nbsp;&nbsp;
                    <input type="radio" name="bonus_radio" value="0"
                           id="no-bonus" {{is_null($question->bonus)?'checked':''}}>
                    <label
                            for="no-bonus">Без Бонус</label>&nbsp;&nbsp;
                    <input type="radio" name="bonus_radio" value="1" id="yess-bonus"
                           data-bonus="{{$question->bonus}}" {{is_null($question->bonus)?'':'checked'}}> <label
                            for="yess-bonus">Бонус</label>
                </p>
                <p>отговори:</p>
                <input type="hidden" name="correct_many_answer" id="correct_many_answer">
                @if(count($question->Answers) < 1)
                    <p class="input-answers">
                        снимка:

                        <input type="hidden" name="old_image_0" class="old_image" value="">

                        <input type="file" name="many_a_image[]" class="many_a_image"><br/>
                        <input type="hidden" name="image_for_" class="many_a_image_a" value="0">
                        <a href="" class="icon-click-many">
                            <i class="fas fa-check-circle"></i>
                        </a>&nbsp;
                        <input type="text" class="q-many-answer" name="answers[]" data-q-count="0"
                               value="" style="width:90%">
                        <a href="" class="remove-q">
                            <i class="fas fa-times"></i>
                        </a>
                    </p>
                @endif
                @foreach($question->Answers as $num => $answer)
                    @if($answer->correct > 0)
                        <?php $correct = true; ?>
                    @else
                        <?php $correct = false; ?>
                    @endif
                    <p class="input-answers">
                        снимка:
                        @if(!is_null($answer->image))
                            <img src="{{asset('images/questions/'.$answer->image)}}" alt="edit-img-q" class="q_image"
                                 width="20%">
                            <input type="hidden" name="old_image_{{$num}}" class="old_image" value="{{$answer->image}}">
                        @endif
                        <input type="file" name="many_a_image[]" class="many_a_image"><br/>
                        <input type="hidden" name="image_for_" class="many_a_image_a" value="0">
                        <a href="" class="icon-click-many {{$correct?'click_me corect-answer-one':''}}">
                            <i class="fas fa-check-circle"></i>
                        </a>&nbsp;
                        <input type="text" class="q-many-answer {{$correct?'corect-answer-one':''}}" name="answers[]" data-q-count="{{$num}}"
                               value="{{$answer->answer}}" style="width:90%">
                        <a href="" class="remove-q">
                            <i class="fas fa-times"></i>
                        </a>
                    </p>
                @endforeach
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
                            $(this).next('label').after('&nbsp;&nbsp;<input type="number" name="bonus" class="bonus-points" value="'+$(this).attr('data-bonus')+'">');
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

                    $('.many_a_image').change(function () {
                        var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
                        fileName = fileName.replace(/\s/g, '');
                        $(this).parent().find('.many_a_image_a').val(fileName);
                        var inputNum = $(this).parent().find('.q-many-answer').attr('data-q-count');
                        $(this).parent().find('.many_a_image_a').attr('name', 'image_for_' + inputNum);
                    });

                    $('.add-answers-many > a').on('click', function (e) {
                        e.preventDefault();

                        var addAnswer = $('.q-many > .input-answers').last().clone(true);
                        //numbering inputs so after that will append input with correct answer number of input
                        var currentNum = parseInt(addAnswer.find('.q-many-answer').attr('data-q-count'));
                        addAnswer.find('#many_a_image').val(null);
                        addAnswer.find('input').attr('data-q-count', currentNum + 1);
                        // if cloning correct answer box remove the class
                        if (addAnswer.find('a').hasClass('corect-answer-one')) {
                            addAnswer.find('a').removeClass('corect-answer-one');
                            addAnswer.find('.q-many-answer').removeClass('corect-answer-one');
                            // addAnswer.find('a').find('.fas').removeClass('fa-times').addClass('fa-check-circle');
                        }

                        $('.q-many > .add-answers-many').prev('.input-answers').after(addAnswer);
                        var numAnswers = ($('.q-many > .input-answers').find('.corect-answer-one').length / 2);
                        var maxAnswers = ($('.q-many > .input-answers').length);


                        $('.q-many > .add-answers-many > span').html(numAnswers + '/' + maxAnswers);

                    });

                    $('.remove-q').on('click', function (e) {
                        e.preventDefault();
                        $(this).parent().remove();
                        if ($('.q-many').find('.input-answers').length > 1) {

                            var maxAnswers = ($('.q-many >.input-answers').length);

                            //if clicked to remove element have correct class remove answers count - 1
                            if ($(this).parent().find('.icon-click-many').hasClass('corect-answer-one')) {
                                numAnswers -= 1;
                            }
                            var added = ',';
                            $('.q-many').find('.input-answers').each(function (i, obj) {
                                $(this).find(".many_a_image_a").attr('data-q-count', i);
                                $(this).find("#many_a_image").attr('data-q-count', i);
                                $(this).find(".q-many-answer").attr('data-q-count', i);
                                $(this).find('.old_image').attr('name', 'old_image_' + i);

                                if ($(this).find("input:text").hasClass("corect-answer-one")) {
                                    added += i+',';
                                }
                            });


                            $('.q-many').find('.input-answers').each(function (i, obj) {
                                $(this).find(".many_a_image_a").attr('data-q-count', i);
                                $(this).find("#many_a_image").attr('data-q-count', i);
                                $(this).find(".q-many-answer").attr('data-q-count', i);
                            });

                            $('#correct_many_answer').val(added);
                            var numAnswers = ($('.q-many > .input-answers').find('.corect-answer-one').length / 2);

                            $('.q-many > .add-answers-many > span').html(numAnswers + '/' + maxAnswers);
                        }
                    });

                    $('.icon-click-many').on('click', function (e) {
                        e.preventDefault();
                        if (!$(this).hasClass('corect-answer-one')) {
                            $(this).addClass('corect-answer-one');
                            $(this).next('.q-many-answer').addClass('corect-answer-one');
                            $('#correct_many_answer').val($('#correct_many_answer').val() + ',' + $(this).next('.q-many-answer').attr('data-q-count'));

                            var numAnswers = (($('.q-many > .input-answers').find('.corect-answer-one').length / 2) - 1);
                            var maxAnswers = ($('.q-many > .input-answers').length);
                            numAnswers += 1;
                            $('.q-many > .add-answers-many > span').html(numAnswers + '/' + maxAnswers);
                        } else {
                            $(this).removeClass('corect-answer-one');
                            $(this).next('.q-many-answer').removeClass('corect-answer-one');
                            var numAnswers = (($('.q-many > .input-answers').find('.corect-answer-one').length / 2));
                            var maxAnswers = ($('.q-many > .input-answers').length);
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
                    <button type="submit" class="btn btn-success" style="float:none">Редактирай</button>
                </div>
            </div>
            </form>
        </div>
        <!-- end of many question box holder -->
        @endif
        </form>
        </div>
        <script src="{{asset('js/create_tests.js')}}"></script>
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
        </script>

        <script>
            $(function () {
                var isBonus = $('#yess-bonus').attr('data-bonus');
                if (isBonus) {
                    $('#yess-bonus').click();
                }

                $('.click_me').click();
                $('.click_me').trigger("click");
                var numAnswers = ($('.q-many > .input-answers').find('.corect-answer-one').length / 2);
                var maxAnswers = ($('.q-many > .input-answers').length);


                $('.q-many > .add-answers-many > span').html(numAnswers + '/' + maxAnswers);
            });
        </script>
@endsection

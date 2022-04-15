<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
    <link rel="stylesheet" href="{{asset('css/questions.css')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap-grid.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}" />
</head>
<body>
<div class="header-time col-md-12 text-center">
    <span>оставащо време</span><br/>
    </br/>
    <span class="timer-programming" data-time="{{$finishTime}}"><img src="{{asset('/images/loaders/load-31.gif')}}"
                                                                     width="5%" alt="timer"/></span>
</div>
<div class="col-md-12 d-flex flex-row flex-wrap main-holder">
    <div class="col-md-9 current-question">
        @if(is_null($current) && !isset($started))
            <form action="{{route('test.send.answer')}}" method="POST" id="first_q">
                @csrf
                <input type="hidden" name="question" value="{{$questions[0]->id}}">
                @if($questions[0]->type == 'open')
                    <div class="col-md-12"><i class="fas fa-keyboard"></i> отворен отговор</div>
                    <div class="col-md-12 open-question-holder">
                        @if($questions[0]->image || !is_null($questions[0]->image))
                            <p class="images-holder text-center">
                                <img src="{{asset('images/questions/'.$questions[0]->image)}}" class="open-q-img small-img" title="click" alt="image">
                            </p>
                        @endif
                        {{$questions[0]->question}}
                    </div>
                    <div class="col-md-12 open-answer-holder">
                        <textarea name="open_answer" id="open_answer" cols="auto" rows="10" placeholder="отговор"></textarea>
                    </div>
                    <div class="col-md-12 submit-answer-holder text-center">
                        <button class="btn btn-outline-success">следващ</button>
                    </div>
                @endif
                @if($questions[0]->type == 'one')
                        <div class="col-md-12"><i class="far fa-dot-circle"></i> един верен отговор</div>
                        <div class="col-md-12 one-question-holder">
                        @if($questions[0]->image || !is_null($questions[0]->image))
                            <p class="images-holder text-center">
                                <img src="{{asset('images/questions/'.$questions[0]->image)}}" class="open-q-img small-img" title="click" alt="image">
                            </p>
                        @endif
                        {{$questions[0]->question}}
                        </div>
                        <div class="col-md-12 one-question-holder">
                            <ul>
                                @foreach($questions[0]->Answers as $answer)
                                    <li>
                                        <input type="radio" name="one_answer" id="a-{{$answer->id}}" value="{{$answer->id}}">
                                        &nbsp;<label for="a-{{$answer->id}}">
                                            {{$answer->answer}}
                                        </label>
                                        @if($answer->image || !is_null($answer->image))
                                            <p class="images-holder">
                                                <img src="{{asset('images/questions/'.$answer->image)}}" class="small-img" title="click" alt="answer-img">
                                            </p>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-12 submit-answer-holder text-center">
                            <button class="btn btn-outline-success">следващ</button>
                        </div>
                @endif
                @if($questions[0]->type == 'many')
                        <div class="col-md-12"><i class="far fa-check-square"></i> повече от един верен отговор</div>
                        <div class="col-md-12 many-question-holder">
                            @if($questions[0]->image || !is_null($questions[0]->image))
                                <p class="images-holder text-center">
                                    <img src="{{asset('images/questions/'.$questions[0]->image)}}" class="open-q-img small-img" title="click" alt="image">
                                </p>
                            @endif
                            {{$questions[0]->question}}
                        </div>
                        <div class="col-md-12 many-question-holder">
                            <ul>
                                @foreach($questions[0]->Answers as $answer)
                                    <li>
                                        <input type="checkbox" name="many_answers[]" id="a-{{$answer->id}}" value="{{$answer->id}}">
                                        &nbsp;<label for="a-{{$answer->id}}">
                                            {{$answer->answer}}
                                        </label>
                                        @if($answer->image || !is_null($answer->image))
                                            <p class="images-holder">
                                                <img src="{{asset('images/questions/'.$answer->image)}}" class="small-img" title="click" alt="answer-img">
                                            </p>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-12 submit-answer-holder text-center">
                            <button class="btn btn-outline-success">следващ</button>
                        </div>
                @endif
            </form>
        @else
            <form action="{{route('test.send.answer')}}" method="POST" id="started-q" class="d-flex flex-row flex-wrap">
                @csrf
                <input type="hidden" name="question" value="{{$current->id}}">
                <input type="hidden" name="prev" id="prev" value="null">
                @if($current->type == 'open')
                    <div class="col-md-12"><i class="fas fa-keyboard"></i> отворен отговор</div>
                    <div class="col-md-12 open-question-holder">
                        @if($current->image || !is_null($current->image))
                            <p class="images-holder text-center">
                                <img src="{{asset('images/questions/'.$current->image)}}" class="open-q-img small-img" title="click" alt="image">
                            </p>
                        @endif
                        {{$current->question}}
                    </div>
                    <div class="col-md-12 open-answer-holder">
                        <textarea name="open_answer" id="open_answer" cols="auto" rows="10" placeholder="отговор">{{isset($current->answers_open[0]['answer'])?$current->answers_open[0]['answer']:''}}</textarea>
                    </div>
                @endif
                @if($current->type == 'one')
                    <div class="col-md-12"><i class="far fa-dot-circle"></i> един верен отговор</div>
                    <div class="col-md-12 one-question-holder">
                        @if($current->image || !is_null($current->image))
                            <p class="images-holder text-center">
                                <img src="{{asset('images/questions/'.$current->image)}}" class="open-q-img small-img" title="click" alt="image">
                            </p>
                        @endif
                        {{$current->question}}
                    </div>
                    <div class="col-md-12 one-question-holder">
                        <ul>
                            @foreach($current->Answers as $answer)
                                @if ((int) $current->answers[0]['answer'] == $answer->id)
                                    <?php $answer['checked'] = true; ?>
                                @else
                                    <?php $answer['checked'] = false; ?>
                                @endif
                                <li>
                                    <input type="radio" name="one_answer" id="a-{{$answer->id}}" value="{{$answer->id}}" {{$answer['checked']?'checked="checked"':''}}>
                                    &nbsp;<label for="a-{{$answer->id}}">
                                        {{$answer->answer}}
                                    </label>
                                    @if($answer->image || !is_null($answer->image))
                                        <p class="images-holder">
                                            <img src="{{asset('images/questions/'.$answer->image)}}" class="small-img" title="click" alt="answer-img">
                                        </p>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if($current->type == 'many')
                    <div class="col-md-12"><i class="far fa-check-square"></i> повече от един верен отговор</div>
                    <div class="col-md-12 many-question-holder">
                        @if($current->image || !is_null($current->image))
                            <p class="images-holder text-center">
                                <img src="{{asset('images/questions/'.$current->image)}}" class="open-q-img small-img" title="click" alt="image">
                            </p>
                        @endif
                        {{$current->question}}
                    </div>
                    <div class="col-md-12 many-question-holder">
                        <ul>
                            @foreach($current->Answers as $answer)
                                @if($current->answers_many && !is_null($current->answers_many) && isset($current->answers_many))
                                    @if(in_array($answer->id,$current->answers_many))
                                        <?php $answer['selected'] = true; ?>
                                    @else
                                        <?php $answer['selected'] = false; ?>
                                    @endif
                                @endif
                                <li>
                                    <input type="checkbox" name="many_answers[]" id="a-{{$answer->id}}" value="{{$answer->id}}" {{$answer['selected']?'checked':''}}>
                                    &nbsp;<label for="a-{{$answer->id}}">
                                        {{$answer->answer}}
                                    </label>
                                    @if($answer->image || !is_null($answer->image))
                                        <p class="images-holder">
                                            <img src="{{asset('images/questions/'.$answer->image)}}" class="small-img" title="click" alt="answer-img">
                                        </p>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="col-md-6 submit-answer-holder text-center">
                        <button class="btn btn-outline-success" id="prev-btn">предишен</button>
                    </div>

                    <div class="col-md-6 submit-answer-holder text-center">
                        <button class="btn btn-outline-success" id="next-btn">следващ</button>
                    </div>
            </form>
        @endif
    </div>
    <div class="col-md-3 questions-holder d-flex flex-row flex-wrap text-center align-content-between">
        @foreach($questions as $key => $question)
            @if(is_null($current) && $key < 1)
                <div class="col-md-6 single-question selected-q">
            @else
                @if(!is_null($current) && $current->id == $question->id)
                    <div class="col-md-6 single-question selected-q">
                @else
                    @if($question->answered)
                        <div class="col-md-6 single-question answered-q">
                    @else
                        <div class="col-md-6 single-question">
                    @endif
                @endif
            @endif
                <div class="col-md-12 small-text" data-q-id="{{$question->id}}">
                    {{$question->question}}
                    <br/>
                    <ul>
                    @foreach($question->Answers as $answer)
                        <li class="text-left">{{$answer->answer}}</li>
                    @endforeach
                    </ul>
                </div>
                <div class="col-md-12 q-small-type">
                    @if($question->type == 'open')
                        <i class="fas fa-keyboard"></i>
                    @endif
                    @if($question->type == 'one')
                        <i class="far fa-dot-circle"></i>
                    @endif
                    @if($question->type == 'many')
                        <i class="far fa-check-square"></i>
                    @endif
                    @if($question->answered)
                        <img src="{{asset('images/tick-y-big.png')}}" class="answered-img" alt="y">
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-md-11 text-right">
        <a href="{{route('test.submit')}}"><button class="btn mt-2 btn-warning" id="submit-test-btn">ПРЕДАЙ</button></a>
    </div>
</div>
</div>
<!-- JQuery -->
<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
<!-- JQuery UI-->
<script type="text/javascript" src="{{asset('/js/jquery-ui.js')}}"></script>
<script src="{{asset('/js/countdownTest.js')}}"></script>
<script>
    $('.images-holder > img').on('click',function(){
       if($(this).hasClass('big-img')){
           $(this).removeClass('big-img');
           $(this).addClass('small-img');
       }else{
           $(this).removeClass('small-img');
           $(this).addClass('big-img');
       }
    });
</script>
</body>
</html>

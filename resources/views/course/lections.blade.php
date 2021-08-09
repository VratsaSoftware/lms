@extends('layouts.template')
@section('title', 'Лекции модул - '.$module->name)
@section('content')
<div class="content-wrap">
    <div class="section">
        @if (!empty(Session::get('success')))
        <p>
            <div class="alert alert-success slide-on">
                <p>{{ session('success') }}</p>
            </div>
        </p>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger slide-on">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if ($message = Session::get('error'))
        <p>
            <div class="alert alert-danger slide-on">
                <button type="button" class="close" data-dismiss="alert">
                </button>
                <p>{{ $message }}</p>
            </div>
        </p>
        @endif
        <div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
            <div class="col-md-12 text-center">
                <p>
                    {{$module->name}}
                </p>
                <p>
                    {{$module->Course->description}}
                </p>
            </div>
            <div class="col-md-12 lvl-program-holder d-flex flex-row flex-wrap">
                <div class="col-md-12 lvl-title text-center">Учебна Програма <i class="fas fa-book-open"></i>&nbsp;{{count($lections)}}</div>
                <div class="col-md-12 text-center homework-stats-user" title="Качени домашни / прегледани домашни">
                    <i class="fas fa-upload"></i> {{Auth::user()->getUploadedHomeworksCount($module->id,Auth::user()->id)}} / <i class="fas fa-eye"></i> {{Auth::user()->getHomeWorkEvalCountModule($module->id,Auth::user()->id)}}
                </div>
                <!-- modal for editing elements -->
                <div id="modal" style="top:-140px">
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
                        <a href="#close" class="btn close-modal" data-dismiss = "modal">Затвори</a>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
            <!-- end of modal -->
            @foreach ($lections as $key => $lection)
            @if(is_null($lection->type))
            <!-- one lecture -->
            @if($lection->first_date->isToday() || !is_null($lection->second_date) && $lection->second_date->isToday())
            <div class="col-md-12 lectures-wrapper d-flex flex-row flex-wrap lection-today">
                @else
                <div class="col-md-12 lectures-wrapper d-flex flex-row flex-wrap">
                    @endif
                    <div class="col-md-1 lecture-img text-center">
                        <img src="{{asset('/images/student-hat.png')}}" alt="lecturer-icon" class="img-fluid"><br>
                        <span>{{$lection->order}}</span>
                    </div>
                    <div class="col-md-11 lecture-txt">
                        <span class="lection-title">{{$lection->title}}</span>
                        <span>
                            @if($lection->first_date)
                            &nbsp;<i class="far fa-calendar-alt"></i>&nbsp;{{$lection->first_date->format('d-m-Y')}}&nbsp;<span class="lection-hour">&nbsp;<i class="far fa-clock"></i>&nbsp;{{$lection->first_date->format('H:i')}}</span>
                            @endif

                            @if($lection->second_date)
                            /&nbsp;<i class="far fa-calendar-alt"></i>&nbsp;{{$lection->second_date->format('d-m-Y')}}&nbsp;<span class="lection-hour">&nbsp;<i class="far fa-clock"></i>&nbsp;{{$lection->second_date->format('H:i')}}</span>
                            @endif
                            <br/>
                            <div class="homework-time-user">
                                <span class="home-work-time-text">срок за домашни:</span><br/>
                                <i class="far fa-calendar-alt"></i> {{isset($lection->homework_end)?$lection->homework_end->subDays(1)->addHours('23')->addMinutes('59')->format('d-m-Y'):'-'}}
                                &nbsp;<i class="far fa-clock"></i>&nbsp;{{isset($lection->homework_end)?$lection->homework_end->subDays(1)->addHours('23')->addMinutes('59')->format('H:i'):'-'}}
                            </div>
                        </span><br>

                        @if(!Auth::user() && $lection->visibility != Config::get('courseVisibility.public'))
                        <span class="lection-description">Тази лекция не е публична!</span>
                        <div class="cf footer text-center">
                            <a href="{{route('home')}}" class="btn close-modal">ВХОД</a>
                        </div>
                        @else

                        @if(strlen($lection->description) > 250)
                        <span class="lection-description">{{mb_substr($lection->description,0,250)}}...<a href="#modal" data="{{$lection->description}}" class="read-more">още</a></span>
                        @else
                        <span class="lection-description">{{$lection->description}}</span>
                        @endif
                        <br>
                        <div class="col-md-12 lecture-options text-center d-flex flex-row flex-wrap">
                            <div class="col-md-1 video-lecture">
                                @if($lection->Video()->exists())
                                <a data-toggle="modal" data-target="#modal" href="#modal" data-user="{{isset(Auth::user()->id)?Auth::user()->id:0}}" data-video-id="{{$lection->Video->id}}" data-url="{{route('lection.video.show')}}">видео</a>
                                @else
                                <span class="empty-data">видео</span>
                                @endif
                                <div class="col-md-12 video-holder">
                                    <div class="col-md-12 d-flex flex-row flex-wrap">
                                        <div class="col-md-12 video-title">{{$lection->title}}</div>
                                        @if($lection->Video()->exists())
                                        <span class="video-url">{{$lection->Video->url}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 presentation-lecture">
                                @if($lection->presentation)
                                <a href="{{asset('/data/course-'.$module->Course->id.'/modules/'.$module->id.'/slides-'.$lection->id.'/'.$lection->presentation)}}" target="__blank">слайдове </a>
                                @else
                                <span class="empty-data">презентация</span>
                                @endif
                            </div>
                            <div class="col-md-2 homework-lecture">
                                @if($lection->homework_criteria)
                                <a href="{{asset('/data/course-'.$module->Course->id.'/modules/'.$module->id.'/homework-'.$lection->id.'/'.$lection->homework_criteria)}}" target="__blank">за домашно </a>
                                @else
                                <span class="empty-data">домашно</span>
                                @endif
                            </div>
                            <div class="col-md-2 homework-lecture-upload">
                                @if(Auth::user())
                                @if(!is_null($lection->homework_end) && $lection->homework_end->gt(\Carbon\Carbon::now()))
                                <a href="#modal" class="upload-homework" data-loader="{{asset('/images/loaders/load-20.gif')}}" data-url="{{route('user.upload.homework')}}" data-lection="{{$lection->id}}"><span class="">качи домашно</span></a>
                                @else
                                <span class="empty-data">качи домашно</span>
                                @endif
                                <br>
                                <div class="homework-stats">
                                    @if(Auth::user() && Auth::user()->isHomeWorkUploadedByLection(null,$lection->id))
                                    <img src="{{asset('images/tick-y-big.png')}}" alt="uploaded" width="10%">
                                    @else
                                    <img src="{{asset('images/profile/remove-icon.png')}}" alt="not-uploaded" width="10%">
                                    @endif
                                    @php
                                    $homeworkComments = Auth::user()->getHomeworkCommentsByLection(null,$lection->id);
                                    @endphp
                                    <a href="#modal" class="homework-comments"><i class="fas fa-comment-dots"></i> ({{count($homeworkComments)}})</a>
                                    <div class="comments-homework" style="display:none;">
                                        <div class="col-md-12 d-flex flex-row flex-wrap comment-modal-holder" style="align-content: flex-start">
                                            <div class="comments-title col-md-12">Коментари</div>
                                            @foreach ($homeworkComments as $comment)
                                            <!-- one comment -->
                                            @if(!is_null($comment->Author))
                                            <div class="comment-pic-inside-modal col-md-12 d-flex flex-row flex-wrap">
                                                <div class="col-md-4">
                                                    @if($comment->Author->picture && $comment->is_lecturer_comment > 0)
                                                    <img src="{{asset('images/user-pics/'.$comment->Author->picture)}}" alt="botev" class="img-fluid modal-comment-pic">
                                                    @else
                                                    <img src="{{asset('images/men-no-avatar.png')}}" alt="profile-pic" class="img-fluid modal-comment-pic">
                                                    @endif
                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <span class="">
                                                        @if($comment->is_lecturer_comment > 0)
                                                        {{$comment->Author->name}} {{$comment->Author->last_name}}
                                                        @else
                                                        Курсист
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <span class="">{{$comment->created_at->diffForHumans()}}</span>
                                                </div>

                                                <div class="col-md-12">

                                                </div>
                                                <div class="col-md-12 comment-text">
                                                    {{$comment->comment}}
                                                </div>
                                                <div class="col-md-12 text-right">
                                                    {{$comment->created_at->format('H:i A')}}
                                                </div>
                                            </div>
                                            @endif
                                            <!-- end of one comment -->
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @else
                                <span class="empty-data" style="font-size: 15px;">трябва да си влязъл в акаунта си, за да качиш домашно</span>
                                @endif
                            </div>
                            <div class="col-md-2 homework-lecture-eval">
                                @if(Auth::user())
                                @if(!is_null($lection->homework_end) && !$lection->homework_end->gt(\Carbon\Carbon::now()))
                                <a href="#modal" class="eval_homeworks" data-lection="{{$lection->id}}" data-url="{{route('user.eval.homeworks')}}">
                                    <span>оцени домашно</span>
                                </a>
                                @else
                                <span class="empty-data">оцени домашно</span>
                                @endif
                                <br>
                                <span class="homework-stats">{{Auth::user()?Auth::user()->evalutedHomeWorksCount(null,$lection->id):'0'}}</span>
                                @else
                                <span class="empty-data" style="font-size: 15px;">трябва да си влязъл в акаунта си, за да оцениш домашно</span>
                                @endif
                            </div>
                            <div class="col-md-1">
                                @if($lection->demo)
                                <a href="{{$lection->demo}}" target="__blank">демо </a>
                                @else
                                <span class="empty-data">демо</span>
                                @endif
                            </div>
                            <div class="col-md-2 edit-lecture comment">
                                @if(Auth::user() && !Auth::user()->isCommented($lection->id))
                                <a href="#modal">коментар</a>
                                <div class="col-md-12 comment-holder">
                                    <div class="col-md-12 d-flex flex-row flex-wrap text-center">
                                        <div class="col-md-12 comment-title">{{$lection->title}}</div>
                                        <div class="col-md-12 text-center">
                                            <form action="{{route('user.module.lection.comment',['user' => Auth::user()->id,'course' => $module->Course->id,'module' => $module->id,'lection' => $lection->id])}}" id="comment_form" name="comment_form" method="POST">
                                                {{ csrf_field() }}
                                                <textarea name="comment" id="comment" cols="30" rows="10" placeholder="остави коментар" form="comment_form"></textarea><br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @elseif(!Auth::user())
                                <span class="empty-data">коментар</span>
                                @else
                                <span class="empty-data">вече сте коментирали</span>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- end of one lecture -->
                @elseif($lection->type == Config::get('lectionTypes.vacantion'))
                <!-- start vacantion -->
                <div class="col-md-12 lectures-wrapper d-flex flex-row flex-wrap lection-vacantion">
                    <div class="col-md-1 lecture-img text-center">
                        <img src="{{asset('/images/vacantion.png')}}" alt="lecturer-icon" class="img-fluid"><br>
                        <span>{{$lection->order}}</span>
                    </div>
                    <div class="col-md-11 lecture-txt">
                        <span class="lection-title">{{$lection->title}}</span>
                        <span>
                            @if($lection->first_date)
                            &nbsp;<i class="far fa-calendar-alt"></i>&nbsp;{{$lection->first_date->format('d-m-Y')}}&nbsp;
                            @endif

                            @if($lection->second_date)
                            /&nbsp;<i class="far fa-calendar-alt"></i>&nbsp;{{$lection->second_date->format('d-m-Y')}}&nbsp;
                            @endif
                        </span><br>

                        @if(!Auth::user() && $lection->visibility != Config::get('courseVisibility.public'))
                        <span class="lection-description">Трябва да сте влезели в профила си !</span>
                        <div class="cf footer text-center">
                            <a href="{{route('home')}}" class="btn close-modal">ВХОД</a>
                        </div>
                        @else
                        @if(strlen($lection->description) > 250)
                        <span class="lection-description">{{mb_substr($lection->description,0,250)}}...<a href="#modal" data="{{$lection->description}}" class="read-more">още</a></span>
                        @else
                        <span class="lection-description">{{$lection->description}}</span>
                        @endif
                        <br>
                        @endif
                    </div>
                </div>
                <!-- end of vacantion -->
                @else
                <!-- start test -->
                <div class="col-md-12 lectures-wrapper d-flex flex-row flex-wrap lection-test">
                    <div class="col-md-1 lecture-img text-center">
                        <img src="{{asset('/images/test.png')}}" alt="lecturer-icon" class="img-fluid"><br>
                        <span>{{$lection->order}}</span>
                    </div>
                    <div class="col-md-11 lecture-txt">
                        <span class="lection-title">{{$lection->title}}</span>
                        <span>
                            @if($lection->first_date)
                            &nbsp;<i class="far fa-calendar-alt"></i>&nbsp;{{$lection->first_date->format('d-m-Y')}}&nbsp;<span class="lection-hour">&nbsp;<i class="far fa-clock"></i>&nbsp;{{$lection->first_date->format('H:i')}}</span>
                            @endif

                            @if($lection->second_date)
                            /&nbsp;<i class="far fa-calendar-alt"></i>&nbsp;{{$lection->second_date->format('d-m-Y')}}&nbsp;<span class="lection-hour">&nbsp;<i class="far fa-clock"></i>&nbsp;{{$lection->second_date->format('H:i')}}</span>
                            @endif
                        </span><br>

                        @if(!Auth::user() && $lection->visibility != Config::get('courseVisibility.public'))
                        <span class="lection-description">Трябва да сте влезели в профила си !</span>
                        <div class="cf footer text-center">
                            <a href="{{route('home')}}" class="btn close-modal">ВХОД</a>
                        </div>
                        @else
                        @if(strlen($lection->description) > 250)
                        <span class="lection-description">{{mb_substr($lection->description,0,250)}}...<a href="#modal" data="{{$lection->description}}" class="read-more">още</a></span>
                        @else
                        <span class="lection-description">{{$lection->description}}</span>
                        @endif
                        <br>
                        @endif
                    </div>
                </div>
                <!-- end of test -->
                @endif

                @endforeach
            </div>

        </div>
    </div>
    <script src="{{asset('/js/lections.js')}}"></script>
    <script type="text/javascript">
        $(function(){
            $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_events.css')}}" />');
            $('head').append('<link rel="stylesheet" href="{{asset('/css/student_lectures.css')}}" />');
            $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_course_options.css')}}" />');
        });
    </script>
    @endsection

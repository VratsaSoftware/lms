@extends('layouts.template')
@section('title', 'Редактирай Модул/Ниво')
@section('content')
    <div class="">
        <div class="section">
            <div class="col-md-12 d-flex flex-row flex-wrap">
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

        <div class="col-md-12 text-center picture-title">
            Заглавна Снимка
        </div>
        <form action="{{route('module.update',['module'=>$module->id])}}" method="POST" class="col-md-12" id="edit_module" name="create_module" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <input type="hidden" name="course_id" value="{{$module->Course->id}}">
            <div class="col-md-12 picture-holder text-center">
                <label for="picture">
                    @if(!is_null($module->picture))
                        <img src="{{asset('/images/course-'.$module->Course->id.'/module-'.$module->id.'/'.$module->picture)}}" alt="course-pic" id="course-picture">
                    @else
                        <img src="{{asset('/images/img-placeholder.jpg')}}" alt="course-pic" id="course-picture">
                    @endif
                    <br>
                </label>
            </div>

            <div class="col-md-12 picture-button text-center">
                <label class="picture-label" for="picture"><span class="upload-pic">качи<input type="file" id="picture" name="picture" onChange="CourseimagePreview(this);" style="display:none"></span></label>
            </div>
    </div>

    <div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
        <div class="col-md-12 text-center">
            <p>
                <label for="name">Име на модула/нивото</label><br>
                <input type="text" id="name" name="name" placeholder="" class="name-course" value="{{$module->name}}">
            </p>
            <p>
                <label for="description">Описание</label><br>
                <textarea id="description" cols="30" rows="5" name="description" placeholder="" style="resize: none;">{{$module->description}}</textarea>
            </p>
            <p>
                <label for="starts">Започва</label>
                <input type="date" name="starts" id="starts" value="{{$module->starts->format('Y-m-d')}}">
            </p>
            <p>
                <label for="ends">Свършва</label>
                <input type="date" name="ends" id="ends" value="{{$module->ends->format('Y-m-d')}}">
            </p>
            <p>
                <label for="order">Поредност на модула</label>

                <input type="number" name="order" id="order" value="{{$module->order}}" class="section-el-bold" min="1">
            </p>
            <p>
                <label for="visibility">Видимост на модула/нивото</label>
                <select class="course-visibility section-el-bold" name="visibility" id="visibility" title="public - видимо от всички,private - трябва да си логнат за да видиш съдържанието, draft - само лекторите виждат съдържанието">
                    @foreach(Config::get('courseVisibility') as $visibility)
                        @if($module->visibility == $visibility)
                            <option value="{{strtolower($visibility)}}" selected>{{ucfirst($visibility)}}</option>
                        @else
                            <option value="{{strtolower($visibility)}}">{{ucfirst($visibility)}}</option>
                        @endif
                    @endforeach
                </select>
            </p>
            <div class="col-md-12 create-course-button text-center create-module-btn">
                <a href="#" onclick="javascript:$('#edit_module').submit()" class="create-course-btn"><span class="create-course">Промени</span></a>
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
                <a href="#close" class="btn close-modal">Затвори</a>
            </div>
        </div>
        <div class="overlay"></div>
    </div>
    <!-- end of modal -->

    {{-- form editing lecture --}}
    <form class="edit-lection" id="edit-lection" action="" method="post" style="display:none">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <p>
            <label for="title">Заглавие</label>
            <input type="text" name="title" id="title" value="">
        </p>
        <p>
            <label for="first_date">Първа дата / Втора дата</label>
            <br/>
            <input type="date" id="first_date" value="" name="first_date"><input type="number" id="first_time_hours" name="first_time_hours" class="time-input" min="1" max="24" title="01 - 24">:<input type="number" id="first_time_minutes" name="first_time_minutes" class="time-minutes" min="1" max="59" title="01-59"> <br />/
            <br /> <input type="date" id="second_date" value="" name="second_date"><input type="number" id="second_time_hours" name="second_time_hours" class="time-input" min="1" max="24" title="01 - 24">:<input type="number" id="second_time_minutes" name="second_time_minutes" class="time-minutes" min="1" max="59" title="01-59">
        </p>
        <p>
            <label for="description">Описание</label>
            <textarea class="el-value" id="description" name="description"></textarea>
        </p>
        <p>
            <label for="order">Поредност</label>
            <input type="number" name="order" id="order" value="">
        </p>
        <p>
            <label for="order">Срок за домашни</label>
            <input type="date" name="homework_end" id="homework_end" value="">
        </p>
    </form>
    {{-- end editing form lecture --}}
    <div class="col-md-12 lvl-program-holder d-flex flex-row flex-wrap">
        <div class="col-md-12 lvl-title text-center">Учебна Програма <i class="fas fa-book-open"></i>&nbsp;<span id="lection-count" data-count="{{count($lections)}}">{{count($lections)}}</span></div>
    @forelse ($lections as $key => $lection)
        @if(empty($lection->type))
            <!-- one lecture -->
                @if($lection->first_date->isToday() || !is_null($lection->second_date) && $lection->second_date->isToday())
                    <div class="col-md-12 lectures-wrapper d-flex flex-row flex-wrap lection-today">
                        @else
                            <div class="col-md-12 lectures-wrapper d-flex flex-row flex-wrap">
                                @endif
                                <div class="col-md-1 lecture-img text-center">
                                    <img src="{{asset('/images/student-hat.png')}}" alt="lecturer-icon" class="img-fluid"><br>
                                    <span class="lection-order">{{$lection->order}}</span>
                                </div>
                                <span class="first-date-no-show" style="display:none">{{$lection->first_date->format('Y-m-d')}}</span>
                                <span class="first-hours-no-show" style="display:none">{{$lection->first_date->format('H')}}</span>
                                <span class="first-minutes-no-show" style="display:none">{{$lection->first_date->format('i')}}</span>
                                @if(!is_null($lection->second_date))
                                    <span class="second-hours-no-show" style="display:none">{{$lection->second_date->format('H')}}</span>
                                    <span class="second-minutes-no-show" style="display:none">{{$lection->second_date->format('i')}}</span>
                                    <span class="second-date-no-show" style="display:none">{{$lection->second_date->format('Y-m-d')}}</span>
                                @else
                                    <span class="second-date-no-show" style="display:none"></span>
                                    <span class="second-hours-no-show" style="display:none"></span>
                                    <span class="second-minutes-no-show" style="display:none"></span>
                                @endif
                                @if(!is_null($lection->homework_end))
                                    <span class="homework-end-no-show" style="display:none">{{$lection->homework_end->subDays(1)->format('Y-m-d')}}</span>
                                @else
                                    <span class="homework-end-no-show" style="display:none"></span>
                                @endif
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
                                <i class="far fa-calendar-alt"></i> {{isset($lection->homework_end)?$lection->homework_end->subDays(1)->addHours('23')->addMinutes('59')->format('d-m-Y'):'--'}}
                                <i class="far fa-clock"></i>&nbsp;{{isset($lection->homework_end)?$lection->homework_end->subDays(1)->addHours('23')->addMinutes('59')->format('H:i'):'--'}}
                            </div>
                         </span><br>

                                    @if(strlen($lection->description) > 250)
                                        <span class="lection-description">{{mb_substr($lection->description,0,250)}}...<a href="#modal" data="{{$lection->description}}" class="read-more">още</a></span>
                                    @else
                                        <span class="lection-description">{{$lection->description}}</span>
                                    @endif
                                    <br>
                                    <div class="col-md-12 lecture-options text-center d-flex flex-row flex-wrap">
                                        <div class="col-md-2 video-lecture">
                                            @if($lection->Video()->exists())
                                                <a data-toggle="modal" data-target="#modal" href="#modal" class="video-exist" data="{{$lection->Video->url}}" data-url="{{route('lection.update',['lection' => $lection->id])}}">видео</a>
                                                <br/>
                                                <a href="#modal" class="video-count">
                                    <span>видяно:
                                         <?php $viewed = 0;?>
                                        @forelse($lection->Video->Viewed as $view)
                                            <?php
                                            $viewed += $view->views_count;
                                            ?>
                                            <p class="watched-users">
                                            @forelse($view->User as $watched_user)
                                                    <span class="viewed-user">Потребител :{{$watched_user->name}} {{$watched_user->last_name}} / Видял: <span class="viewed-num">{{$view->views_count}}</span></span>
                                                @empty
                                                    <span>Потребител :анонимен / Видял: {{$view->views_count}}</span>
                                                @endforelse
                                            </p>
                                        @empty
                                            <p class="watched-users"><span>никой не е гледал видеото</span></p>
                                        @endforelse
                                        {{$viewed}}
                                    </span>
                                                </a>
                                            @else
                                                <a href="#modal" class="add-video empty-data" data-url="{{route('lection.store')}}" data="{{$lection->id}}">добави видео </a>
                                            @endif
                                            <div class="col-md-12 video-holder">
                                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                                    <div class="col-md-12 video-title">{{$lection->title}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 presentation-lecture">
                                            @if($lection->presentation)
                                                <a href="#modal" data-url="{{route('lection.update',['lection' => $lection->id])}}" data="{{asset('/data/course-'.$module->Course->id.'/modules/'.$module->id.'/slides-'.$lection->id.'/'.$lection->presentation)}}" class="slides-exist">слайдове </a>
                                            @else
                                                <a href="#modal" class="add-presentation empty-data" data-url="{{route('lection.store')}}" data="{{$lection->id}}">добави слайдове </a>
                                            @endif
                                        </div>
                                        <div class="col-md-2 homework-lecture">
                                            @if($lection->homework_criteria)
                                                <a href="#modal" data-url="{{route('lection.update',['lection' => $lection->id])}}" data="{{asset('/data/course-'.$module->Course->id.'/modules/'.$module->id.'/homework-'.$lection->id.'/'.$lection->homework_criteria)}}" class="homework-exist">домашно </a>
                                            @else
                                                <a href="#modal" class="add-homework empty-data" data-url="{{route('lection.store')}}" data="{{$lection->id}}">добави домашно </a>
                                            @endif
                                            <br/>
                                            <a href="{{route('homeworks.show',$lection->id)}}" class="homework-exist">виж домашни</a>
                                        </div>
                                        <div class="col-md-2">
                                            @if($lection->demo)
                                                <a href="#modal" data-url="{{route('lection.update',['lection' => $lection->id])}}" data="{{$lection->demo}}" class="demo-exist">демо </a>
                                            @else
                                                <a href="#modal" class="add-demo empty-data" data-url="{{route('lection.store')}}" data="{{$lection->id}}">добави демо </a>
                                            @endif
                                        </div>
                                        <div class="col-md-1 comments-view">
                                            @if(!is_null($lection->Comments))
                                                <a href="#modal">{{count($lection->Comments)}}<i class="fas fa-comment-dots"></i></a>
                                                <div class="comments">
                                                    <div class="col-md-12 d-flex flex-row flex-wrap comment-modal-holder" style="align-content: flex-start">
                                                        <div class="comments-title col-md-12">Обратна Връзка</div>
                                                    @foreach ($lection->Comments as $comment)
                                                        <!-- one comment -->
                                                            @if(!is_null($comment->Author))
                                                                <div class="comment-pic-inside-modal col-md-12 d-flex flex-row flex-wrap">
                                                                    <div class="col-md-4">
                                                                        @if($comment->Author->picture)
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
                                                                        <span class="">{{$comment->Author->name}} {{$comment->Author->last_name}}</span>
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
                                            @else

                                            @endif
                                        </div>
                                        <div class="col-md-2 edit-lecture">
                                            <a href="#modal" data="{{route('lection.update',$lection->id)}}">Редактирай </a>
                                        </div>
                                        <div class="col-md-1 edit-lecture">
                                            <select class="section-el-bold visibility" name="visibility" title="public - видимо от всички,private - трябва да си логнат за да видиш съдържанието, draft - само лекторите виждат съдържанието">
                                                @foreach(Config::get('courseVisibility') as $visibility)
                                                @if(strtolower($visibility) == strtolower($lection->visibility))
                                                </i><option value="{{strtolower($visibility)}}" selected data-url="{{route('lection.visibility',['lection' => $lection->id])}}">{{ucfirst($visibility)}}</option>
                                                @else
                                                    <option value="{{strtolower($visibility)}}" data-url="{{route('lection.visibility',['lection' => $lection->id])}}">{{ucfirst($visibility)}}</option>
                                                @endif
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <form action="{{ route('lection.destroy',$lection->id) }}" method="POST"  id="delete-lection">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                            </form>
                                            <button type="submit" class="btn btn-danger delete-lection-btn" value="DELETE" data="{{$lection->id}}" data-url="{{route('lection.destroy',$lection->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- end of one lecture -->
                            @else
                            <!-- start test -->
                                @if($lection->first_date->isToday() || !is_null($lection->second_date) && $lection->second_date->isToday())
                                    <div class="col-md-12 lectures-wrapper d-flex flex-row flex-wrap lection-today lection-test">
                                        @else
                                            <div class="col-md-12 lectures-wrapper d-flex flex-row flex-wrap lection-test">
                                                @endif
                                                <div class="col-md-1 lecture-img text-center">
                                                    <img src="{{asset('/images/test.png')}}" alt="lecturer-icon" class="img-fluid"><br>
                                                    <span class="lection-order">{{$lection->order}}</span>
                                                </div>
                                                <span class="first-date-no-show" style="display:none">{{$lection->first_date->format('Y-m-d')}}</span>
                                                <span class="first-hours-no-show" style="display:none">{{$lection->first_date->format('H')}}</span>
                                                <span class="first-minutes-no-show" style="display:none">{{$lection->first_date->format('i')}}</span>
                                                @if(!is_null($lection->second_date))
                                                    <span class="second-date-no-show" style="display:none">{{$lection->second_date->format('Y-m-d')}}</span>
                                                    <span class="second-hours-no-show" style="display:none">{{$lection->second_date->format('H')}}</span>
                                                    <span class="second-minutes-no-show" style="display:none">{{$lection->second_date->format('i')}}</span>
                                                @else
                                                    <span class="second-date-no-show" style="display:none"></span>
                                                    <span class="second-hours-no-show" style="display:none"></span>
                                                    <span class="second-minutes-no-show" style="display:none"></span>
                                                @endif
                                                <div class="col-md-11 lecture-txt">
                                                    <span class="lection-title">{{$lection->title}}</span>
                                                    <span>
                                                        @if($lection->first_date)
                                                            &nbsp;<i class="far fa-calendar-alt"></i>&nbsp;{{$lection->first_date->format('d-m-Y')}}&nbsp;<span class="lection-hour">&nbsp;<i class="far fa-clock"></i>&nbsp;{{$lection->first_date->format('H:i')}}</span>
                                                        @endif

                                                        @if($lection->second_date && !is_null($lection->second_date))
                                                            /&nbsp;<i class="far fa-calendar-alt"></i>&nbsp;{{$lection->second_date->format('d-m-Y')}}&nbsp;<span class="lection-hour">&nbsp;<i class="far fa-clock"></i>&nbsp;{{$lection->second_date->format('H:i')}}</span>
                                                        @endif
                                                    </span><br>

                                                    @if(strlen($lection->description) > 250)
                                                        <span class="lection-description">{{mb_substr($lection->description,0,250)}}...<a href="#modal" data="{{$lection->description}}" class="read-more">още</a></span>
                                                    @else
                                                        <span class="lection-description">{{$lection->description}}</span>
                                                    @endif
                                                    <br>
                                                    <div class="col-md-12 lecture-options text-center d-flex flex-row flex-wrap">
                                                        <div class="col-md-9">

                                                        </div>
                                                        <div class="col-md-2 edit-lecture">
                                                            <a href="#modal" data="{{route('lection.update',$lection->id)}}">Редактирай </a>
                                                        </div>
                                                        <div class="col-md-1 edit-lecture text-right">
                                                            <select class="section-el-bold visibility" name="visibility" title="public - видимо от всички,private - трябва да си логнат за да видиш съдържанието, draft - само лекторите виждат съдържанието">
                                                                @foreach(Config::get('courseVisibility') as $visibility)
                                                                    @if(strtolower($visibility) == strtolower($lection->visibility))
                                                                        <option value="{{strtolower($visibility)}}" selected data-url="{{route('lection.visibility',['lection' => $lection->id])}}">{{ucfirst($visibility)}}</option>
                                                                    @else
                                                                        <option value="{{strtolower($visibility)}}" data-url="{{route('lection.visibility',['lection' => $lection->id])}}">{{ucfirst($visibility)}}</option>
                                                                    @endif
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <form action="{{ route('lection.destroy',$lection->id) }}" method="POST"  id="delete-lection">
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                            </form>
                                                            <button type="submit" class="btn btn-danger delete-lection-btn" value="DELETE" data="{{$lection->id}}" data-url="{{route('lection.destroy',$lection->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end of test -->
                                        @endif
                                        @if($loop->last)
                                            <?php $lastOrder = ($lection->order + 1 ); ?>
                                        @endif
                                        @empty

                                        @endforelse
                                    </div>

                    </div>
    </div>
    <div class="col-md-12 d-flex flex-row flex-wrap add-lecture text-center">
        <div class="col-md-12">
            <a href="#modal" data-url="{{route('lection.store')}}" data-order="{{{isset($lastOrder)?$lastOrder:1}}}" data-module={{$module->id}} data-old-title="{{old('title')}}" data-old-first="{{old('first_date_create')}}"
               data-old-second="{{old('second_date_create')}}" data-old-desc="{{old('description')}}" data-old-order="{{old('order')}}" data-old-video="{{old('video')}}" data-old-demo="{{old('demo')}}" data-old-first-time="{{old('first_time')}}" data-old-second-time="{{old('second_time')}}">
                <img src="{{asset('/images/profile/add-icon.png')}}" alt="add-icon" class="img-fluid">Добави
            </a>
        </div>
    </div>

    {{-- students --}}
    <div class="col-md-12 lvl-title text-center">
        <div class="col-md-12">Курсисти</div>
        <br>
        <div class="col-md-12">
            <label for="mail-search">Добави по мейл:</label>
            <form class="add-by-mail-form" action="{{route('module.add.student')}}" method="POST" name="addStudent" id="addStudent">
                {{ csrf_field() }}
                <input type="text" placeholder="test@test.com,test2@gmail.com,test3@abv.bg" size="" title="Must be a valid email address" name="mail" />
                <input type="hidden" name="module_id" id="module_id" value="{{$module->id}}">
                <img src="{{asset('/images/profile/add-icon.png')}}" alt="add" class="img-fluid add-by-mail">
            </form>
        </div>
    </div>

    <div class="col-md-12 d-flex flex-row flex-wrap text-center all-students-pool">
    @forelse ($students as $student)
        <!--  one student -->
            @if(!is_null($student->User))
                <div class="col-md-3 d-flex flex-row flex-wrap one-student-holder ajax">
                    <div class="col-md-12">
                        @if($student->User->picture)
                            <img src="{{asset('images/user-pics/'.$student->User->picture)}}" alt="student-pic" class="img-fluid one-student-pic">
                        @else
                            @if($student->User->sex != 'female')
                                <img src="{{asset('images/men-no-avatar.png')}}" alt="profile-pic" class="profile-pic">
                            @else
                                <img src="{{asset('images/women-no-avatar.png')}}" alt="profile-pic" class="profile-pic">
                            @endif
                        @endif
                    </div>
                    <span class="edit-lection-students-pool col-md-12">
                {{$student->User->name}}

                        {{$student->User->last_name}}
            </span>
                    <div class="col-md-6 edit-lection-students-pool">
                        {{$student->User->email}}
                    </div>
                    <div class="col-md-6 edit-lection-students-pool">
                        <img src="{{asset('/images/profile/location-icon.png')}}" alt="map-icon">
                        <span class="location">
                            {{$student->User->location}}
                        </span>
                    </div>
                    <div class="col-md-12 text-center" title="Качени домашни / прегледани домашни">
                        <i class="fas fa-upload"></i> {{Auth::user()->getUploadedHomeworksCount($module->id,$student->User->id)}} / <i class="fas fa-eye"></i> {{Auth::user()->getHomeWorkEvalCountModule($module->id,$student->User->id)}}
                    </div>
                    <div class="col-md-11 flex-row flex-wrap student-options">
                        <div class="col-md-6 add-student text-right">

                        </div>
                        <div class="col-md-6 remove-student text-left" data-module="{{$module->id}}" data-url="{{route('module.remove.student')}}">
                            <img src="{{asset('/images/profile/remove-icon.png')}}" width="26px" class="remove-student ajax" data="{{$student->User->id}}">
                        </div>
                    </div>
                </div>
            @endif
        <!-- end of one student -->
        @empty
            <p class="col-md-12 text-center">
                Няма курсисти!<br />
                <img src="{{asset('/images/loaders/load-18.gif')}}" alt="no-students">
            </p>
        @endforelse
    </div>

    <div class="col-md-12 lvl-title text-center">Брой на това ниво</div>
    <div class="col-md-12">
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="{{count($students)*3}}" aria-valuemin="0" aria-valuemax="100" style="width:{{count($students)*3}}%">
                <span class="num-students-now">{{count($students)}}</span>
            </div>
        </div>
    </div>
    {{-- end of students --}}
    <script src="{{asset('/js/create-level-sliders.js')}}"></script>
    <script src="{{asset('/js/level-add-students.js')}}"></script>
    <script src="{{asset('/js/level-options.js')}}"></script>
    <script src="{{asset('/js/delete-lection.js')}}"></script>
    <script src="{{asset('/js/lection-visibility-ajax.js')}}"></script>

    <script type="text/javascript">
        $(function(){
            $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_events.css')}}" />');
            $('head').append('<link rel="stylesheet" href="{{asset('/css/student_lectures.css')}}" />');
            $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_course_options.css')}}" />');
        });
    </script>


@endsection

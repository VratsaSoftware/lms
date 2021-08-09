@extends('layouts.template')
@section('title', $course->name.' - Модули')
@section('content')
<div class="content-wrap">
    <div class="col-md-12 d-flex flex-row flex-wrap options-wrap">
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
        <div class="col-md-12 text-center cert-link">
            @if(isset(Auth::user()->id))
                <a href="{{route('user.cert.show',[Auth::user()->id,$course->id])}}"><img src="{{asset('/images/awards/medal-1.png')}}" alt="medal" width="50px">Сертификат</a>
            @endif
        </div>
        @foreach ($modules as $module)
        <div class="col-md-6 right-option">
            @if($module->starts->lt(\Carbon\Carbon::now()) && $module->ends->gt(\Carbon\Carbon::now()))
                <div class="event-title col-md-12 title-signed" style="border:1px solid {{is_null($course->color)?'':$course->color}};background: {{is_null($course->color)?'':$course->color}}">
                    @else
                    <div class="event-title col-md-12 levels-title" style="border:1px solid {{is_null($course->color)?'':$course->color}};background: {{is_null($course->color)?'':$course->color}}">
                        @endif
                        {{$module->name}}
                    </div>
                    <div class="event-body col-md-12 text-center">
                        @if(!Auth::user() && $module->visibility !== Config::get('courseVisibility.public'))
                            <div class="event-body-text levels-btn" style="border:1px solid {{is_null($course->color)?'':$course->color}};background: {{is_null($course->color)?'':$course->color}}">
                                <a href="{{route('home')}}">
                                    <div class="event-body-text levels-btn">
                                        Вход
                                    </div>
                                </a>
                            </div>
                        @else
                            @if($module->Lections()->exists())
                                @if(Auth::user())
                                    <a href="{{route('user.module.lections',['user' => Auth::user()->id,'course' => $course->id,'module' => $module->id])}}">
                                @else
                                    <a href="{{route('user.module.lections',['user' => 0,'course' => $course->id,'module' => $module->id])}}">
                                @endif
                                @if($module->starts->lt(\Carbon\Carbon::now()) && $module->ends->gt(\Carbon\Carbon::now()))
                                    <div class="event-body-text button-signed" style="border:1px solid {{is_null($course->color)?'':$course->color}};background: {{is_null($course->color)?'':$course->color}}">
                                @else
                                    <div class="event-body-text levels-btn" style="border:1px solid {{is_null($course->color)?'':$course->color}};background: {{is_null($course->color)?'':$course->color}}">
                                @endif
                                    Прегледай
                                    </div>
                                </a>
                            @endif
                        @endif
                        @if(!is_null($module->picture) || !empty($module->picture))
                            <img src="{{asset('/images/course-'.$course->id.'/module-'.$module->id.'/'.$module->picture)}}" alt="">
                        @else
                            @if(!is_null($course->picture) || !empty($course->picture))
                                <img src="{{asset('/images/course-'.$course->id.'/'.$course->picture)}}" alt="">
                            @else
                                <img src="{{asset('/images/img-placeholder.jpg')}}" alt="no photo">
                            @endif
                        @endif
                    </div>
                    @if($module->starts->lt(\Carbon\Carbon::now()) && $module->ends->gt(\Carbon\Carbon::now()))
                        <div class="event-footer col-md-12 d-flex flex-row flex-wrap footer-signed" style="border:1px solid {{is_null($course->color)?'':$course->color}};background: {{is_null($course->color)?'':$course->color}}">
                            @else
                            <div class="event-footer col-md-12 d-flex flex-row flex-wrap levels-footer" style="border:1px solid {{is_null($course->color)?'':$course->color}};background: {{is_null($course->color)?'':$course->color}}">
                                @endif
                                <div class="col-md-6">Ниво:{{$module->order}}<br> </div>
                                <div class="col-md-6">{{$module->starts->format('d-m-Y')}} / {{$module->ends->format('d-m-Y')}}<br> </div>
                            </div>
                        </div>
                        @endforeach
                </div>
        </div>
        @endsection

@extends('layouts.template')
@section('title', 'Admin Курсове')

@section('head')
    <link href="{{ asset('css/lection/lection.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="content-wrap">
  <div class="section">
    <div class="col-md-12 events-now-text text-center">Актуални</div>
  </div>
  <div class="events col-md-12 d-flex flex-row flex-wrap">
        @forelse($courses as $course)
                <div class="col-md-6">
                    <div class="event-title col-md-12" style="border:1px solid {{is_null($course->color)?'':$course->color}};background: {{is_null($course->color)?'':$course->color}}">
                        {{$course->name}}
                        <div class="col-md-12 text-right">
                            <a href="{{route('course.cert.create')}}">Сертификат</a>
                        </div>
                    </div>
                    <div class="event-body col-md-12">
                      <a href="{{route('lecturer.show.course',['course' => $course->id])}}">
                        <div class="event-body-text" style="border:1px solid {{is_null($course->color)?'':$course->color}};background: {{is_null($course->color)?'':$course->color}}">
                          виж
                        </div>
                      </a>
                      @if(!is_null($course->picture) || !empty($course->picture))
                          <img src="{{asset('/images/course-'.$course->id.'/'.$course->picture)}}" alt="">
                      @else
                          <img src="{{asset('/images/img-placeholder.jpg')}}" alt="no photo">
                      @endif
                    </div>
                    <div class="event-footer col-md-12 d-flex flex-row flex-wrap" style="border:1px solid {{is_null($course->color)?'':$course->color}};background: {{is_null($course->color)?'':$course->color}}">
                      <div class="col-md-6">{{$course->visibility}}</div>
                      <div class="col-md-6">{{$course->starts->format('Y-m-d')}} / {{$course->ends->format('Y-m-d')}}</div>
                    </div>
                </div>
        @empty
          няма курсове
        @endforelse
        <div class="col-md-12 text-center past-text">
            Отминали
        </div>
        @forelse($pastCourses as $course)
            <div class="col-md-6">
                <div class="event-title col-md-12 title-signed">{{$course->name}}</div>
                <div class="event-body col-md-12">
                  <a href="{{route('lecturer.show.course',['course' => $course->id])}}">
                    <div class="event-body-text button-signed">
                      виж
                    </div>
                  </a>
                  @if(!is_null($course->picture) || !empty($course->picture))
                      <img src="{{asset('/images/course-'.$course->id.'/'.$course->picture)}}" alt="">
                  @else
                      <img src="{{asset('/images/img-placeholder.jpg')}}" alt="no photo">
                  @endif
                </div>
                <div class="event-footer col-md-12 d-flex flex-row flex-wrap footer-signed">
                  <div class="col-md-6">{{$course->visibility}}</div>
                  <div class="col-md-6">{{$course->starts->format('Y-m-d')}} / {{$course->ends->format('Y-m-d')}}</div>
                </div>
            </div>
        @empty
            няма курсове
        @endforelse
    </div>
    </div>
</div>
@endsection

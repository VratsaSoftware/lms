@extends('layouts.template')
@section('title', 'Създай Сертификати')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('/images/vso-png.png')}}" />

    <!-- facebook -->
    <meta property="og:url" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Враца Софтуер Общество" />
    <meta property="og:description" content="Развиваме дигитална индустрия във Враца" />
    <meta property="og:image" content="{{asset('/images/vso-logo-bg-original.png')}}" />
    <meta name="Description" content="Author: VSC 2018">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #mySidenav {
            display: none;
        }
    </style>
</head>

<body style="opacity:0">
<!-- JQuery -->
<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>

<link rel="stylesheet" href="{{asset('css/applications.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

<div class="col-md-12 d-flex flex-row flex-wrap text-center justify-content-center lvl-title filter-apps">
    <div class="navbar col-md-12 d-flex flex-row flex-wrap text-right">
        <div class="col-md-3"></div>
        <div class="col-md-3 text-left menu-title">@yield('title')</div>
        <div class="col-md-6 text-right top-icons">
            @if(Auth::user())
                <button><a href="{{ url('myProfile') }}">Начало</a></button>
                <span class="badge-notify"></span>
            @endif
        </div>
    </div>

    <div class="col-md-12 d-flex flex-row flex-wrap text-center justify-content-center lvl-title">
        <div class="col-md-12 text-center">Филтър Курс</div>
        @foreach($courses as $course)
            <div class="col-md-3 text-center">
                <a href="{{route('course.cert.create',$course->id)}}" class="filter-courses-link">
                    @if(request()->course == $course->id)
                        <div class="col-md-12 course-wrap-filter selected-filter">
                    @else
                        <div class="col-md-12 course-wrap-filter">
                    @endif
                        {{$course->name}}
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="col-md-12 lvl-title text-center">
        <div class="col-md-12">Курсисти</div>
    </div>
<div class="col-md-12 d-flex flex-row flex-wrap text-center all-students-pool" style="margin-top:10vw;">
@forelse ($users as $user)
    <!--  one student -->
    @if($user->certificated)
        <div class="col-md-3 d-flex flex-row flex-wrap one-student-holder added-student" id="user-{{$user->id}}" data-url="{{route('certificate.preview',$user->id)}}">
            <div class="col-md-12 add-student text-right">
                <a href="{{route('certificate.preview',$user->id)}}" class="open-cert">Виж</a>
            </div>
    @else
        <div class="col-md-3 d-flex flex-row flex-wrap one-student-holder" id="user-{{$user->id}}" data-url="{{route('certificate.preview',$user->id)}}">
    @endif
            <div class="col-md-12">
                @if($user->picture)
                    <img src="{{asset('images/user-pics/'.$user->picture)}}" alt="student-pic" class="img-fluid one-student-pic">
                @else
                    @if($user->sex != 'female')
                        <img src="{{asset('images/men-no-avatar.png')}}" alt="profile-pic" class="profile-pic">
                    @else
                        <img src="{{asset('images/women-no-avatar.png')}}" alt="profile-pic" class="profile-pic">
                    @endif
                @endif
            </div>
            <span class="edit-lection-students-pool col-md-12">
                {{$user->name}}

                {{$user->last_name}}
            </span>
            <div class="col-md-6 edit-lection-students-pool">
                {{$user->email}}
            </div>
            <div class="col-md-6 edit-lection-students-pool">
                <img src="{{asset('/images/profile/location-icon.png')}}" alt="map-icon">
                <span class="location">
                    {{$user->location}}
                </span>
            </div>
            <div class="col-md-11 flex-row flex-wrap student-options">
                <div class="col-md-6 add-student text-right">
                    <img src="{{asset('/images/profile/add-icon.png')}}" width="26px" class="add-student" data="{{$user->id}}">
                </div>
                <div class="col-md-6 remove-student text-left">
                    <img src="{{asset('/images/profile/remove-icon.png')}}" width="26px" class="remove-student" data="{{$user->id}}">
                </div>
            </div>
        </div>
        <!-- end of one student -->
    @empty
        <p>
            Няма потребители!
        </p>
    @endforelse
</div>

    <div class="col-md-12 d-flex flex-row flex-wrap add-lecture text-center">
        <div class="col-md-12">
            <a href="#" data-users="" id="second_step" data-url="{{route('users.modules')}}">
                <img src="{{asset('/images/profile/add-icon.png')}}" alt="add-icon" class="img-fluid">Продължи
            </a>
        </div>
    </div>
    <div class="col-md-12 cert-holder">

    </div>
{{--    <script src="{{asset('/js/level-add-students.js')}}"></script>--}}
    <script>
        $(function(){
            $('.student-options').css('display','block');
        });
    </script>
    <script>
        var users = [];
        $( '.add-student > img' ).on('click',function(){
            $( this ).parent().parent().parent().removeClass( 'removed-student' ).addClass( 'added-student' );
           users.push(parseInt($(this).attr('data')));
           $('#second_step').attr('data-users',users);
        });

        $( '.remove-student > img' ).on('click',function(){
            $( this ).parent().parent().parent().removeClass( 'added-student' );
            $(this).parent().parent().parent().removeClass('removed-student');
            var userId = parseInt($(this).attr('data'));
            users = users.filter(function(elem){
                return elem != userId;
            });
            $('#second_step').attr('data-users',users);
            $('.cert-holder').html(' ');
        });

        $('#second_step').on('click',function(e){
            e.preventDefault();
            var url = $(this).attr('data-url') + '/'+users;
            $.ajax( {
                headers: {
                    'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
                },
                type: "GET",
                url: url,
                success: function ( data, textStatus, xhr ) {
                    // $('#second_step').fadeOut('fast');
                    $('.cert-holder').html(' ');
                    $('.cert-holder').append(data);
                    // $.each(users,function(k,v){
                    //     var show_url = $('#user-'+v).attr('data-url');
                    //     $('#user-'+v).append('<div class="col-md-12 add-student text-right"><a href="'+show_url+'" class="open-cert">Виж</a></div>')
                    // });
                }
            } );
        });
    </script>

            <script>
                $.ajaxPrefilter(function(options, originalOptions, jqXHR) {
                    options.async = true;
                });
            </script>
            <script src="{{asset('/js/fixed-left-top-menu.js')}}"></script>
            <script src="{{asset('/js/edit-showing-pencil.js')}}"></script>
            <script src="{{asset('/js/slide-alerts.js')}}"></script>
            <!-- //preview picture before saving -->
            <script src="{{asset('/js/profile-picture-preview.js')}}" charset="utf-8" async></script>

<script type="text/javascript">
    $(function() {
        $('head').append('<link rel="stylesheet" href="{{asset('/css/bootstrap-grid.min.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/public_profile.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_profile.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_application_results.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_events.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/lecturer_profile.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/create_course.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/create_level.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/lecturer_course_options.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/lecturer_courses.css')}}" />');
    });
</script>
<script>
    $('.download-stats').on('click', function(){
        var table = 'forms';
        var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
            , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
            , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
        var table = document.getElementById(table)
        var name = 'test';
        var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
        window.location.href = uri + base64(format(template, ctx))
    });
</script>

</html>

@section('head')
    <link href="{{ asset('css/lection/lection.css') }}" rel="stylesheet" />
@endsection

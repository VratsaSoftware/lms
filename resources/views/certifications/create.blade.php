@extends('layouts.template')
@section('title', 'Създай Сертификати')
@section('content')
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
@endsection
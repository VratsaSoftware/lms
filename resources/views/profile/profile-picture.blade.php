<!--@if(!isset($user->picture) && $user->sex != 'male')-->
<!--    <img src="{{ asset('images/women-no-avatar.png') }}" alt="profile-pic" style="{!! $style !!}" class="avatar {!! isset($class) ? $class : '' !!}">-->
<!--@elseif(!isset($user->picture) && $user->sex != 'female')-->
<!--    <img src="{{ asset('images/men-no-avatar.png') }}" alt="profile-pic" style="{!! $style !!}" class="avatar {!! isset($class) ? $class : '' !!}">-->
<!--@else-->
<!--    <img src="{{ asset('images/user-pics/' . $user->picture) }}" alt="profile-pic" style="{!! $style !!}" class="avatar {!! isset($class) ? $class : '' !!}">-->
<!--@endif-->

@if(!isset($user->picture))
    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }} {{ Auth::user()->last_name }}&color=7F9CF5&background=random" alt="profile-pic" style="{!! $style !!}" class="avatar {!! isset($class) ? $class : '' !!}">
@else
    <img src="{{ asset('images/user-pics/' . $user->picture) }}" alt="profile-pic" style="{!! $style !!}" class="avatar {!! isset($class) ? $class : '' !!}">
@endif

<!-- https://ui-avatars.com/api/?name=Admin&color=7F9CF5&background=random -->
<!-- <img src="https://ui-avatars.com/api/?name=Admin&color=7F9CF5&background=random" class="avatar {!! isset($class) ? $class : '' !!}"> -->

<div class="left-navigation">
    <ul class="nav navbar-nav sidenav" id="user-nav">
        <li>
            @if(!isset(Auth::user()->picture) && Auth::user()->sex != 'male')
                <img src="{{asset('images/women-no-avatar.png')}}" alt="profile-pic" class="profile-pic">
                @elseif(!isset(Auth::user()->picture) && Auth::user()->sex != 'female')
                    <img src="{{asset('images/men-no-avatar.png')}}" alt="profile-pic" class="profile-pic">
                    @else
                    <img src="{{asset('images/user-pics/'.Auth::user()->picture)}}" alt="profile-pic" class="profile-pic">
                    @endif
                    {{Auth::user()->name}}<i class="fas fa-chevron-down"></i>
        </li>
        <li class="{{ Route::is('myProfile') ? 'sidenav-selected' : '' }}"><a href="{{route('myProfile')}}">
                <img src="{{asset('/images/profile/nav/my-profile-icon.png')}}" alt="" class="img-fluid">Моят Профил</a>
        </li>
        <li><a href="{{route('application.index')}}">
                <img src="{{asset('/images/profile/nav/results-icon.png')}}" alt="" class="img-fluid">Кандидастване</a>
        </li>
        <li class="nested-nav {{ Route::is('user.course') ? 'sidenav-selected' : '' }}">
            <a href="#" id="my-courses"><i class="fas fa-chevron-down"></i>Моите курсове</a>
            <ul>
                @forelse(Auth::user()->studentGetCourse() as $course)
                    <li><a href="{{ route('user.course',['user' => Auth::user()->id,'course' => $course->id])}}"><img src="{{asset('/images/course-'.$course->id.'/'.$course->picture)}}" alt="">{{strlen($course->name) < 10 ? $course->name : mb_substr($course->name, 0, 10)."..."}}</a></li>
                    @empty
                    <li><a href="#" class="disabled"><img src="{{asset('/images/profile/remove-icon.png')}}" alt="">Нямате записани Курсове</a></li>
                    @endforelse
            </ul>
        </li>
        <li class="nested-nav">
            <a href="{{route('users.events')}}">
                <img src="{{asset('/images/profile/nav/events-icon.png')}}" alt="" class="img-fluid">Събития
                @if(isset($isInvited) && $isInvited)
                    <i class="fas fa-bell"></i>
                @endif
            </a>
        </li>
        <li>
            <a id="logout-btn" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt fa-1x"></i>
                {{ __('Излизане') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>

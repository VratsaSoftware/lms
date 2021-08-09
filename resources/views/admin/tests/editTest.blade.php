@extends('layouts.template')
@section('title', 'Създай Тест')
@section('content')
    <div class="content-wrap">
        <div class="section">
            <div class="col-md-12 d-flex flex-row flex-wrap">
                @if (!empty(Session::get('success')))
                    <div class="alert alert-success slide-on">
                        <p>{{ session('success') }}</p>
                    </div>
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
                    <div class="alert alert-danger slide-on">
                        <button type="button" class="close" data-dismiss="alert">
                        </button>
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <form action="{{route('test.update',$test->id)}}" method="POST" class="col-md-12" id="create_test"
                      name="create_test">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
                        <div class="col-md-12 text-center">
                            <p>
                                <label for="name">Заглавие</label><br>
                                <input type="text" id="title" name="title" placeholder="..." class="name-course"
                                       value="{{$test->title}}">
                            </p>
                            <p>
                                <label for="starts">Започва</label>
                                <input type="date" name="start_at" id="start_at" value="{{$test->start_at->format('Y-m-d')}}">
                            </p>
                            <p>
                                <label for="ends">Свършва</label>
                                <input type="date" name="expire_at" id="expire_at" value="{{$test->expire_at->format('Y-m-d')}}">
                            </p>
                            <label for="course-name">Продължителност</label>
                            <div class="col-md-12 level-options d-flex flex-row flex-wrap">
                                <!--    one option -->
                                <div class="col-md-4 options-title">часове</div>
                                <div class="col-md-8 options-options d-flex flex-row flex-wrap">
                                    <div class="col-md-10 slidecontainer">
                                        <input type="range" min="0" max="12" value="{{$test->duration->format('H')}}" name="hours" class="option1" id="option1" data-type="ч.">
                                        <!-- <div class="option1-color"></div> -->
                                    </div>
                                    <div class="col-md-2 text-center val-holder">
                                        <span id="option1-val1"></span>
                                    </div>
                                </div>
                                <!--  end of one option -->
                                <!--    one option -->
                                <div class="col-md-4 options-title">минути</div>
                                <div class="col-md-8 options-options d-flex flex-row flex-wrap">
                                    <div class="col-md-10 slidecontainer">
                                        <input type="range" min="0" max="59" value="{{$test->duration->format('i')}}" name="minutes" class="option2" id="option2" data-type="мин.">
                                        <!-- <div class="option2-color"></div> -->
                                    </div>
                                    <div class="col-md-2 text-center val-holder">
                                        <span id="option2-val2"></span>
                                    </div>
                                </div>
                                <!--  end of one option -->
                            </div>
                            </p>
                            <p>
                                <label for="bank">Банка с въпроси : </label>
                                <br/>
                                <select name="bank_id" id="bank_id" class="section-el-bold">
                                    @foreach($banks as $bank)
                                        <option value="{{$bank->id}}" {{$bank->id == $test->bank[0]->id?'selected':''}}>{{$bank->name}}</option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
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
    <div class="col-md-12 lvl-title text-center">
        <div class="col-md-12">Кандидадствали</div>
        <br/>
    </div>

    <div class="col-md-12 d-flex flex-row flex-wrap text-center all-students-pool">
    @forelse ($candidates as $user)
        <!--  one student -->
            <div class="col-md-3 d-flex flex-row flex-wrap one-student-holder">
                <div class="col-md-12">
                    @if($user->picture)
                        <img src="{{asset('images/user-pics/'.$user->picture)}}" alt="student-pic"
                             class="img-fluid one-student-pic">
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
                        <img src="{{asset('/images/profile/add-icon.png')}}" width="26px" class="add-student"
                             data="{{$user->id}}">
                    </div>
                    <div class="col-md-6 remove-student text-left">
                        <img src="{{asset('/images/profile/remove-icon.png')}}" width="26px" class="remove-student"
                             data="{{$user->id}}">
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
    {{-- students add section --}}
    <div class="col-md-12 lvl-title text-center">
        <div class="col-md-12">Записани</div>
        <br/>
        <div class="col-md-12">
            <label for="mail-search">Добави по мейл:</label>
            <form class="add-by-mail-form" action="{{route('test.add.student')}}" method="POST" name="addStudent"
                  id="addStudent">
                {{ csrf_field() }}
                <input type="email" placeholder="test@test.com" size="30" title="Must be a valid email address"
                       name="mail"/>
                <input type="hidden" name="test_id" value="{{$test->id}}">
                <img src="{{asset('/images/profile/add-icon.png')}}" alt="add" class="img-fluid add-by-mail">
            </form>
        </div>
    </div>
    <div class="col-md-12 d-flex flex-row flex-wrap text-center all-students-pool" id="assigned">
    @forelse ($test->Users as $user)
        <!--  one student -->
            <div class="col-md-3 d-flex flex-row flex-wrap one-student-holder">
                <div class="col-md-12">
                    @if($user->picture)
                        <img src="{{asset('images/user-pics/'.$user->picture)}}" alt="student-pic"
                             class="img-fluid one-student-pic">
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

                    </div>
                    <div class="col-md-6 remove-student text-left" data-test="{{$test->id}}" data-url="{{route('test.remove.student')}}">
                        <img src="{{asset('/images/profile/remove-icon.png')}}" width="26px" class="remove-student ajax" data="{{$user->id}}">
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

    <div class="col-md-12 create-course-button text-center create-module-btn">
        <a href="#" onclick="javascript:$('#create_test').submit()" class="create-course-btn"><span
                    class="create-course">Редактирай</span></a>
    </div>
    </form>
    {{-- end of students add section --}}
    <script src="{{asset('/js/create-level-sliders.js')}}"></script>
    <script src="{{asset('/js/level-add-students.js')}}"></script>
    <script src="{{asset('/js/level-options.js')}}"></script>
    <script src="{{asset('/js/criteria-edit-lvl.js')}}"></script>
    <script>
        $(function(){
            var addedStudents = $('.hidden-users-ids').html();
            $('#create_test').append(addedStudents);
        });
    </script>
@endsection

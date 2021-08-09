@extends('layouts.template')
@section('title', 'Създай Модул/Ниво')
@section('content')
<div class="content-wrap">
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
            <form action="{{route('module.store')}}" method="POST" class="col-md-12" id="create_module" name="create_module" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-md-12 picture-holder text-center">
                    <label for="picture">
                        <img src="{{asset('/images/img-placeholder.jpg')}}" alt="course-pic" id="course-picture">
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
                    <input type="text" id="name" name="name" placeholder="..." class="name-course" value="{{old('name')}}">
                </p>
                <p>
                    <label for="description">Описание</label><br>
                    <textarea id="description" cols="30" rows="5" name="description" placeholder="кратко описание" style="resize: none;">{{old('description')}}</textarea>
                </p>
                <p>
                    <label for="starts">Започва</label>
                    <input type="date" name="starts" id="starts" value="{{old('starts')}}">
                </p>
                <p>
                    <label for="ends">Свършва</label>
                    <input type="date" name="ends" id="ends" value="{{old('ends')}}">
                </p>
                <p>
                    <label for="course-name">Курс</label>
                    <span class="exist-course-name">{{$course->name}}</span><br />
                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                    <span>Модули</span><br />
                    @if(!$modules->isEmpty())
                        @foreach ($modules as $module)
                        <span>поредност : <span class="exist-module-order">{{$module->order}}</span><br />
                            име: <span class="exist-module-name">{{$module->name}}</span><br />
                            @if($loop->last)
                                <?php $nextOrder = ($module->order +1 ); ?>
                            @endif
                        @endforeach
                    @else
                    <span class="no-exist-modules">Все още няма модули за този курс</span>
                    @endif
                </p>
                <p>
                    <label for="order">Поредност на модула</label>

                    @if($modules->isEmpty())
                        <input type="number" name="order_disabled" id="order_disabled" value="1" disabled class="section-el-bold">
                        <input type="number" name="order" id="order" value="1" style="display:none">
                        @else
                        <input type="number" name="order" id="order" value="{{$nextOrder}}" class="section-el-bold" min="{{$nextOrder}}">
                        @endif
                </p>
                <p>
                    <label for="visibility">Видимост на модула/нивото</label>
                    <select class="course-visibility section-el-bold" name="visibility" id="visibility">
                        @foreach(Config::get('courseVisibility') as $visibility)
                        <option value="{{strtolower($visibility)}}">{{ucfirst($visibility)}}</option>
                        @endforeach
                    </select>
                </p>
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
    {{-- students add section --}}
    <div class="col-md-12 lvl-title text-center">
        <div class="col-md-12">Кандидаствали</div>
    </div>
    <div class="col-md-12 d-flex flex-row flex-wrap text-center all-students-pool">
        @forelse ($candidates as $user)
        <!--  one student -->
        <div class="col-md-3 d-flex flex-row flex-wrap one-student-holder">
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

<div class="col-md-12 lvl-title text-center">
    <div class="col-md-12">Всички потребители</div>
</div>
<div class="col-md-12 d-flex flex-row flex-wrap text-center all-students-pool">
@forelse ($users as $user)
    <!--  one student -->
        <div class="col-md-3 d-flex flex-row flex-wrap one-student-holder">
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

    <div class="col-md-12 lvl-title text-center">Брой на това ниво</div>
    <div class="col-md-12">
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                <span class="num-students-now">0</span>
            </div>
        </div>
    </div>
    <div class="col-md-12 create-course-button text-center create-module-btn">
        <a href="#" onclick="javascript:$('#create_module').submit()" class="create-course-btn"><span class="create-course">Създай</span></a>
    </div>
    </form>
    {{-- end of students add section --}}
    <script src="{{asset('/js/create-level-sliders.js')}}"></script>
    <script src="{{asset('/js/level-add-students.js')}}"></script>
    <script src="{{asset('/js/criteria-edit-lvl.js')}}"></script>
    @endsection

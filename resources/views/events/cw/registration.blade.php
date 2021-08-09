@extends('layouts.template')
@section('title', 'Регистрация за CodeWeek')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <div class="content-wrap">
        <div class="section">
            <div class="col-md-12 d-flex flex-row flex-wrap">
                <div class="col-md-12 create-team-rules" style="margin-top:16vw">
                    @if(!isset($for_link) || !$for_link)
                        <p>Описание: {!!$event->description!!} </p>
                        <p>Правила: {!!$event->rules!!} </p>
                    @else
                        <p>Благодарим ви, че участвахте в CodeWeek Враца {{Carbon\Carbon::now()->format('Y')}}</p>
                    @endif
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger alert-on-course slide-on">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(!isset($for_link) || !$for_link)

                    <div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
                        <div class="col-md-12 text-center">
                            <p>
                                @if(!is_null($user))
                                    <label for="">Част от информацията е взета от профила ви</label>
                                @else
                                    <label for="">След кандидастването, автоматично ще ви бъде нарпавена регистрация в платформата, и ще бъдете пренасочени към екран за задаване на парола</label>
                                    <label for="">Ако имате акаунт в платформата, влезте в него за да се попълни част от информацията <br>
                                        <a href="{{route('logged.cw.register',$event->id)}}"><button class="btn btn-outline-success">ВХОД</button></a>
                                    </label>
                                @endif
                            </p>
                            <form action="{{route('events.cw.form',['event' => $event->id])}}" method="POST" class="col-md-12"
                                  id="cw-reg" name="cw-reg">
                                {{ csrf_field() }}
                            <p>
                                @if(is_null($user) || is_null($user->name) && empty($user->name))
                                    <label for="username">Име <span class="req-star-form">*</span></label>
                                    <input type="text" name="username" class="small-field-register" value="{{old('username')}}"><br/>
                                @endif

                                @if(is_null($user) || is_null($user->last_name) && empty($user->last_name))
                                    <label for="userlastname">Фамилия <span class="req-star-form">*</span></label>
                                    <input type="text" name="lastname" class="small-field-register" value="{{old('lastname')}}"><br/>
                                @endif
                                <label for="useremail">Е-Mail <span class="req-star-form">*</span></label>
                                <input type="text" name="useremail" value="{{is_null($user)?old('useremail'):$user->email}}" {{!is_null($user)??disabled}}
                                       class="small-field-register">
                                @if(is_null($user) || is_null($user->dob))
                                    <label for="userage">Възраст <span class="req-star-form">*</span></label>
                                    <input type="text" name="userage" value="{{old('userage')}}" placeholder="въведете години..."
                                           class="small-field-register">
                                @endif
                                @if(is_null($user))
                                    <label for="location">Населено място <span class="req-star-form">*</span></label>
                                    <select id="location" name="location" class="section-el-bold">

                                    </select>
                                    <br/>
                                    <label for="sex">Пол <span class="req-star-form">*</span></label>
                                    <select name="sex" id="sex" class="section-el-bold">
                                        <option value="0" {{old('sex')?'':'selected'}} disabled>---</option>
                                        <option value="male" {{old('days') == 'male'?'selected':''}}>Мъж</option>
                                        <option value="female" {{old('days') == 'female'?'selected':''}}>Жена</option>
                                    </select>
                                @endif
                            </p>
                            <p>
                                <label for="occupation">Занимание <span class="req-star-form">*</span></label><br>
                                <select class="occupation section-el-bold" name="occupation" id="occupation">
                                    @foreach ($occupations as $occupation)
                                        @if(!is_null($user) && !is_null($user->cl_occupation_id) && $user->cl_occupation_id == $occupation->id)
                                            <option value="{{$occupation->id}}"
                                                    selected>{{$occupation->occupation}}</option>
                                        @else
                                            <option value="{{$occupation->id}}" {{ (old("occupation") == $occupation->id ? "selected":"") }}>{{$occupation->occupation}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </p>
                            <p>
                                <label for="visited">Участвали ли сте преди на CodeWeek? <span class="req-star-form">*</span></label>
                                <select name="visited" id="visited" class="section-el-bold">
                                    <option value="0" {{old('visited')?'':'selected'}} disabled>---</option>
                                    <option value="да" {{old('visited') == 'да'?'selected':''}}>да</option>
                                    <option value="не" {{old('visited') == 'не'?'selected':''}}>не</option>
                                </select>
                            </p>
                            <p>
                                <label for="days">Искате ли да участвате в съзтезанията <span class="req-star-form">*</span></label>
                                <br/>
                                <select name="days" class="section-el-bold {{old('days')?'show':''}}" id="days">
                                    <option value="null" {{old('days')?'':'selected'}} disabled>--</option>
                                    <option value="1" {{old('days') == '1'?'selected':''}}>да</option>
                                    <option value="0" {{old('days') == '0'?'selected':''}}>не</option>
                                </select>
                            </p>
                            <p id="cat-wrapp">
                                <label for="categories">Категория <span class="req-star-form">*</span></label>
                                <br/>
                                <select class="section-el-bold js-example-basic-single" name="categories" id="categories" style="width:100%">
                                    @foreach(Config::get('cwCategories') as $category)
                                        @if (old('categories'))
                                            @if ($category == old('categories')))
                                                <option value="{{ $category }}" selected>{{ $category }}</option>
                                            @else
                                                <option value="{{ $category }}">{{ $category }}</option>
                                            @endif
                                        @else
                                            <option value="{{ $category }}">{{ $category }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12 create-course-button text-center">
                        <a href="#" onclick="javascript:$('#cw-reg').submit()" class="create-course-btn"><span
                                    class="create-course">Регистрирай</span></a>
                    </div>
                </form>
                @else
                    <form action="{{route('events.cw.form',['event' => $event->id])}}" method="POST" class="col-md-12"
                          id="cw-link" name="cw-reg-link">
                    {{ csrf_field() }}
                        <div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
                            <div class="col-md-12 text-center">
                                <p>
                                    <label for="link">линк към проекта <span class="req-star-form">*</span></label>
                                    <br/>
                                    <input type="text" name="link" id="link" value="{{$the_link?$the_link:''}}">
                                </p>
                                <div class="col-md-12 create-course-button text-center">
                                    <a href="#" onclick="javascript:$('#cw-link').submit()" class="create-course-btn"><span
                                                class="create-course">Изпрати</span></a>
                                </div>
                                <div class="col-md-12 create-course-button text-center">
                                    <a href="{{route('users.events')}}" class="create-course-btn"><span
                                                class="create-course">Назад</span></a>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                closeOnSelect: false
            });
        });
    </script>
    <script>
        $(function(){
            if(!$('#days').hasClass('show')){
                $('#cat-wrapp').hide();
            }
        });

        $('#days').change(function () {
            var selected = this.value;
            if(this.value == 1 || this.value == '1'){
                $('#cat-wrapp').stop(true, true).fadeIn().show();
            }else{
                $('#cat-wrapp').stop(true, true).fadeOut().hide();
            }
        });
    </script>
    <script>
        $(function(){
            var cities = {
                "0":"Враца",
                "1":"Борован",
                "2":"Бяла Слатина",
                "3":"Козлодуй",
                "4":"Криводол",
                "5":"Мездра",
                "6":"Мизия",
                "7":"Оряхово",
                "8":"Роман",
                "9":"Хайредин",
                "10": "Друго"
            };
            var options = [];
            $.each( cities, function( key, val ) {
                options.push( "<option value='"+val+"'>" + val + "</option>" );
            });
            $('#location').append(options);
        })
    </script>
@endsection

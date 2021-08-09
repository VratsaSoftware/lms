@extends('layouts.template')
@section('title', 'Регистрация на отбор')
@section('content')
    <div class="content-wrap">
        <div class="section">
            <div class="col-md-12 d-flex flex-row flex-wrap">
                <div class="col-md-12 create-team-rules">
                    {!!$event->description!!}
                    <br/>
                    {!!$event->rules!!}
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
                <div class="col-md-12 text-center picture-title">
                    Лого на Екипа
                </div>
                <form action="{{route('events.store.team',['event' => $event->id])}}" method="POST" class="col-md-12" id="register_team" name="register_team" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="col-md-12 picture-holder text-center">
                    <label for="picture">
                        <img src="{{asset('/images/img-placeholder.jpg')}}" alt="course-pic" id="course-picture">
                        <br>
                    </label>
                </div>

                <div class="col-md-12 picture-button text-center">
                    <label class="picture-label" for="team_picture"><span class="upload-pic">качи<input type="file" id="team_picture" name="team_picture" onChange="CourseimagePreview(this);"></span></label>
                </div>

                <div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
                    <div class="col-md-12 text-center">
                        <p>
                            <label for="name">Име на Екип</label><br>
                            <input type="text" id="name" name="name" placeholder="..." class="name-course" value="{{old('name')}}">
                        </p>
                        <p>
                            <label for="team_category">Категория</label><br>
                            <select class="team_category section-el-bold" name="team_category" id="team_category">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach
                            </select>
                        </p>
                        <p>
                            <label for="technologyStack">Технологии</label><br>
                            <select class="technologyStack section-el-bold" name="technologyStack" id="technologyStack">
                                @foreach ($stacks as $stack)
                                    <option value="{{$stack}}">{{$stack}}</option>
                                @endforeach
                            </select>
                        </p>
                        <p>
                            <label for="git">Github</label><br>
                            <input type="text" id="git" name="git" placeholder="на организация или член от отбора" class="name-course" value="{{old('git')}}">
                        </p>
                        <p>
                            <label for="slogan">Мото</label><br>
                            <input type="text" id="slogan" name="slogan" placeholder="мото на отбора" class="name-course" value="{{old('slogan')}}">
                        </p>
                        <p>
                            <label for="inspiration">Технология или изобретение от 21-ви век, която ви вдъхновява (по желание):</label><br>
                            <textarea id="inspiration" cols="30" rows="5" name="inspiration" placeholder="Facebook, StackOverflow, Wikipedia, Tesla..." style="resize: none;">{{old('inspiration')}}</textarea>
                        </p>
                        <p>
                            <?php $membersLeft = ($event->max_team - 1); ?>
                            <label for="team-capacity">Участници остават {{$membersLeft}}</label>
                        </p>
                        <p>
                            <label for="team-capacity">Капитан:</label><br/>
                            <label for="username">Име</label>
                            @if(!is_null($user->name) && !empty($user->name))
                                <input type="text" name="username" value="{{$user->name}}" disabled class="small-field-register"><br />
                            @else
                                <input type="text" name="username" value="" class="small-field-register"><br />
                            @endif

                            <label for="userlastname">Фамилия</label>
                            @if(!is_null($user->last_name) && !empty($user->last_name))
                                <input type="text" name="userlastname" value="{{$user->last_name}}" disabled class="small-field-register"><br/>
                            @else
                                <input type="text" name="username" value="" class="small-field-register"><br />
                            @endif
                            <label for="useremail">Е-Mail</label>
                            <input type="text" name="useremail" value="{{$user->email}}" disabled class="small-field-register">
                            <label for="useremail">Възраст</label>
                            @if(!is_null($user->dob))
                                <input type="text" name="userage" value="{{(\Carbon\Carbon::now()->format('Y') - $user->dob->format('Y'))}}" disabled class="small-field-register">
                            @else
                                <input type="text" name="userage" value="" placeholder="въведете години..." class="small-field-register">
                            @endif
                            <label for="occupation">Занимание</label><br>
                            <select class="occupation section-el-bold" name="occupation" id="occupation">
                                @foreach ($occupations as $occupation)
                                    @if(!is_null($user->cl_occupation_id) && $user->cl_occupation_id == $occupation->id)
                                        <option value="{{$occupation->id}}" selected>{{$occupation->occupation}}</option>
                                    @else
                                        <option value="{{$occupation->id}}">{{$occupation->occupation}}</option>
                                    @endif
                                @endforeach
                            </select><br>
                            <label for="shirt_size">Размер Тениска</label><br>
                            <select class="shirt_size section-el-bold" name="shirt_size" id="shirt_size">
                                @foreach ($sizes as $size)
                                    <option value="{{$size->id}}">{{$size->size}}</option>
                                @endforeach
                            </select>
                            <br />
                            <label for="">Добави Участници</label><br>
                            <p class="invite-info"><i>*за да бъде отбора валиден са нужни минимум {{$event->min_team}} участници в отбор, <br/>може да добавяте участници след като създадете отбора</i></p>
                            <p id="members-capacity" data-max="{{$membersLeft}}">
                                <a href="#" id="add-member"><img src="{{asset('/images/profile/add-icon.png')}}" alt="add-icon" class="img-fluid">добави</a>
                            </p>
                        </p>
                    </div>
                </div>
                <div class="col-md-12 create-course-button text-center">
                        <a href="#" onclick="javascript:$('#register_team').submit()" class="create-course-btn"><span class="create-course">Регистрирай</span></a>
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#add-member').on('click', function(e){
            if(!$(this).parent().prev('p').hasClass('invite-info-sub')){
                $(this).parent().prev('p').after('<p class="invite-info-sub"><i>ще им бъде изпратена покана по email и в платформата за присъединяване в отбора</i></p>');
            }
            e.preventDefault();
            if(parseInt($(this).parent().attr('data-max')) > parseInt($('.member-invite').length)){
                $(this).before('<p class="member-invite"><input type="email" name="invite_member_email[]" placeholder="въведи email" id="invite_member_email[]"/></p>')
            }else{
                $('#add-member').remove();
                $('#members-capacity').append('<i class="fas fa-times-circle"></i>максимум капацитет');
                $(this).click(false);
            }
        });
    </script>
@endsection

@extends('layouts.template')
@section('title', 'присъединяване към отбор')
@section('content')
    <div class="content-wrap">
        <div class="section">
            <div class="col-md-12 d-flex flex-row flex-wrap">
                @if ($errors->any())
                    <div class="alert alert-danger alert-on-course">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-12 create-team-rules">
                    {!!$event->description!!}
                    <br/>
                    {!!$event->rules!!}
                </div>
                <div class="col-md-12 join-team-wrapper d-flex flex-row flex-wrap">

                    <table class="table table-striped">
                      <thead>
                          <tr>
                            <th>Лого</th>
                            <th>Име на отбора</th>
                            <th>Мото</th>
                            <th>Категория</th>
                            <th>Технология</th>
                            <th>Вдъхновение</th>
                            <th>Git Hub</th>
                            <th>Участници</th>
                          </tr>
                      </thead>
                      <tbody>
                    <tr>
                      <td>
                          <img src="{{asset('/images/events/teams/'.$team->picture)}}" alt="logo" class="team-table-pic">
                      </td>
                      <td>{{$team->title}}</td>
                      <td>{{$team->slogan}}</td>
                      <td>{{$team->Category->category}}</td>
                      <td>{{$team->technology_stack}}</td>
                      <td>{{$team->inspiration}}</td>
                      <td style="color:#1B8500"><a href="{{$team->github}}" target="_blank">{{$team->github}}</a></td>
                      <td>
                          @foreach($team->Members as $member)
                            <p>
                                <span>
                                    @if(!is_null($member->User))
                                      {{$member->User->name}} {{$member->User->last_name}}  <br/>
                                  @endif
                                </span>
                            </p>
                          @endforeach
                      </td>
                    </tr>
                </tbody>
            </table>
        </div>
                <form action="{{route('team.confirm.invite',['event' => $event->id,'team' => $team->id,'teamMember' => $teamMember])}}" method="POST" class="col-md-12" id="join_team" name="join_team" enctype="multipart/form-data">
                    {{ csrf_field() }}


                <div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
                    <div class="col-md-12 text-center">
                        <p>
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
                            <label for="userage">Възраст</label>
                            @if(!is_null($user->dob))
                                <input type="text" name="userage" value="{{(\Carbon\Carbon::now()->format('Y') - $user->dob->format('Y'))}}" disabled class="small-field-register">
                                <input type="hidden" name="userage" value="{{(\Carbon\Carbon::now()->format('Y') - $user->dob->format('Y'))}}">
                            @else
                                <input type="text" name="userage" value="{{old('userage')}}" placeholder="въведете години..." class="small-field-register">
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
                        </p>
                    </div>
                </div>
                <div class="col-md-12 create-course-button text-center">
                        <a href="#" onclick="javascript:$('#join_team').submit()" class="create-course-btn"><span class="create-course">Потвърди</span></a>
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>
@endsection

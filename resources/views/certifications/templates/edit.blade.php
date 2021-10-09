@foreach($data as $userId => $info)
    <style>
        .form-wrap{
            font-family: Ubuntu;
            margin-bottom: 5vw;
            border: 1px solid #000;
            padding: 2%;
        }
        .info-box{
            font-weight: bolder;
        }

        .response-ok{
            background-color: #5cb85c;
        }

        .response-failled{
            background-color: #d9534f;
        }
    </style>
    <div class="col-md-12 d-flex flex-row flex-wrap form-wrap">
        <form action="{{route('certification.store')}}" method="POST" class="col-md-12" id="create_cert_{{$userId}}"
              name="create_module" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{$userId}}">
            <input type="hidden" name="course_id" value="{{$info['course_id']}}">
            <div class="col-md-12 info-box">
                <p class="text-center">Курсист - {{$info['user']->name}} {{$info['user']->last_name}}</p>
                <p class="text-center">Курс - {{$info['course']}}</p>
            </div>
            <div class="col-md-12 d-flex flex-row flex-wrap">
                <div class="col-md-6">
                    <label for="color">Цвят</label><br>
                    <input type="text" id="color" name="color" placeholder="#d3d3d3" class=""
                           value="#d3d3d3">
                </div>

                <div class="col-md-6">
                    <label for="number">Номер</label><br>
                    <input type="text" id="number" name="number" placeholder="{{$info['number']}}" class="section-el-bold"
                           value="{{$info['number']}}">
                </div>

{{--                <div class="col-md-6">--}}
{{--                    <label for="">Изображение от ляво</label><br/>--}}
{{--                    качи<input type="file" id="imageLeft" name="imageLeft">--}}
{{--                </div>--}}

{{--                <div class="col-md-6">--}}
{{--                    <label for="">Изображение от дясно</label><br/>--}}
{{--                    качи<input type="file" id="imageRight" name="imageRight">--}}
{{--                </div>--}}

                <div class="col-md-6">
                    <label for="title">Заглавие</label><br>
                    <input type="text" id="title" name="title" placeholder="Сертификат" class="section-el-bold"
                           value="Сертификат">
                </div>

                <div class="col-md-6">
                    <label for="sub_title">Под Заглавие</label><br>
                    <input type="text" id="sub_title" name="sub_title" placeholder="за успешно завършено обучение по" class="section-el-bold"
                           value="за успешно завършено обучение по">
                </div>

                <div class="col-md-6">
                    <label for="">Модули</label><br/>
                    @foreach($info['modules'] as $module)
                        <input type="checkbox" name="modules[]" id="module-{{$module->id}}" value="{{$module->name}}">&nbsp;<label for="module-{{$module->id}}">{{$module->name}}</label>&nbsp;&nbsp;
                    @endforeach
                </div>

                <div class="col-md-6">
                    <label for="username">Име и Фамилия</label><br>
                    <input type="text" id="username" name="username" placeholder="{{$info['user']->name}} {{$info['user']->last_name}}" class="section-el-bold"
                           value="{{$info['user']->name}} {{$info['user']->last_name}}">
                </div>

                <div class="col-md-6 lecturer-wrap">
                    <label for="username">Лектор</label><br>
                    <select name="lecturer" id="lecturer" class="section-el-bold">
                        <option value="0" selected>-</option>
                        @foreach($lecturers as $lecturer)
                            <option value="{{$lecturer->User->name}} {{$lecturer->User->last_name}}">{{$lecturer->User->name}} {{$lecturer->User->last_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 date-wrap">
                    <label for="date">Дата</label><br/>
                    <input type="date" name="date" id="date" value="{{Carbon\Carbon::now()->format('Y-m-d')}}">
                </div>

                <div class="col-md-12">
                    <label for="">Центрирано лого</label><br/>
                    <input type="radio" name="center_logo" id="center_false" value=0 checked="checked"><label for="center_false">В ляво</label>
                    <input type="radio" name="center_logo" id="center_true" value=1><label for="center_true">Центрирано</label>
                </div>

                <div class="col-md-12 text-center">
                    <input type="submit" name="submit" class="btn btn-success save_cert" value="Запази" data-id="{{$userId}}">
                </div>
            </div>
        </form>
    </div>
@endforeach


<script>
    $('.save_cert').on('click',function(e){
       e.preventDefault();
        var form = $('#create_cert_'+$(this).attr('data-id'));

        $.ajax( {
            headers: {
                'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
            },
            type: "POST",
            url: form.attr( 'action' ),
            data: form.serialize(),
            success: function( response, textStatus, xhr  ) {
                if(xhr.status == 200){
                    form.removeClass('response-failled');
                    form.addClass('response-ok');
                }
            },
            error: function (xhr, status, errorThrown) {console.log(xhr, status, errorThrown);
                form.addClass('response-failled');
            }
        } );
    });


    $('#center_true').on('click', function(){
        $(this).parent().prevAll('.date-wrap').addClass('removed-student');
        $(this).parent().prevAll('.lecturer-wrap').addClass('removed-student');
    });

    $('#center_false').on('click', function(){
        $(this).parent().prevAll('.date-wrap').removeClass('removed-student');
        $(this).parent().prevAll('.lecturer-wrap').removeClass('removed-student');
    });
</script>

<form action="{{route('polls.store')}}" method="POST" id="poll_form">
    {{ method_field('POST') }}
    {{ csrf_field() }}
    <p>
        Въпрос:
        <input type="text" name="question" id="question" value="" placeholder="въпрос....">
    </p>
    <p>
        Опции: <span id="options-count">{{2}}</span>
    <div class="row col-md-12 options-holder">

            <input type="text" name="options[1]" value="" class="text-left col-md-11" id="option-1">
            <div class="col-md-1 text-left button-del-holder" style="padding-top:3%">
                <button class="btn btn-danger remove-option" style="float:none" data-id="1"><i class="fa fa-trash" aria-hidden="true"></i>
                </button>
            </div>

            <input type="text" name="options[2]" value="" class="text-left col-md-11" id="option-2">
            <div class="col-md-1 text-left button-del-holder" style="padding-top:3%">
                <button class="btn btn-danger remove-option" style="float:none" data-id="2"><i class="fa fa-trash" aria-hidden="true"></i>
                </button>
            </div>
    </div>
    <p>
        <button class="btn btn-info" style="float:none" id="add-option"><i class="fas fa-plus"></i>
        </button>
    </p>
    <p>
        Започва:
        <input type="date" name="start_date" id="start_date" value="">
        <input type="time" name="start_time" id="start_time" value="">
    </p>

    <p>
        Свършва:
        <input type="date" name="end_date" id="end_date" value="">
        <input type="time" name="end_time" id="end_time" value="">
    </p>

    <p>
        Тип:
        <select name="type" id="type" class="section-el-bold">
                <option value="0" selected>един избор</option>
                <option value="1" >много избори</option>
        </select>
    </p>

    <p>
        Видимост:
        <select name="visibility" id="visibility" class="section-el-bold">
            @foreach(Config::get('courseVisibility') as $visibility)
                    <option value="{{strtolower($visibility)}}">{{ucfirst($visibility)}}</option>
            @endforeach
        </select>
    </p>

    </p>
    <p class="text-center">
        <button type="submit" class="btn btn-success" value="Създай" style="float:none">Създай</button>
    </p>
</form>
<script>
    $('.remove-option').on( "click", function(e) {
        var optionId = $(this).attr('data-id');
        e.preventDefault();
        $(this).parent().parent().find('#option-'+optionId).remove();
        $(this).parent().remove();
        $('#poll_form').append('<input type="hidden" name="for_delete[]" value="'+optionId+'">');
        var optionsCount = parseInt($('#options-count').text());
        $('#options-count').text(optionsCount - 1);
    });

    $('#add-option').on("click", function(e){
        e.preventDefault();
        var lastId = $('.options-holder').find('input').last().attr('id');
        var lastNum = lastId.split("-").pop();
        var nextId = parseInt(lastNum)+1;
        var input = '<input type="text" name="options['+nextId+']" value="" class="text-left col-md-11" id="option-'+nextId+'">';
        var buttonDel = $('.button-del-holder').last().clone('true');
        buttonDel.find('.remove-option').attr('data-id',nextId);
        $('.options-holder').append(input).append(buttonDel);
        var optionsCount = parseInt($('#options-count').text());
        $('#options-count').text(optionsCount + 1);
    });
</script>
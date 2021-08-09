<p class="name col-md-12">Анкета <span class="close-poll open-btn-poll" style="right:3% !important">x</span></p>
<p class="col-md-12">
    <span class="poll-question col-md-12">{{ucfirst($poll->question)}}</span> <br/>
    @if($poll->type > 0 )
        <span class="poll-type col-md-12">много избори</span>
    @else
        <span class="poll-type col-md-12">един избор</span>
@endif
<?php $voted = ($poll->VotesCount->count() > 1)?$poll->VotesCount->count():100; ?>
@foreach($poll->Options as $option)
    <?php $percent = count($option->Votes) / $voted * 100; ?>
    <p class="text-left col-md-12 poll-options-wrapper container">{{$option->option}}</p>
    <div class="progress" style="margin-bottom: 5%">
        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar"
             aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
             style="width: {{$percent}}%">{{count($option->Votes)}}</div>
    </div>
    <p>
@endforeach
    </p>
    @if(!is_null(Auth::user()->getPolls()))
        <span class="no-show is_new_poll" data-refresh="true"></span>
    @endif

    <script>
        $('.close-poll').on('click', function (e) {
            e.preventDefault();
            $('.poll-container').stop(true,true).fadeOut();
            if($('.is_new_poll').length){
                location.reload();
            }
        });
    </script>




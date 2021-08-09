@extends('layouts.template')
@section('title', 'Завършване на Тест')
@section('content')
    <link rel="stylesheet" href="{{asset('css/test_prepare.css')}}">
    <div class="content-wrap" style="margin-top:13vw">
        <div class="section">
            <div class="col-md-12 d-flex flex-row flex-wrap stats-holder">
                <div class="col-md-4 text-center">
                    Заглавие :<br/>
                    {{$score[5]['test_title']}}
                </div>
                <div class="col-md-4 text-center">
                    Започнат:<br/>
                    <strong>{{$started_at->format('d-m-Y H:i')}}</strong>
                </div>
                <div class="col-md-4 text-center">
                    Време:<br/>
                    <strong>{{$time}}</strong>
                </div>
                @if($score)
                <div class="col-md-3 text-center">Брой Въпроси:<br/><strong> {{$score[0]['questionsCount']}}</strong></div>
                <div class="col-md-3 text-center">Брой Отговорени:<br/><strong> {{$score[1]['answered']}}</strong></div>
                <div class="col-md-3 text-center">Точки верни отговори:<br/><strong> {{$score[2]['score']}}</strong></div>
                <div class="col-md-3 text-center">Максимален брой точки:<br/><strong> {{$score[3]['maxScore']}}</strong>
                </div>
                <div class="col-md-12 text-center">
                    <strong>Резултат: {{$score[2]['score']}} / {{$score[3]['maxScore']}}</strong>
                    <!-- Progress bar 4 -->
                    <div class="progress mx-auto" data-value='{{$score[4]['percentage']}}'>
                          <span class="progress-left">
                                        <span class="progress-bar border-warning"></span>
                          </span>
                        <span class="progress-right">
                        <span class="progress-bar border-warning"></span>
                        </span>
                        <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                            <div class="h2 font-weight-bold">{{$score[4]['percentage']}}<span class="small">%</span></div>
                        </div>
                    </div>
                    <!-- END -->
                </div>
                @else
                    <div class="col-md-12 text-center">
                        <strong>Резултат: 0</strong>
                        <!-- Progress bar 4 -->
                        <div class="progress mx-auto" data-value='0'>
                          <span class="progress-left">
                                        <span class="progress-bar border-warning"></span>
                          </span>
                            <span class="progress-right">
                        <span class="progress-bar border-warning"></span>
                        </span>
                            <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                <div class="h2 font-weight-bold">0<span class="small">%</span></div>
                            </div>
                        </div>
                        <!-- END -->
                    </div>
                @endif
            </div>
            <div class="col-md-12 text-center"><a href="{{route('application.index')}}">
                    <button class="btn btn-outline-success">напред</button>
                </a></div>
        </div>
    </div>
    <script>
        $(function() {

            $(".progress").each(function() {

                var value = $(this).attr('data-value');
                var left = $(this).find('.progress-left .progress-bar');
                var right = $(this).find('.progress-right .progress-bar');

                if (value > 0) {
                    if (value <= 50) {
                        right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                    } else {
                        right.css('transform', 'rotate(180deg)')
                        left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                    }
                }

            })

            function percentageToDegrees(percentage) {

                return percentage / 100 * 360

            }

        });
    </script>
@endsection
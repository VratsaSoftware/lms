<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<?php $voted = ($poll->VotesCount->count() > 1)?$poll->VotesCount->count():100; ?>
@foreach($poll->Options as $option)
    <?php $percent = count($option->Votes) / $voted * 100; ?>
    <p class="text-left poll-option-title">{{$option->option}}</p>
    <div class="progress" style="margin-bottom: 5%">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
             aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
             style="width: {{$percent}}%">{{count($option->Votes)}}</div>
    </div>
    <p>
        @if($percent > 0)
            <table class="table table-striped" id="voters-{{$option->id}}">
                <thead>
                <tr>
                    <th scope="col">Име</th>
                    <th scope="col">фамилия</th>
                    <th scope="col">email</th>
                    <th scope="col">ден-месец</th>
                    <th scope="col">час:мин</th>
                </tr>
                </thead>
                <tbody>
                @foreach($option->Votes as $vote)
                    <tr>
                        <th scope="row">{{$vote->User->name}}</th>
                        <td>{{$vote->User->last_name}}</td>
                        <td>{{$vote->User->email}}</td>
                        <td>{{$vote->created_at->format('d-m')}}</td>
                        <td>{{$vote->created_at->format('H:i')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <script>
                $('#voters-{{$option->id}}').DataTable({
                    responsive: true,
                    order: [[0, "desc"]],
                });
            </script>
        @endif
    </p>
@endforeach




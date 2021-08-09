@extends('layouts.template')
@section('title', 'Анкети')

@section('head')
    <link href="{{ asset('css/lection/lection.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="col-md-12">
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
    </div>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    <div class="section col-md-12">
        <div class="col-md-12 d-flex flex-row flex-wrap options-wrap">
            <div class="col-md-12 text-center">
                <a href="#modal">
                    <button class="btn btn-outline-info" id="create-poll" data-url="{{route('polls.create')}}">Създай</button>
                </a>
            </div>
            <table class="table" id="polls">
                <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Въпрос</th>
                    <th scope="col">Опции</th>
                    <th scope="col">Гласували</th>
                    <th scope="col">Започва</th>
                    <th scope="col">Свършва</th>
                    <th scope="col">Тип</th>
                    <th scope="col">Видимост</th>
                    <th scope="col">Гласуване</th>
                    <th scope="col">Операции</th>
                </tr>
                </thead>
                <tbody>
                @foreach($polls as $poll)
                    <tr>
                        <th scope="row">{{$poll->id}}</th>
                        <td>{{$poll->question}}</td>
                        <td>
                            <ul>
                                @foreach($poll->Options as $option)
                                    <li>{{$option->option}} ({{count($option->Votes)}})</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            {{$poll->VotesCount->count()}}
                        </td>
                        <td>{{$poll->start->format('Y-m-d H:i')}}</td>
                        @if(is_null($poll->ends))
                            <td>-</td>
                        @else
                            <td>{{$poll->ends->format('Y-m-d H:i')}}</td>
                        @endif
                        <td>
                            @if(is_null($poll->type) || $poll->type < 1)
                                един избор
                            @else
                                много избори
                            @endif
                        </td>
                        <td>{{$poll->visibility}}</td>
                        <td class="text-center">
                            <a href="#modal" class="show-votes" data-url="{{route('poll.votes',$poll->id)}}"
                               data-question="{{$poll->question}}" data-options="{{$poll->Options}}">
                                <button class="btn btn-success">Виж</button>
                            </a>
                        </td>
                        <td class="text-center">
                            <p>
                                <a href="#modal">
                                    <button class="btn btn-outline-primary edit-poll" data-url="{{route('polls.edit',$poll->id)}}">Промени</button>
                                </a>
                            </p>
                            <form action="{{ route('polls.destroy',$poll->id) }}" method="POST" onsubmit="return ConfirmDelete()" id="delete-edu">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger" value="DELETE"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- modal for adding elements -->
        <div id="modal" style="position:absolute">
            <div class="modal-content print-body">
                <div class="modal-header">
                    <h2 class="question-title"></h2>
                </div>
                <div class="copy text-center">
                    <p id="modal-content-holder">

                    </p>
                </div>
                <div class="cf footer">
                    <div class="button-div"></div>
                    <a href="#close" class="btn close-modal">Затвори</a>
                </div>
            </div>
            <div class="overlay"></div>
        </div>
        <!-- end of modal -->

        <script>
            $(document).ready(function () {
                $('#polls').DataTable({
                    responsive: true,
                    order: [[0, "desc"]],
                });
            });
        </script>

        <script>
            $('.show-votes').on('click', function () {
                $('#modal-content-holder').html(' ');
                $('.question-title').text(' ')
                var url = $(this).attr('data-url');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "GET",
                    url: url,
                    success: function (data, textStatus, xhr) {
                        if (xhr.status == 200) {
                            $('.question-title').text($('.show-votes').attr('data-question'));
                            $('#modal-content-holder').html(data);
                            $('#modal').show();
                        } else {
                            alert('something wrong with the request...');
                        }
                    }
                });
            });
        </script>

        <script>
            $('.edit-poll').on('click', function () {
                console.log('asdasd');
                $('#modal-content-holder').html(' ');
                $('.question-title').text(' ')
                var url = $(this).attr('data-url');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "GET",
                    url: url,
                    success: function (data, textStatus, xhr) {
                        if (xhr.status == 200) {
                            $('.question-title').text('Създаване на анкета');
                            $('#modal-content-holder').html(data);
                            // $('.cf').find('.button-div').html('<button type="submit" class="btn btn-success" value="Промени">Промени</button>');
                            $('#modal').show();
                        } else {
                            alert('something wrong with the request...');
                        }
                    }
                });
            });
        </script>

        <script>
            $('#create-poll').on('click', function (e) {
                $('#modal-content-holder').html(' ');
                $('.question-title').text(' ')
                var url = $(this).attr('data-url');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "GET",
                    url: url,
                    success: function (data, textStatus, xhr) {
                        if (xhr.status == 200) {
                            $('.question-title').text('Промяна на анкета');
                            $('#modal-content-holder').html(data);
                            // $('.cf').find('.button-div').html('<button type="submit" class="btn btn-success" value="Промени">Промени</button>');
                            $('#modal').show();
                        } else {
                            alert('something wrong with the request...');
                        }
                    }
                });
            });
        </script>

        <script>
            function ConfirmDelete() {
                var x = confirm("Сигурни ли сте че искате да изтриете АНКЕТАТА с всичката информация?");
                if (x)
                    return true;
                else
                    return false;
            }
        </script>
@endsection

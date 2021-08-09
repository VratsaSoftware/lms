@extends('layouts.template')
@section('title', 'Admin Кандидаствания')
@section('content')
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    @if (!empty(Session::get('success')))
        <div class="alert alert-success slide-on" style="margin-top:-54px!important">
            <p>{{ session('success') }}</p>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger slide-on" style="margin-top:-54px!important">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="section col-md-12">
        <div class="col-md-12 d-flex flex-row flex-wrap options-wrap table-for-download">
            <table class="table" id="forms">
                <thead>
                <tr>
                    <th scope="col">Потребител ID</th>
                    <th scope="col">Име</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Е-Поща</th>
                    <th scope="col">Локация</th>
                    <th scope="col">Възраст</th>
                    <th scope="col">Пол</th>
                    <th scope="col">Занимание</th>
                    <th scope="col">Участие преди</th>
                    <th scope="col">Дни</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Присъства</th>
                    <th scope="col">Създаден</th>
                </tr>
                </thead>
                <tbody>
                @foreach($applications as $entry)
                    <tr>
                        <th scope="row">{{$entry->User->id}}</th>
                        <td>{{$entry->User->name}}</td>
                        <td>{{$entry->User->last_name}}</td>
                        <td>{{$entry->User->email}}</td>
                        <td>{{$entry->User->location}}</td>
                        @if($entry->User->dob)
                            <td>{{(Carbon\Carbon::now()->format('Y') - $entry->User->dob->format('Y'))}}</td>
                        @else
                            <td>-</td>
                        @endif
                        <td>{{$entry->User->sex}}</td>
                        <td>{{$entry->User->Occupation->occupation}}</td>
                        <ul>
                            @foreach($entry->fields as $column => $data)
                                @if($column == 'days')
                                    <td class="text-center"> {{$data > 0?'2':'1'}}</td>
                                @else
                                    <td class="text-center"> {{$data}}</td>
                                @endif
                            @endforeach
                        </ul>
                        </td>
                        <td>
                            {{$entry->is_present}}
                            <br/>
                            <form action="{{route('events.cw.is_present',[$entry->User->id,$entry->event_id])}}" method="POST">
                                {{ csrf_field() }}
                                <input type="number" name="present" class="form-control" min="0" max="3">
                                <button class="btn btn-outline-primary">изпрати</button>
                            </form>
                        </td>
                        <td>
                            <p>
                                <b>{{$entry->created_at}}</b>
                            </p>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 download-stats" style="bottom:1%;font-size:200%;position:fixed;left:-1%"><i class="fas fa-download"></i></div>
        <!-- modal for adding elements -->
        <div id="modal" style="position:absolute">
            <div class="modal-content print-body">
                <div class="modal-header">
                    <h2>Форма на участника</h2>
                </div>
                <div class="copy text-center">
                    <p>

                    </p>
                </div>
                <div class="cf footer">
                    <div></div>
                    <a href="#close" class="btn close-modal">Затвори</a>
                </div>
            </div>
            <div class="overlay"></div>
        </div>
        <!-- end of modal -->
        <script type="text/javascript">
            $('.show-form').on('click',function(){
                $('.copy > p').html($(this).next('.no-show').html());
                $('.copy > p').find('.no-show').removeClass('no-show');

                $( '#modal' ).show();
                $( '#modal' ).css({opacity:100,visibility:'visible'});
            });

            $('.close-modal').on('click', function(){
                $( '#modal' ).hide();
                $( '#modal' ).css({opacity:0,visibility:'hidden'});
            });
            $(document).ready(function() {
                $('#forms').DataTable({
                    responsive: true,
                    order: [[12, "desc"]],
                });
            } );
        </script>
@endsection

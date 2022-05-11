@extends('layouts.home')

@section('title', 'Домашни - ' . $module->name)

@push('head')
    <link href="{{ asset('css/course/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tree-view.css') }}" rel="stylesheet">

    @include('includes.datatable.head')
@endpush

@section('content')
    <div class="col-xl me-3 pt-md-5 mt-md-4 tab-content edit-content-admin" style="width: 30%!important;" id="elements-container">
        <div class="row g-0">
            <div class="col">
                <h1 class="admin-text-2 title-text text-uppercase">
                    Домашни - {{ $module->Course->name }}
                </h1>
            </div>
            <div class="col-12 mb-5 ms-4">
                {{ $module->name }}
            </div>
        </div>
        <div class="row g-0">
            <div class="col">
                <table class="table datatable table-bordered border table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Име</th>
                        <th>Предадени домашни</th>
                        <th>Валидни коментари</th>
                        <th>Невалидни коментари</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name . ' ' . $user->last_name . ' - ' . $user->email }}</td>
                                <td>
                                    <ul class="folder-ul">
                                        <li>
                                            <span class="caret">Лекции</span>
                                            <ul class="nested">
                                                @foreach($user->homeworks as $homework)
                                                    <li>- {{ $homework->lection ? $homework->lection->title : null }}</li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                    <hr>
                                    Общо: {{ $user->homeworks->count() }}
                                </td>
                                <td>
                                    @php
                                        $sumValidComments = 0;
                                    @endphp

                                    <ul class="folder-ul">
                                        <li>
                                            <span class="caret">Домашни</span>
                                            <ul class="nested">
                                                @foreach($user->homeworks as $homework)
                                                    <li>Домашно {{ $loop->iteration }}: {{ $homework->comments->where('is_valid', 1)->count() }}</li>

                                                    @php
                                                        $sumValidComments += $homework->comments->where('is_valid', 1)->count();
                                                    @endphp
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                    <hr>
                                    Общо: {{ $sumValidComments }}
                                </td>
                                <td>
                                    @php
                                        $sumInvalidComments = 0;
                                    @endphp

                                    <ul class="folder-ul">
                                        <li>
                                            <span class="caret">Домашни</span>
                                            <ul class="nested">
                                                @foreach($user->homeworks as $homework)
                                                    <li>Домашно {{ $loop->iteration }}: {{ $homework->comments->where('is_valid', 0)->count() }}</li>

                                                    @php
                                                        $sumInvalidComments += $homework->comments->where('is_valid', 0)->count();
                                                    @endphp
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                    <hr>
                                    Общо: {{ $sumInvalidComments }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Име</th>
                        <th>Предадени домашни</th>
                        <th>Валидни коментари</th>
                        <th>Невалидни коментари</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @include('includes.datatable.scripts')

    <script>
        var toggler = document.getElementsByClassName("caret");
        var i;

        for (i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function() {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            });
        }
    </script>
@endpush

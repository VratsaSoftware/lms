@extends('static.single_layout')
@section('title', 'Мисия')
@section('content')
    <div class="col-md-12 header-about-text text-center">
        Мисия на „Враца софтуер общество”
    </div>

    <div id="single-text" class="col-md-12 d-flex flex-row flex-wrap text-center">
        <div class="col-md-12">
            <p>
                Създаване на ИТ-общество във Враца, което чрез качествено образование дава възможност на врачани да
                работят предизвикателна и добре платена работа в родния си град.
            </p>
            <p>
                Информация за свършеното от нас до момента може да видите в нашите <a href="{{route('year_reports')}}"
                                                                                      class="reports-links">годишни
                    отчети.</a>
            </p>
        </div>
    </div>
    <div class="section" style="margin-top: 10%">
        @include('static.includes.bg.footer')
    </div>
@endsection

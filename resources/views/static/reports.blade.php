@extends('static.single_layout')
@section('title', 'Годишни Отчети')
@section('content')
    <div class="col-md-12 header-about-text text-center">
        Годишни отчети на  „Враца софтуер общество”
    </div>
    <div class="col-md-12 d-flex flex-wrap text-center">
        <div class="col-md-4 reports-year head-year">
            <i class="far fa-calendar-alt"></i> Година
        </div>
        <div class="col-md-8 reports-holder head-report">
            <i class="far fa-file-alt"></i> Отчет
        </div>
        <div class="col-md-4 reports-year">
            2018
        </div>
        <div class="col-md-8 reports-holder">
            <i class="fas fa-external-link-alt"></i> <a href="{{asset('/year_reports/VSC-Report-2018.pdf')}}" target=" _blank" class="reports-links">Враца софтуер общество отчет</a>
        </div>
        <div class="col-md-4 reports-year">
            2017
        </div>
        <div class="col-md-8 reports-holder">
            <i class="fas fa-external-link-alt"></i> <a href="{{asset('/year_reports/VSC-Report-2017.pdf')}}" target=" _blank" class="reports-links">Враца софтуер общество отчет</a>
        </div>
        <div class="col-md-4 reports-year">
            2016
        </div>
        <div class="col-md-8 reports-holder">
            <i class="fas fa-external-link-alt"></i> <a href="{{asset('/year_reports/VSC-Report-2016.pdf')}}" target=" _blank" class="reports-links">Враца софтуер общество отчет</a>
        </div>
        <div class="col-md-4 reports-year">
            2015
        </div>
        <div class="col-md-8 reports-holder">
            <i class="fas fa-external-link-alt"></i> <a href="{{asset('/year_reports/VSC-Report-2015.pdf')}}" target=" _blank" class="reports-links">Враца софтуер общество отчет</a>
        </div>
    </div>
    <div class="section" style="margin-top: 5%;">
        @include('static.includes.bg.footer')
    </div>
@endsection

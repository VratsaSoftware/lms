@extends('layouts.template')
@section('title', 'Плати курс')
@section('content')
    <div class="content-wrap">
        <div class="section">
            <div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
                @if ($errors->any())
                    <div class="alert alert-danger slide-on" style="margin-top:-1.5vw">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-12 text-center level-title-holder" style="margin-top:1vw">
                    <p> Форма за плащане</p>
                    <form action="{{url('/course/payment/store')}}" method="POST" class="col-md-12" id="course_payment" name="course_payment">
                        {{ csrf_field() }}
                        <p>
                            <label for="user">Потребител</label>
                            {{isset(Auth::user()->name)?Auth::user()->name:''}}
                            <i>{{Auth::user()->email}}</i>
                        </p>
                        <hr>
                        <p>Изберете една от опциите</p>
                        <p>
                            <input type="radio" name="levels" id="lvl_1" value="1" style="transform: scale(2)">
                            <label for="lvl_1">Ниво 1 (<span style="color:#28a745">160 BGN</span>)</label>
                        </p>
                        <p>
                            <input type="radio" name="levels" id="lvl_2" value="2" style="transform: scale(2)">
                            <label for="lvl_2">Ниво 1 + 2 (<span style="color:#28a745">300 BGN</span>)</label>
                        </p>
                        <p>
                            <button type="submit" name="pay" class="btn btn-success"><i class="fas fa-money-check-alt"></i>&nbsp;&nbsp;Плати</button>
                        </p>
                        <p class="col-md-12 text-center">
                            <img src="{{asset('images/ePay.jpg')}}" alt="epay" width="5%">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
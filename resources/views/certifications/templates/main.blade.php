<!doctype html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Marck+Script|Ubuntu&display=swap" rel="stylesheet">
    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
</head>
<style>
    @font-face {
        font-family: 'Candara';
        src: url("{{asset('/css/fonts/CANDARA.TTF')}}");
        url("{{asset('/css/fonts/CANDARA.TTF')}}")  format('truetype');
    }

    @font-face {
        font-family: 'Segoe';
        src: url("{{asset('/css/fonts/segoesc.ttf')}}");
        url("{{asset('/css/fonts/segoesc.ttf')}}")  format('truetype');
    }


    html {
        width: 1254px;
        /*height: 876px;*/
    }

    * {
        -webkit-print-color-adjust: exact !important;   /* Chrome, Safari */
        color-adjust: exact !important;                 /*Firefox*/
    }

    #cert-holder {
        border: 12px solid{{$color}};
        background-image: url("{{asset('/certificates/bg.png')}}");
        height: 886px;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        font-family: 'Candara';
        color: #595757;
        font-weight: bold;
    }

    .same-color {
        color: {{$color}};
    }

    #number{
        font-size: 24pt;
    }

    #title {
        font-size: 100pt;
        letter-spacing: 15px;
        margin-top: 40px;
    }

    #sub-title {
        font-size: 32pt;
        letter-spacing: 2px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .modules {
        margin-bottom: 15px;
        font-size: 34pt;
    }

    #pre-username {
        font-size: 24pt;
        letter-spacing: 2px;
        font-family: 'Candara';
    }

    #username {
        font-family: 'Segoe';
        font-size: 60pt;
        color: #525050;
    }

    #footer {
        margin-top: 20px;
    }

    #logo {
        width: 180px;
        height: 110px;
        margin-top: -20px;
    }

    #lecturer {
        margin-top: -5px;
        font-weight: bold;
        letter-spacing: 1px;
    }

    #image-holder {
        position: absolute;
        margin-top: 100px;
    }

    #image-holder2 {
        position: absolute;
        margin-top: 450px;
    }

    /*.print-wrapper{*/
    /*    margin-top: 50px;*/
    /*    margin-bottom: 50px;*/
    /*}*/
    @page { size: auto;  margin: 0mm; }
</style>
<body>
<div class="col-md-12" id="cert-holder">
    <div class="col-md-12 text-right" id="cert-number">
        <span class="same-color" id="number">№ {{$number}}</span>
    </div>
    @if($images > 0)
        <div class="col-md-12 d-flex flex-row flex-wrap" id="image-holder">
            @if($images == 1)
                <div class="col-md-6 text-left" id="left-image-1">
                    <img src="{{asset('/images/logoVS_bg.png')}}" alt="vsc-logo" id="logo">
                </div>
            @else
                <div class="col-md-6 text-left" id="left-image-1">
                    <img src="{{asset('/images/logoVS_bg.png')}}" alt="vsc-logo" id="logo">
                </div>
                <div class="col-md-6 text-right same-color" id="right-image-1">
                    <img src="{{asset('/images/logoVS_bg.png')}}" alt="vsc-logo" id="logo">
                </div>
            @endif
        </div>
    @endif

    <div class="col-md-12 text-center" id="title">
        {{$title}}
    </div>

    <div class="col-md-12 text-center" id="sub-title">
        {{$subTitle}}
    </div>

    <div class="d-flex flex-row flex-wrap justify-content-center col-md-12 text-center">
        @foreach ($modules as $module)
            <div class="col-md-3 same-color modules">{{$module}}</div>
        @endforeach
    </div>

    <div class="col-md-12 text-center" id="pre-username">
        НА
    </div>

    <div class="col-md-12 same-color text-center" id="username">
        {{$username}}
    </div>

    @if($centerLogo > 0)
        <div class="col-md-12 d-flex flex-row flex-wrap" id="footer" style="margin-top: -10px;">
            <div class="col-md-12 text-center">
                <img src="{{asset('/images/logoVS_bg.png')}}" alt="vsc-logo" id="logo">
            </div>
        @else
        <div class="col-md-12 d-flex flex-row flex-wrap" id="footer">
            <div class="col-md-6 text-left">
                <img src="{{asset('/images/logoVS_bg.png')}}" alt="vsc-logo" id="logo">
            </div>
            <div class="col-md-6 text-right same-color" id="lecturer">
                <span>{{$lecturer}}</span>
                <br/>
                <span class="text-center">{{$date}}</span>
            </div>
    @endif
        </div>
</div>
{{--<div class="col-md-12 text-center print-wrapper">--}}
{{--    <a href="#" id="download">Принтирай</a>--}}
{{--</div>--}}
<script>
    $('#download').on('click',function(e){
       e.preventDefault();

    });

    $(function(){
        window.print();
    });
</script>
</body>
</html>
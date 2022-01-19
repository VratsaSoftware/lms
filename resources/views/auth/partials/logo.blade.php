@if (config('consts.LOGO') == 'vsc')
    <img class="logo-black" src="{{ asset('assets/img/logo.png') }}">
@elseif (config('consts.LOGO') == 'digitalmontana')
    <img class="logo-digitalmontana" src="{{ asset('assets/img/digital-montana-transperant.png') }}">
@elseif (config('consts.LOGO') == 'digitalsmoliyan')
    <img class="logo-black" src="{{ asset('assets/img/digital-smoliyan-transparent.png') }}">
@elseif (config('consts.LOGO') == 'digitalrazgrad')
    <img class="logo-black" src="{{ asset('assets/img/digitalrazgrad-transparent.png') }}">
@endif

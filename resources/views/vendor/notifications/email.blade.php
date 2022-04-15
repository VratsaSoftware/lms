@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color="success";
            break;
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
<center>
    @if (config('consts.LOGO') == 'vsc')
        <img src="{{asset('/images/vso-logo-bg-original.png')}}" />
    @elseif (config('consts.LOGO') == 'digitalmontana')
        <img class="logo-digitalmontana" src="{{ asset('assets/img/digital-montana-transperant.png') }}">
    @elseif (config('consts.LOGO') == 'digitalsmoliyan')
        <img class="logo-black" src="{{ asset('assets/img/digital-smoliyan-transparent.png') }}">
    @elseif (config('consts.LOGO') == 'digitalrazgrad')
        <img class="logo-black" src="{{ asset('assets/img/digitalrazgrad-transparent.png') }}">
    @elseif (config('consts.LOGO') == 'digitaltargovishte')
        <img class="logo-black" src="{{ asset('assets/img/digitaltargovishte-transparent.png') }}">
    @endif
</center> <br />
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
@lang(
    "Ако имате проблем при натискането на бутона, копирайте и поставете в браузъра следния линк\n".
    ': [:actionURL](:actionURL)',
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
    ]
)
@endcomponent
@endisset
@endcomponent

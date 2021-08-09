@component('mail::message')
{!!$text!!}
@component('mail::button', ['url' => $url, 'color' => 'blue'])
    CodeWeek FB
@endcomponent

@component('mail::button', ['url' => $webSite, 'color' => 'blue'])
    CodeWeek Site
@endcomponent
@endcomponent

@component('mail::message')
<center>
    {!!$text!!}
</center>
@component('mail::button', ['url' => $url, 'color' => 'success'])
    Потвърди
@endcomponent

@component('mail::button', ['url' => $url, 'color' => 'red'])
    Откажи
@endcomponent
@endcomponent

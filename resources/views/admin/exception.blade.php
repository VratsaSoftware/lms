<h1 style="background-color: #b0413e; color: white; min-height: 60px; padding-left: 15px; border-radius: 4px">
    LMS - {{ config('app.env') }} ({{ Request::ip() }})
    <img src="{{ asset('assets/img/exception.png') }}" style="float: right;">
    <br>
    <small>{{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}</small>
</h1>

<div style="padding-left: 15px">
    {!! Auth::check() ? '<b>User:</b> ' . Auth::id() . '<br><b>Role:</b> ' . Auth::user()->cl_role_id : null !!}
    <br>
    <b>Route:</b> {{ Request::route()->getName() }}
    <br>
    <b>Url:</b> {{ Request::fullUrl() }}
    <br>
    <b>Request:</b> {{ json_encode(Request::all()) }}
</div>
<br>
{!! $content !!}

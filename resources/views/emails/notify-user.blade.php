@component('mail::message')
<h1>{{$details}} &nbsp; Notification</h1>
<h6>{{$details}}&nbsp;by&nbsp;you({{$name}})</h6>
{{--@component('mail::button', ['url' => ''])--}}
{{--@endcomponent--}}
Thanks,<br>
{{ config('app.name') }}
@endcomponent

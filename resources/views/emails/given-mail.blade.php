@component('mail::message')
<h1>CyVoucher Notification</h1>
<h4>Greetings, this is a notification from CyVoucher to notify you that you have been given a Voucher by {{$name}}</h4>
<h5><b>Verification Code:</b>{{$verification_code}}</h5>
<h6>If you don't have an account, kindly go to our website to be able to claim the voucher using the verification code</h6>
{{--@component('mail::button', ['url' => ''])--}}
{{--@endcomponent--}}
Thanks,<br>
{{ config('app.name') }}
@endcomponent

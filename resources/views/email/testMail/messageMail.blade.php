@component('mail::message')
# This Is Test Welcome

The body of your message.
Welcome To Our Website

<hr>

<h3>{{$message}}</h3>

@component('mail::button', ['url' => 'http://tubaty.rf.gd'])
Click Here To Visit My Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

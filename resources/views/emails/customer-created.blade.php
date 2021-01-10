@component('mail::message')
# Dear {{$customer->full_name}}

You have been registered at SmartWill.


Thanks,<br>
{{ config('app.name') }}
@endcomponent

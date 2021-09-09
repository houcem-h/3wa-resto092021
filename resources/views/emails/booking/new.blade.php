@component('mail::message')
# 3WA resto

this is an email to confirm your booking.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

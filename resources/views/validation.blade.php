@component('mail::message')
# Bonjour {{$user->firstname.' '.$user->lastname}}

Votre compte a été activé vous pouvez commencer vos prestations

@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent

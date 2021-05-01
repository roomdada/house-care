@component('mail::message')
# Notification

Hey Mr/Mme {{$customer->firstname}} 
@component('mail::panel')
Votre demande de prestation de {{$customer->service->name}} a été prise en compte notre prestataire vous contactera.
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
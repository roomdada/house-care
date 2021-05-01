@component('mail::message')
# Hey {{$customer->house->user->firstname}}<br>
 Vous venez d'etre contacter pour la location d'une de vos maison.

Merci,<br>
{{ config('app.name') }}
@endcomponent

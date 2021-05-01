@component('mail::message')
# Notification

Salut Mr/Mme

@component('mail::button', ['url' => ''])
Mr {{$customer->firstname.' '.$customer->lastname}} vient de vous contacter pour la prestation de {{$customer->service->name}}.
<b>Information<br></b>
-contact du client : {{$customer->phone}}
-commune du client : {{$customer->city}}
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent

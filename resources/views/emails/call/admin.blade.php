@component('mail::message')
# Notification 
Hey Admin vous avez un client
-{{$customer->firstname}}
-{{$customer->lastname}}
-{{$customer->email}}
-{{$customer->phone}}

@component('mail::panel')
{{$customer->firstname.' '.$customer->lastname}} vient de contacter {{$user->firstname.' '.$user->lastname}} 
@if($user->role_id == 2)
pour le <br>
service de <b>{{$customer->service->name}}</b>
 @else pour loaction de maison
@endif
 dans la commune de {{$customer->city}}
@endcomponent


Merci,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
# Notification de création de compte

@component('mail::panel')
Hello {{$user->firstname.' '.$user->lastname}}, votre compte a été créé avec succès, veuillez cliquer sur le lien pour confirmer
@component('mail::button', ['url' =>  route('confirmation.user.account',$user->token), 'color' => 'blue'])
	Confirmer votre inscription
@endcomponent
@endcomponent
Merci,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
# Hey Admin,

Vous avez un nouveau client pour la location de maison : <br>
<p class="text-left">Informations</p>
<ul>
	<li>Nom: {{$customer->firstname}}</li>
	<li>Prénoms: {{$customer->lastname}}</li>
	<li>Email: {{$customer->email}}</li>
	<li>Contact: {{$customer->phone}}</li>
</ul>
<br>
<p class="text-left">Informations Chasseur imobilier</p>
<ul>
	<li>Nom: {{$customer->house->user->firstname}}</li>
	<li>Prénoms: {{$customer->house->user->lastname}}</li>
	<li>Email: {{$customer->house->user->email}}</li>
	<li>Contact: {{$customer->house->user->phone}}</li>
</ul>

Merci,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
# Mot de passe oublié

Hey veuillez cliquer sur le lien ci dessous afin de changer votre mot de passe.

@component('mail::button', ['url' => route('show.password-reset.form', $user)])
Changer le mot de passe
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

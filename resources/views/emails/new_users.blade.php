@component('mail::message')
# Hola {{ $user->name }}
<br>
Has sido registro en nuestro sistema {{ config('app.name') }} con el correo {{ $user->email }}
<br>
Esta es tu contraseña para iniciar sesion {{ $passworDefault }}
Por favor a traves de este link puedes registrar tu contraseña
@component('mail::button',['url' => env('APP_URL')])
    Reestablecer contraseña
@endcomponent
Atentamente,<br>
{{ config('app.name') }}
@endcomponent

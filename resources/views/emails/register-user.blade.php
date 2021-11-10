@component('mail::message')
# Hola {{$textUsername}},
<br>
<p></p>
<div>
</div>
<br>
<p>
    Bienvenido a vitaltest
</p>
<p>
 Nombre de usuario: {{$textUsername}}
 Correo: {{$textEmail}}
 Contraseña: {{$textPassword}}
</p>
<p>
Rol: Cliente
</p>
<br>
@endcomponent

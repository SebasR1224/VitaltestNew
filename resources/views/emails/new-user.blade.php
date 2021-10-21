@component('mail::message')
# Hola {{$textUsername}},
<br>
<p></p>
<div>
</div>
<br>
<p>
    El admin de Vitaltes ha creado su cuenta
</p>
<p>
 Nombre de usuario: {{$textUsername}}
 Correo: {{$textEmail}}
 Contraseña: {{$textPassword}}
</p>
<p>
Rol:
@if ($textRoles == 2)
    Gerente
@else

@endif
</p>
<br>
@endcomponent

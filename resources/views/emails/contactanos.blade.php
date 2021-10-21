@component('mail::message')
# Hola gerente,
<br>
<p>Has recibido un nuevo mensaje desde el formulario de contacto en {{config('app.name')}}</p>
<div>
    Motivo del mensaje <strong>{{$textSubject}}</strong>
</div>
<br>
<p>
    Enviado por {{$textName}} con correo {{$textEmail}}
</p>
<br>
<div>
    {{$textMessage}}
</div>
@endcomponent

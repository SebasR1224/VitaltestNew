<!DOCTYPE html>
<html>
<head>
    <title>Lista de usuarios</title>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
p{
  font-family: Arial, Helvetica, sans-serif;
  font-size: 30px;
  color: #00c9a7;

}

#customers{
    font-size: 12px
}

#customers td:first-letter {
    text-transform: capitalize;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 5px;
}

#customers tr:nth-child(even){
    background-color: #f2f2f2;
}

#customers tr:hover {
    background-color: #ddd;
}

#customers th {
  padding-top: 5px;
  padding-bottom: 5px;
  text-align: left;
  background-color: #00c9a7;
  color: white;
  text-align: center
}

.gold {
    color: rgb(255, 166, 0);
}

.geekblue{
    color: blue;
}
.green {
    color: green;
}


.badge-success{color:#fff;background-color:#28a745}a.badge-success:hover,a.badge-success:focus{color:#fff;background-color:#1e7e34}a.badge-success:focus,a.badge-success.focus{outline:0;box-shadow:0 0 0 0.2rem rgba(40,167,69,0.5)}
.badge-danger{color:#fff;background-color:#dc3545}a.badge-danger:hover,a.badge-danger:focus{color:#fff;background-color:#bd2130}a.badge-danger:focus,a.badge-danger.focus{outline:0;box-shadow:0 0 0 0.2rem rgba(220,53,69,0.5)}
.badge{display:inline-block;padding:0.25em 0.4em;font-size:75%;font-weight:700;line-height:1;text-align:center;white-space:nowrap;vertical-align:baseline;border-radius:0.25rem;transition:color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out}@media (prefers-reduced-motion: reduce){.badge{transition:none}}a.badge:hover,a.badge:focus{text-decoration:none}.badge:empty{display:none}.btn .badge{position:relative;top:-1px}.badge-pill{padding-right:0.6em;padding-left:0.6em;border-radius:10rem}

</style>
</head>
<body>

<p style="text-align: center">Lista de usuarios</p>
<br>
<table id="customers">
  <tr>
    <th>#</th>
    <th>Nombre de Usuario</th>
    <th>Correo</th>
    <th>Rol de usuario</th>
    <th>Estado</th>
  </tr>
  @forelse ($users as $user)
  <tr>
    <td>#{{$user->id}}</td>
    <td>{{$user->username}}</td>
    <td>{{$user->email}}</td>
    <td>
        @forelse ($user->roles as $role )
            <span style="font-size: 15px" class="{{$role->name == "Cliente" ? 'gold' : ($role->name == "Gerente" ? 'geekblue' : 'green')}}">{{$role->name}}</span>
                @empty
            <span>Usuario sin rol</span>
        @endforelse
    </td>
    <td style="text-align: center">
        @if ($user->status == 1)
            <span class="badge badge-pill badge-success" >Activo</span>
        @else
            <span class="badge badge-pill badge-danger" >Inactivo</span>
        @endif
    </td>
  </tr>
  @empty
  <div style="text-align: center">No se encontraron resultados para la busqueda</div>
  @endforelse
</table>

</body>
</html>

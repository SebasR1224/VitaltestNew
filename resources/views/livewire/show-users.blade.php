<div wire:ignore.self class="modal modal-right fade quick-view" id="list-users">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-between align-items-center">
                <h5 class="modal-title  text-primary font-weight-semibold">Lista de Usuarios</h5>
            </div>
            <div class="p-10">
                <div class="text-md-right m-v-10">
                    <div class="input-affix m-v-10">
                        <i class="prefix-icon anticon anticon-search opacity-04"></i>
                        <input wire:model="search" type="text" class="form-control" placeholder="Buscar producto">
                    </div>
                </div>
            </div>
            <div class="modal-body scrollable">
                    <ul class="list-group list-group-flush">
                        @forelse ($users as $user)
                        <li class="list-group-item">
                            <a href="{{route('users.show', $user->id)}}" class="d-flex align-items-center">
                                <div >
                                    <img src="{{$user->image ? $user->image  :  asset('dashboard/images/others/img-4.jpg')}}" style="width: 35px; height: 35px;" alt="">
                                </div>
                                <div class="m-l-10">
                                    <div class="m-b-0 text-dark font-weight-semibold short-text">{{$user->username}}</div>
                                    <div class="m-b-0 text-dark opacity-07 font-size-13 short-text">{{$user->email}}</div>
                                </div>
                            </a>
                        </li>
                        @empty
                        <div class="text-center">
                            El usuario « {{$search}} » no se encuentra registrado.
                        </div>
                        @endforelse
                    </ul>
                <hr>
            </div>
        </div>
    </div>
</div>

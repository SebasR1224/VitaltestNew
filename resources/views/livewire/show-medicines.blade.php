<div wire:ignore.self class="modal modal-right fade quick-view" id="list-medicines">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-between align-items-center">
                <h5 class="modal-title  text-primary font-weight-semibold">Lista de Inventario</h5>
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
                        @forelse ($list as $medicine)
                        <li class="list-group-item">
                            <a href="{{route('medicines.show', $medicine->id)}}" class="d-flex align-items-center">
                                <div class="avatar avatar-image">
                                    <img src="{{$medicine->imagen}}" alt="">
                                </div>
                                <div class="m-l-10">
                                    <div class="m-b-0 text-dark font-weight-semibold short-text">{{$medicine->nombreMedicamento}}</div>
                                    <div class="m-b-0 text-dark opacity-07 font-size-13 short-text">{{$medicine->categoria->nombreCategoria}}</div>
                                </div>
                            </a>
                        </li>
                        @empty
                        <div class="text-center">
                            El producto « {{$search}} » no se encuentra.
                        </div>
                        @endforelse
                    </ul>
                <hr>
            </div>
        </div>
    </div>
</div>

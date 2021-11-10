<div class="page-container">
    <div class="main-content">
        <div class="page-header no-gutters">
            <div class="row align-items-md-center">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="input-affix m-v-10">
                                <i class="prefix-icon anticon anticon-search opacity-04"></i>
                                <input wire:model="search" type="text" class="form-control" placeholder="Buscar medicamento">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-md-right m-v-10">
                        <div class="btn-group m-r-10">
                            <button id="list-view-btn" type="button" class="btn btn-default btn-icon" data-toggle="tooltip" data-placement="bottom" title="List View">
                                <i class="anticon anticon-ordered-list"></i>
                            </button>
                            <button id="card-view-btn" type="button" class="btn btn-default btn-icon active" data-toggle="tooltip" data-placement="bottom" title="Card View">
                                <i class="anticon anticon-appstore"></i>
                            </button>
                        </div>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#create-new-project">
                            <i class="anticon anticon-plus"></i>
                            <span class="m-l-5">New Project</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-11 mx-auto">
                <div class="row">
                    @foreach ($medicamentos as $medicamento )
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="{{$medicamento->imagen}}" alt="">
                            <div class="card-body">
                                <p class="text-muted text-uppercase font-italic"><small>{{$medicamento->laboratorio->nombreLaboratorio}}</small></p>
                                <h4 class="text-success h4">{{$medicamento->nombreMedicamento}}</h4>
                                <div class="d-block align-items-center justify-content-between">
                                    @if ($medicamento->precioDescuento)
                                        <h4 class="text-danger font-weight-bold h4">${{$medicamento->precioDescuento}}(Oferta)</h4>
                                        <div>
                                            <p><del>${{$medicamento->precioNormal}}</del>(Normal)</p>
                                        </div>
                                    @else
                                        <h4 class="text-dark h4">${{$medicamento->precioNormal}}(Normal)</h4>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                    <div>
                                        <a href="{{route('medicines.show', $medicamento->id)}}" class="btn btn-block btn-success"><i class="anticon anticon-star"></i> VER DETALLES</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if ($medicamentos->count())
        <div class="m-t-30">
            <nav>
                <ul class="pagination justify-content-center">
                    {{$medicamentos->links()}}
                </ul>
            </nav>
        </div>
        @else
        <div class="m-t-30">
            <div class="pagination justify-content-center">
                No hay resultados para la búsqueda « {{$search}} »
            </div>
        </div>
        @endif

    </div>
</div>



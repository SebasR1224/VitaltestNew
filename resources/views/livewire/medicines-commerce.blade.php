<div class="page-container">
    <div class="main-content">
        <div class="page-header no-gutters">
            <div class="row align-items-md-center">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-5">
                            @can('oferta_category')
                                <div class="btn-group m-r-10 dropright">
                                    <button  type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="anticon anticon-appstore"></i> Categorias
                                    </button>
                                    <div class="dropdown-menu">
                                        @foreach ($categories as $category)
                                            <a class="dropdown-item text-success" href="{{route('commerce.category', $category->id)}}">{{$category->nombreCategoria}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-md-right m-v-10">
                        <div class="input-affix m-v-10">
                            <i class="prefix-icon anticon anticon-search opacity-04"></i>
                            <input wire:model="search" type="text" class="form-control" placeholder="Buscar medicamento en oferta">
                        </div>
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
                            <div class="box-text">
                                <img class="card-img-top w-100" style="height:320px" src="{{$medicamento->imagen}}" alt="">
                                @if ($medicamento->descuento)
                                    <h1 class="text-desc badge badge-danger" style="font-size:15px">{{$medicamento->descuento}}%</h1>
                                @endif
                            </div>
                            <div class="card-body">
                                <p class="text-muted text-uppercase font-italic short-text"><small>{{$medicamento->laboratorio->nombreLaboratorio}}</small></p>
                                <h4 class="text-success h4 short-text">{{$medicamento->nombreMedicamento}}</h4>
                                <div class="d-block align-items-center justify-content-between">
                                    @if ($medicamento->precioDescuento)
                                        <h4 class="text-danger font-weight-bold h4">${{number_format($medicamento->precioDescuento, 2)}}(Oferta)</h4>
                                        <div>
                                            <p><del>${{number_format($medicamento->precioNormal, 2)}}</del>(Normal)</p>
                                        </div>
                                    @else
                                        <h4 class="text-dark h4">${{number_format($medicamento->precioNormal, 2)}}(Normal)</h4>
                                        <div>
                                            <p class="invisible">vacio</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                @can('oferta_sales')
                                    <div>
                                        <a href="{{route('commerce-show', $medicamento->id)}}" class="btn btn-block btn-success"><i class="far fa-check-circle"></i> VER DETALLES</a>
                                    </div>
                                @endcan
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
                El producto « {{$search}} » no se encuentra en oferta.
            </div>
        </div>
        @endif

    </div>
</div>



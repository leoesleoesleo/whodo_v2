@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">

                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Opciones de configuración: </h5>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow" data-toggle="modal" data-target="#Modalproductos" title="Carga masiva productos">
                                            <i class="fa fa-cloud"></i>
                                        </div>
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow" data-toggle="modal" data-target="#Modalnuevoportafolio" title="Nuevo Portafolio">
                                            <i class="fa fa-plus-circle"></i>
                                        </div>
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow" data-toggle="modal" data-target="#Modalcategorias" title="Sugerir categoría">
                                            <i class="fa fa-cog"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <!--<span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                                    <span class="text-nowrap"></span>-->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-sm-12 col-md-12">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0"><i class="ni ni-circle-08" style="color:gray;font-size:50px !important;"></i> Mi Perfil</h3>
                                
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="padding: 15px;">
                        <table class="table align-items-center table-flush" id="adminTable">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Mis vista</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="border:2px solid #F1EAFF;background-color:#FCFAFF;">
                                    @foreach($details as $detalle)
                                        <div class="row">
                                            <div class="col-sm-6 col-lg-6">
                                                <div class="card-body">
                                                    <h2>{{($detalle->nombreEmpresa)}}</h2>
                                                    <h4>{{('Nit: ' .$detalle->nit)}}</h4>
                                                    <h4>{{('País: ' .$detalle->pais)}}</h4>
                                                    <h4>{{('Ciudad: ' .$detalle->ciudad)}}</h4>
                                                    <p style="font-size:11px;">Registrado desde: {{($detalle->created_at)}}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-6">
                                                <div class="card-body">
                                                    <a href="#!" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                       data-target="#Modalcatalogo">Ver Portafolio</a>
                                                </div>
                                                <span class="d-inline-block text-truncate" style="max-width: 400px;">
                                                  {{($detalle->descripcion)}}
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal catalogos -->
    <div class="modal fade" id="Modalcatalogo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Catalogo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ... aca va el catalogo del proveedor
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pedido -->
    <div class="modal fade" id="Modalpedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pedido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ... aca va los detalles de la solicitud del pedido
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal detalle proveedores -->
    <div class="modal fade" id="Modaldetalleproveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Categorias</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ... aca va la lista de las categorias de todos los proveedores
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Modalproveedores nuevos -->
    <div class="modal fade" id="Modalproveedoresnuevos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div  class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Proveedores Nuevos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="adminProveedorTable">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Registro</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Proveedor 1</td>
                                    <td>2019-01-01</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal nuevo portafolio -->
    <div class="modal fade" id="Modalnuevoportafolio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Portafolio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="table-responsive" style="padding: 10px;">

                        <!-- checkbox
                        <div class="custom-control custom-checkbox mb-3">
                            <input id="cate1" type="checkbox" class="custom-control-input">
                            <label for="cate1" class="custom-control-label">Categoria 1</label>
                        </div>
                        -->

                        @foreach($info as $data)
                            <h3>Proveedor: {{$data->nombreEmpresa}}</h3>
                            <h3>Nit: {{$data->nit}}</h3>
                        @endforeach
                        <br>
                        <input class="form-control" placeholder="Nombre Portafolio" id="nomPortafolio" type="text" name="name" value="" required="" autofocus="">
                        <br>
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <select required name="rol" class="custom-select mr-sm-2" id="categoriaSelect">
                                    <option selected>Categoria:</option>
                                    @foreach($categoria as $cat)
                                        <option value="{{$cat->idCategoria}}">{{$cat->nombreCategoria}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <button type="button" class="btn btn-success" onclick="createPortafolio()"><i class="fa fa-plus-circle"></i> Crear nuevo portafolio</button>
                        <br>
                        <div class="table-responsive" style="padding: 15px;">
                            <table class="table align-items-center table-flush" id="tablePortafolio">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Portafolio</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($portafolioCategoria as $itemsPortafolio)
                                        <tr>
                                            <td>{{$itemsPortafolio->portafolio}}</td>
                                            <td>{{$itemsPortafolio->nombreCategoria}}</td>
                                            <td><i class="fa fa-edit text-orange" data-toggle="tooltip" data-placement="top" title="Editar Portafolio"></i>
                                            <i class="fa fa-trash-alt text-orange" data-toggle="tooltip" data-placement="top" title="Eliminar Portafolio"></i></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal productos -->
    <div class="modal fade" id="Modalproductos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Carga Productos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive" style="padding: 10px;">
                        <!-- checkbox
                        <div class="custom-control custom-checkbox mb-3">
                            <input id="cate1" type="checkbox" class="custom-control-input">
                            <label for="cate1" class="custom-control-label">Categoria 1</label>
                        </div>
                        -->
                        @foreach($info as $data)
                            <h3>Proveedor: {{$data->nombreEmpresa}}</h3>
                            <h3>Nit: {{$data->nit}}</h3>
                        @endforeach
                        <br>
                        <div class="container-fluid">
                            <form method="post" action="{{route('cargaProductos')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <div class="input-group-prepend">
                                                <select required name="portafolio" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                    @foreach($portafolio as $port)
                                                        <option value="{{$port->portafolio}}">{{$port->portafolio}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <div class="input-group inputgroup-alternative mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFileLang" lang="es" databuttonText="Buscar" name="cargaMasivaP">
                                                    <label for="customFileLang" class="custom-file-label">Seleccione un archivo de excel</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="text-left float-left">
                                            <button id="btnGuardarExcelP" data-ideg="-1" type="submit" class="btn btn-primary mt-4">{{__('Importar')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary">Formato</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal admin categorias -->
    <div class="modal fade" id="Modalcategorias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sugerir Categorias</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                <br>
                <input class="form-control" placeholder="Nombre Categoria" id="nomCategoria" type="text" name="name" value="" required="" autofocus="">
                <br>
                <button type="button" class="btn btn-success" onclick="createCategoria()"><i class="fa fa-plus-circle"></i> Sugerir una categoria</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('adminpanelscripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="{{asset('js/datatables.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>
    <script src="{{asset('js/portafolio.js')}}"></script>
@endpush

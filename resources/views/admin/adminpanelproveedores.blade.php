@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>

    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Proveedores</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                   data-target="#Modalcrearproveedor">Crear proveedor</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="adminTable">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">País</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">NIT</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $datos)
                                <tr>
                                    <td>{{$datos->nombreEmpresa}}</td>
                                    <td>{{$datos->pais}}</td>
                                    <td>{{$datos->ciudad}}</td>
                                    <td>{{$datos->nit}}</td>
                                    <td>{{$datos->telefono}}</td>
                                    <td>{{$datos->direccion}}</td>
                                    <td>{{$datos->email}}</td>
                                    <td>{{$datos->descripcion}}</td>
                                    <td class="text-center">
                                        <a href="#" data-toggle="modal" data-target="#Modaleditarproveedor" onclick="setProveedorEditModalValues('{{$datos->idUser}}', '{{$datos->nombreEmpresa}}', '{{$datos->pais}}', '{{$datos->ciudad}}', '{{$datos->nit}}', '{{$datos->telefono}}', '{{$datos->direccion}}', '{{$datos->email}}', '{{$datos->descripcion}}')"><i class="fa fa-edit text-orange" data-toggle="tooltip" data-placement="top" title="Editar proveedor"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#Modaleliminarproveedor" onclick="setDeleteProveedorModalValue('{{$datos->idUser}}')"><i class="fa fa-trash-alt text-orange" data-toggle="tooltip" data-placement="top" title="Eliminar usuario"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal crear proveedor-->
    <div class="modal fade" id="Modalcrearproveedor" tabindex="-1" role="dialog" aria-labelledby="modalCrearProveedor"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearProveedor">Crear proveedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <input type="hidden" id="createProveedorRol" value="1">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}" id="createProveedorName" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('pais') ? ' is-invalid' : '' }}" placeholder="{{ __('País') }}" id="createProveedorPais" type="text" name="name" value="{{ old('pais') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('pais'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('pais') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('ciudad') ? ' is-invalid' : '' }}" placeholder="{{ __('Ciudad') }}" id="createProveedorCiudad" type="text" name="name" value="{{ old('ciudad') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('ciudad'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('ciudad') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('nit') ? ' is-invalid' : '' }}" placeholder="{{ __('NIT') }}" id="createProveedorNit" type="text" name="name" value="{{ old('nit') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('nit'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('nit') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" placeholder="{{ __('Teléfono') }}" id="createProveedorTelefono" type="text" name="name" value="{{ old('telefono') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('telefono'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('telefono') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input class="datepicker form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" placeholder="{{ __('Dirección') }}" id="createProveedorDireccion" type="text" name="name" value="{{ old('direccion') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('direccion'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('direccion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('E-mail') }}" id="createProveedorEmail" type="email" name="name" value="{{ old('email') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                                        </div>
                                        <textarea class="form-control rounded-0" id="createProveedorDescripcion" placeholder="{{ __('Descripción') }}"></textarea>
                                    </div>
                                    @if ($errors->has('descripcion'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                  <strong>{{ $errors->first('descripcion') }}</strong>
                              </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative">
                                        <input id="createProveedorPassword"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               placeholder="{{ __('Password') }}" type="password"
                                               name="password" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <input id="createProveedorPasswordConfirm" class="form-control"
                                               placeholder="{{ __('Confirmar Password') }}" type="password"
                                               name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-outline-primary" onclick="createProveedor()">{{ __('Crear usuario') }}</button>
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal editar proveedor-->
    <div class="modal fade" id="Modaleditarproveedor" tabindex="-1" role="dialog" aria-labelledby="modalEditarProveedor"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarProveedor">Editar proveedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <input type="hidden" id="editProveedorId">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}" id="editProveedorName" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('pais') ? ' is-invalid' : '' }}" placeholder="{{ __('País') }}" id="editProveedorPais" type="text" name="name" value="{{ old('pais') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('pais'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('pais') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('ciudad') ? ' is-invalid' : '' }}" placeholder="{{ __('Ciudad') }}" id="editProveedorCiudad" type="text" name="name" value="{{ old('ciudad') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('ciudad'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('ciudad') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('nit') ? ' is-invalid' : '' }}" placeholder="{{ __('NIT') }}" id="editProveedorNit" type="text" name="name" value="{{ old('nit') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('nit'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('nit') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" placeholder="{{ __('Teléfono') }}" id="editProveedorTelefono" type="text" name="name" value="{{ old('telefono') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('telefono'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('telefono') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input class="datepicker form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" placeholder="{{ __('Dirección') }}" id="editProveedorDireccion" type="text" name="name" value="{{ old('direccion') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('direccion'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('direccion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                                        </div>
                                        <textarea class="form-control rounded-0" id="editProveedorDescripcion" placeholder="{{ __('Descripción') }}"></textarea>
                                    </div>
                                    @if ($errors->has('descripcion'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                  <strong>{{ $errors->first('descripcion') }}</strong>
                              </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('E-mail') }}" id="editProveedorEmail" type="email" name="name" value="{{ old('email') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative">
                                        <input id="editProveedorPassword"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               placeholder="{{ __('Password') }}" type="password"
                                               name="password" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <input id="editProveedorPasswordConfirm" class="form-control"
                                               placeholder="{{ __('Confirmar Password') }}" type="password"
                                               name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-outline-primary" onclick="editProveedor()">{{ __('Editar usuario') }}</button>
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal eliminar proveedor -->
    <div class="modal fade" id="Modaleliminarproveedor" tabindex="-1" role="dialog" aria-labelledby="eliminarProveedorModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminarProveedorModal">Eliminar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="deleteProveedorId">
                    <div style="font-size:30px;" class="text-center text-muted">
                        <small>{{ __('Desea eliminar este usuario?') }}</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" onclick="deleteProveedor();">{{ __('Eliminar proveedor') }}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('adminPanelProveedoresScript')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
    <script src="{{asset('js/datatables.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>
@endpush

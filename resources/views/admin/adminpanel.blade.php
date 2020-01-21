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
                                <h3 class="mb-0">Usuarios</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                   data-target="#Modalcrearusuario">Crear usuario</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="adminProveedorTable">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">País</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">Cédula</th>
                                <th scope="col">Fecha de nacimiento</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $datos)
                                    <tr>
                                        <td>{{$datos->name}}</td>
                                        <td>{{$datos->apellidos}}</td>
                                        <td>{{$datos->pais}}</td>
                                        <td>{{$datos->ciudad}}</td>
                                        <td>{{$datos->cc}}</td>
                                        <td>{{$datos->fechaN}}</td>
                                        <td>{{$datos->email}}</td>
                                        <td class="text-center">
                                            <a href="#" data-toggle="modal" data-target="#Modalmodificarusuario" onclick="setEditModalValues('{{$datos->idUser}}', '{{$datos->name}}', '{{$datos->apellidos}}', '{{$datos->pais}}', '{{$datos->ciudad}}', '{{$datos->cc}}', '{{$datos->fechaN}}', '{{$datos->email}}')"><i class="fa fa-edit text-orange" data-toggle="tooltip" data-placement="top" title="Editar usuario"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#Modaleliminarusuario" onclick="setDeleteModalValue('{{$datos->idUser}}')"><i class="fa fa-trash-alt text-orange" data-toggle="tooltip" data-placement="top" title="Eliminar usuario"></i></a>
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

    <!-- Modal Crear Usuario -->
    <div class="modal fade" id="Modalcrearusuario" tabindex="-1" role="dialog" aria-labelledby="modalCrearUsuario"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearUsuario">Crear Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <input type="hidden" id="createUserRol" value="2">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}" id="createUserName" type="text" name="name" value="{{ old('name') }}" required autofocus>
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
                                        <input class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" placeholder="{{ __('Apellidos') }}" id="createUserApellidos" type="text" name="name" value="{{ old('apellidos') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('apellidos'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('apellidos') }}</strong>
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
                                        <input class="form-control{{ $errors->has('pais') ? ' is-invalid' : '' }}" placeholder="{{ __('Pais') }}" id="createUserPais" type="text" name="name" value="{{ old('pais') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('pais'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('pais') }}</strong>
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
                                        <input class="form-control{{ $errors->has('ciudad') ? ' is-invalid' : '' }}" placeholder="{{ __('Ciudad') }}" id="createUserCiudad" type="text" name="name" value="{{ old('ciudad') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('ciudad'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('ciudad') }}</strong>
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
                                        <input class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" placeholder="{{ __('Cédula') }}" id="createUserCedula" type="text" name="name" value="{{ old('cedula') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('cedula'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('cedula') }}</strong>
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
                                        <input class="datepicker form-control{{ $errors->has('fechaN') ? ' is-invalid' : '' }}" placeholder="{{ __('Fecha de nacimiento') }}" id="createUserFechaN" type="text" name="name" value="{{ old('fechaN') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('fechaN'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('fechaN') }}</strong>
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
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('E-mail') }}" id="createUserEmail" type="email" name="name" value="{{ old('email') }}" required autofocus>
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
                                        <input id="createUserPassword"
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
                                        <input id="createUserPasswordConfirm" class="form-control"
                                               placeholder="{{ __('Confirmar Password') }}" type="password"
                                               name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-outline-primary" onclick="createuser()">{{ __('Crear usuario') }}</button>
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

    <!-- Modal modificar Usuario -->
    <div class="modal fade" id="Modalmodificarusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <input type="hidden" id="editUserRol" value="2">
                                <input type="hidden" id="editUserId">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}" id="editUserName" type="text" name="name" value="{{ old('name') }}" required autofocus>
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
                                        <input class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" placeholder="{{ __('Apellidos') }}" id="editUserApellidos" type="text" name="name" value="{{ old('apellidos') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('apellidos'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('apellidos') }}</strong>
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
                                        <input class="form-control{{ $errors->has('pais') ? ' is-invalid' : '' }}" placeholder="{{ __('Pais') }}" id="editUserPais" type="text" name="name" value="{{ old('pais') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('pais'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('pais') }}</strong>
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
                                        <input class="form-control{{ $errors->has('ciudad') ? ' is-invalid' : '' }}" placeholder="{{ __('Ciudad') }}" id="editUserCiudad" type="text" name="name" value="{{ old('ciudad') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('ciudad'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('ciudad') }}</strong>
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
                                        <input class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" placeholder="{{ __('Cédula') }}" id="editUserCedula" type="text" name="name" value="{{ old('cedula') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('cedula'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('cedula') }}</strong>
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
                                        <input class="datepicker form-control{{ $errors->has('fechaN') ? ' is-invalid' : '' }}" placeholder="{{ __('Fecha de nacimiento') }}" id="editUserFechaN" type="text" name="name" value="{{ old('fechaN') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('fechaN'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('fechaN') }}</strong>
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
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('E-mail') }}" id="editUserEmail" type="email" name="name" value="{{ old('email') }}" required autofocus>
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
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative">
                                        <input id="editUserPassword"
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
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-outline-primary" onclick="edituser()">{{ __('Editar usuario') }}</button>
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

    <!-- Modal eliminar Usuario -->
    <div class="modal fade" id="Modaleliminarusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="deleteId">
                    <div style="font-size:30px;" class="text-center text-muted">
                        <small>{{ __('Desea eliminar este usuario?') }}</small>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" onclick="deleteUser();">{{ __('Eliminar Usuario') }}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('adminpanelscripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="{{asset('js/datatables.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>
@endpush

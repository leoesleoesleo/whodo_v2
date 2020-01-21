@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-11 col-md-11">
                <select name="rol" class="custom-select mr-sm-2" id="inlineFormCustomSelect" value="Elija el rol">
                    <option value="1" onclick="selectRegisterForm('1')">Proveedor</option>
                    <option value="2" onclick="selectRegisterForm('2')">Cliente</option>
                </select>
                <div class="card bg-secondary shadow border-0 proveedorForm mt-4">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>{{ __('Regístrate con credenciales') }}</small>
                        </div>
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="hidden" name="rol" value="1">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="form-group{{ $errors->has('nombreEmpresa') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                </div>
                                                <input id="proveedorNombreEmpresa"
                                                       class="form-control{{ $errors->has('nombreEmpresa') ? ' is-invalid' : '' }}"
                                                       placeholder="{{ __('Nombre de la empresa') }}" type="text"
                                                       name="name" value="{{ old('nombreEmpresa') }}" required
                                                       autofocus>
                                            </div>
                                            @if ($errors->has('nombreEmpresa'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                              <strong>{{ $errors->first('nameEmpresa') }}</strong>
                                          </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                </div>
                                                <input id="proveedorEmail"
                                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                       placeholder="{{ __('Email') }}" type="email" name="email"
                                                       value="{{ old('email') }}" required>
                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="form-group{{ $errors->has('nit') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-building"></i></span>
                                                </div>
                                                <input id="proveedorNit"
                                                       class="form-control{{ $errors->has('nit') ? ' is-invalid' : '' }}"
                                                       placeholder="{{ __('NIT') }}" type="text" name="proveedorNit"
                                                       value="{{ old('nit') }}" required autofocus>
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
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group{{ $errors->has('telefono') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                </div>
                                                <input id="proveedorTelefono"
                                                       class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                                       placeholder="{{ __('Teléfono') }}" type="text"
                                                       name="proveedorTelefono" value="{{ old('telefono') }}" required
                                                       autofocus>
                                            </div>
                                            @if ($errors->has('telefono'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                              <strong>{{ $errors->first('nameEmpresa') }}</strong>
                                          </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group{{ $errors->has('direccion') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-map-marker-alt"></i></span>
                                                </div>
                                                <input id="direccionProveedor"
                                                       class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}"
                                                       placeholder="{{ __('Dirección') }}" type="text"
                                                       name="direccionProveedor" value="{{ old('direccion') }}" required
                                                       autofocus>
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
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group{{ $errors->has('pais') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                                </div>
                                                <input id="proveedorPais"
                                                       class="form-control{{ $errors->has('pais') ? ' is-invalid' : '' }}"
                                                       placeholder="{{ __('País') }}" type="text" name="proveedorPais"
                                                       value="{{ old('pais') }}" required autofocus>
                                            </div>
                                            @if ($errors->has('pais'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                              <strong>{{ $errors->first('pais') }}</strong>
                                          </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group{{ $errors->has('ciudad') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-city"></i></span>
                                                </div>
                                                <input id="proveedorCiudad"
                                                       class="form-control{{ $errors->has('ciudad') ? ' is-invalid' : '' }}"
                                                       placeholder="{{ __('Ciudad') }}" type="text"
                                                       name="proveedorCiudad" value="{{ old('ciudad') }}" required
                                                       autofocus>
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
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                                                </div>
                                                <textarea class="form-control rounded-0" id="descripcion" placeholder="{{ __('Descripción') }}" name="descripcion"></textarea>
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
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-lock-circle-open"></i></span>
                                                </div>
                                                <input id="proveedorPassword"
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
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-lock-circle-open"></i></span>
                                                </div>
                                                <input id="proveedorPasswordConfirm" class="form-control"
                                                       placeholder="{{ __('Confirm Password') }}" type="password"
                                                       name="password_confirmation" required>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                    class="btn btn-primary mt-4">{{ __('Crear Cuenta') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card bg-secondary shadow border-0 clienteForm mt-4">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>{{ __('Regístrate con credenciales') }}</small>
                        </div>
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="hidden" name="rol" value="2">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                </div>
                                                <input id="clienteName"
                                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                       placeholder="{{ __('Nombre') }}" type="text" name="name"
                                                       value="{{ old('name') }}" required autofocus>
                                            </div>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group{{ $errors->has('apellidos') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                </div>
                                                <input id="clienteApellidos"
                                                       class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}"
                                                       placeholder="{{ __('Apellidos') }}" type="text"
                                                       name="clienteApellidos" value="{{ old('apellidos') }}" required
                                                       autofocus>
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
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group{{ $errors->has('pais') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                                </div>
                                                <input id="clientePais"
                                                       class="form-control{{ $errors->has('pais') ? ' is-invalid' : '' }}"
                                                       placeholder="{{ __('País') }}" type="text" name="clientePais"
                                                       value="{{ old('pais') }}" required autofocus>
                                            </div>
                                            @if ($errors->has('pais'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                          <strong>{{ $errors->first('pais') }}</strong>
                                      </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group{{ $errors->has('ciudad') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-city"></i></span>
                                                </div>
                                                <input id="clienteCiudad"
                                                       class="form-control{{ $errors->has('ciudad') ? ' is-invalid' : '' }}"
                                                       placeholder="{{ __('Ciudad') }}" type="text" name="clienteCiudad"
                                                       value="{{ old('ciudad') }}" required autofocus>
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
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group{{ $errors->has('cc') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                                                </div>
                                                <input id="clienteCc"
                                                       class="form-control{{ $errors->has('cc') ? ' is-invalid' : '' }}"
                                                       placeholder="{{ __('Cédula') }}" type="text" name="clienteCc"
                                                       value="{{ old('cc') }}" required autofocus>
                                            </div>
                                            @if ($errors->has('cc'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                          <strong>{{ $errors->first('cc') }}</strong>
                                      </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group{{ $errors->has('fechaN') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fa fa-calendar-alt"></i></span>
                                                </div>
                                                <input id="fechaNCliente"
                                                       class="datepicker form-control{{ $errors->has('fechaN') ? ' is-invalid' : '' }}"
                                                       placeholder="{{ __('Fecha de nacimiento') }}" type="text"
                                                       name="fechaNCliente" value="{{ old('fechaN') }}" required
                                                       autofocus>
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
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                </div>
                                                <input id="clienteEmail"
                                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                       placeholder="{{ __('E-mail') }}" type="text" name="email"
                                                       value="{{ old('email') }}" required autofocus>
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
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-lock-circle-open"></i></span>
                                                </div>
                                                <input id="clientePassword"
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
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-lock-circle-open"></i></span>
                                                </div>
                                                <input id="clienteConfirmPassword" class="form-control"
                                                       placeholder="{{ __('Confirm Password') }}" type="password"
                                                       name="password_confirmation" required>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                    class="btn btn-primary mt-4">{{ __('Crear Cuenta') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @push('registerJs')
            <script
                src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
            <script
                src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"></script>
            <script type="text/javascript" src="{{asset('js/registerControl.js')}}"></script>
    @endpush

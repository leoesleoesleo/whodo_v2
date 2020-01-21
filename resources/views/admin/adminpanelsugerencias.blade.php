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
                                <h3 class="mb-0">Sugerencias</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="adminSugerenciasTable">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Categorías sugeridas</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $datos)
                                <tr>
                                    <td>{{$datos->nombreCategoria}}</td>
                                    <td class="text-center">
                                        <a href="#" onclick="newCategoria('{{$datos->nombreCategoria}}', '{{$datos->idSugerirCategoria}}')"><i class="fa fa-check text-orange" data-toggle="tooltip" data-placement="top" title="Aprobar categoría"></i></a>
                                        <a href="#" onclick="deleteCategoria('{{$datos->idSugerirCategoria}}')"><i class="fa fa-trash text-orange" data-toggle="tooltip" data-placement="top" title="Eliminar usuario"></i></a>
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
    @push('adminPanelSugerenciasScript')
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
        <script src="{{asset('js/datatables.js')}}"></script>
        <script src="{{asset('js/portafolio.js')}}"></script>
    @endpush
 @endsection

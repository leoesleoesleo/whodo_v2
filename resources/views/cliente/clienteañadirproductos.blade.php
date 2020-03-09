 <div class="table-responsive" style="padding: 15px;">
    <table class="table align-items-center table-flush" id="adminTable">
        <thead class="thead-light">
        <tr>
            <th scope="col">Encuentra los mejores proveedores</th>
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
                                <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                   data-target="#Modalcatalogo" >Ver Portafolio</button>
                            </div>
                            <span class="d-inline-block text-truncate" style="max-width: 300px;">
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

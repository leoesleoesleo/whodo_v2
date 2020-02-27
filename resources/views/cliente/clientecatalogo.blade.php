@extends('layouts.app')

@section('content')



    <script>

    function mostrarprecioini(){
        var rangoprecioini = $('#rangoprecioini').val();
        $("#texrangoprecioini").text(rangoprecioini);
    }

    function mostrarpreciofin(){
        var rangopreciofin = $('#rangopreciofin').val();
        $("#texrangopreciofin").text(rangopreciofin);
    }


    window.onload = function () {
            // Variables
            let baseDeDatos = [
                {
                    id: 1,
                    nombre: 'Televisor',
                    precio: 100000,
                    referencia: 'gatdh'
                },
                {
                    id: 2,
                    nombre: 'Equipo',
                    precio: 120000,
                    referencia: 'gatdh'
                },
                {
                    id: 3,
                    nombre: 'Servicio',
                    precio: 230000,
                    referencia: 'gatdh'
                },
                {
                    id: 4,
                    nombre: 'Zapato',
                    precio: 45000,
                    referencia: 'gatdh'
                },
                {
                    id: 5,
                    nombre: 'Televisor',
                    precio: 100000,
                    referencia: 'gatdh'
                },
                {
                    id: 6,
                    nombre: 'Equipo',
                    precio: 120000,
                    referencia: 'gatdh'
                },
                {
                    id: 7,
                    nombre: 'Servicio',
                    precio: 230000,
                    referencia: 'gatdh'
                },
                {
                    id: 8,
                    nombre: 'Zapato',
                    precio: 45000,
                    referencia: 'gatdh'
                }

            ]
            let $items = document.querySelector('#items');
            let carrito = [];
            let total = 0;
            let $carrito = document.querySelector('#carrito');
            let $total = document.querySelector('#total');
            // Funciones
            function renderItems () {
                for (let info of baseDeDatos) {
                    // Estructura
                    let miNodo = document.createElement('div');
                    miNodo.classList.add('card', 'col-sm-3');
                    // Body
                    let miNodoCardBody = document.createElement('div');
                    miNodoCardBody.classList.add('card-body');
                    // Titulo
                    let miNodoTitle = document.createElement('h5');
                    miNodoTitle.classList.add('card-title');
                    miNodoTitle.textContent = info['nombre'];
                    // Referencia
                    let miNodoReferencia = document.createElement('h7');
                    miNodoReferencia.classList.add('img-fluid');
                    miNodoReferencia.textContent = info['referencia'];
                    // Precio
                    let miNodoPrecio = document.createElement('p');
                    miNodoPrecio.classList.add('card-text');
                    miNodoPrecio.textContent = info['precio'] + '$';
                    // Boton
                    let miNodoBoton = document.createElement('button');
                    miNodoBoton.classList.add('btn', 'btn-primary');
                    miNodoBoton.textContent = '+';
                    miNodoBoton.setAttribute('marcador', info['id']);
                    miNodoBoton.addEventListener('click', anyadirCarrito);
                    // Insertamos

                    miNodoCardBody.appendChild(miNodoTitle);
                    miNodoCardBody.appendChild(miNodoReferencia);
                    miNodoCardBody.appendChild(miNodoPrecio);
                    miNodoCardBody.appendChild(miNodoBoton);
                    miNodo.appendChild(miNodoCardBody);
                    $items.appendChild(miNodo);
                }
            }

            function anyadirCarrito () {
                // Anyadimos el Nodo a nuestro carrito
                carrito.push(this.getAttribute('marcador'))
                console.log(carrito);
                // Calculo el total
                calcularTotal();
                // Renderizamos el carrito
                renderizarCarrito();
            }

            function renderizarCarrito () {
                // Vaciamos todo el html
                $carrito.textContent = '';
                // Quitamos los duplicados
                let carritoSinDuplicados = [...new Set(carrito)];
                // Generamos los Nodos a partir de carrito
                carritoSinDuplicados.forEach(function (item, indice) {
                    // Obtenemos el item que necesitamos de la variable base de datos
                    let miItem = baseDeDatos.filter(function(itemBaseDatos) {
                        return itemBaseDatos['id'] == item;
                    });
                    // Cuenta el número de veces que se repite el producto
                    let numeroUnidadesItem = carrito.reduce(function (total, itemId) {
                        return itemId === item ? total += 1 : total;
                    }, 0);
                    // Creamos el nodo del item del carrito
                    let miNodo = document.createElement('li');
                    miNodo.classList.add('list-group-item', 'text-right', 'mx-2');
                    miNodo.textContent = `${numeroUnidadesItem} x ${miItem[0]['nombre']} - ${miItem[0]['precio']}$`;
                    miNodo.dataset.numeroUnidadesItem = numeroUnidadesItem;
                    miNodo.dataset.nombre = miItem[0]['nombre'];
                    miNodo.dataset.precio = miItem[0]['precio'];
                    // Boton de borrar
                    let miBoton = document.createElement('button');
                    miBoton.classList.add('btn', 'btn-danger', 'mx-5');
                    //miBoton.dataset.id = 'row';
                    miBoton.textContent = 'X';
                    miBoton.style.marginLeft = '1rem';
                    miBoton.setAttribute('item', item);
                    miBoton.addEventListener('click', borrarItemCarrito);
                    // Mezclamos nodos
                    miNodo.appendChild(miBoton);
                    $carrito.appendChild(miNodo);
                })
            }

            function borrarItemCarrito () {
                console.log()
                // Obtenemos el producto ID que hay en el boton pulsado
                let id = this.getAttribute('item');
                // Borramos todos los productos
                carrito = carrito.filter(function (carritoId) {
                    return carritoId !== id;
                });
                // volvemos a renderizar
                renderizarCarrito();
                // Calculamos de nuevo el precio
                calcularTotal();
            }

            function calcularTotal () {
                // Limpiamos precio anterior
                total = 0;
                // Recorremos el array del carrito
                for (let item of carrito) {
                    // De cada elemento obtenemos su precio
                    let miItem = baseDeDatos.filter(function(itemBaseDatos) {
                        return itemBaseDatos['id'] == item;
                    });
                    total = total + miItem[0]['precio'];
                }
                // Formateamos el total para que solo tenga dos decimales
                let totalDosDecimales = total.toFixed(0);
                // Renderizamos el precio en el HTML
                $total.textContent = totalDosDecimales;
            }
            // Eventos

            // Inicio
            renderItems();
        }

    </script>

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
                                        <h5 class="card-title text-uppercase text-muted mb-0">Número de proveedores: </h5>
                                        <a data-toggle="modal" data-target="#Modaldetalleproveedor" style="font-size:18px;padding:8px;" href="#" class="badge badge-success">{{($cantProv)}}</a>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fa fa-info-circle"></i>
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

                    <div class="col-xl-6 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Proveedores nuevos: </h5>
                                        <a data-toggle="modal" data-target="#Modalproveedoresnuevos" style="font-size:18px;padding:8px;" href="#" class="badge badge-success">{{($newCantProv)}}</a>
                                        <!--
                                        @foreach($details as $detalle)
                                        <div class="row">
                                            <div class="col">
                                                <span class="h2 font-weight-bold mb-0">{{('Pais del proveedor: ' . $detalle->pais)}}</span>
                                            </div>
                                        </div>
                                        @endforeach

                                        @foreach($newDetailsProv as $detalleNuevo)
                                            <div class="row">
                                                <div class="col">
                                                    <span
                                                        class="h2 font-weight-bold mb-0">{{('Detalle proveedores nuevo país: ' . $detalleNuevo->pais)}}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                        -->
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fa fa-info-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
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
            <div class="col-sm-12 col-md-9">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Encuentra tu proveedor</h3>
                            </div>
                        </div>
                    </div>
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
                                                    <a href="#!" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                       data-target="#Modalcatalogo">Ver Portafolio</a>
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
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Filtros Proveedor</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="padding: 10px;">

                        <!-- checkbox
                        <div class="custom-control custom-checkbox mb-3">
                            <input id="cate1" type="checkbox" class="custom-control-input">
                            <label for="cate1" class="custom-control-label">Categoria 1</label>
                        </div>
                        -->

                
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <select required name="rol" class="custom-select mr-sm-2" id="calificacionselect">
                                    <option> -- Calificación -- </option>
                                    @foreach($calificacion as $cal)
                                        <option value="{{$cal->idCalificacion}}">{{$cal->calificacion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <select required name="rol" class="custom-select mr-sm-2" id="ciudadselect">
                                    <option> -- Ciudad -- </option>
                                    @foreach($ciudad as $ciu)
                                        <option value="{{$ciu->idUser}}">{{$ciu->ciudad}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <select required name="rol" class="custom-select mr-sm-2" id="productoselect">
                                    <option> -- Producto -- </option>
                                    @foreach($producto as $prod)
                                        <option value="{{$prod->idProducto}}">{{$prod->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <h3>Rango de precio</h3>

                        <!--
                        <h5>Desde: <span id="texrangoprecioini" style="color: red;"></span><span style="color: red;"> $</span></h5>
                        <div class="">
                          <span class="font-weight-bold indigo-text mr-2 mt-1">0 $</span>
                              <form class="range-field w-25">
                                <input class="border-0" type="range" min="0" max="5000000" id="rangoprecioini" onchange="mostrarprecioini()" />
                              </form>
                          <span class="font-weight-bold indigo-text ml-2 mt-1">5.000.000 $</span>
                          <h5>Hasta: <span id="texrangopreciofin" style="color: red;"></span><span style="color: red;"> $</span></h5>
                          <div class="">
                          <span class="font-weight-bold indigo-text mr-2 mt-1">0 $</span>
                              <form class="range-field w-25">
                                <input class="border-0" type="range" min="0" max="5000000" id="rangopreciofin" onchange="mostrarpreciofin()"/>
                              </form>
                          <span class="font-weight-bold indigo-text ml-2 mt-1">5.000.000 $</span>
                        </div>
                        </div>
                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                               data-target="#Modalfiltro" onclick="filtroproveedor()">Filtrar</a>
                        </div>
                        </div>
                        -->

                        <div class="form-group">
                            <div class="input-group-prepend">
                                <input id="texrangoprecioini" type="text" class="form-control" placeholder="Precio desde">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group-prepend">
                                <input id="texrangopreciofin" type="text" class="form-control" placeholder="Precio hasta">
                            </div>
                        </div>

                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                               data-target="#Modalfiltro" onclick="filtroproveedor()">Filtrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal catalogos -->
  <div id="Modalcatalogo" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-body">
            <div class="row">
                <!-- Elementos generados a partir del JSON -->
                <main id="items" class="col-sm-8 row"></main>
                <!-- Carrito -->
                <aside class="col-sm-4">
                    <h2><span class="fa fa-cart-plus" style="color:orange;float:right;"></span></h2>
                    <!-- Elementos del carrito -->
                    <ul id="carrito" class="list-group"></ul>
                    <hr>
                    <!-- Precio total -->
                    <strong><p class="text-right">Total: <span id="total"></span>$</p></strong>
                    <button type="text" class="btn btn-sm btn-outline-primary" onclick="enviarpedido();">Hacer Pedido</button>
                </aside>
            </div>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-sm btn-outline-primary">Solicitud Pedido</button>-->
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

                        <h3>Proveedor:</h3>
                        <h3>Nit: </h3>

                        <br>

                        <div class="form-group">
                            <div class="input-group-prepend">
                                <select required name="rol" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                    <option selected>Portafolio:</option>
                                    <option value="1">Portafolio 1</option>
                                    <option value="2">Portafolio 2</option>
                                    <option value="3">Portafolio 3</option>
                                </select>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary">Formato</button>
                    <button type="button" class="btn btn-success">Carga productos </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>

    <!-- modal filtro 
    <div class="modal fade" id="Modalfiltro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Resultados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="cuerpoModalFiltro">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>-->


@endsection

@push('adminpanelscripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="{{asset('js/datatables.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>
    <script src="{{asset('js/portafolio.js')}}"></script>
@endpush

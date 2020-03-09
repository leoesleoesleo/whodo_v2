function createPortafolio(){
    var categoriaID = $('#categoriaSelect').val();
    var nombrePortafolio = $('#nomPortafolio').val();

    var params = {
        'categoriaid': categoriaID,
        'nombreportafolio': nombrePortafolio
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        data: params,
        url: '/crearPortafolio',
        type: 'post',
        success: function(data){
            alert("Portafolio creado");
            location.href = window.location.origin + "/proveedorcatalogo";
            /*
            var contenidoHTML = '';
            for(i in data){
                contenidoHTML +=
                    "<tbody>"+
                    "<tr>"+
                    "<td>"+data[i].portafolio+"</td>"+
                    "<td>"+data[i].nombreCategoria+"</td>"+
                    "<td>"+
                    "<i class='fa fa-edit text-orange' data-toggle='tooltip' data-placement='top' title='Editar Portafolio'>" +
                    "</i>"+
                    "<i class='fa fa-trash-alt text-orange' data-toggle='tooltip' data-placement='top' title='Eliminar Portafolio'>"+
                    "</i>"+
                    "</td>"+
                    "</tr>"+
                    "</tbody>"
            }
            $('#tablePortafolio').append(contenidoHTML);
            */
        },
        error: function (data) {
            console.log(data);
        }
    });
}


function createCategoria(){
    var nomCategoria = $('#nomCategoria').val();

    var params = {
        'nomCategoria': nomCategoria
    };

    $.ajax({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        data: params,
        url: '/sugerirCategoria',
        type: 'post',
        success: function(data){
            location.href = window.location.origin + "/proveedorcatalogo";
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function newCategoria(nombreCategoria, idCategoria) {
    var params = {
        'nomCategoria': nombreCategoria,
        'idCategoria': idCategoria
    };

    $.ajax({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        data: params,
        url: '/crearCategoria',
        type: 'post',
        success: function(data){
            location.href = window.location.origin + "/sugerenciacategoria";
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function deleteCategoria(idCategoria){
    var params = {
        'idCategoria': idCategoria
    };

    $.ajax({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        data: params,
        url: '/deleteCategoria',
        type: 'post',
        success: function(data){
            location.href = window.location.origin + "/sugerenciacategoria";
        },
        error: function (data) {
            console.log(data);
        }
    });
}


function filtroproveedor(){
    var categoriaselect = $('#categoriaselect').val();
    var calificacion = $('#calificacionselect').val();
    var ciudad = $('#ciudadselect').val();
    var producto = $('#productoselect').val();
    var nombreCalificacion = $('#calificacionselect option:selected').text();
    var nombreCiudad = $('#ciudadselect option:selected').text();
    var nombreProducto = $('#productoselect option:selected').text();
    var texrangoprecioini = $('#texrangoprecioini').val();
    var texrangopreciofin = $('#texrangopreciofin').val();
    var valid = 0;

    if(calificacion == '-- Calificación --' && ciudad == '-- Ciudad --' && producto == '-- Producto --'){
        valid += 1;
    }

    if(valid == 0){
        var params = {
            'categoriaselect': categoriaselect,
            'calificacionselect':nombreCalificacion,
            'ciudadselect':nombreCiudad,
            'productoselect':nombreProducto,
            'texrangoprecioini':texrangoprecioini,
            'texrangopreciofin':texrangopreciofin
        };

    if (texrangopreciofin < texrangoprecioini){
        alert("Elija un rango de precio válido");
        return;
    }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            data: params,
            url: '/searchFilter',
            type: 'post',
            success: function(data){
                //console.log(data,"primera vez");
                //alert(data);                
                $('#Modalfiltro').on('show.bs.modal', function(){
                    var datas = JSON.parse(data);                
                    for(i in datas) {                        
                        $('#cuerpoModalFiltro').append(
                            '<div class="container">'+
                            '<div class="row">'+
                            '<div class="col-12">' +
                            '<div>' +
                            'Nombre del proveedor: ' +datas[i].nombreEmpresa+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '<div class="row">'+
                            '<div class="col-12">' +
                            '<div>' +
                            'Ciudad de origen: ' +datas[i].ciudad+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '<div class="row">'+
                            '<div class="col-12">' +
                            '<div>' +
                            'Direccion: ' +datas[i].direccion+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '<div class="row">'+
                            '<div class="col-12">' +
                            '<div>' +
                            'Teléfono: ' +datas[i].telefono+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '<div class="row">'+
                            '<div class="col-12">' +
                            '<div>' +
                            'Correo electrónico: ' +datas[i].email+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '<hr>'
                        );
                    }
                });
                

                //location.href = window.location.origin + "clientecatalogo/";
            },
            error: function (data) {
                console.log(data);
                alert("Error");
                //console.log(data);
            }
        });
    }else{
        alert('Debe elegir al menos una opción para la búsqueda');
    }
}


    function enviarpedido(){
            var cantnodos = document.getElementById("carrito").childNodes.length;
            var array_carrito   = $('#carrito')[0].innerHTML;
            //console.log(carrito);
            const listLi = [...carrito.childNodes];
            const datasetList = listLi.map( li => {
                return JSON.stringify(li.dataset);
            } );
            console.log(datasetList);
            listLi.forEach( li => {
                console.log(li.dataset);
            } );
            //$('div#contenidopedido').html(array_carrito);

            ///var res = array_carrito.split("x",3);
            document.write(datasetList);

        }

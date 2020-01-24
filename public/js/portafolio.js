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
    var calificacionselect = $('#calificacionselect option:selected').text();
    var ciudadselect = $('#ciudadselect option:selected').text();
    var ciudadselect_ = $('#ciudadselect option:selected').val();
    var productoselect = $('#productoselect option:selected').text();
    var rangoprecioini = $('#rangoprecioini').val();
    var rangopreciofin = $('#rangopreciofin').val();


    if (categoriaselect == '' || categoriaselect == '-- Categoria --'){
        alert("El campo categoria es obligatorio para el filtro");
        return;
      }

    if (calificacionselect == '' || calificacionselect == '-- Calificación --' ){
        alert("El campo calificación es obligatorio para el filtro");
        return;
      }

    if (ciudadselect_ == '' || ciudadselect_ == '-- Ciudad --'){
        alert("El campo ciudad es obligatorio para el filtro");
        return;
      }

    if (productoselect == '' || productoselect == '-- Producto --'){
        alert("El campo producto es obligatorio para el filtro");
        return;
      }

    var params = {
        'categoriaselect': categoriaselect,
        'calificacionselect':calificacionselect,
        'ciudadselect':ciudadselect,
        'productoselect':productoselect,
        'rangoprecioini':rangoprecioini,
        'rangopreciofin':rangopreciofin
    };

    $.ajax({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        data: params,
        url: '/searchFilter',
        type: 'post',
        success: function(data){
            var data = JSON.parse(data);

            $('#Modalfiltro').on('show.bs.modal', function(){
                console.log(data);
                for(i in data) {
                    $('#cuerpoModalFiltro').html(
                        '<div class="container">'+
                        '<div class="row">'+
                        '<div class="col-12">' +
                        '<div>' +
                        'Nombre del proveedor: ' +data[i].nombreEmpresa+
                        '</div>'+
                        '</div>'+
                        '</div>'+
                        '<div class="row">'+
                        '<div class="col-12">' +
                        '<div>' +
                        'Ciudad de origen: ' +data[i].ciudad+
                        '</div>'+
                        '</div>'+
                        '</div>'+
                        '<div class="row">'+
                        '<div class="col-12">' +
                        '<div>' +
                        'Direccion: ' +data[i].direccion+
                        '</div>'+
                        '</div>'+
                        '</div>'+
                        '<div class="row">'+
                        '<div class="col-12">' +
                        '<div>' +
                        'Teléfono: ' +data[i].telefono+
                        '</div>'+
                        '</div>'+
                        '</div>'+
                        '<div class="row">'+
                        '<div class="col-12">' +
                        '<div>' +
                        'Correo electrónico: ' +data[i].email+
                        '</div>'+
                        '</div>'+
                        '</div>'+
                        '</div>'+
                        '<hr>'
                    );
                }
            });

            //location.href = window.location.origin + "clientecatalogo/";
            //alert("ok")
        },
        error: function (data) {
            console.log(data);
            //alert("Error");
            //console.log(data);
        }
    });
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





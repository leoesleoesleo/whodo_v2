$.fn.datepicker.dates['en'] = {
    days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
    daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
    daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
    today: "Today",
    clear: "Clear",
    format: "yyyy-mm-dd",
    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
    weekStart: 0
};

$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    locale: 'es'
});

function setEditModalValues(idUser, name, apellidos, pais, ciudad, cc, fechaN, email){
    $('#editUserId').val(idUser);
    $('#editUserName').val(name);
    $('#editUserApellidos').val(apellidos);
    $('#editUserPais').val(pais);
    $('#editUserCiudad').val(ciudad);
    $('#editUserCedula').val(cc);
    $('#editUserFechaN').val(fechaN);
    $('#editUserEmail').val(email);
}

function createuser(){
    var rol = $('#createUserRol').val();
    var name = $('#createUserName').val();
    var apellidos = $('#createUserApellidos').val();
    var pais = $('#createUserPais').val();
    var ciudad = $('#createUserCiudad').val();
    var cedula = $('#createUserCedula').val();
    var fechaN = $('#createUserFechaN').val();
    var email = $('#createUserEmail').val();
    var password = $('#createUserPassword').val();

    var params = {
        'rol': rol,
        'name': name,
        'apellidos': apellidos,
        'pais': pais,
        'ciudad': ciudad,
        'cedula': cedula,
        'fechaN': fechaN,
        'email': email,
        'password': password
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        data: params,
        url: '/createuser',
        type: 'post',
        success: function(data){
            location.href = window.location.origin + "/adminpanel";
            alert("Proceso OK");
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function edituser(){
    var id = $('#editUserId').val();
    var name = $('#editUserName').val();
    var apellidos = $('#editUserApellidos').val();
    var pais = $('#editUserPais').val();
    var ciudad = $('#editUserCiudad').val();
    var cedula = $('#editUserCedula').val();
    var fechaN = $('#editUserFechaN').val();
    var email = $('#editUserEmail').val();
    var password = $('#editUserPassword').val();

    var params = {
        'id': id,
        'name': name,
        'apellidos': apellidos,
        'pais': pais,
        'ciudad': ciudad,
        'cedula': cedula,
        'fechaN': fechaN,
        'email': email,
        'password': password
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        data: params,
        url: '/edituser',
        type: 'post',
        success: function(data){
            location.href = window.location.origin + "/adminpanel";
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function setDeleteModalValue(id){
    $('#deleteId').val(id);
}

function deleteUser(){
    var id = $('#deleteId').val();
    var params = {
        'id': id
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        data: params,
        url: '/deleteuser',
        type: 'post',
        success: function(data){
            location.href = window.location.origin + "/adminpanel";
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function createProveedor(){
    var nombre = $('#createProveedorName').val();
    var pais = $('#createProveedorPais').val();
    var ciudad = $('#createProveedorCiudad').val();
    var nit = $('#createProveedorNit').val();
    var telefono = $('#createProveedorTelefono').val();
    var direccion = $('#createProveedorDireccion').val();
    var email = $('#createProveedorEmail').val();
    var password = $('#createProveedorPassword').val();
    var rol = $('#createProveedorRol').val();
    var descripcion = $('#createProveedorDescripcion').val();

    var params = {
        'rol': rol,
        'name': nombre,
        'pais': pais,
        'ciudad': ciudad,
        'nit': nit,
        'telefono': telefono,
        'direccion': direccion,
        'password': password,
        'email': email,
        'descripcion': descripcion
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        data: params,
        url: '/createuser',
        type: 'post',
        success: function(data){
            location.href = window.location.origin + "/proveedorPanel";
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function setProveedorEditModalValues(idUser, nombreEmpresa, pais, ciudad, nit, telefono, direccion, email, descripcion){
    $('#editProveedorId').val(idUser);
    $('#editProveedorName').val(nombreEmpresa);
    $('#editProveedorPaise').val(pais);
    $('#editProveedorCiudad').val(ciudad);
    $('#editProveedorNit').val(nit);
    $('#editProveedorTelefono').val(telefono);
    $('#editProveedorDireccion').val(direccion);
    $('#editProveedorEmail').val(email);
    $('#editProveedorDescripcion').val(descripcion);
}

function editProveedor(){
    var nombre = $('#editProveedorName').val();
    var pais = $('#editProveedorPais').val();
    var ciudad = $('#editProveedorCiudad').val();
    var nit = $('#editProveedorNit').val();
    var telefono = $('#editProveedorTelefono').val();
    var direccion = $('#editProveedorDireccion').val();
    var email = $('#editProveedorEmail').val();
    var password = $('#editProveedorPassword').val();
    var id = $('#editProveedorId').val();
    var descripcion = $('#editProveedorDescripcion').val();

    var params = {
        'id': id,
        'name': nombre,
        'pais': pais,
        'ciudad': ciudad,
        'nit': nit,
        'telefono': telefono,
        'direccion': direccion,
        'password': password,
        'email': email,
        'descripcion': descripcion
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        data: params,
        url: '/editproveedor',
        type: 'post',
        success: function(data){
            location.href = window.location.origin + "/proveedorPanel";
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function setDeleteProveedorModalValue(id){
    $('#deleteProveedorId').val(id);
}

function deleteProveedor(){
    var id = $('#deleteProveedorId').val();
    var params = {
        'id': id
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        data: params,
        url: '/deleteproveedor',
        type: 'post',
        success: function(data){
            location.href = window.location.origin + "/adminpanel";
        },
        error: function (data) {
            console.log(data);
        }
    });
}

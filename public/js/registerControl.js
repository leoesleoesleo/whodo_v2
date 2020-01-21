//Configuración de lenguaje datepicker
$.fn.datepicker.dates['en'] = {
    days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
    daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
    daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
    today: "Today",
    clear: "Clear",
    format: "mm/dd/yyyy",
    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
    weekStart: 0
};

//Inicialización del datepicker
$('.datepicker').datepicker({
  format: 'yyyy-mm-dd',
  locale: 'es'
});

//Ocultar los dos formularios del registro
$(document).ready(function() {
  $('.clienteForm').hide();
  $('.proveedorForm').hide();
});

//Función para establecer el formulario según la opción que se escoja
function selectRegisterForm(value){
  if(value == 1){
    $('.clienteForm').hide(300);
    $('#clienteName').val('');
    $('#clienteApellidos').val('');
    $('#clientePais').val('');
    $('#clienteCiudad').val('');
    $('#clienteCc').val('');
    $('#fechaNCliente').val('');
    $('#clienteEmail').val('');
    $('#clientePassword').val('');
    $('#clienteConfirmPassword').val('');
    $('.proveedorForm').show(350);
  }else if(value == 2){
    $('.proveedorForm').hide(300);
    $('#proveedorNombreEmpresa').val('');
    $('#proveedorEmail').val('');
    $('#proveedorNit').val('');
    $('#proveedorTelefono').val('');
    $('#direccionProveedor').val('');
    $('#proveedorPais').val('');
    $('#proveedorCiudad').val('');
    $('#proveedorPassword').val('');
    $('#proveedorPasswordConfirm').val('');
    $('.clienteForm').show(350);
  }
}

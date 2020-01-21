$(document).ready( function () {
    $('#adminTable').DataTable({
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "language": {
            "search": "Buscar:",
            "oPaginate":{
                "sNext": "<i class='fa fa-forward'></i>",
                "sPrevious": "<i class='fa fa-backward'></i>"
            }
        }
    });

    $('#adminSugerenciasTable').DataTable({
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "language": {
            "search": "Buscar:",
            "oPaginate":{
                "sNext": "<i class='fa fa-forward'></i>",
                "sPrevious": "<i class='fa fa-backward'></i>"
            }
        }
    });
} );

$(document).ready( function () {
    $('#adminProveedorTable').DataTable({
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "language": {
            "search": "Buscar:",
            "oPaginate":{
                "sNext": "<i class='fa fa-forward'></i>",
                "sPrevious": "<i class='fa fa-backward'></i>"
            }
        }
    });
} );

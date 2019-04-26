function stats() {
    $.ajax({
        type: 'POST',
        url: '/app/controladores/dash.php',
        data: { 'pet': 'stats' },
        success: function (data) {
            try {
                var stats = JSON.parse(data);
                switch (stats.resp) {
                    case 1:
                        document.getElementById('asist_reg').innerHTML = stats.asistentes;
                        document.getElementById('certs_gen').innerHTML = stats.certs_gen;
                        document.getElementById('certs_env').innerHTML = stats.certs_env;
                        document.getElementById('consul_gen').innerHTML = stats.consul_gen;
                        break;
                    case 0:
                        $.toast({
                            heading: 'Ha ocurrido un error',
                            text: 'No se pudo obtener las estadisticas.'
                        });
                        break;
                    default:
                        break;
                }
            } catch (error) {
                console.log(error);
                $.toast({
                    heading: 'Ha ocurrido un error',
                    text: error,
                    hideAfter: false,
                });
            }
        },
    });
}
function u_reg() {
    $.ajax({
        type: 'POST',
        url: '/app/controladores/dash.php',
        data: { 'pet': 'users' },
        success: function (data) {
            try {
                var users = JSON.parse(data);
                switch (users.resp) {
                    case 1:
                        var tabla = '';
                        for (let index = 0; index < users.users.length; index++) {
                            tabla += '<tr><td>' + users.users[index].Fecha + '</td><td>' + users.users[index].Nombres + ' ' + users.users[index].Apellidos + '</td><td>' + users.users[index].Tipo_Documento + '</td><td>' + users.users[index].Documento + '</td><td>' + users.users[index].Correo + '</td></tr>';
                        }
                        //TODO Agregar iconos de accion en la tabla
                        document.getElementById('data_users').innerHTML = tabla;
                        $('#table_data_users').DataTable({
                            responsive: true,
                            paging: false,
                        });
                        break;
                    case 0:
                        break;
                    default:
                        break;
                }
            } catch (error) {
                console.log(error);

            }
        },
    });
}
window.onload = function () {
    stats();
    u_reg();
}
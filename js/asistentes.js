function asistentes_table() {
    var peticion = new FormData();
    peticion.append('pet', 'asistentes');
    fetch('/app/controladores/consulta_asistentes.php', {
        method: 'POST',
        body: peticion,
    }).then(respuesta => {
        if (respuesta.ok) {
            return respuesta.json();
        }
    }).then(data => {
        if (data.resp) {
            switch (data.resp) {
                case 1:
                    var info_tabla = '';
                    for (let index = 0; index < data.asist.length; index++) {
                        info_tabla += '<tr><td>' + data.asist[index].Fecha + '</td><td>' + data.asist[index].Nombres + ' ' + data.asist[index].Apellidos + '</td><td>' + data.asist[index].Tipo_Documento + '</td><td>' + data.asist[index].Documento + '</td><td>' + data.asist[index].Correo + '</td></tr>'
                    };
                    document.getElementById('data_users').innerHTML = info_tabla;
                    $('#tabla_usuarios').DataTable({
                        responsive: true,
                        paging: false,
                    });
                    break;
                case 0:
                    break;
                default:
                    break;
            }
        }
    }).catch(error => {
        console.log(error);
    })
}
window.onload = function () {
    asistentes_table();
}
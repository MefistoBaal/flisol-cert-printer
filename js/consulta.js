function generar_cert() {

}

function consultar_cert() {
    $.ajax({
        type: 'POST',
        data: $('#consulta_certificado').serialize(),
        url: '/app/controladores/consulta_certificado.php',
        beforeSend: function () {
            document.getElementById('doc_busq').disabled = true;
            document.getElementById('sub_consulta').disabled = true;
            document.getElementById('contenedor_cert').innerHTML = '<div class="card border border-success"><div class="card-header"><strong class="card-title">Buscando certificado...</strong></div><div class="card-body text-center"><img src="/images/loader.svg" style="width:100px; "></img></div></div>';
        },
        success: function (data) {
            try {
                var respuesta = JSON.parse(data);
                switch (respuesta.resp) {
                    case 1:
                        document.getElementById('doc_busq').disabled = false;
                        document.getElementById('sub_consulta').disabled = false;
                        document.getElementById('contenedor_cert').innerHTML = '<div class="card border border-success"><div class="card-header"><strong class="card-title">' + respuesta.nombres + ' ' + respuesta.apellidos + '</strong></div><div class="card-body"><p class="card-text"><strong>Correo:</strong> ' + respuesta.correo + '.</p><p class="card-text"><strong>Documento:</strong> ' + respuesta.documento + '.</p><p class="card-text"><strong>' + respuesta.rol + '</strong></p></div></div>';

                        break;
                    case 2:
                        document.getElementById('doc_busq').disabled = false;
                        document.getElementById('sub_consulta').disabled = false;
                        document.getElementById('contenedor_cert').innerHTML = '<div class="card border border-secondary"><div class="card-header"><strong class="card-title">No existe el certificado</strong></div><div class="card-body"><p class="card-text">No se ha encontrado ningun certificado para el registro ingresado.</p></div></div></div>';
                        break;
                    case 0:
                        document.getElementById('doc_busq').disabled = false;
                        document.getElementById('sub_consulta').disabled = false;
                        document.getElementById('contenedor_cert').innerHTML = '<div class="card border border-secondary"><div class="card-header"><strong class="card-title">Oops</strong></div><div class="card-body"><p class="card-text">ha ocurrido un error.</p></div></div>';
                        console.log(respuesta.info);

                        break;
                    default:
                        break;
                }
            } catch (error) {
                document.getElementById('doc_busq').disabled = false;
                document.getElementById('sub_consulta').disabled = false;
                document.getElementById('contenedor_cert').innerHTML = '<div class="card border border-secondary"><div class="card-header"><strong class="card-title">Oops</strong></div><div class="card-body"><p class="card-text">ha ocurrido un error.</p></div></div>';
                console.log(error);
            }
        }
    });
}
window.onload = function () {
    document.getElementById('consulta_certificado').addEventListener('submit', function (event) {
        event.preventDefault();
        consultar_cert();
    });
}
function consultar_cert() {
    $.ajax({
        type: 'POST',
        data: $('#consulta_certificado').serialize(),
        url: '/',
        beforeSend: function () {
            document.getElementById('email').disabled = true;
            document.getElementById('sub_consulta').disabled = true;
        },
        success: function (data) {
            document.getElementById('email').disabled = false;
            document.getElementById('sub_consulta').disabled = false;
        }
    });
}
window.onload = function () {
    document.getElementById('consulta_certificado').addEventListener('submit', function (event) {
        event.preventDefault();
        consultar_cert();
    });
}
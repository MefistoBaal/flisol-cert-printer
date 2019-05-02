function verificar_cod() {
    document.getElementById('contenedor_cert').innerHTML = '<div class="card border border-success"><div class="card-header"><strong class="card-title">Buscando certificado...</strong></div><div class="card-body text-center"><img src="/images/loader.svg" style="width:100px;"Contenido de respuesta"></img></div></div>';
    var data_verif = new FormData();
    data_verif.append('cod_busq', document.getElementById('cod_busq').value);
    fetch('/app/controladores/verificar.php', {
        method: 'POST',
        body: data_verif,
    }).then(respuesta => {
        if (respuesta.ok) {
            return respuesta.json()
        }
    }).then(data => {
        if (data.resp) {
            switch (data.resp) {
                case 1:
                    document.getElementById('contenedor_cert').innerHTML = '<div class="card border border-success"><div class="card-header"><strong class="card-title">Validación certificado</strong></div><div class="card-body"><p class="card-text"><strong>Valido</strong></p><p class="card-text"><strong>Nombres: </strong>' + data.Nombres + '</p><p class="card-text"><strong>Documento: </strong>' + data.Documento + '</p></div></div>';
                    break;
                case 0:
                    document.getElementById('contenedor_cert').innerHTML = '<div class="card border border-success"><div class="card-header"><strong class="card-title">Validación certificado</strong></div><div class="card-body"><p class="card-text"><strong>No Valido</strong></div></div>';
                    break;
                default:
                    document.getElementById('contenedor_cert').innerHTML = '<div class="card border border-success"><div class="card-header"><strong class="card-title">Validación certificado</strong></div><div class="card-body"><p class="card-text"><strong>No Valido</strong></div></div>';
                    break;
            }
        } else {
            document.getElementById('contenedor_cert').innerHTML = '<div class="card border border-success"><div class="card-header"><strong class="card-title">Validación certificado</strong></div><div class="card-body"><p class="card-text"><strong>No Valido</strong></div></div>';
        }
    }).catch(error => {
        console.log(error);
    })
}
window.onload = function () {
    document.getElementById('consulta_cod').addEventListener('submit', function (event) {
        event.preventDefault();
        verificar_cod();
    });
}
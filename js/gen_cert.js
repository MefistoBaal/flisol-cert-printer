function consulta_roles() {
    $.ajax({
        type: 'POST',
        url: '/app/controladores/gen_certificado.php',
        data: { 'pet': 'roles' },
        success: function (data) {
            try {
                var roles = JSON.parse(data);
                switch (roles.resp) {
                    case 1:
                        var rol_opt = '';
                        for (let index = 0; index < roles.roles.length; index++) {
                            rol_opt += '<option value="' + roles.roles[index].idroles + '">' + roles.roles[index].Nombre_Rol + '</option>';
                        }
                        document.getElementById('select_rol').innerHTML = rol_opt;
                        break;
                    case 0:
                        $.toast({
                            text: 'ERROR: ' + roles.error,
                            heading: 'Oops. Ha ocurrido un error',
                            icon: 'error',
                            showHideTransition: 'slide',
                            allowToastClose: true,
                            hideAfter: 10000,
                            stack: 3,
                            position: 'bottom-right',
                            textAlign: 'left',
                            loader: true,
                        });
                        break;
                    default:
                        break;
                }
            } catch (error) {
                console.log(error);
                $.toast({
                    text: 'ERROR: ' + error,
                    heading: 'Oops. Ha ocurrido un error',
                    icon: 'error',
                    showHideTransition: 'slide',
                    allowToastClose: true,
                    hideAfter: 10000,
                    stack: 3,
                    position: 'bottom-right',
                    textAlign: 'left',
                    loader: true,
                });
            }
        }
    });
}
function generar_certificado() {
    var form = $('#form_generar_cert').serializeArray();
    var pet = { name: 'pet', value: 'gen' }
    form.unshift(pet);
    $.ajax({
        type: 'POST',
        url: '/app/controladores/gen_certificado.php',
        data: form,
        beforeSend: function () {
            document.getElementById('gen_submit').disabled = true;
            $('#boton_generar').hide();
            $('#boton_generando').show();
            $.toast({
                text: 'Registrando al usuario...',
                heading: 'Espere mientras se genera el certificado.',
                showHideTransition: 'slide',
                hideAfter: false,
                allowToastClose: true,
                stack: 1,
                position: 'bottom-right',
                bgColor: '#444444',
            });
        },
        success: function (data) {
            try {
                var resp = JSON.parse(data);
                switch (resp.resp) {
                    case 1:
                        document.getElementById('gen_submit').disabled = false;
                        $('#boton_generar').show();
                        $('#boton_generando').hide();
                        $.toast().reset('all');
                        $.toast({
                            text: 'Se ha generado correctamente el certificado',
                            heading: 'Se ha generado el certificado',
                            icon: 'success',
                            showHideTransition: 'slide',
                            allowToastClose: true,
                            hideAfter: 10000,
                            stack: 3,
                            position: 'bottom-right',
                            textAlign: 'left',
                            loader: true,
                        });
                        var tarjeta_cert = '<div class="card"><div class="card-header">Certificado</div><div class="card-body"><div class="card-title"></div><hr><div class="row"><div class="col-12"><a href="/pdf/' + resp.cert + '" target="_blank"><button type="button" class="btn btn-danger btn-lg"><i class="fa fa-file-text"></i>Generar PDF</button></a><a href=""><button type="button" class="btn btn-primary btn-lg" disabled><i class="fa fa-location-arrow"></i>Enviar Correo</button></a></div>';

                        document.getElementById('resp_gen').innerHTML = tarjeta_cert;
                        break;
                    case 0:
                        document.getElementById('gen_submit').disabled = false;
                        $('#boton_generar').show();
                        $('#boton_generando').hide();
                        $.toast().reset('all');
                        $.toast({
                            text: resp.info,
                            heading: 'Ha ocurrido un error',
                            icon: 'error',
                            showHideTransition: 'slide',
                            allowToastClose: true,
                            hideAfter: 10000,
                            stack: 3,
                            position: 'bottom-right',
                            textAlign: 'left',
                            loader: true,
                        });
                        break;
                    default:
                        break;
                }
            } catch (error) {
                document.getElementById('gen_submit').disabled = false;
                $('#boton_generar').show();
                $('#boton_generando').hide();
                console.log(error);
                $.toast({
                    text: 'ERROR: ' + error,
                    heading: 'Oops. Ha ocurrido un error',
                    icon: 'error',
                    showHideTransition: 'slide',
                    allowToastClose: true,
                    hideAfter: 10000,
                    stack: 3,
                    position: 'bottom-right',
                    textAlign: 'left',
                    loader: true,
                });
            }
        }
    });
}
window.onload = function () {
    consulta_roles();
    document.getElementById('form_generar_cert').addEventListener('submit', function (event) {
        event.preventDefault();
        generar_certificado();
    })
}
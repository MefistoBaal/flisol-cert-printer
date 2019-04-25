function login() {
    $.ajax({
        type: 'POST',
        url: '/app/controladores/login.php',
        data: $('#log_form').serializeArray(),
        beforeSend: function () {
            document.getElementById('in_email').disabled = true;
            document.getElementById('in_pass').disabled = true;
            document.getElementById('log_submit').disabled = true;
            $.toast({
                text: "Por favor espere mientras se valida la información.",
                heading: 'Iniciando sesión...',
                icon: 'info',
                showHideTransition: 'slide',
                allowToastClose: true,
                hideAfter: false,
                stack: false,
                position: 'bottom-right',
                textAlign: 'left',
                loader: true,
                loaderBg: '#9EC600',
            });
        },
        success: function (data) {
            try {
                var respuesta = JSON.parse(data);
                switch (respuesta.resp) {
                    case 1:
                        window.location = '/dash';
                        break;
                    case 0:
                    case 2:
                        $.toast().reset('all');
                        $.toast({
                            text: respuesta.info,
                            heading: 'Oops',
                            icon: 'warning',
                            showHideTransition: 'slide',
                            allowToastClose: true,
                            hideAfter: false,
                            stack: false,
                            position: 'bottom-right',
                            textAlign: 'left',
                            loader: true,
                            loaderBg: '#9EC600',
                        });
                        document.getElementById('in_email').disabled = false;
                        document.getElementById('in_pass').disabled = false;
                        document.getElementById('log_submit').disabled = false;
                        break;
                    default:
                        break;
                }
            } catch (error) {
                $.toast({
                    text: "Ha ocurrido un error inesperado.",
                    heading: 'Oops',
                    icon: 'error',
                    showHideTransition: 'slide',
                    allowToastClose: true,
                    hideAfter: false,
                    stack: false,
                    position: 'bottom-right',
                    textAlign: 'left',
                    loader: true,
                    loaderBg: '#9EC600',
                });
                console.log(error);
            }
        }
    });
}
window.onload = function () {
    document.getElementById('log_form').addEventListener('submit', function (event) {
        event.preventDefault();
        login();
    });
}
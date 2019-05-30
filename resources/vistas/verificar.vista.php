<?php
include 'layouts/header.php';
include 'layouts/scripts.php';
?>
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo mx-auto">
                            <a href="#">
                                <img src="/images/logo_flisol.svg" alt="Flisol">
                            </a>
                        </div>
                        <div class="login-form">
                            <p>Verifica tu certificado de asistencia a FLISoL 2019</p>
                            <form id="consulta_cod">
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="text" id="cod_busq" name="cod_busq" placeholder="Código" required>
                                </div>
                                <button id="sub_consulta" class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Consultar</button>
                            </form>
                            <div id="contenedor_cert">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
new Scripts('verificar');
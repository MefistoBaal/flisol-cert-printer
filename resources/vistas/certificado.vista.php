<?php
include 'layouts/header.php';
include 'layouts/scripts.php';
?>
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <p>Consulta tu certificado de asistencia a FLISoL 2019</p>
                            <form id="consulta_certificado">
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="text" id="doc_busq" name="doc_busq" placeholder="Documento o Email" required>
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
new Scripts('consulta');
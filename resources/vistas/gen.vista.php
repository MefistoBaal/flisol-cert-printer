<?php
session_name('FlisolADM');
session_start();
(!isset($_SESSION['id_adm'])) ? header('Location: /login') : null;
include 'layouts/header.php';
include 'layouts/header_movile.php';
include 'layouts/menu.php';
include 'layouts/top_bar.php';
include 'layouts/scripts.php';
?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Generar Certificado</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Datos de Asistente</h3>
                                        </div>
                                        <hr>
                                        <form id="form_generar_cert" action="" method="post">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <input id="nombres" name="nombres" type="text" class="form-control" placeholder="Nombres" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group">
                                                        <input id="apellidos" name="apellidos" type="text" class="form-control" placeholder="Apellidos" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <select name="select_t_doc" id="select_t_doc" class="form-control" required>
                                                            <option value="">-- Tipo de Documento --</option>
                                                            <option value="1">Cédula de Ciudadania</option>
                                                            <option value="1">Cédula de Extrangería</option>
                                                            <option value="2">Tarjeta de Identidad</option>
                                                            <option value="2">Permiso especial de permanencia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <input type="number" name="n_doc" id="n_doc" class="form-control" placeholder="Número de Documento" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <input id="cc-exp" name="email" type="email" class="form-control" placeholder="Correo" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <input id="cc-exp" name="cel" type="number" class="form-control" placeholder="Celular">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <select name="select_rol" id="select_rol" class="form-control" required>
                                                            <option value="">-- Rol --</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button id="gen_submit" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-arrow-right"></i>&nbsp;
                                                    <span id="boton_generar">Generar Certificado</span>
                                                    <span id="boton_generando" style="display:none;">Generando...</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="resp_gen">

                                </div>
                            </div>
                        </div>
<?php
include 'layouts/footer.php';
new Scripts('gen_cert');
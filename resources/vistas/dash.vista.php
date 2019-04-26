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
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Estadísticas</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2 id="asist_reg">0</h2>
                                                <span>Asistentes registrados</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-certificate"></i>
                                            </div>
                                            <div class="text">
                                                <h2 id="certs_gen">0</h2>
                                                <span>Certificados generados</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-mail-forward"></i>
                                            </div>
                                            <div class="text">
                                                <h2 id="certs_env">0</h2>
                                                <span>Certificados enviados</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-cogs"></i>
                                            </div>
                                            <div class="text">
                                                <h2 id="consul_gen">0</h2>
                                                <span>Consultas generadas</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Últimos asistentes registrados</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning" id="table_data_users">
                                        <thead>
                                            <tr>
                                                <th>fecha</th>
                                                <th>nombres</th>
                                                <th>tipo de documento</th>
                                                <th>documento</th>
                                                <th>correo</th>
                                            </tr>
                                        </thead>
                                        <tbody id="data_users">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Incluir footer aqui-->
<?php
include 'layouts/footer.php';
new Scripts('dash');
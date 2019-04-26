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
                                <h2 class="title-1 m-b-25">Asistentes registrados</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning" id="tabla_usuarios">
                                        <thead>
                                            <tr>
                                                <th>fecha</th>
                                                <th>nombres</th>
                                                <th>tipo de documento</th>
                                                <th>documento</th>
                                                <th>correo</th>
                                                <th>Acción</th>
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
new Scripts('asist');

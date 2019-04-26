<?php
(isset($_SESSION['iduser'])) ? header('Location: /dash') : null;
include 'layouts/header.php';
include 'layouts/scripts.php';
?>
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo mx-auto">
                            <a href="#">
                                <img src="images/logo_flisol.svg" alt="Flisol">
                            </a>
                        </div>
                        <div class="login-form">
                            <form id="log_form">
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="email" name="email"
                                    id="in_email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="password" name="password" id="in_pass" placeholder="Contraseña">
                                </div>
                                <button id="log_submit" class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Iniciar Sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php
new Scripts('login');
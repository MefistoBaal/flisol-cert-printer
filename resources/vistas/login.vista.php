<?php
(isset($_SESSION['iduser'])) ? header('Location: /dash') : null;

include 'layouts/header.php';
?>
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="/">
                                <img src="images/icon/logo.png">
                            </a>
                        </div>
                        <div class="login-form">
                            <form id="log_form" action="" method="post">
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Contraseña">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Iniciar Sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php
include 'layouts/scripts.php';
<?php
session_name('FlisolADM');
session_start();
session_destroy();
unset($_COOKIE['FlisolADM']);
header('Location: /');

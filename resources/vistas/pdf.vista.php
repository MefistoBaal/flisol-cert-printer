<?php
try {
    $var_get = explode('/', $_GET['vista']);
    if ($var_get[0] == 'pdf' and isset($var_get[1]) and !is_null($var_get[1]) and !empty($var_get[1])) {
        include_once $_SERVER['DOCUMENT_ROOT'] . '/app/controladores/gen_pdf.php';

        $pdf = new Generar_PDF();
        $pdf->generar_pdf($var_get[1]);
    } else {
        header('Location: /');
    }
} catch (\Exception $e) {
    die($e->getMessage());
}

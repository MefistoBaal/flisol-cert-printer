<?php
/**
 * Kernel Vista
 *
 * @author Santigo Hurtado
 *
 */
class Kernel_Vista
{

    const RUTA_VISTA = __DIR__ . '/../../resources/vistas/';

    public function _return_vista($vista = null, $donde = null)
    {
        try {
            if (!is_null($vista)) {
                return include self::RUTA_VISTA . $vista . '.vista.php';
            } else {
                return include self::RUTA_VISTA . 'dash.vista.php';
            }
        } catch (\Exception $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }
}

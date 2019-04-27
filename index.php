<?php
/**
 * FLISoL
 *
 * Sistema para impresion de certificados de FLISoL 2019
 *
 * @author Santiago Hurtado
 *
 */
require __DIR__ . '/resources/rutas/web.php';
//require __DIR__ . '/app/kernel/autoload.php';
class IndexViews
{
    public function __construct($vista)
    {
        try {
            /**Constructor de vistas */
            $rutas = new Rutas();

            /**Recorte vista raiz */
            $vista_r = (isset($vista['vista'])) ? explode('/', $vista['vista']) : null;

            /**Inclusion de vista */
            return (isset($vista_r[0]))
            ? $rutas->vista($vista_r[0])
            : $rutas->vista(null);
        } catch (\Exception $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }
}
new IndexViews($_GET);
